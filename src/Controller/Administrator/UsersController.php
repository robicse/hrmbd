<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class UsersController extends AppController{

    public function dashboard(){
        /*SILENT IS GOLDEN*/
        $this->loadModel('Users');

        $user['administrator'] = $this->Users->find('all')
            ->contain([
                'UserGroups'
            ])
            ->where([
                'UserGroups.prefix'=>'administrator'
            ])->count();
        $user['supervisor'] = $this->Users->find('all')
            ->contain([
                'UserGroups'
            ])
            ->where([
                'UserGroups.prefix'=>'supervisor'
            ])->count();
        $user['agent'] = $this->Users->find('all')
            ->contain([
                'UserGroups'
            ])
            ->where([
                'UserGroups.prefix'=>'agent'
            ])->count();
        $user['individual'] = $this->Users->find('all')
            ->contain([
                'UserGroups'
            ])
            ->where([
                'UserGroups.prefix'=>'individual'
            ])->count();

        $this->set(compact('user'));
    }

    public function index($userGroups=false){
        $conditions = [];
        /*Search By Phone*/
        if ($this->request->is('post')) {
            $phone = $this->request->data['search'];
            $conditions['Users.phone LIKE']= "%{$phone}%";
        }
        if ($userGroups) {
            $conditions['UserGroups.prefix'] = $userGroups;
        }
        $this->paginate = [
            'contain' => ['UserGroups']
        ];
        $users = $this->paginate($this->Users,[
            'conditions'=>$conditions]
        );

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function view($id = null){
        $user = $this->Users->get($id, [
            'contain' => ['UserGroups','Divisions','DivisionDistricts','DivisionDistrictUpazilas']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    private function UploadIfPhoto($file=null){
        $photo = 'user.png'; #Default photo
        if ($file['size'] && !$file['error']) {
            $FL       = explode('.', $file['name']);
            $extension  = end($FL);
            if (in_array($extension, ['jpg','jpeg','png'])) {
                $photo      = uniqid() . '.'.$extension;
                $FullPath   = $this->UploadPaths['Users'] . $photo;
                move_uploaded_file($file['tmp_name'], $FullPath);
            }
        }
        return $photo;
    }

    public function add(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            /*Prepare Photo Upload*/
            $this->request->data['photo'] = $this->UploadIfPhoto($this->request->data['photo']);
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 1000]);
        $this->set(compact('user', 'userGroups'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null){
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 1000]);
        $this->set(compact('user', 'userGroups'));
        $this->set('_serialize', ['user']);
    }

    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
