<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorMaterial $vendorMaterial
 */
?>

</style>
<?= $this->Html->css('custom') ?>
<div class="card ">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5>Vendor Material Edit</h5>
            </div>
        </div>
    </div>


    <?= $this->Form->create($vendorMaterial) ?>
    <div class="card mb-0">
        <div class="card-body  pb-0">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <?php echo $this->Form->control('vendor_material_code', ['type' => 'number', 'class' => 'form-control mb-3', 'label' => 'Material Code']); ?>
                    <?php echo $this->Form->control('uom', ['class' => 'form-control mb-3', 'label' => 'Unit of Measurement']); ?>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <?php echo $this->Form->control('description', ['class' => 'form-control mb-3', 'label' => 'Material']); ?>

                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <?php echo $this->Form->control('minimum_stock', ['class' => 'form-control mb-3']); ?>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 mb-4">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info mb-0']) ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>

</div>