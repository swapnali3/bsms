<?php
declare(strict_types=1);

namespace App\Controller\Vendor;

/**
 * VendorQuestionnaires Controller
 *
 * @property \App\Model\Table\VendorQuestionnairesTable $VendorQuestionnaires
 * @method \App\Model\Entity\VendorQuestionnaire[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorQuestionnairesController extends VendorAppController
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
        $vendorQuestionnaires = $this->paginate($this->VendorQuestionnaires);

        $this->set(compact('vendorQuestionnaires'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Questionnaire id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorQuestionnaire = $this->VendorQuestionnaires->get($id, [
            'contain' => ['VendorTemps'],
        ]);

        $this->set(compact('vendorQuestionnaire'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorQuestionnaire = $this->VendorQuestionnaires->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendorQuestionnaire = $this->VendorQuestionnaires->patchEntity($vendorQuestionnaire, $this->request->getData());
            if ($this->VendorQuestionnaires->save($vendorQuestionnaire)) {
                $this->Flash->success(__('The vendor questionnaire has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor questionnaire could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorQuestionnaires->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorQuestionnaire', 'vendorTemps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Questionnaire id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorQuestionnaire = $this->VendorQuestionnaires->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorQuestionnaire = $this->VendorQuestionnaires->patchEntity($vendorQuestionnaire, $this->request->getData());
            if ($this->VendorQuestionnaires->save($vendorQuestionnaire)) {
                $this->Flash->success(__('The vendor questionnaire has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor questionnaire could not be saved. Please, try again.'));
        }
        $vendorTemps = $this->VendorQuestionnaires->VendorTemps->find('list', ['limit' => 200])->all();
        $this->set(compact('vendorQuestionnaire', 'vendorTemps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Questionnaire id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorQuestionnaire = $this->VendorQuestionnaires->get($id);
        if ($this->VendorQuestionnaires->delete($vendorQuestionnaire)) {
            $this->Flash->success(__('The vendor questionnaire has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor questionnaire could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
