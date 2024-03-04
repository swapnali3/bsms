<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ReconciliationAccount> $reconciliationAccounts
 */
?>
<div class="reconciliationAccounts index content">
    <?= $this->Html->link(__('New Reconciliation Account'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reconciliation Accounts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th><?= $this->Paginator->sort('company_code_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reconciliationAccounts as $reconciliationAccount): ?>
                <tr>
                    <td><?= $this->Number->format($reconciliationAccount->id) ?></td>
                    <td><?= h($reconciliationAccount->code) ?></td>
                    <td><?= h($reconciliationAccount->name) ?></td>
                    <td><?= $this->Number->format($reconciliationAccount->status) ?></td>
                    <td><?= h($reconciliationAccount->added_date) ?></td>
                    <td><?= h($reconciliationAccount->updated_date) ?></td>
                    <td><?= $reconciliationAccount->has('company_code') ? $this->Html->link($reconciliationAccount->company_code->name, ['controller' => 'CompanyCodes', 'action' => 'view', $reconciliationAccount->company_code->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $reconciliationAccount->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reconciliationAccount->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reconciliationAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reconciliationAccount->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
