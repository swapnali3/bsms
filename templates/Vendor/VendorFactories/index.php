<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorFactory> $vendorFactories
 */
?>
<div class="vendorFactories index content">
    <?= $this->Html->link(__('New Vendor Factory'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Factories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temps_id') ?></th>
                    <th><?= $this->Paginator->sort('factory_code') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('address_2') ?></th>
                    <th><?= $this->Paginator->sort('pincode') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('country') ?></th>
                    <th><?= $this->Paginator->sort('installed_capacity') ?></th>
                    <th><?= $this->Paginator->sort('installed_capacity_file') ?></th>
                    <th><?= $this->Paginator->sort('machinery_available') ?></th>
                    <th><?= $this->Paginator->sort('machinery_available_file') ?></th>
                    <th><?= $this->Paginator->sort('power_available') ?></th>
                    <th><?= $this->Paginator->sort('power_available_file') ?></th>
                    <th><?= $this->Paginator->sort('raw_material') ?></th>
                    <th><?= $this->Paginator->sort('raw_material_file') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorFactories as $vendorFactory): ?>
                <tr>
                    <td><?= $this->Number->format($vendorFactory->id) ?></td>
                    <td><?= $vendorFactory->has('vendor_temp') ? $this->Html->link($vendorFactory->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorFactory->vendor_temp->id]) : '' ?></td>
                    <td><?= h($vendorFactory->factory_code) ?></td>
                    <td><?= h($vendorFactory->address) ?></td>
                    <td><?= h($vendorFactory->address_2) ?></td>
                    <td><?= h($vendorFactory->pincode) ?></td>
                    <td><?= h($vendorFactory->city) ?></td>
                    <td><?= h($vendorFactory->state) ?></td>
                    <td><?= h($vendorFactory->country) ?></td>
                    <td><?= h($vendorFactory->installed_capacity) ?></td>
                    <td><?= h($vendorFactory->installed_capacity_file) ?></td>
                    <td><?= h($vendorFactory->machinery_available) ?></td>
                    <td><?= h($vendorFactory->machinery_available_file) ?></td>
                    <td><?= h($vendorFactory->power_available) ?></td>
                    <td><?= h($vendorFactory->power_available_file) ?></td>
                    <td><?= h($vendorFactory->raw_material) ?></td>
                    <td><?= h($vendorFactory->raw_material_file) ?></td>
                    <td><?= h($vendorFactory->added_date) ?></td>
                    <td><?= h($vendorFactory->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorFactory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorFactory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorFactory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorFactory->id)]) ?>
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
