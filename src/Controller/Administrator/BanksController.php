<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class BanksController extends AppController{

    public function index()
    {
        $banks = $this->paginate($this->Banks);

        $this->set(compact('banks'));
        $this->set('_serialize', ['banks']);
    }

    public function view($id = null)
    {
        $bank = $this->Banks->get($id, [
            'contain' => ['BankBranchs', 'Users']
        ]);

        $this->set('bank', $bank);
        $this->set('_serialize', ['bank']);
    }

    public function add()
    {
        $bank = $this->Banks->newEntity();
        if ($this->request->is('post')) {
            $bank = $this->Banks->patchEntity($bank, $this->request->data);
            if ($this->Banks->save($bank)) {
                $this->Flash->success(__('The bank has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bank could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('bank'));
        $this->set('_serialize', ['bank']);
    }

    public function edit($id = null)
    {
        $bank = $this->Banks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bank = $this->Banks->patchEntity($bank, $this->request->data);
            if ($this->Banks->save($bank)) {
                $this->Flash->success(__('The bank has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bank could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('bank'));
        $this->set('_serialize', ['bank']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bank = $this->Banks->get($id);
        if ($this->Banks->delete($bank)) {
            $this->Flash->success(__('The bank has been deleted.'));
        } else {
            $this->Flash->error(__('The bank could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
