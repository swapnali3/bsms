<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchasingOrganization[]|\Cake\Collection\CollectionInterface $purchasingOrganizations
 */
?>
<div class="purchasingOrganizations index content">
    <?= $this->Html->link(__('New Purchasing Organization'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Purchasing Organizations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchasingOrganizations as $purchasingOrganization): ?>
                <tr>
                    <td><?= $this->Number->format($purchasingOrganization->id) ?></td>
                    <td><?= h($purchasingOrganization->name) ?></td>
                    <td><?= $this->Number->format($purchasingOrganization->status) ?></td>
                    <td><?= h($purchasingOrganization->added_date) ?></td>
                    <td><?= h($purchasingOrganization->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $purchasingOrganization->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchasingOrganization->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchasingOrganization->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchasingOrganization->id)]) ?>
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
