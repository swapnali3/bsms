<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stockupload $stockupload
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Stockupload'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stockupload form content">
            <?= $this->Form->create($stockupload) ?>
            <fieldset>
                <legend><?= __('Add Stockupload') ?></legend>
                <?php
                    echo $this->Form->control('opening_stock');
                    echo $this->Form->control('vendor_material_id');
                    echo $this->Form->control('vendor_id');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
