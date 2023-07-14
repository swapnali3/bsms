<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * ProductSubCategories Controller
 *
 * @property \App\Model\Table\ProductSubCategoriesTable $ProductSubCategories
 * @method \App\Model\Entity\ProductSubCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductSubCategoriesController extends AdminAppController
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
        //$this->loadModel('Products');
        $this->loadModel('ProductSubCategories');

        $this->paginate = [
            'contain' => ['Products'],
        ];
        $productSubCategories = $this->paginate($this->ProductSubCategories);

        $this->set(compact('productSubCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Products');
        $this->loadModel('ProductSubCategories');
        $productSubCategory = $this->ProductSubCategories->get($id, [
            'contain' => ['Products', 'ProductAttributes'],
        ]);

        $this->set(compact('productSubCategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flash = [];
        //$this->loadModel('Products');
        $this->loadModel('ProductSubCategories');
        $productSubCategory = $this->ProductSubCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $productSubCategory = $this->ProductSubCategories->patchEntity($productSubCategory, $this->request->getData());
            if ($this->ProductSubCategories->save($productSubCategory)) {
                $flash = ['type'=>'success', 'msg'=>'The product sub category has been saved'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The product sub category could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $products = $this->ProductSubCategories->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('productSubCategory', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flash = [];
        $this->loadModel('Products');
        $this->loadModel('productSubCategories');
        $productSubCategory = $this->ProductSubCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productSubCategory = $this->ProductSubCategories->patchEntity($productSubCategory, $this->request->getData());
            if ($this->ProductSubCategories->save($productSubCategory)) {
                $flash = ['type'=>'success', 'msg'=>'The product sub category has been saved'];
                $this->set('flash', $flash);
                return $this->redirect(['action' => 'index']);
            }
            $flash = ['type'=>'error', 'msg'=>'The product sub category could not be saved. Please, try again'];
            $this->set('flash', $flash);
        }
        $products = $this->ProductSubCategories->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('productSubCategory', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $flash = [];
        $this->loadModel('Products');
        $this->loadModel('productSubCategories');
        $this->request->allowMethod(['post', 'delete']);
        $productSubCategory = $this->ProductSubCategories->get($id);
        if ($this->ProductSubCategories->delete($productSubCategory)) {
            $flash = ['type'=>'success', 'msg'=>'The product sub category has been deleted'];
        } else {
            $flash = ['type'=>'error', 'msg'=>'The product sub category could not be deleted. Please, try again'];
        }
        $this->set('flash', $flash);

        return $this->redirect(['action' => 'index']);
    }

    public function getlist($product_id = null)
    {
        $this->loadModel('ProductSubCategories');
        $productSubCategories = $this->ProductSubCategories->find()
        ->select(['id', 'name'])
        ->where(['product_id' => $product_id]);

        if($this->request->is('ajax')) {
            $this->layout = false;
            echo json_encode($productSubCategories);
            exit;
        }
    }
}
