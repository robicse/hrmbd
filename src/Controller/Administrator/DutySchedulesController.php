<?php
namespace App\Controller\Administrator;

use App\Controller\AppController;

class DutySchedulesController extends AppController{

    public function index()
    {
        $dutySchedules = $this->paginate($this->DutySchedules);

        $this->set(compact('dutySchedules'));
        $this->set('_serialize', ['dutySchedules']);
    }

    public function view($id = null)
    {
        $dutySchedule = $this->DutySchedules->get($id, [
            'contain' => []
        ]);

        $this->set('dutySchedule', $dutySchedule);
        $this->set('_serialize', ['dutySchedule']);
    }

    public function add()
    {
        $dutySchedule = $this->DutySchedules->newEntity();
        if ($this->request->is('post')) {
            $dutySchedule = $this->DutySchedules->patchEntity($dutySchedule, $this->request->data);
            if ($this->DutySchedules->save($dutySchedule)) {
                $this->Flash->success(__('The duty schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The duty schedule could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('dutySchedule'));
        $this->set('_serialize', ['dutySchedule']);
    }

    public function edit($id = null)
    {
        $dutySchedule = $this->DutySchedules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dutySchedule = $this->DutySchedules->patchEntity($dutySchedule, $this->request->data);
            if ($this->DutySchedules->save($dutySchedule)) {
                $this->Flash->success(__('The duty schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The duty schedule could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('dutySchedule'));
        $this->set('_serialize', ['dutySchedule']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dutySchedule = $this->DutySchedules->get($id);
        if ($this->DutySchedules->delete($dutySchedule)) {
            $this->Flash->success(__('The duty schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The duty schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
