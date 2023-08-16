<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorQuestionnaire $vendorQuestionnaire
 * @var \Cake\Collection\CollectionInterface|string[] $vendorTemps
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Vendor Questionnaires'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorQuestionnaires form content">
            <?= $this->Form->create($vendorQuestionnaire) ?>
            <fieldset>
                <legend><?= __('Add Vendor Questionnaire') ?></legend>
                <?php
                    echo $this->Form->control('vendor_temp_id', ['options' => $vendorTemps, 'empty' => true]);
                    echo $this->Form->control('question');
                    echo $this->Form->control('answer');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
