<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dailymonitor $dailymonitor
 */
?>
</style>
<?= $this->Html->css('custom') ?>
<?= $this->Form->create($dailymonitor) ?>
<div class="card ">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5>Edit Production Planner</h5>
            </div>
        </div>
    </div>
    <div class="card mb-0">
        <div class="card-body  pb-0">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="form-group">
                        <?php echo $this->Form->control('production_line_id', array('name'=>'productionline_id','class' => 'form-control w-100', 'options' => $productionline, 'style' => "height: unset !important;")); ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="form-group">
                        <?php echo $this->Form->control('material_id', array('class' => 'form-control w-100', 'options' => $vendor_mateial, 'style' => "height: unset !important;", 'empty' => 'Please Select')); ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <?php echo $this->Form->control('target_production', ['class' => 'form-control mb-3']); ?>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="form-group">
                        <?php echo $this->Form->control('plan_date', array('class' => 'form-control w-100')); ?>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 mt-4">
                    <button type="button" class="btn btn-custom mt-1" onclick="showConfirmationModal()">Submit</button>
                </div>
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
