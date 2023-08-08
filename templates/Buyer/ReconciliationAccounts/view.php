<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReconciliationAccount $reconciliationAccount
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reconciliation Account'), ['action' => 'edit', $reconciliationAccount->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reconciliation Account'), ['action' => 'delete', $reconciliationAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reconciliationAccount->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reconciliation Accounts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reconciliation Account'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reconciliationAccounts view content">
            <h3><?= h($reconciliationAccount->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($reconciliationAccount->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($reconciliationAccount->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Code') ?></th>
                    <td><?= $reconciliationAccount->has('company_code') ? $this->Html->link($reconciliationAccount->company_code->name, ['controller' => 'CompanyCodes', 'action' => 'view', $reconciliationAccount->company_code->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reconciliationAccount->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($reconciliationAccount->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($reconciliationAccount->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($reconciliationAccount->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
