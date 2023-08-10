<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorOtherdetail> $vendorOtherdetails
 */
?>
<div class="vendorOtherdetails index content">
    <?= $this->Html->link(__('New Vendor Otherdetail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Otherdetails') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temp_id') ?></th>
                    <th><?= $this->Paginator->sort('six_sigma') ?></th>
                    <th><?= $this->Paginator->sort('six_sigma_file') ?></th>
                    <th><?= $this->Paginator->sort('iso') ?></th>
                    <th><?= $this->Paginator->sort('iso_file') ?></th>
                    <th><?= $this->Paginator->sort('halal_file') ?></th>
                    <th><?= $this->Paginator->sort('declaration_file') ?></th>
                    <th><?= $this->Paginator->sort('fully_manufactured') ?></th>
                    <th><?= $this->Paginator->sort('suppliers_name') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorOtherdetails as $vendorOtherdetail): ?>
                <tr>
                    <td><?= $this->Number->format($vendorOtherdetail->id) ?></td>
                    <td><?= $vendorOtherdetail->has('vendor_temp') ? $this->Html->link($vendorOtherdetail->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorOtherdetail->vendor_temp->id]) : '' ?></td>
                    <td><?= h($vendorOtherdetail->six_sigma) ?></td>
                    <td><?= h($vendorOtherdetail->six_sigma_file) ?></td>
                    <td><?= h($vendorOtherdetail->iso) ?></td>
                    <td><?= h($vendorOtherdetail->iso_file) ?></td>
                    <td><?= h($vendorOtherdetail->halal_file) ?></td>
                    <td><?= h($vendorOtherdetail->declaration_file) ?></td>
                    <td><?= h($vendorOtherdetail->fully_manufactured) ?></td>
                    <td><?= h($vendorOtherdetail->suppliers_name) ?></td>
                    <td><?= h($vendorOtherdetail->added_date) ?></td>
                    <td><?= h($vendorOtherdetail->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorOtherdetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorOtherdetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorOtherdetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorOtherdetail->id)]) ?>
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
