<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class UserGroupControllerActionsController extends AppController{

    public function index(){
        $this->paginate = [
            'contain' => ['UserGroupControllers']
        ];
        $userGroupControllerActions = $this->paginate($this->UserGroupControllerActions);

        $this->set(compact('userGroupControllerActions'));
        $this->set('_serialize', ['userGroupControllerActions']);
    }

    public function view($id = null){
        $userGroupControllerAction = $this->UserGroupControllerActions->get($id, [
            'contain' => ['UserGroupControllers', 'UserGroupPermissions']
        ]);

        $this->set('userGroupControllerAction', $userGroupControllerAction);
        $this->set('_serialize', ['userGroupControllerAction']);
    }

    public function add(){
        $userGroupControllerAction = $this->UserGroupControllerActions->newEntity();
        if ($this->request->is('post')) {
            $userGroupControllerAction = $this->UserGroupControllerActions->patchEntity($userGroupControllerAction, $this->request->data);
            if ($this->UserGroupControllerActions->save($userGroupControllerAction)) {
                $this->Flash->success(__('The user group controller action has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user group controller action could not be saved. Please, try again.'));
            }
        }
        $userGroupControllers = $this->UserGroupControllerActions->UserGroupControllers->find('list', ['limit' => 1000]);
        $this->set(compact('userGroupControllerAction', 'userGroupControllers'));
        $this->set('_serialize', ['userGroupControllerAction']);
    }

    public function edit($id = null){
        $userGroupControllerAction = $this->UserGroupControllerActions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userGroupControllerAction = $this->UserGroupControllerActions->patchEntity($userGroupControllerAction, $this->request->data);
            if ($this->UserGroupControllerActions->save($userGroupControllerAction)) {
                $this->Flash->success(__('The user group controller action has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user group controller action could not be saved. Please, try again.'));
            }
        }
        $userGroupControllers = $this->UserGroupControllerActions->UserGroupControllers->find('list', ['limit' => 1000]);
        $this->set(compact('userGroupControllerAction', 'userGroupControllers'));
        $this->set('_serialize', ['userGroupControllerAction']);
    }

    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $userGroupControllerAction = $this->UserGroupControllerActions->get($id);
        if ($this->UserGroupControllerActions->delete($userGroupControllerAction)) {
            $this->Flash->success(__('The user group controller action has been deleted.'));
        } else {
            $this->Flash->error(__('The user group controller action could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function GetExistingActionsByCtlrID($CtlrID=0){
        $Actions = $this->UserGroupControllerActions->find('list')
            ->where(['user_group_controller_id'=>$CtlrID])
            ->toArray();
        return $Actions;
    }

    public function ajaxGetActions($ControllerID=0){
        $this->viewBuilder()->layout('ajax');
        $Controller         = $this->UserGroupControllerActions->UserGroupControllers->get($ControllerID);
        $ExistingActions    = $this->GetExistingActionsByCtlrID($ControllerID);
        $prefix = '';
        if($this->request->params['prefix']){
            $prefix = ucwords($this->request->params['prefix']);
            $prefix = '\\'.$prefix;
        }

        $Controller = 'App\Controller'.$prefix.'\\'.$Controller->controller.'Controller';

        $class      = new \ReflectionClass($Controller);
        $methods    = $class->getMethods(\ReflectionMethod::IS_PUBLIC);
        $Actions    = [];

        foreach ($methods as $key => $value) {
            if($value->class==$Controller){
                $Actions[$key]['user_group_controller_id']  = $ControllerID;
                $Actions[$key]['action_title']              = ucwords($value->name);
                $Actions[$key]['action']                    = $value->name;
            }
        }

        $this->set(compact('Actions','ExistingActions'));
    }

    public function ajaxAddOrDelete($status=null){
        /*ADD PERMISSIONS*/
        if ($status=='add') {
            $UserGroupControllerActions = $this->UserGroupControllerActions->newEntity();
            if ($this->request->is('post')) {
                $data = [
                    'user_group_controller_id'=>$this->request->data['ControllerID'],
                    'action_title'=>$this->request->data['ActionTitle'],
                    'action'=>$this->request->data['Action']
                ];
                $UserGroupControllerActions = $this->UserGroupControllerActions->patchEntity($UserGroupControllerActions, $data);
                if ($this->UserGroupControllerActions->save($UserGroupControllerActions)) {
                    echo '<div class="alert alert-info">Permission has been enabled!</div>';
                }else{
                    echo '<div class="alert alert-warning">Something went wrong!</div>';
                }
            }
        }else if($status='delete'){
            /*DELETE PERMISSIONS*/
            if ($this->request->is('post')) {
                $data = [
                    'user_group_controller_id'=>$this->request->data['ControllerID'],
                    'action_title'=>$this->request->data['ActionTitle'],
                    'action'=>$this->request->data['Action']
                ];
                $UserGroupControllerActions = $this->UserGroupControllerActions->find()
                    ->where([
                        $data
                    ])->first();

                if($this->UserGroupControllerActions->delete($UserGroupControllerActions)){
                    echo '<div class="alert alert-info">Permission has been disabled!</div>';
                }else{
                    echo '<div class="alert alert-warning">Something went wrong! Please try again</div>';
                }
            }
        }
        die();
    }
}
