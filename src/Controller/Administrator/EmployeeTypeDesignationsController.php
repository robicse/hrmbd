<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class EmployeeTypeDesignationsController extends AppController{

    public function index()
    {
        $this->paginate = [
            'contain' => ['EmployeeTypes']
        ];
        $employeeTypeDesignations = $this->paginate($this->EmployeeTypeDesignations);

        $this->set(compact('employeeTypeDesignations'));
        $this->set('_serialize', ['employeeTypeDesignations']);
    }

    public function view($id = null)
    {
        $employeeTypeDesignation = $this->EmployeeTypeDesignations->get($id, [
            'contain' => ['EmployeeTypes']
        ]);

        $this->set('employeeTypeDesignation', $employeeTypeDesignation);
        $this->set('_serialize', ['employeeTypeDesignation']);
    }

    public function add()
    {
        $employeeTypeDesignation = $this->EmployeeTypeDesignations->newEntity();
        if ($this->request->is('post')) {
            $employeeTypeDesignation = $this->EmployeeTypeDesignations->patchEntity($employeeTypeDesignation, $this->request->data);
            if ($this->EmployeeTypeDesignations->save($employeeTypeDesignation)) {
                $this->Flash->success(__('The employee type designation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee type designation could not be saved. Please, try again.'));
            }
        }
        $employeeTypes = $this->EmployeeTypeDesignations->EmployeeTypes->find('list', ['limit' => 200]);
        $this->set(compact('employeeTypeDesignation', 'employeeTypes'));
        $this->set('_serialize', ['employeeTypeDesignation']);
    }

    public function edit($id = null)
    {
        $employeeTypeDesignation = $this->EmployeeTypeDesignations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeTypeDesignation = $this->EmployeeTypeDesignations->patchEntity($employeeTypeDesignation, $this->request->data);
            if ($this->EmployeeTypeDesignations->save($employeeTypeDesignation)) {
                $this->Flash->success(__('The employee type designation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee type designation could not be saved. Please, try again.'));
            }
        }
        $employeeTypes = $this->EmployeeTypeDesignations->EmployeeTypes->find('list', ['limit' => 200]);
        $this->set(compact('employeeTypeDesignation', 'employeeTypes'));
        $this->set('_serialize', ['employeeTypeDesignation']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeTypeDesignation = $this->EmployeeTypeDesignations->get($id);
        if ($this->EmployeeTypeDesignations->delete($employeeTypeDesignation)) {
            $this->Flash->success(__('The employee type designation has been deleted.'));
        } else {
            $this->Flash->error(__('The employee type designation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
