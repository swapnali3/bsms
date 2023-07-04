<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * Dailymonitor Controller
 *
 * @property \App\Model\Table\DailymonitorTable $Dailymonitor
 * @method \App\Model\Entity\Dailymonitor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DailymonitorController extends VendorAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $dailymonitor = $this->paginate($this->Dailymonitor);

        $this->set(compact('dailymonitor'));
    }

    /**
     * View method
     *
     * @param string|null $id Dailymonitor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dailymonitor = $this->Dailymonitor->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('dailymonitor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dailymonitor = $this->Dailymonitor->newEmptyEntity();
        if ($this->request->is('post')) {
            $dailymonitor = $this->Dailymonitor->patchEntity($dailymonitor, $this->request->getData());
            if ($this->Dailymonitor->save($dailymonitor)) {
                $this->Flash->success(__('The dailymonitor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dailymonitor could not be saved. Please, try again.'));
        }
        $this->set(compact('dailymonitor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dailymonitor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dailymonitor = $this->Dailymonitor->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dailymonitor = $this->Dailymonitor->patchEntity($dailymonitor, $this->request->getData());
            if ($this->Dailymonitor->save($dailymonitor)) {
                $this->Flash->success(__('The dailymonitor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dailymonitor could not be saved. Please, try again.'));
        }
        $this->set(compact('dailymonitor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dailymonitor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dailymonitor = $this->Dailymonitor->get($id);
        if ($this->Dailymonitor->delete($dailymonitor)) {
            $this->Flash->success(__('The dailymonitor has been deleted.'));
        } else {
            $this->Flash->error(__('The dailymonitor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
