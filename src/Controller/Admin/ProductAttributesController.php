<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * ProductAttributes Controller
 *
 * @property \App\Model\Table\ProductAttributesTable $ProductAttributes
 * @method \App\Model\Entity\ProductAttribute[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductAttributesController extends AdminAppController
{
    public function initialize(): void
    {
        parent::initialize();
        $flash = [];  
        $this->set('flash', $flash);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('ProductAttributes');
        $this->paginate = [
            'contain' => ['Products'],
        ];
        $productAttributes = $this->paginate($this->ProductAttributes);

        $this->set(compact('productAttributes'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Attribute id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('ProductAttributes');
        $productAttribute = $this->ProductAttributes->get($id, [
            'contain' => ['Products', 'ProductSubCategories'],
        ]);

        $this->set(compact('productAttribute'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flash = [];
        $this->loadModel('ProductAttributes');
        $productAttribute = $this->ProductAttributes->newEmptyEntity();
        if ($this->request->is('post')) {
            $productAttribute = $this->ProductAttributes->patchEntity($productAttribute, $this->request->getData());
            if ($this->ProductAttributes->save($productAttribute)) {
                $flash = ['type'=>'success', 'msg'=>'The product attribute has been saved'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The product attribute could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $products = $this->ProductAttributes->Products->find('list')->all();
        $this->set(compact('productAttribute', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Attribute id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flash = [];
        $this->loadModel('ProductAttributes');
        $productAttribute = $this->ProductAttributes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productAttribute = $this->ProductAttributes->patchEntity($productAttribute, $this->request->getData());
            if ($this->ProductAttributes->save($productAttribute)) {
                $flash = ['type'=>'success', 'msg'=>'The product attribute has been saved'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The product attribute could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $products = $this->ProductAttributes->Products->find('list', ['limit' => 200])->all();
        $productSubCategories = $this->ProductAttributes->ProductSubCategories->find('list', ['limit' => 200])->all();
        $this->set(compact('productAttribute', 'products', 'productSubCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Attribute id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->loadModel('ProductAttributes');
        $this->request->allowMethod(['post', 'delete']);
        $productAttribute = $this->ProductAttributes->get($id);
        if ($this->ProductAttributes->delete($productAttribute)) {
            $flash = ['type'=>'success', 'msg'=>'The product attribute has been deleted'];
        } else {
            $flash = ['type'=>'error', 'msg'=>'The product attribute could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }


    public function getlist($product_id = null)
    {
        $this->loadModel('ProductAttributes');
        $productAttribute = $this->ProductAttributes->find()
        ->select(['id', 'attribute'])
        ->where(['product_id' => $product_id]);

        if($this->request->is('ajax')) {
            $this->layout = false;
            echo json_encode($productAttribute);
            exit;
        }
    }


}
