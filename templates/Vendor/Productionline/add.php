<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Productionline $productionline
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Productionline'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productionline form content">
            <?= $this->Form->create($productionline) ?>
            <fieldset>
                <legend><?= __('Add Productionline') ?></legend>
                <?php
                    echo $this->Form->control('vendor_id');
                    echo $this->Form->control('vendormaterial_id');
                    echo $this->Form->control('prdline_description');
                    echo $this->Form->control('prdline_capacity');
                    echo $this->Form->control('status');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
