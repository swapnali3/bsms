<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * Productionline Controller
 *
 * @property \App\Model\Table\ProductionlineTable $Productionline
 * @method \App\Model\Entity\Productionline[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductionlineController extends VendorAppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $productionline = $this->paginate($this->Productionline);

        $this->set(compact('productionline'));
    }

    /**
     * View method
     *
     * @param string|null $id Productionline id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productionline = $this->Productionline->get($id, [
            'contain' => ['Dailymonitor'],
        ]);

        $this->set(compact('productionline'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productionline = $this->Productionline->newEmptyEntity();
        if ($this->request->is('post')) {
            $productionline = $this->Productionline->patchEntity($productionline, $this->request->getData());
            if ($this->Productionline->save($productionline)) {
                $this->Flash->success(__('The productionline has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The productionline could not be saved. Please, try again.'));
        }
        $this->set(compact('productionline'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Productionline id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productionline = $this->Productionline->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productionline = $this->Productionline->patchEntity($productionline, $this->request->getData());
            if ($this->Productionline->save($productionline)) {
                $this->Flash->success(__('The productionline has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The productionline could not be saved. Please, try again.'));
        }
        $this->set(compact('productionline'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Productionline id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productionline = $this->Productionline->get($id);
        if ($this->Productionline->delete($productionline)) {
            $this->Flash->success(__('The productionline has been deleted.'));
        } else {
            $this->Flash->error(__('The productionline could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
