<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorIncometax> $vendorIncometaxes
 */
?>
<div class="vendorIncometaxes index content">
    <?= $this->Html->link(__('New Vendor Incometax'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Incometaxes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temp_id') ?></th>
                    <th><?= $this->Paginator->sort('certificate_no') ?></th>
                    <th><?= $this->Paginator->sort('certificate_date') ?></th>
                    <th><?= $this->Paginator->sort('certificate_file') ?></th>
                    <th><?= $this->Paginator->sort('balance_sheet_file') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorIncometaxes as $vendorIncometax): ?>
                <tr>
                    <td><?= $this->Number->format($vendorIncometax->id) ?></td>
                    <td><?= $vendorIncometax->has('vendor_temp') ? $this->Html->link($vendorIncometax->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorIncometax->vendor_temp->id]) : '' ?></td>
                    <td><?= h($vendorIncometax->certificate_no) ?></td>
                    <td><?= h($vendorIncometax->certificate_date) ?></td>
                    <td><?= h($vendorIncometax->certificate_file) ?></td>
                    <td><?= h($vendorIncometax->balance_sheet_file) ?></td>
                    <td><?= h($vendorIncometax->added_date) ?></td>
                    <td><?= h($vendorIncometax->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorIncometax->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorIncometax->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorIncometax->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorIncometax->id)]) ?>
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
