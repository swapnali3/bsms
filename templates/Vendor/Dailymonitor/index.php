<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Dailymonitor> $dailymonitor
 */
?>
<div class="dailymonitor index content">
    <?= $this->Html->link(__('New Dailymonitor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Dailymonitor') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_id') ?></th>
                    <th><?= $this->Paginator->sort('productionline_id') ?></th>
                    <th><?= $this->Paginator->sort('target_production') ?></th>
                    <th><?= $this->Paginator->sort('confirm_production') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dailymonitor as $dailymonitor): ?>
                <tr>
                    <td><?= $this->Number->format($dailymonitor->id) ?></td>
                    <td><?= $dailymonitor->vendor_id === null ? '' : $this->Number->format($dailymonitor->vendor_id) ?></td>
                    <td><?= $dailymonitor->productionline_id === null ? '' : $this->Number->format($dailymonitor->productionline_id) ?></td>
                    <td><?= $dailymonitor->target_production === null ? '' : $this->Number->format($dailymonitor->target_production) ?></td>
                    <td><?= $dailymonitor->confirm_production === null ? '' : $this->Number->format($dailymonitor->confirm_production) ?></td>
                    <td><?= $dailymonitor->status === null ? '' : $this->Number->format($dailymonitor->status) ?></td>
                    <td><?= h($dailymonitor->added_date) ?></td>
                    <td><?= h($dailymonitor->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $dailymonitor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dailymonitor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dailymonitor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dailymonitor->id)]) ?>
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
