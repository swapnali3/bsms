<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail[]|\Cake\Collection\CollectionInterface $deliveryDetails
 */
?>
<div class="deliveryDetails index content">
    <?= $this->Html->link(__('New Delivery Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Delivery Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('po_header_id') ?></th>
                    <th><?= $this->Paginator->sort('po_footer_id') ?></th>
                    <th><?= $this->Paginator->sort('challan_no') ?></th>
                    <th><?= $this->Paginator->sort('qty') ?></th>
                    <th><?= $this->Paginator->sort('eway_bill_no') ?></th>
                    <th><?= $this->Paginator->sort('einvoice_no') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($deliveryDetails as $deliveryDetail): ?>
                <tr>
                    <td><?= $this->Number->format($deliveryDetail->id) ?></td>
                    <td><?= $deliveryDetail->has('po_header') ? $this->Html->link($deliveryDetail->po_header->id, ['controller' => 'PoHeaders', 'action' => 'view', $deliveryDetail->po_header->id]) : '' ?></td>
                    <td><?= $deliveryDetail->has('po_footer') ? $this->Html->link($deliveryDetail->po_footer->id, ['controller' => 'PoFooters', 'action' => 'view', $deliveryDetail->po_footer->id]) : '' ?></td>
                    <td><?= h($deliveryDetail->challan_no) ?></td>
                    <td><?= $this->Number->format($deliveryDetail->qty) ?></td>
                    <td><?= h($deliveryDetail->eway_bill_no) ?></td>
                    <td><?= h($deliveryDetail->einvoice_no) ?></td>
                    <td><?= h($deliveryDetail->status) ?></td>
                    <td><?= h($deliveryDetail->added_date) ?></td>
                    <td><?= h($deliveryDetail->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $deliveryDetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deliveryDetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deliveryDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryDetail->id)]) ?>
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
