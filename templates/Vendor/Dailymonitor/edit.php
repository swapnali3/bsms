<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dailymonitor $dailymonitor
 */
?>
</style>
<?= $this->Html->css('custom') ?>
<div class="card ">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5>Edit Production Planner</h5>
            </div>
        </div>
    </div>
    <?= $this->Form->create($dailymonitor) ?>
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
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info mt-1']) ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>

</div>