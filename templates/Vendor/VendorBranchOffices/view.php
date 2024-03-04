<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorBranchOffice $vendorBranchOffice
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Branch Office'), ['action' => 'edit', $vendorBranchOffice->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Branch Office'), ['action' => 'delete', $vendorBranchOffice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorBranchOffice->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Branch Offices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Branch Office'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorBranchOffices view content">
            <h3><?= h($vendorBranchOffice->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $vendorBranchOffice->has('vendor_temp') ? $this->Html->link($vendorBranchOffice->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorBranchOffice->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($vendorBranchOffice->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address 2') ?></th>
                    <td><?= h($vendorBranchOffice->address_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pincode') ?></th>
                    <td><?= h($vendorBranchOffice->pincode) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($vendorBranchOffice->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($vendorBranchOffice->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($vendorBranchOffice->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telephone') ?></th>
                    <td><?= h($vendorBranchOffice->telephone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Registration Year') ?></th>
                    <td><?= h($vendorBranchOffice->registration_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Registration No') ?></th>
                    <td><?= h($vendorBranchOffice->registration_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Registration Certificate') ?></th>
                    <td><?= h($vendorBranchOffice->registration_certificate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorBranchOffice->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorBranchOffice->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorBranchOffice->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
