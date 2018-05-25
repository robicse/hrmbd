<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\ViewBuilder;

class UsersController extends AppController{
    public function login(){
        if ($this->Auth->user()) {
            /*Redirect to Prefix*/
            $AuthUser = $this->Auth->user();
            $prefix = ($AuthUser['user_group']['prefix'])? $AuthUser['user_group']['prefix'] : false;
            return $this->redirect([
                    'prefix'=>$prefix,
                    'controller'=>'Users',
                    'action'=>'dashboard'
                ]
            );
        }
        $this->viewBuilder()->layout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $UserGroupPermissions           = $this->GetUserGroupPermissions($user['user_group']['id']);
                $user['UserGroupPermissions']   = $UserGroupPermissions;
                $this->Auth->setUser($user);
                /*Redirect to Prefix*/
                $prefix = ($user['user_group']['prefix'])? $user['user_group']['prefix'] : false;
                return $this->redirect(
                    [
                        'prefix'=>$prefix,
                        'controller'=>'Users',
                        'action'=>'dashboard'
                    ]
                );
            }
            $this->Flash->error(__('Invalid Phone/Email or password, try again'));
        }
    }

    public function logout(){
        $this->autoRender = false;
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    private function FormatPermissionArray($Permissions=[]){
        $UGP = [];
        foreach ($Permissions as $key => $value) {
            $UGP[$value['controller']][$value['action']] = 1;
        }
        return $UGP;
    }

    private function GetUserGroupPermissions($UserGroupID=0){
        $this->loadModel('UserGroupPermissions');
        $UserGroupPermissions = $this->UserGroupPermissions->find()
            ->hydrate(false)
            ->select([
                'controller'=>'UserGroupControllers.controller',
                'action'    =>'UserGroupControllerActions.action',
            ])
            ->contain([
                    'UserGroupControllers','UserGroupControllerActions'
                ])
            ->where([
                'UserGroupPermissions.user_group_id'=>$UserGroupID
            ])
            ->toArray();
        return $this->FormatPermissionArray($UserGroupPermissions);
    }

    public function forgetPassword(){
        if ($this->Auth->user()) {
            /*Redirect to Prefix*/
            $AuthUser = $this->Auth->user();
            $prefix = ($AuthUser['user_group']['prefix'])? $AuthUser['user_group']['prefix'] : false;
            return $this->redirect([
                    'prefix'=>$prefix,
                    'controller'=>'Users',
                    'action'=>'dashboard'
                ]
            );
        }
        $this->viewBuilder()->layout('login');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $this->Flash->error(__('This feature is under maintanance! Please use App to recover your password.'));
            /*$user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Successfully Registered! Now you can login'));

                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('Registration Failed! Please, try again.'));
            }*/
        }
        /*Allowed Register User Type*/
        $userGroups = $this->Users->UserGroups->findByPrefix('administrator')->first();
        $this->set(compact('user', 'userGroups'));
        $this->set('_serialize', ['user']);
    }
}
