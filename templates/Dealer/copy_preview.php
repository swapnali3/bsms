<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RfqDetail $rfqDetail
 * @var string[]|\Cake\Collection\CollectionInterface $buyerSellerUsers
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $productSubCategories
 * @var string[]|\Cake\Collection\CollectionInterface $uoms
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>
<section id="content">
    <div class="container clearfix">
        <div class="row my-3">
            <div class="col-lg-2">
                <div class="sidebar">
                    <div class="sidebar-widgets-wrap">
                        <div class="widget widget_links clearfix">
                            <h4>Top Categories</h4>
                            <ul>
                                <li><a href="#">Junction Box</a></li>
                                <li><a href="#">Bezel</a></li>
                                <li><a href="#">Compressor</a></li>
                                <li><a href="#">Facia</a></li>
                                <li><a href="#">Frame</a></li>
                                <li><a href="#">Hinge</a></li>
                                <li><a href="#">WIP Forging Machined</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                    <a href="<?= $this->Url->build('/') ?>dealer/addproduct/buyer">
                        <img class="login" src="<?= $this->Url->build('/') ?>img/button/1.png" style="width: 15vw;"></a>
                    <a href="<?= $this->Url->build('/') ?>dealer/addproduct/seller">
                        <img class="login" src="<?= $this->Url->build('/') ?>img/button/5.png" style="width: 15vw;"></a>
                        <a class="menu-link" href="<?= $this->Url->build('/') ?>dealer/regionalsearch/">
                            <div><i class="icon-wpforms"></i>Regional Suppliers</div></a>
            </div>
            <div class="col-lg-10">
                <h3>Request for Quotation</h3>
                <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create($rfqDetail) ?>
                <?= $this->Form->control('buyer_seller_user_id', ['type' => 'hidden']); ?>
                <div class="card">
                    <div class="card-body" id="mulform">
                        <div class="row" id="RFQ0">
                            <div class="col-12">
                                <h5><b>PRODUCT 1 <div style="outline-style: solid;"></div></b></h5>
                            </div>
                            <div class="col-4">
                            <?= $this->Form->control('product_id', array('required' => true, 'type' => 'select','options' => $products,'empty' => 'Select',  'class' => 'form-control product', 'label' => 'Category', 'data-id' => '0')); ?>
                            </div>
                            <div class="col-4" id="0-others" style="display: none;"></div>
                            <div class="col-4">
                                <?= $this->Form->control('product_sub_category_id', array('required' => true, 'type' => 'text','options' => array(), 'empty' => 'Select', 'id' => 'product_sub_category_id', 'class' => 'form-control','label' => 'Sub Category')); ?>
                            </div>
                            <div class="col-4">
                                <?= $this->Form->control('part_name', ['required' => true, 'class' => 'form-control','maxlength' => 100]); ?>
                            </div>
                            <div class="col-4">
                                <?= $this->Form->control('qty', ['required' => true, 'class' => 'form-control', 'type' => 'number' ]); ?>
                            </div>
                            <div class="col-4">
                                <?= $this->Form->control('uom_code', array('required' => true, 'class' => 'form-control','type' => 'select','options' => $uoms,'empty' => 'Select', 'id' => 'uom', 'label' =>'UOM')); ?>
                            </div>
                            <div class="col-4">
                                <?= $this->Form->control('make', ['required' => true, 'maxlength' => 100, 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-4">
                                <?= $this->Form->control('remarks', ['type' => 'textarea', 'required' => true, 'escape' => false, 'rows' => '1', 'cols' => '5', 'maxlength' => 200, 'class' => 'form-control']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button label="Login"
                            class="button button-rounded button-reveal button-large button-yellow button-light text-end"
                            type="submit" style="float:right;">
                            <i class="icon-line-save"></i>
                            <span>SAVE RFQ</span>
                        </button>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>
