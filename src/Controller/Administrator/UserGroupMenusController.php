<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class UserGroupMenusController extends AppController{

    public function index(){
        $this->paginate = [
            'contain' => ['UserGroups']
        ];
        $userGroupMenus = $this->paginate($this->UserGroupMenus);

        $this->set(compact('userGroupMenus'));
        $this->set('_serialize', ['userGroupMenus']);
    }

    public function view($id = null){
        $userGroupMenu = $this->UserGroupMenus->get($id, [
            'contain' => ['UserGroups', 'UserGroupMenuItems']
        ]);

        $this->set('userGroupMenu', $userGroupMenu);
        $this->set('_serialize', ['userGroupMenu']);
    }

    public function add(){
        $userGroupMenu = $this->UserGroupMenus->newEntity();
        if ($this->request->is('post')) {
            $userGroupMenu = $this->UserGroupMenus->patchEntity($userGroupMenu, $this->request->data);
            if ($this->UserGroupMenus->save($userGroupMenu)) {
                $this->Flash->success(__('The user group menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user group menu could not be saved. Please, try again.'));
            }
        }
        /*Load Model On the Fly*/
        $this->loadModel('UserGroupControllers');
        $this->UserGroupControllers->primaryKey('controller');
        $Controllers = $this->UserGroupControllers->find('list');

        $userGroups = $this->UserGroupMenus->UserGroups->find('list', ['limit' => 1000]);
        $this->set(compact('userGroupMenu', 'userGroups','Controllers'));
        $this->set('_serialize', ['userGroupMenu']);
    }

    public function edit($id = null){
        $userGroupMenu = $this->UserGroupMenus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userGroupMenu = $this->UserGroupMenus->patchEntity($userGroupMenu, $this->request->data);
            if ($this->UserGroupMenus->save($userGroupMenu)) {
                $this->Flash->success(__('The user group menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user group menu could not be saved. Please, try again.'));
            }
        }
        /*Load Model On the Fly*/
        $this->loadModel('UserGroupControllers');
        $this->UserGroupControllers->primaryKey('controller');
        $Controllers = $this->UserGroupControllers->find('list');

        $userGroups = $this->UserGroupMenus->UserGroups->find('list', ['limit' => 1000]);
        $this->set(compact('userGroupMenu', 'userGroups','Controllers'));
        $this->set('_serialize', ['userGroupMenu']);
    }

    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $userGroupMenu = $this->UserGroupMenus->get($id);
        if ($this->UserGroupMenus->delete($userGroupMenu)) {
            $this->Flash->success(__('The user group menu has been deleted.'));
        } else {
            $this->Flash->error(__('The user group menu could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function ajaxGetActions(){
        $this->viewBuilder()->layout('ajax');
        $Actions = [];
        if ($this->request->is('post')) {
            $this->loadModel('UserGroupControllers');
            $Actions = $this->UserGroupControllers->find()
                ->where([
                    'controller'=>$this->request->data['Controller']
                ])
                ->contain(['UserGroupControllerActions'])
                ->first();
        }
        $this->set(compact('Actions'));
    }
}
