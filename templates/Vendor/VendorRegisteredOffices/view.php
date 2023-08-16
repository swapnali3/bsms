<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorRegisteredOffice $vendorRegisteredOffice
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Registered Office'), ['action' => 'edit', $vendorRegisteredOffice->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Registered Office'), ['action' => 'delete', $vendorRegisteredOffice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorRegisteredOffice->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Registered Offices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Registered Office'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorRegisteredOffices view content">
            <h3><?= h($vendorRegisteredOffice->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $vendorRegisteredOffice->has('vendor_temp') ? $this->Html->link($vendorRegisteredOffice->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorRegisteredOffice->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($vendorRegisteredOffice->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address 2') ?></th>
                    <td><?= h($vendorRegisteredOffice->address_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pincode') ?></th>
                    <td><?= h($vendorRegisteredOffice->pincode) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($vendorRegisteredOffice->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($vendorRegisteredOffice->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($vendorRegisteredOffice->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telephone') ?></th>
                    <td><?= h($vendorRegisteredOffice->telephone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorRegisteredOffice->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorRegisteredOffice->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorRegisteredOffice->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
