<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class LeavePackagesController extends AppController{

    public function index()
    {
        $leavePackages = $this->paginate($this->LeavePackages);

        $this->set(compact('leavePackages'));
        $this->set('_serialize', ['leavePackages']);
    }

    public function view($id = null)
    {
        $leavePackage = $this->LeavePackages->get($id, [
            'contain' => []
        ]);

        $this->set('leavePackage', $leavePackage);
        $this->set('_serialize', ['leavePackage']);
    }

    public function add()
    {
        $leavePackage = $this->LeavePackages->newEntity();
        if ($this->request->is('post')) {
            $leavePackage = $this->LeavePackages->patchEntity($leavePackage, $this->request->data);
            if ($this->LeavePackages->save($leavePackage)) {
                $this->Flash->success(__('The leave package has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The leave package could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('leavePackage'));
        $this->set('_serialize', ['leavePackage']);
    }

    public function edit($id = null)
    {
        $leavePackage = $this->LeavePackages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leavePackage = $this->LeavePackages->patchEntity($leavePackage, $this->request->data);
            if ($this->LeavePackages->save($leavePackage)) {
                $this->Flash->success(__('The leave package has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The leave package could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('leavePackage'));
        $this->set('_serialize', ['leavePackage']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leavePackage = $this->LeavePackages->get($id);
        if ($this->LeavePackages->delete($leavePackage)) {
            $this->Flash->success(__('The leave package has been deleted.'));
        } else {
            $this->Flash->error(__('The leave package could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
