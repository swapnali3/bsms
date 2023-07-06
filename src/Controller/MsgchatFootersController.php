<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * MsgchatFooters Controller
 *
 * @property \App\Model\Table\MsgchatFootersTable $MsgchatFooters
 * @method \App\Model\Entity\MsgchatHeader[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MsgchatFootersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($app=null, $app_id=null)
    {
        echo '<pre>';print_r($app);exit;
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
        $msgchatHeader = $this->MsgchatFooters->get($id, [
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
        $msgchatHeader = $this->MsgchatFooters->newEmptyEntity();
        if ($this->request->is('post')) {
            $msgchatHeader = $this->MsgchatFooters->patchEntity($msgchatHeader, $this->request->getData());
            if ($this->MsgchatFooters->save($msgchatHeader)) {
                $this->Flash->success(__('The msgchat header has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The msgchat header could not be saved. Please, try again.'));
        }
        $this->set(compact('msgchatHeader'));
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
        $msgchatHeader = $this->MsgchatFooters->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $msgchatHeader = $this->MsgchatFooters->patchEntity($msgchatHeader, $this->request->getData());
            if ($this->MsgchatFooters->save($msgchatHeader)) {
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
        $msgchatHeader = $this->MsgchatFooters->get($id);
        if ($this->MsgchatFooters->delete($msgchatHeader)) {
            $this->Flash->success(__('The msgchat header has been deleted.'));
        } else {
            $this->Flash->error(__('The msgchat header could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
