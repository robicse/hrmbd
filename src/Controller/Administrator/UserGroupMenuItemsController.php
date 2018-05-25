<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

/**
 * UserGroupMenuItems Controller
 *
 * @property \App\Model\Table\UserGroupMenuItemsTable $UserGroupMenuItems
 */
class UserGroupMenuItemsController extends AppController{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UserGroupMenus']
        ];
        $userGroupMenuItems = $this->paginate($this->UserGroupMenuItems);

        $this->set(compact('userGroupMenuItems'));
        $this->set('_serialize', ['userGroupMenuItems']);
    }

    /**
     * View method
     *
     * @param string|null $id User Group Menu Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userGroupMenuItem = $this->UserGroupMenuItems->get($id, [
            'contain' => ['UserGroupMenus']
        ]);

        $this->set('userGroupMenuItem', $userGroupMenuItem);
        $this->set('_serialize', ['userGroupMenuItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userGroupMenuItem = $this->UserGroupMenuItems->newEntity();
        if ($this->request->is('post')) {
            $userGroupMenuItem = $this->UserGroupMenuItems->patchEntity($userGroupMenuItem, $this->request->data);
            if ($this->UserGroupMenuItems->save($userGroupMenuItem)) {
                $this->Flash->success(__('The user group menu item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user group menu item could not be saved. Please, try again.'));
            }
        }
        $userGroupMenus = $this->UserGroupMenuItems->UserGroupMenus->find('list', ['limit' => 1000]);
        $this->set(compact('userGroupMenuItem', 'userGroupMenus'));
        $this->set('_serialize', ['userGroupMenuItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Group Menu Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userGroupMenuItem = $this->UserGroupMenuItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userGroupMenuItem = $this->UserGroupMenuItems->patchEntity($userGroupMenuItem, $this->request->data);
            if ($this->UserGroupMenuItems->save($userGroupMenuItem)) {
                $this->Flash->success(__('The user group menu item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user group menu item could not be saved. Please, try again.'));
            }
        }
        $userGroupMenus = $this->UserGroupMenuItems->UserGroupMenus->find('list', ['limit' => 1000]);
        $this->set(compact('userGroupMenuItem', 'userGroupMenus'));
        $this->set('_serialize', ['userGroupMenuItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Group Menu Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userGroupMenuItem = $this->UserGroupMenuItems->get($id);
        if ($this->UserGroupMenuItems->delete($userGroupMenuItem)) {
            $this->Flash->success(__('The user group menu item has been deleted.'));
        } else {
            $this->Flash->error(__('The user group menu item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
