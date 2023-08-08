<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CompanyCode> $companyCodes
 */
?>
<div class="companyCodes index content">
    <?= $this->Html->link(__('New Company Code'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Company Codes') ?></h3>
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
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($companyCodes as $companyCode): ?>
                <tr>
                    <td><?= $this->Number->format($companyCode->id) ?></td>
                    <td><?= h($companyCode->code) ?></td>
                    <td><?= h($companyCode->name) ?></td>
                    <td><?= $this->Number->format($companyCode->status) ?></td>
                    <td><?= h($companyCode->added_date) ?></td>
                    <td><?= h($companyCode->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $companyCode->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $companyCode->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $companyCode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companyCode->id)]) ?>
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
