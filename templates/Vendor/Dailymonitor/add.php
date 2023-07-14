<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dailymonitor $dailymonitor
 */
?>
</style>
<?= $this->Html->css('custom') ?>
<?= $this->Form->create($dailymonitor) ?>
<div class="card">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5><b>Add Production Planner</b></h5>
            </div>
        </div>
    </div>
    <div class="card-body invoice-details p-0">

        <div class="row dgf m-0">
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('plan_date', array('type'=>'date', 'class' => 'form-control w-100', 'style' => "height: unset !important;")); ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('production_line_id', array('name' => 'productionline_id', 'class' => 'form-control w-100', 'options' => $productionline, 'style' => "height: unset !important;", 'empty' => 'Please Select')); ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('material_id', array('class' => 'form-control w-100', 'options' => $vendor_mateial, 'style' => "height: unset !important;", 'empty' => 'Please Select')); ?>
                </div>
            </div>

            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('target_production', array('type' => 'number', 'class' => 'form-control rounded-0 w-100', 'style' => "height: unset !important;", 'div' => 'form-group', 'required')); ?>
                </div>
            </div>

            <div class="col-sm-8 col-md-3" style="display:none;">
                <div class="form-group">
                    <?php echo $this->Form->control('confirm_production', array('type' => 'number', 'value' => '0','class' => 'form-control rounded-0 w-100', 'style' => "height: unset !important;", 'div' => 'form-group', 'required')); ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-3 d-flex justify-content-start align-items-end">
                <button type="button" class="btn btn-custom" onclick="showConfirmationModal()">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h6>Are you sure you want to Add?</h6>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn" style="border:1px solid #6610f2" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn" style="border:1px solid #28a745">Ok</button>
            </div>
        </div>
    </div>
</div>

<?= $this->Form->end() ?>
<?= $this->Form->create($dailymonitor) ?>
<div class="card">
    <div class="card-header">
        <h5><b>Bulk Production Planner</b></h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-2">
                <?= $this->Form->control('vendor_code', [
                                'type' => 'file', 'label' => false, 'class' => 'pt-1 rounded-0', 'style' => 'visibility: hidden; position: absolute;', 'div' => 'form-group', 'id' => 'vendorCodeInput']); ?>
                <?= $this->Form->button('Choose File', ['id' => 'OpenImgUpload','type' => 'button','class' => 'd-block btn btn-secondary btn-block mb-0 file-upld-btn'
                            ]); ?>
                <span id="filessnames"></span>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2">
                <button type="submit" class="btn btn-primary" id="id_exportme">IMPORT FILE</button>
            </div>
            <div class="col-12 pt-2">
                <i style="color: black;">
                    <a href="<?= $this->Url->build('/') ?>webroot/templates/production_planner_template.xlsx"
                        target="_blank" rel="noopener noreferrer">Sample_Excel_Template.xlsx</a>
                </i>
            </div>
        </div>
    </div>
    <div class="card-footer table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Plan Date</th>
                    <th>Production Line</th>
                    <th>Material</th>
                    <th>Target Production</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Plan Date</td>
                    <td>Production Line</td>
                    <td>Material</td>
                    <td>Target Production</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->Form->end() ?>
<?= $this->Html->script('v_dailymonitor_add') ?>
