<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Productionline $productionline
 */
?>
</style>
<?= $this->Html->css('custom') ?>
<div class="card ">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5>Production Edit</h5>
            </div>
        </div>
    </div>


    <?= $this->Form->create($productionline) ?>
    <div class="card mb-0">
        <div class="card-body  pb-0">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <?php echo $this->Form->control('prdline_description', ['class' => 'form-control mb-3', 'label' => 'Production Line Description']); ?>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <?php echo $this->Form->control('prdline_capacity', ['class' => 'form-control mb-3','label' => 'Production Line Capacity']); ?>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 mt-4">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info mt-1']) ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>

</div>