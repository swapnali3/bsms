<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stockupload $stockupload
 */
?>
</style>
<?= $this->Html->css('custom') ?>
<div class="card">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5><b>Add Stock Upload</b></h5>
            </div>
            <div class="col-lg-6 d-flex justify-content-end text-align-end">
                <p><a href="#">List Stock Upload</a></p>
            </div>
        </div>
    </div>
    <div class="card-body invoice-details p-0">
    <?= $this->Form->create($stockupload) ?>
        <div class="row dgf m-0">
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('opening_stock', array('type' => 'number', 'class' => 'form-control rounded-0 w-100', 'style' => "height: unset !important;", 'div' => 'form-group', 'required')); ?>
                </div>
            </div>           
            <div class="col-sm-8 col-md-3 d-flex justify-content-start align-items-end">
                <button type="submit" class="btn btn-custom">Submit</button>
            </div>
        </div>    
        <?= $this->Form->end() ?>
    </div>
</div>