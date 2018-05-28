<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class HolidaysController extends AppController{

    public function index()
    {
        $holidays = $this->paginate($this->Holidays);

        $this->set(compact('holidays'));
        $this->set('_serialize', ['holidays']);
    }

    public function view($id = null)
    {
        $holiday = $this->Holidays->get($id, [
            'contain' => []
        ]);

        $this->set('holiday', $holiday);
        $this->set('_serialize', ['holiday']);
    }

    public function add()
    {
        $holiday = $this->Holidays->newEntity();
        if ($this->request->is('post')) {
            $holiday = $this->Holidays->patchEntity($holiday, $this->request->data);
            if ($this->Holidays->save($holiday)) {
                $this->Flash->success(__('The holiday has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The holiday could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('holiday'));
        $this->set('_serialize', ['holiday']);
    }

    public function edit($id = null)
    {
        $holiday = $this->Holidays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $holiday = $this->Holidays->patchEntity($holiday, $this->request->data);
            if ($this->Holidays->save($holiday)) {
                $this->Flash->success(__('The holiday has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The holiday could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('holiday'));
        $this->set('_serialize', ['holiday']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $holiday = $this->Holidays->get($id);
        if ($this->Holidays->delete($holiday)) {
            $this->Flash->success(__('The holiday has been deleted.'));
        } else {
            $this->Flash->error(__('The holiday could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
