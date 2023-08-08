<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReconciliationAccount $reconciliationAccount
 * @var string[]|\Cake\Collection\CollectionInterface $companyCodes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reconciliationAccount->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reconciliationAccount->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Reconciliation Accounts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reconciliationAccounts form content">
            <?= $this->Form->create($reconciliationAccount) ?>
            <fieldset>
                <legend><?= __('Edit Reconciliation Account') ?></legend>
                <?php
                    echo $this->Form->control('code');
                    echo $this->Form->control('name');
                    echo $this->Form->control('status');
                    echo $this->Form->control('added_date');
                    echo $this->Form->control('updated_date');
                    echo $this->Form->control('company_code_id', ['options' => $companyCodes, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
