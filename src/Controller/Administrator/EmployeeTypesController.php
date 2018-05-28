<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class EmployeeTypesController extends AppController{

    public function index()
    {
        $employeeTypes = $this->paginate($this->EmployeeTypes);

        $this->set(compact('employeeTypes'));
        $this->set('_serialize', ['employeeTypes']);
    }

    public function view($id = null)
    {
        $employeeType = $this->EmployeeTypes->get($id, [
            'contain' => ['EmployeTypeDesignations']
        ]);

        $this->set('employeeType', $employeeType);
        $this->set('_serialize', ['employeeType']);
    }

    public function add()
    {
        $employeeType = $this->EmployeeTypes->newEntity();
        if ($this->request->is('post')) {
            $employeeType = $this->EmployeeTypes->patchEntity($employeeType, $this->request->data);
            if ($this->EmployeeTypes->save($employeeType)) {
                $this->Flash->success(__('The employee type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('employeeType'));
        $this->set('_serialize', ['employeeType']);
    }

    public function edit($id = null)
    {
        $employeeType = $this->EmployeeTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeType = $this->EmployeeTypes->patchEntity($employeeType, $this->request->data);
            if ($this->EmployeeTypes->save($employeeType)) {
                $this->Flash->success(__('The employee type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('employeeType'));
        $this->set('_serialize', ['employeeType']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeType = $this->EmployeeTypes->get($id);
        if ($this->EmployeeTypes->delete($employeeType)) {
            $this->Flash->success(__('The employee type has been deleted.'));
        } else {
            $this->Flash->error(__('The employee type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
