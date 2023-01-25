<?php
declare(strict_types=1);

namespace App\Controller\Buyer;

/**
 * PoHeaders Controller
 *
 * @property \App\Model\Table\PoHeadersTable $PoHeaders
 * @method \App\Model\Entity\PoHeader[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseOrdersController extends BuyerAppController
{
    var $uses = array('PoHeaders');
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('PoHeaders');
        $poHeaders = $this->paginate($this->PoHeaders);

        $this->set(compact('poHeaders'));
    }

    /**
     * View method
     *
     * @param string|null $id Po Header id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('PoHeaders');
        $poHeader = $this->PoHeaders->get($id, [
            'contain' => ['PoFooters'=>'DeliveryDetails'],
        ]);

        $this->set(compact('poHeader'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $poHeader = $this->PoHeaders->newEmptyEntity();
        if ($this->request->is('post')) {
            $poHeader = $this->PoHeaders->patchEntity($poHeader, $this->request->getData());
            if ($this->PoHeaders->save($poHeader)) {
                $this->Flash->success(__('The po header has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The po header could not be saved. Please, try again.'));
        }
        $this->set(compact('poHeader'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Po Header id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $poHeader = $this->PoHeaders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poHeader = $this->PoHeaders->patchEntity($poHeader, $this->request->getData());
            if ($this->PoHeaders->save($poHeader)) {
                $this->Flash->success(__('The po header has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The po header could not be saved. Please, try again.'));
        }
        $this->set(compact('poHeader'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Po Header id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $poHeader = $this->PoHeaders->get($id);
        if ($this->PoHeaders->delete($poHeader)) {
            $this->Flash->success(__('The po header has been deleted.'));
        } else {
            $this->Flash->error(__('The po header could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function createSchedule()
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("PoItemSchedules");
        //echo '<pre>'; print_r($this->request->getData()); exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            try{
                $PoItemSchedule = $this->PoItemSchedules->newEmptyEntity();
                $PoItemSchedule = $this->PoItemSchedules->patchEntity($PoItemSchedule, $this->request->getData());
                //echo '<pre>'; print_r($PoItemSchedule); exit();
                if ($this->PoItemSchedules->save($PoItemSchedule)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Record save successfully';
                }
            } catch (\Exception $e) {
                $response['status'] = 'fail';
                $response['message'] = $e->getMessage();
            }
        }

        echo json_encode($response);
    }

    public function getSchedules($id = null)
    {
        $response = array();
        $response['status'] = 'fail';
        $response['message'] = '';
        $this->autoRender = false;
        $this->loadModel("PoItemSchedules");
        $data = $this->PoItemSchedules->find('all', ['conditions' => ['po_footer_id' => $id]]);

        $html = '';

        if($data->count() > 0) {
            $html .= '<table class="table table-bordered table-hover" id="example2">
            <thead>
                    <tr>
                        <th>Actual Qty</th>
                        <th>Received Qty</th>
                        <th>Delivery Date</th>
                        <th class="actions">Actions</th>
                    </tr>
            </thead>
            <tbody>';
            $totalQty = 0;
            foreach($data as $row) {
                
                $html .= "<tr>
                            <td>$row->actual_qty</td>
                            <td>$row->received_qty</td>
                            <td>$row->delivery_date</td>
                            <td class=\"actions\">
                                &nbsp;
                            </td>
                        </tr>";
            
            }

            $html .= "</tbody>
            </table>";

            $response['status'] = 'success';
            $response['message'] = 'success';
            $response['html'] = $html;

        } else {
            $response['status'] = 'fail';
            $response['message'] = 'No schedule data';
        }
        

        //echo '<pre>'; print_r($data); exit;
        

        echo json_encode($response);
    }

}
