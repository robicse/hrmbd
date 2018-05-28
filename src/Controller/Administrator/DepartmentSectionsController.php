<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class DepartmentSectionsController extends AppController{

    public function index()
    {
        $this->paginate = [
            'contain' => ['Departments']
        ];
        $departmentSections = $this->paginate($this->DepartmentSections);

        $this->set(compact('departmentSections'));
        $this->set('_serialize', ['departmentSections']);
    }

    public function view($id = null)
    {
        $departmentSection = $this->DepartmentSections->get($id, [
            'contain' => ['Departments', 'Weekends']
        ]);

        $this->set('departmentSection', $departmentSection);
        $this->set('_serialize', ['departmentSection']);
    }

    public function add()
    {
        $departmentSection = $this->DepartmentSections->newEntity();
        if ($this->request->is('post')) {
            $departmentSection = $this->DepartmentSections->patchEntity($departmentSection, $this->request->data);
            if ($this->DepartmentSections->save($departmentSection)) {
                $this->Flash->success(__('The department section has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The department section could not be saved. Please, try again.'));
            }
        }
        $departments = $this->DepartmentSections->Departments->find('list', ['limit' => 200]);
        $this->set(compact('departmentSection', 'departments'));
        $this->set('_serialize', ['departmentSection']);
    }

    public function edit($id = null)
    {
        $departmentSection = $this->DepartmentSections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departmentSection = $this->DepartmentSections->patchEntity($departmentSection, $this->request->data);
            if ($this->DepartmentSections->save($departmentSection)) {
                $this->Flash->success(__('The department section has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The department section could not be saved. Please, try again.'));
            }
        }
        $departments = $this->DepartmentSections->Departments->find('list', ['limit' => 200]);
        $this->set(compact('departmentSection', 'departments'));
        $this->set('_serialize', ['departmentSection']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $departmentSection = $this->DepartmentSections->get($id);
        if ($this->DepartmentSections->delete($departmentSection)) {
            $this->Flash->success(__('The department section has been deleted.'));
        } else {
            $this->Flash->error(__('The department section could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
