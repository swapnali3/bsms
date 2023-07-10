<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorMaterial $vendorMaterial
 */
?>
</style>
<?= $this->Html->css('custom') ?>
<div class="card">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5><b>Add Vendor Material</b></h5>
            </div>
        </div>
    </div>
    <div class="card-body invoice-details p-0">
    <?= $this->Form->create($vendorMaterial) ?>
        <div class="row dgf m-0">
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                <?php echo $this->Form->control('vendor_material_code', ['type' => 'number', 'class' => 'form-control rounded-0 w-100 mb-3', 'style' => "height: unset !important;", 'label' => 'Material Code']); ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                <?php echo $this->Form->control('description', ['class' => 'form-control rounded-0 w-100 mb-3', 'style' => "height: unset !important;", 'label' => 'Material']); ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('minimum_stock', ['class' => 'form-control rounded-0 w-100 mb-3', 'style' => "height: unset !important;"]); ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                <?php echo $this->Form->control('uom', ['class' => 'form-control rounded-0 w-100 mb-3', 'label' => 'Unit of Measurement', 'style' => "height: unset !important;"]); ?>
                </div>
            </div>

            <div class="col-sm-8 col-md-3 d-flex justify-content-start align-items-end">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info mb-0']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
