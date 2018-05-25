<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class UserGroupPermissionsController extends AppController{


    public function index(){
        $this->paginate = [
            'contain' => ['UserGroups', 'UserGroupControllers', 'UserGroupControllerActions']
        ];
        $userGroupPermissions = $this->paginate($this->UserGroupPermissions);

        $this->set(compact('userGroupPermissions'));
        $this->set('_serialize', ['userGroupPermissions']);
    }


    public function view($id = null){
        $userGroupPermission = $this->UserGroupPermissions->get($id, [
            'contain' => ['UserGroups', 'UserGroupControllers', 'UserGroupControllerActions']
        ]);

        $this->set('userGroupPermission', $userGroupPermission);
        $this->set('_serialize', ['userGroupPermission']);
    }

    public function add(){
        $userGroupPermission = $this->UserGroupPermissions->newEntity();
        if ($this->request->is('post')) {
            $userGroupPermission = $this->UserGroupPermissions->patchEntity($userGroupPermission, $this->request->data);
            if ($this->UserGroupPermissions->save($userGroupPermission)) {
                $this->Flash->success(__('The user group permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user group permission could not be saved. Please, try again.'));
            }
        }
        $userGroups = $this->UserGroupPermissions->UserGroups->find('list', ['limit' => 1000]);
        $userGroupControllers = $this->UserGroupPermissions->UserGroupControllers->find('list', ['limit' => 1000]);
        $userGroupControllerActions = $this->UserGroupPermissions->UserGroupControllerActions->find('list', ['limit' => 1000]);
        $this->set(compact('userGroupPermission', 'userGroups', 'userGroupControllers', 'userGroupControllerActions'));
        $this->set('_serialize', ['userGroupPermission']);
    }

    public function edit($id = null){
        $userGroupPermission = $this->UserGroupPermissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userGroupPermission = $this->UserGroupPermissions->patchEntity($userGroupPermission, $this->request->data);
            if ($this->UserGroupPermissions->save($userGroupPermission)) {
                $this->Flash->success(__('The user group permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user group permission could not be saved. Please, try again.'));
            }
        }
        $userGroups = $this->UserGroupPermissions->UserGroups->find('list', ['limit' => 1000]);
        $userGroupControllers = $this->UserGroupPermissions->UserGroupControllers->find('list', ['limit' => 1000]);
        $userGroupControllerActions = $this->UserGroupPermissions->UserGroupControllerActions->find('list', ['limit' => 1000]);
        $this->set(compact('userGroupPermission', 'userGroups', 'userGroupControllers', 'userGroupControllerActions'));
        $this->set('_serialize', ['userGroupPermission']);
    }

    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $userGroupPermission = $this->UserGroupPermissions->get($id);
        if ($this->UserGroupPermissions->delete($userGroupPermission)) {
            $this->Flash->success(__('The user group permission has been deleted.'));
        } else {
            $this->Flash->error(__('The user group permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function GetAvailableActions(){
        $new = '';
        return $new;
    }

    public function ajaxGetActions($ControllerID=0,$UserGroupID=0){
        $this->viewBuilder()->layout('ajax');
        $Actions = $this->UserGroupPermissions->UserGroupControllerActions->find('list')
            ->where(['user_group_controller_id'=>$ControllerID])
            ->toArray();

        $AvailableActions = $this->GetAvailableActions();

        $PermmitedActions = $this->UserGroupPermissions->find()
            ->hydrate(false)
            ->select(['user_group_controller_action_id'])
            ->where([
                    'user_group_id'=>$UserGroupID,
                    'user_group_controller_id'=>$ControllerID
                ])
            ->toArray();
        $AllowMethods = [];
        if (count($PermmitedActions)) {
            foreach ($PermmitedActions as $key => $value) {
                $AllowMethods[] = $value['user_group_controller_action_id'];
            }
        }
        $this->set(compact('Actions','AllowMethods'));
    }

    public function ajaxAddOrDelete($status=null){
        /*ADD PERMISSIONS*/
        if ($status=='add') {
            $UserGroupPermissions = $this->UserGroupPermissions->newEntity();
            if ($this->request->is('post')) {
                $data = [
                    'user_group_id'=>$this->request->data['UserGroupID'],
                    'user_group_controller_id'=>$this->request->data['ControllerID'],
                    'user_group_controller_action_id'=>$this->request->data['ActionID']
                ];
                $UserGroupPermissions = $this->UserGroupPermissions->patchEntity($UserGroupPermissions, $data);
                if ($this->UserGroupPermissions->save($UserGroupPermissions)) {
                    echo '<div class="alert alert-info">Permission has been enabled!</div>';
                }else{
                    echo '<div class="alert alert-warning">Something went wrong!</div>';
                }
            }
        }else if($status='delete'){
            /*DELETE PERMISSIONS*/
            if ($this->request->is('post')) {
                $data = [
                    'user_group_id'=>$this->request->data['UserGroupID'],
                    'user_group_controller_id'=>$this->request->data['ControllerID'],
                    'user_group_controller_action_id'=>$this->request->data['ActionID']
                ];
                $UserGroupPermissions = $this->UserGroupPermissions->find()
                    ->where([
                        $data
                    ])->first();

                if($this->UserGroupPermissions->delete($UserGroupPermissions)){
                    echo '<div class="alert alert-info">Permission has been disabled!</div>';
                }else{
                    echo '<div class="alert alert-warning">Something went wrong! Please try again</div>';
                }
            }
        }
        die();
    }
}
