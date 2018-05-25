<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

/**
 * UserGroupControllers Controller
 *
 * @property \App\Model\Table\UserGroupControllersTable $UserGroupControllers
 */
class UserGroupControllersController extends AppController{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $userGroupControllers = $this->paginate($this->UserGroupControllers);

        $this->set(compact('userGroupControllers'));
        $this->set('_serialize', ['userGroupControllers']);
    }

    /**
     * View method
     *
     * @param string|null $id User Group Controller id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userGroupController = $this->UserGroupControllers->get($id, [
            'contain' => ['UserGroupControllerActions', 'UserGroupPermissions']
        ]);

        $this->set('userGroupController', $userGroupController);
        $this->set('_serialize', ['userGroupController']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userGroupController = $this->UserGroupControllers->newEntity();
        if ($this->request->is('post')) {
            $userGroupController = $this->UserGroupControllers->patchEntity($userGroupController, $this->request->data);
            if ($this->UserGroupControllers->save($userGroupController)) {
                $this->Flash->success(__('The user group controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user group controller could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('userGroupController'));
        $this->set('_serialize', ['userGroupController']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Group Controller id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userGroupController = $this->UserGroupControllers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userGroupController = $this->UserGroupControllers->patchEntity($userGroupController, $this->request->data);
            if ($this->UserGroupControllers->save($userGroupController)) {
                $this->Flash->success(__('The user group controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user group controller could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('userGroupController'));
        $this->set('_serialize', ['userGroupController']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Group Controller id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userGroupController = $this->UserGroupControllers->get($id);
        if ($this->UserGroupControllers->delete($userGroupController)) {
            $this->Flash->success(__('The user group controller has been deleted.'));
        } else {
            $this->Flash->error(__('The user group controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
