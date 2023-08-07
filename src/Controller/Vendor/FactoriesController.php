<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * Factories Controller
 *
 * @property \App\Model\Table\FactoriesTable $Factories
 * @method \App\Model\Entity\Factory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FactoriesController extends VendorAppController
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
        $factories = $this->paginate($this->Factories);

        $this->set(compact('factories'));
    }

    /**
     * View method
     *
     * @param string|null $id Factory id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $factory = $this->Factories->get($id, [
            'contain' => ['VendorTemps', 'LineMasters'],
        ]);

        $this->set(compact('factory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $factory = $this->Factories->newEmptyEntity();
        if ($this->request->is('post')) {
            $factory = $this->Factories->patchEntity($factory, $this->request->getData());
            if ($this->Factories->save($factory)) {
                $this->Flash->success(__('The factory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factory could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->Factories->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('factory', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Factory id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $factory = $this->Factories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $factory = $this->Factories->patchEntity($factory, $this->request->getData());
            if ($this->Factories->save($factory)) {
                $this->Flash->success(__('The factory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factory could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->Factories->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('factory', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Factory id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $factory = $this->Factories->get($id);
        if ($this->Factories->delete($factory)) {
            $this->Flash->success(__('The factory has been deleted.'));
        } else {
            $this->Flash->error(__('The factory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
