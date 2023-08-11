<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorRegisteredOffice> $vendorRegisteredOffices
 */
?>
<div class="vendorRegisteredOffices index content">
    <?= $this->Html->link(__('New Vendor Registered Office'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Registered Offices') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temp_id') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('address_2') ?></th>
                    <th><?= $this->Paginator->sort('pincode') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('country') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('telephone') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorRegisteredOffices as $vendorRegisteredOffice): ?>
                <tr>
                    <td><?= $this->Number->format($vendorRegisteredOffice->id) ?></td>
                    <td><?= $vendorRegisteredOffice->has('vendor_temp') ? $this->Html->link($vendorRegisteredOffice->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorRegisteredOffice->vendor_temp->id]) : '' ?></td>
                    <td><?= h($vendorRegisteredOffice->address) ?></td>
                    <td><?= h($vendorRegisteredOffice->address_2) ?></td>
                    <td><?= h($vendorRegisteredOffice->pincode) ?></td>
                    <td><?= h($vendorRegisteredOffice->city) ?></td>
                    <td><?= h($vendorRegisteredOffice->country) ?></td>
                    <td><?= h($vendorRegisteredOffice->state) ?></td>
                    <td><?= h($vendorRegisteredOffice->telephone) ?></td>
                    <td><?= h($vendorRegisteredOffice->added_date) ?></td>
                    <td><?= h($vendorRegisteredOffice->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorRegisteredOffice->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorRegisteredOffice->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorRegisteredOffice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorRegisteredOffice->id)]) ?>
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
