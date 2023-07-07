<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stockupload $stockupload
 */
?>
</style>
<?= $this->Html->css('custom') ?>
<div class="card ">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5>Stocks Edit</h5>
            </div>
        </div>
    </div>
    <?= $this->Form->create($stockupload) ?>
    <div class="card mb-0">
        <div class="card-body  pb-0">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <?php echo $this->Form->control('opening_stock', ['class' => 'form-control mb-3']); ?>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 mt-4">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info mt-2']) ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>