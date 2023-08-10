<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorSmallScale $vendorSmallScale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Small Scale'), ['action' => 'edit', $vendorSmallScale->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Small Scale'), ['action' => 'delete', $vendorSmallScale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorSmallScale->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Small Scales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Small Scale'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorSmallScales view content">
            <h3><?= h($vendorSmallScale->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $vendorSmallScale->has('vendor_temp') ? $this->Html->link($vendorSmallScale->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorSmallScale->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Registration No') ?></th>
                    <td><?= h($vendorSmallScale->registration_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Certificate File') ?></th>
                    <td><?= h($vendorSmallScale->certificate_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorSmallScale->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= $vendorSmallScale->year === null ? '' : $this->Number->format($vendorSmallScale->year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorSmallScale->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorSmallScale->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
