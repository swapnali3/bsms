<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * MsgchatHeaders Controller
 *
 * @property \App\Model\Table\MsgchatHeadersTable $MsgchatHeaders
 * @method \App\Model\Entity\MsgchatHeader[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MsgchatHeadersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($app=null, $app_id=null)
    {
        // echo '<pre>';print_r($app);exit;
        $conn = ConnectionManager::get('default');
        $query = "SELECT mf.id, mh.table_name, mh.table_pk, mh.subject, mf.msgchat_header_id, mf.group_id,
        case when mf.group_id = 1 then concat(u.first_name,' ',u.last_name) else vt.name end as fullname, mf.message, mf.seen, mf.addeddate, mf.updateddate
        FROM msgchat_headers mh left join msgchat_footers mf on mh.id=mf.msgchat_header_id
        left join users u on u.id = mf.sender_id
        left join vendor_temps vt on mf.sender_id = vt.id ";
        if ($app!=null && $app_id!=null){ $query .= " where table_name='".$app."' and table_pk=".$app_id." order by mf.addeddate desc";}
        $rfqDetails = $conn->execute($query)->fetchAll('assoc');
        echo json_encode($rfqDetails);exit;
    }

    /**
     * View method
     *
     * @param string|null $id Msgchat Header id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $msgchatHeader = $this->MsgchatHeaders->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('msgchatHeader'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $headerStatus = true;
        $response = ['status' => 0, 'message' => ''];
        // $response['status'] = 0;
        // $response['message'] = '';
        $this->autoRender = false;

        $this->loadModel("MsgchatFooters");
        $this->loadModel("MsgchatHeaders");

        $MsgchatFooter = $this->MsgchatFooters->newEmptyEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $app_id = $data['app_id'];

            $msgchatHeader = $this->MsgchatHeaders->find()->where(['table_pk' => $app_id, 'table_name'=> $data['table_name']])->first();
            // print_r($msgchatHeader->id);exit;

            if (!$msgchatHeader) {
                $msgchatHeader = $this->MsgchatHeaders->newEmptyEntity();
                $msgchatHeader->table_name = $data['table_name'];
                $msgchatHeader->table_pk = $data['app_id'];
                $msgchatHeader->subject = "Onboarding Process Ticket";

                if ($this->MsgchatHeaders->save($msgchatHeader)) {
                    $response['status'] = '1';
                    $response['message'] = 'success';
                } else {
                    $response['status'] = '0';
                    $response['message'] = 'failed';
                    $headerStatus = false;
                }
            }
            if ($headerStatus) {
                $msgFooter = array();
                $msgFooter['msgchat_header_id'] = $msgchatHeader->id;
                $msgFooter['group_id'] = "2";
                $msgFooter['sender_id'] = $data['app_id'];
                $msgFooter['message'] = $data['message'];
                $msgFooter['seen'] = "0";

                $MsgchatFooter = $this->MsgchatFooters->patchEntity($MsgchatFooter, $msgFooter);
                if ($this->MsgchatFooters->save($MsgchatFooter)) {
                    $response['status'] = '1';
                    $response['message'] = 'success';
                } else {
                    $response['status'] = '0';
                    $response['message'] = 'failed';
                }
            }
            
        } else {
            $response['status'] = '0';
            $response['message'] = 'Invalid request.';
        }

        echo json_encode($response);
    }


    /**
     * Edit method
     *
     * @param string|null $id Msgchat Header id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $msgchatHeader = $this->MsgchatHeaders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $msgchatHeader = $this->MsgchatHeaders->patchEntity($msgchatHeader, $this->request->getData());
            if ($this->MsgchatHeaders->save($msgchatHeader)) {
                $this->Flash->success(__('The msgchat header has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The msgchat header could not be saved. Please, try again.'));
        }
        $this->set(compact('msgchatHeader'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Msgchat Header id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $msgchatHeader = $this->MsgchatHeaders->get($id);
        if ($this->MsgchatHeaders->delete($msgchatHeader)) {
            $this->Flash->success(__('The msgchat header has been deleted.'));
        } else {
            $this->Flash->error(__('The msgchat header could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
