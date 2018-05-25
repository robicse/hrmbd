<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\ViewBuilder;
use Cake\Event\Event;

/*CHANGE DATETIME FORMAT FOR API*/
\Cake\I18n\FrozenTime::setJsonEncodeFormat('yyyy-MM-dd hh:mm aa');

class ApiController extends AppController{

    private $ResponseData = [
        'status'    =>false,
        'message'   => '',
        'response'  =>[]
    ];

    public function beforeFilter(Event $event){
        $this->response->header('Access-Control-Allow-Origin', '*');
        header('Content-Type:application/json;charset=utf8');
    }

    public function initialize(){
        parent::initialize();
        $this->loadComponent('Paginator');

        $this->loadModel('Users');
        $this->loadModel('Processes');
        $this->loadModel('ProcessUsers');
        $this->loadModel('ProcessUserTickets');

        $this->ViewBuilder()->layout('ajax');
    }

    public function index(){
        die('API Version 1.0');
    }

    /*USER SIGNIN*/
    public function login(){
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $email_or_phone = isset($data['email_or_phone'])? $data['email_or_phone'] : '#';
            $password       = isset($data['password'])? $data['password']   : false;
            if ($password) {  /*PhoneOrEmail Login with Password*/
                #UPDATE AUTH CONFIG ASSOCIATION [START]
                    $this->Auth->config(['authenticate' => [
                        'Form' => [
                            'contain' =>false
                        ]
                    ]]);
                    $this->Auth->config(['authenticate' => [
                        'Form' => [
                            'contain' => [
                                'UserGroups'
                            ]
                        ]
                    ]]);
                #UPDATE AUTH CONFIG ASSOCIATION [END]
                $user = $this->Auth->identify();
                if ($user) {
                    $this->ResponseData['status']     = true;
                    $this->ResponseData['message']    = 'Successfully Logged In';
                    $this->ResponseData['response']       = $user;
                }else{
                    $this->ResponseData['message']    = 'Login failed! Please try again!';
                }
            }else{
                $this->ResponseData['message'] = 'Invalid login credential!';
            }
        }
        echo json_encode($this->ResponseData,JSON_PRETTY_PRINT);
        die();
    }

    /*SUPERVISOR GET TICKETS [Open,Closed]*/
    public function supervisorGetProcesses($status='active'){
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $UserID     = isset($data['user_id'])? $data['user_id'] : 0;

            $this->ProcessUsers->primaryKey('process_id');
            $ProcessIDs = $this->ProcessUsers->find('list')
                ->where([
                    'user_id'=>$UserID
                ])->toArray();

            if (!empty($ProcessIDs)) {
                $users = $this->Processes->find('all')
                    ->where([
                        'id IN'=>$ProcessIDs
                    ]);

                if (!empty($users)) {
                    $this->ResponseData['status']       = true;
                    $this->ResponseData['response']     = $users;
                }
            }
        }
        echo json_encode($this->ResponseData,JSON_PRETTY_PRINT);
        die();
    }

    /*SUPERVISOR GET TICKETS [Open,Closed]*/
    public function supervisorGetTickets($status='open'){
        #if ($this->request->is('post')) {
            $tickets = $this->ProcessUserTickets->find('all')->where(['status'=>$status]);
            $this->ResponseData['status']       = true;
            $this->ResponseData['response']     = $tickets;
        #}
        echo json_encode($this->ResponseData,JSON_PRETTY_PRINT);
        die();
    }

    /*SUPERVISOR GET USERS [Supervisor,Agents]*/
    public function supervisorGetUsers($process_users_role='agent'){
        $this->ResponseData['message']      = 'User not found!';

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $UserID     = isset($data['user_id'])? $data['user_id'] : 0;

            $this->ProcessUsers->primaryKey('process_id');
            $ProcessIDs = $this->ProcessUsers->find('list')
                ->where([
                    'user_id'=>$UserID
                ])->toArray();

            if (!empty($ProcessIDs)) {
                $users = $this->ProcessUsers->find('all')
                    ->contain(['Users'])
                    ->where([
                        'process_id IN'=>$ProcessIDs,
                        'user_id !='=>$UserID
                    ]);

                if (!empty($users)) {
                    $this->ResponseData['status']       = true;
                    $this->ResponseData['response']     = $users;
                }
            }
        }
        echo json_encode($this->ResponseData,JSON_PRETTY_PRINT);
        die();
    }

}
