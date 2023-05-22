<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Rfq> $rfqs
 */
?>

<div class="rfqs index content">
    <?= $this->Html->link(__('New Rfq'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h5><?= __('Rfqs') ?></h5>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('buyer_id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temp_id') ?></th>
                    <th><?= $this->Paginator->sort('pr_header_id') ?></th>
                    <th><?= $this->Paginator->sort('pr_footer_id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rfqs as $rfq): ?>
                <tr>
                    <td><?= $this->Number->format($rfq->id) ?></td>
                    <td><?= $this->Number->format($rfq->buyer_id) ?></td>
                    <td><?= $rfq->has('vendor_temp') ? $this->Html->link($rfq->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $rfq->vendor_temp->id]) : '' ?></td>
                    <td><?= $rfq->has('pr_header') ? $this->Html->link($rfq->pr_header->id, ['controller' => 'PrHeaders', 'action' => 'view', $rfq->pr_header->id]) : '' ?></td>
                    <td><?= $rfq->has('pr_footer') ? $this->Html->link($rfq->pr_footer->id, ['controller' => 'PrFooters', 'action' => 'view', $rfq->pr_footer->id]) : '' ?></td>
                    <td><?= h($rfq->status) ?></td>
                    <td><?= h($rfq->added_date) ?></td>
                    <td><?= h($rfq->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rfq->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rfq->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rfq->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfq->id)]) ?>
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
