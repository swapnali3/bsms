<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * VendorTurnovers Controller
 *
 * @property \App\Model\Table\VendorTurnoversTable $VendorTurnovers
 * @method \App\Model\Entity\VendorTurnover[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorTurnoversController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VendorTemps'],
        ];
        $vendorTurnovers = $this->paginate($this->VendorTurnovers);

        $this->set(compact('vendorTurnovers'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Turnover id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorTurnover = $this->VendorTurnovers->get($id, [
            'contain' => ['VendorTemps'],
        ]);

        $this->set(compact('vendorTurnover'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorTurnover = $this->VendorTurnovers->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorTurnover = $this->VendorTurnovers->patchEntity($vendorTurnover, $this->request->getData());
            if ($this->VendorTurnovers->save($vendorTurnover)) {
                $this->Flash->success(__('The vendor turnover has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor turnover could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorTurnovers->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorTurnover', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Turnover id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorTurnover = $this->VendorTurnovers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorTurnover = $this->VendorTurnovers->patchEntity($vendorTurnover, $this->request->getData());
            if ($this->VendorTurnovers->save($vendorTurnover)) {
                $this->Flash->success(__('The vendor turnover has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor turnover could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorTurnovers->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorTurnover', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Turnover id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorTurnover = $this->VendorTurnovers->get($id);
        if ($this->VendorTurnovers->delete($vendorTurnover)) {
            $this->Flash->success(__('The vendor turnover has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor turnover could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
