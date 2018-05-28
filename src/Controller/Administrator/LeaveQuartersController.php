<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class LeaveQuartersController extends AppController{

    public function index()
    {
        $leaveQuarters = $this->paginate($this->LeaveQuarters);

        $this->set(compact('leaveQuarters'));
        $this->set('_serialize', ['leaveQuarters']);
    }

    public function view($id = null)
    {
        $leaveQuarter = $this->LeaveQuarters->get($id, [
            'contain' => ['UserLeaves']
        ]);

        $this->set('leaveQuarter', $leaveQuarter);
        $this->set('_serialize', ['leaveQuarter']);
    }

    public function add()
    {
        $leaveQuarter = $this->LeaveQuarters->newEntity();
        if ($this->request->is('post')) {
            $leaveQuarter = $this->LeaveQuarters->patchEntity($leaveQuarter, $this->request->data);
            if ($this->LeaveQuarters->save($leaveQuarter)) {
                $this->Flash->success(__('The leave quarter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The leave quarter could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('leaveQuarter'));
        $this->set('_serialize', ['leaveQuarter']);
    }

    public function edit($id = null)
    {
        $leaveQuarter = $this->LeaveQuarters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leaveQuarter = $this->LeaveQuarters->patchEntity($leaveQuarter, $this->request->data);
            if ($this->LeaveQuarters->save($leaveQuarter)) {
                $this->Flash->success(__('The leave quarter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The leave quarter could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('leaveQuarter'));
        $this->set('_serialize', ['leaveQuarter']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leaveQuarter = $this->LeaveQuarters->get($id);
        if ($this->LeaveQuarters->delete($leaveQuarter)) {
            $this->Flash->success(__('The leave quarter has been deleted.'));
        } else {
            $this->Flash->error(__('The leave quarter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
