<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class LeaveCategorysController extends AppController{

    public function index()
    {
        $leaveCategorys = $this->paginate($this->LeaveCategorys);

        $this->set(compact('leaveCategorys'));
        $this->set('_serialize', ['leaveCategorys']);
    }

    public function view($id = null)
    {
        $leaveCategory = $this->LeaveCategorys->get($id, [
            'contain' => ['UserLeaves']
        ]);

        $this->set('leaveCategory', $leaveCategory);
        $this->set('_serialize', ['leaveCategory']);
    }

    public function add()
    {
        $leaveCategory = $this->LeaveCategorys->newEntity();
        if ($this->request->is('post')) {
            $leaveCategory = $this->LeaveCategorys->patchEntity($leaveCategory, $this->request->data);
            if ($this->LeaveCategorys->save($leaveCategory)) {
                $this->Flash->success(__('The leave category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The leave category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('leaveCategory'));
        $this->set('_serialize', ['leaveCategory']);
    }

    public function edit($id = null)
    {
        $leaveCategory = $this->LeaveCategorys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leaveCategory = $this->LeaveCategorys->patchEntity($leaveCategory, $this->request->data);
            if ($this->LeaveCategorys->save($leaveCategory)) {
                $this->Flash->success(__('The leave category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The leave category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('leaveCategory'));
        $this->set('_serialize', ['leaveCategory']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leaveCategory = $this->LeaveCategorys->get($id);
        if ($this->LeaveCategorys->delete($leaveCategory)) {
            $this->Flash->success(__('The leave category has been deleted.'));
        } else {
            $this->Flash->error(__('The leave category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
