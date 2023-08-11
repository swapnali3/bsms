<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorReputedCustomer $vendorReputedCustomer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Reputed Customer'), ['action' => 'edit', $vendorReputedCustomer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Reputed Customer'), ['action' => 'delete', $vendorReputedCustomer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorReputedCustomer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Reputed Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Reputed Customer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorReputedCustomers view content">
            <h3><?= h($vendorReputedCustomer->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $vendorReputedCustomer->has('vendor_temp') ? $this->Html->link($vendorReputedCustomer->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorReputedCustomer->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Name') ?></th>
                    <td><?= h($vendorReputedCustomer->customer_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($vendorReputedCustomer->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pincode') ?></th>
                    <td><?= h($vendorReputedCustomer->pincode) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($vendorReputedCustomer->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($vendorReputedCustomer->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($vendorReputedCustomer->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telephone') ?></th>
                    <td><?= h($vendorReputedCustomer->telephone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fax No') ?></th>
                    <td><?= h($vendorReputedCustomer->fax_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorReputedCustomer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorReputedCustomer->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorReputedCustomer->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
