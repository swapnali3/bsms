<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoFooter[]|\Cake\Collection\CollectionInterface $poFooters
 */
?>
<div class="poFooters index content">
    <?= $this->Html->link(__('New Po Footer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Po Footers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('po_header_id') ?></th>
                    <th><?= $this->Paginator->sort('item') ?></th>
                    <th><?= $this->Paginator->sort('deleted_indication') ?></th>
                    <th><?= $this->Paginator->sort('material') ?></th>
                    <th><?= $this->Paginator->sort('short_text') ?></th>
                    <th><?= $this->Paginator->sort('po_qty') ?></th>
                    <th><?= $this->Paginator->sort('grn_qty') ?></th>
                    <th><?= $this->Paginator->sort('pending_qty') ?></th>
                    <th><?= $this->Paginator->sort('order_unit') ?></th>
                    <th><?= $this->Paginator->sort('net_price') ?></th>
                    <th><?= $this->Paginator->sort('price_unit') ?></th>
                    <th><?= $this->Paginator->sort('net_value') ?></th>
                    <th><?= $this->Paginator->sort('gross_value') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($poFooters as $poFooter): ?>
                <tr>
                    <td><?= $this->Number->format($poFooter->id) ?></td>
                    <td><?= $poFooter->has('po_header') ? $this->Html->link($poFooter->po_header->id, ['controller' => 'PoHeaders', 'action' => 'view', $poFooter->po_header->id]) : '' ?></td>
                    <td><?= h($poFooter->item) ?></td>
                    <td><?= h($poFooter->deleted_indication) ?></td>
                    <td><?= h($poFooter->material) ?></td>
                    <td><?= h($poFooter->short_text) ?></td>
                    <td><?= $this->Number->format($poFooter->po_qty) ?></td>
                    <td><?= $this->Number->format($poFooter->grn_qty) ?></td>
                    <td><?= $this->Number->format($poFooter->pending_qty) ?></td>
                    <td><?= h($poFooter->order_unit) ?></td>
                    <td><?= $this->Number->format($poFooter->net_price) ?></td>
                    <td><?= h($poFooter->price_unit) ?></td>
                    <td><?= $this->Number->format($poFooter->net_value) ?></td>
                    <td><?= $this->Number->format($poFooter->gross_value) ?></td>
                    <td><?= h($poFooter->added_date) ?></td>
                    <td><?= h($poFooter->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $poFooter->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $poFooter->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $poFooter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poFooter->id)]) ?>
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
