<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorReputedCustomer> $vendorReputedCustomers
 */
?>
<div class="vendorReputedCustomers index content">
    <?= $this->Html->link(__('New Vendor Reputed Customer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Reputed Customers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temp_id') ?></th>
                    <th><?= $this->Paginator->sort('customer_name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('pincode') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('country') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('telephone') ?></th>
                    <th><?= $this->Paginator->sort('fax_no') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorReputedCustomers as $vendorReputedCustomer): ?>
                <tr>
                    <td><?= $this->Number->format($vendorReputedCustomer->id) ?></td>
                    <td><?= $vendorReputedCustomer->has('vendor_temp') ? $this->Html->link($vendorReputedCustomer->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorReputedCustomer->vendor_temp->id]) : '' ?></td>
                    <td><?= h($vendorReputedCustomer->customer_name) ?></td>
                    <td><?= h($vendorReputedCustomer->address) ?></td>
                    <td><?= h($vendorReputedCustomer->pincode) ?></td>
                    <td><?= h($vendorReputedCustomer->city) ?></td>
                    <td><?= h($vendorReputedCustomer->country) ?></td>
                    <td><?= h($vendorReputedCustomer->state) ?></td>
                    <td><?= h($vendorReputedCustomer->telephone) ?></td>
                    <td><?= h($vendorReputedCustomer->fax_no) ?></td>
                    <td><?= h($vendorReputedCustomer->added_date) ?></td>
                    <td><?= h($vendorReputedCustomer->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorReputedCustomer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorReputedCustomer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorReputedCustomer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorReputedCustomer->id)]) ?>
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
