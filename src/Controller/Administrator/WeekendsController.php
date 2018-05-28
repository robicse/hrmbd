<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class WeekendsController extends AppController{

    public function index()
    {
        $this->paginate = [
            'contain' => ['Departments', 'DepartmentSections']
        ];
        $weekends = $this->paginate($this->Weekends);

        $this->set(compact('weekends'));
        $this->set('_serialize', ['weekends']);
    }

    public function view($id = null)
    {
        $weekend = $this->Weekends->get($id, [
            'contain' => ['Departments', 'DepartmentSections']
        ]);

        $this->set('weekend', $weekend);
        $this->set('_serialize', ['weekend']);
    }

    public function add()
    {
        $weekend = $this->Weekends->newEntity();
        if ($this->request->is('post')) {
            $weekend = $this->Weekends->patchEntity($weekend, $this->request->data);
            if ($this->Weekends->save($weekend)) {
                $this->Flash->success(__('The weekend has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The weekend could not be saved. Please, try again.'));
            }
        }
        $departments = $this->Weekends->Departments->find('list', ['limit' => 200]);
        $departmentSections = $this->Weekends->DepartmentSections->find('list', ['limit' => 200]);
        $this->set(compact('weekend', 'departments', 'departmentSections'));
        $this->set('_serialize', ['weekend']);
    }

    public function edit($id = null)
    {
        $weekend = $this->Weekends->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $weekend = $this->Weekends->patchEntity($weekend, $this->request->data);
            if ($this->Weekends->save($weekend)) {
                $this->Flash->success(__('The weekend has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The weekend could not be saved. Please, try again.'));
            }
        }
        $departments = $this->Weekends->Departments->find('list', ['limit' => 200]);
        $departmentSections = $this->Weekends->DepartmentSections->find('list', ['limit' => 200]);
        $this->set(compact('weekend', 'departments', 'departmentSections'));
        $this->set('_serialize', ['weekend']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $weekend = $this->Weekends->get($id);
        if ($this->Weekends->delete($weekend)) {
            $this->Flash->success(__('The weekend has been deleted.'));
        } else {
            $this->Flash->error(__('The weekend could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
