<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dailymonitor $dailymonitor
 */
?>
</style>
<?= $this->Html->css('custom') ?>
<div class="card">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5><b>Add Production Planner</b></h5>
            </div>
        </div>
    </div>
    <div class="card-body invoice-details p-0">
        <?= $this->Form->create($dailymonitor) ?>
        <div class="row dgf m-0">
        <div class="col-sm-8 col-md-3">
            <div class="form-group">
                    <?php echo $this->Form->control('plan_date', array('class' => 'form-control w-100', 'style' => "height: unset !important;")); ?>
                </div>
            </div>    
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('production_line_id', array('name'=>'productionline_id','class' => 'form-control w-100', 'options' => $productionline, 'style' => "height: unset !important;")); ?>
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
                <button type="submit" class="btn btn-custom">Submit</button>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>