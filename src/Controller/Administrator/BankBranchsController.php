<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class BankBranchsController extends AppController{

    public function index()
    {
        $this->paginate = [
            'contain' => ['Banks']
        ];
        $bankBranchs = $this->paginate($this->BankBranchs);

        $this->set(compact('bankBranchs'));
        $this->set('_serialize', ['bankBranchs']);
    }

    public function view($id = null)
    {
        $bankBranch = $this->BankBranchs->get($id, [
            'contain' => ['Banks', 'Users']
        ]);

        $this->set('bankBranch', $bankBranch);
        $this->set('_serialize', ['bankBranch']);
    }

    public function add()
    {
        $bankBranch = $this->BankBranchs->newEntity();
        if ($this->request->is('post')) {
            $bankBranch = $this->BankBranchs->patchEntity($bankBranch, $this->request->data);
            if ($this->BankBranchs->save($bankBranch)) {
                $this->Flash->success(__('The bank branch has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bank branch could not be saved. Please, try again.'));
            }
        }
        $banks = $this->BankBranchs->Banks->find('list', ['limit' => 200]);
        $this->set(compact('bankBranch', 'banks'));
        $this->set('_serialize', ['bankBranch']);
    }

    public function edit($id = null)
    {
        $bankBranch = $this->BankBranchs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bankBranch = $this->BankBranchs->patchEntity($bankBranch, $this->request->data);
            if ($this->BankBranchs->save($bankBranch)) {
                $this->Flash->success(__('The bank branch has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bank branch could not be saved. Please, try again.'));
            }
        }
        $banks = $this->BankBranchs->Banks->find('list', ['limit' => 200]);
        $this->set(compact('bankBranch', 'banks'));
        $this->set('_serialize', ['bankBranch']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bankBranch = $this->BankBranchs->get($id);
        if ($this->BankBranchs->delete($bankBranch)) {
            $this->Flash->success(__('The bank branch has been deleted.'));
        } else {
            $this->Flash->error(__('The bank branch could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
