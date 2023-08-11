<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorFacility $vendorFacility
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Facility'), ['action' => 'edit', $vendorFacility->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Facility'), ['action' => 'delete', $vendorFacility->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorFacility->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Facilities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Facility'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorFacilities view content">
            <h3><?= h($vendorFacility->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $vendorFacility->has('vendor_temp') ? $this->Html->link($vendorFacility->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorFacility->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Lab Facility') ?></th>
                    <td><?= h($vendorFacility->lab_facility) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lab Facility File') ?></th>
                    <td><?= h($vendorFacility->lab_facility_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Isi Registration') ?></th>
                    <td><?= h($vendorFacility->isi_registration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Isi Registration File') ?></th>
                    <td><?= h($vendorFacility->isi_registration_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Test Facility') ?></th>
                    <td><?= h($vendorFacility->test_facility) ?></td>
                </tr>
                <tr>
                    <th><?= __('Test Facility File') ?></th>
                    <td><?= h($vendorFacility->test_facility_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sales Services') ?></th>
                    <td><?= h($vendorFacility->sales_services) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sales Services File') ?></th>
                    <td><?= h($vendorFacility->sales_services_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quality Control') ?></th>
                    <td><?= h($vendorFacility->quality_control) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quality Control File') ?></th>
                    <td><?= h($vendorFacility->quality_control_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorFacility->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorFacility->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorFacility->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
