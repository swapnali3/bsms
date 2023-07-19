<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LineMaster $lineMaster
 */
?>
<?= $this->Html->css('v_index.css') ?>
<?= $this->Html->css('custom_table') ?>
<?= $this->Html->css('v_linemasters_edit') ?>
<div class="row">
    <div class="col-12">
        <?= $this->Form->create($lineMaster) ?>
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <?php
                    echo $this->Form->control('name', ['class'=> 'form-control']);
                    ?>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <?php
                        echo $this->Form->control('capacity', ['class'=> 'form-control']);
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <?php
                        echo $this->Form->control('uom', ['class'=> 'form-control']);
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <?php
                    echo $this->Form->control('sap_vendor_code', ['class'=> 'form-control', 'style' => 'visibility: hidden; position: absolute;','label' => false]);
                ?>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <?php
                    echo $this->Form->control('status', ['class'=> 'form-control', 'style' => 'visibility: hidden; position: absolute;','label' => false]);
                ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <?= $this->Form->button(__('Submit'), ['class'=> 'btn btn-gradient-true']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-gradient-false']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>