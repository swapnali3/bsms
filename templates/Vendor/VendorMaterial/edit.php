<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorMaterial $vendorMaterial
 */
?>
</style>
<?= $this->Html->css('custom') ?>
<?= $this->Form->create($vendorMaterial) ?>
<div class="card">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5><b>Update Vendor Materials</b></h5>
            </div>
        </div>
    </div>
    <div class="card-body invoice-details p-0">
        <div class="row dgf m-0">
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('vendor_material_code', ['type' => 'number', 'class' => 'form-control rounded-0 w-100 mb-3', 'style' => "height: unset !important;", 'label' => 'Material Code']); ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('description', ['class' => 'form-control rounded-0 w-100 mb-3', 'style' => "height: unset !important;", 'label' => 'Material Description']); ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('minimum_stock', ['class' => 'form-control rounded-0 w-100 mb-3', 'style' => "height: unset !important;"]); ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('uom', array('class' => 'form-control w-100', 'options' => $uom, 'style' => "height: unset !important;", 'empty' => 'Please Select','label'=>'Unit Of Measurement')); ?>

                </div>
            </div>
            <div class="col-sm-8 col-md-3 d-flex justify-content-start align-items-end">
                <!-- <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info mb-0']) ?>
            </div> -->
                <button type="button" class="btn btn-custom" onclick="showConfirmationModal()">Submit</button>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h6>Are you sure you want to Update?</h6>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn" style="border:1px solid #6610f2" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn" style="border:1px solid #28a745">Ok</button>
            </div>
        </div>
    </div>
</div>

<?= $this->Form->end() ?>



<script>
    function showConfirmationModal() {
        $('#modal-sm').modal('show');
    }
</script>