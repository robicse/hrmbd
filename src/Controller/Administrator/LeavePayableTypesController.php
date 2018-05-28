<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class LeavePayableTypesController extends AppController{

    public function index()
    {
        $leavePayableTypes = $this->paginate($this->LeavePayableTypes);

        $this->set(compact('leavePayableTypes'));
        $this->set('_serialize', ['leavePayableTypes']);
    }

    public function view($id = null)
    {
        $leavePayableType = $this->LeavePayableTypes->get($id, [
            'contain' => ['UserLeaves']
        ]);

        $this->set('leavePayableType', $leavePayableType);
        $this->set('_serialize', ['leavePayableType']);
    }

    public function add()
    {
        $leavePayableType = $this->LeavePayableTypes->newEntity();
        if ($this->request->is('post')) {
            $leavePayableType = $this->LeavePayableTypes->patchEntity($leavePayableType, $this->request->data);
            if ($this->LeavePayableTypes->save($leavePayableType)) {
                $this->Flash->success(__('The leave payable type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The leave payable type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('leavePayableType'));
        $this->set('_serialize', ['leavePayableType']);
    }

    public function edit($id = null)
    {
        $leavePayableType = $this->LeavePayableTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leavePayableType = $this->LeavePayableTypes->patchEntity($leavePayableType, $this->request->data);
            if ($this->LeavePayableTypes->save($leavePayableType)) {
                $this->Flash->success(__('The leave payable type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The leave payable type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('leavePayableType'));
        $this->set('_serialize', ['leavePayableType']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leavePayableType = $this->LeavePayableTypes->get($id);
        if ($this->LeavePayableTypes->delete($leavePayableType)) {
            $this->Flash->success(__('The leave payable type has been deleted.'));
        } else {
            $this->Flash->error(__('The leave payable type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
