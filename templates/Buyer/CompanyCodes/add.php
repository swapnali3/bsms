<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompanyCode $companyCode
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Company Codes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="companyCodes form content">
            <?= $this->Form->create($companyCode) ?>
            <fieldset>
                <legend><?= __('Add Company Code') ?></legend>
                <?php
                    echo $this->Form->control('code');
                    echo $this->Form->control('name');
                    echo $this->Form->control('status');
                    echo $this->Form->control('added_date');
                    echo $this->Form->control('updated_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
