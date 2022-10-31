
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>
<div class="row">
    <aside class="column">
        <?php echo $this->element('left_menu'); ?>
    </aside>
    <div class="column-responsive column-80">
    <div class="product form content">
    <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create(null, array('type' => 'file')) ?>
            <?= $this->Form->control('product_id', array('required' => true, 'type' => 'select','options' => $products,'empty' => 'Select', 'id' => 'product', 'label' => 'Category')); ?>
            <?= $this->Form->control('product_sub_category_id', array('required' => true, 'type' => 'select','options' => array(), 'empty' => 'Select', 'id' => 'product_sub_category_id', 'label' => 'Sub Category')); ?>
            <?= $this->Form->control('part_name', ['required' => true, 'maxlength' => 100]); ?>
            <?= $this->Form->control('qty', ['required' => true, 'type' => 'number' ]); ?>
            <?= $this->Form->control('uom_code', array('required' => true, 'type' => 'select','options' => $uoms,'empty' => 'Select', 'id' => 'uom', 'label' =>'UOM')); ?>
            <?= $this->Form->control('make', ['required' => true, 'maxlength' => 100]); ?>
            <?= $this->Form->control('remarks', ['type' => 'textarea', 'required' => true, 'escape' => false, 'rows' => '5', 'cols' => '5', 'maxlength' => 200]); ?>
            <?= $this->Form->control('files[]', ['type' => 'file', 'multiple' => 'multiple', 'label' => false]); ?>
        <?= $this->Form->button(__('Save')); ?>
        <?= $this->Form->end() ?>
    </div>
</div>

</div>