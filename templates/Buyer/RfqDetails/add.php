<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RfqDetail $rfqDetail
 * @var \Cake\Collection\CollectionInterface|string[] $buyerSellerUsers
 * @var \Cake\Collection\CollectionInterface|string[] $products
 * @var \Cake\Collection\CollectionInterface|string[] $productSubCategories
 * @var \Cake\Collection\CollectionInterface|string[] $uoms
 */
?>
<?= $this->Html->css('cstyle.css') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('b_index.css') ?>
<div class="row">
    
    <div class="column-responsive column-80">
        <div class="rfqDetails form content">
            <?= $this->Form->create($rfqDetail) ?>
            <fieldset>
                <legend><?= __('Create RFQ') ?></legend>
                <?php
                    
                    echo $this->Form->control('product_id', ['options' => $products, 'class' => 'custom-select rounded-0','div' => 'form-group','required']);
                    echo $this->Form->control('product_sub_category_id', ['type' => 'text', 'class' => 'form-control rounded-0','div' => 'form-group','required']);
                    echo $this->Form->control('part_name',['class' => 'form-control rounded-0','div' => 'form-group','required']);
                    echo $this->Form->control('qty', ['class' => 'form-control rounded-0','div' => 'form-group','required']);
                    echo $this->Form->control('uom_code', ['options' => $uoms, 'class' => 'custom-select rounded-0','div' => 'form-group','required']);
                    echo $this->Form->control('remarks', ['class' => 'form-control rounded-0','div' => 'form-group','required']);
                    echo $this->Form->control('make',['class' => 'form-control rounded-0','div' => 'form-group','required']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
