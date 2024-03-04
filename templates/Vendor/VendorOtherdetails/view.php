<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorOtherdetail $vendorOtherdetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Otherdetail'), ['action' => 'edit', $vendorOtherdetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Otherdetail'), ['action' => 'delete', $vendorOtherdetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorOtherdetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Otherdetails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Otherdetail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorOtherdetails view content">
            <h3><?= h($vendorOtherdetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $vendorOtherdetail->has('vendor_temp') ? $this->Html->link($vendorOtherdetail->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorOtherdetail->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Six Sigma') ?></th>
                    <td><?= h($vendorOtherdetail->six_sigma) ?></td>
                </tr>
                <tr>
                    <th><?= __('Iso') ?></th>
                    <td><?= h($vendorOtherdetail->iso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Iso File') ?></th>
                    <td><?= h($vendorOtherdetail->iso_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Halal File') ?></th>
                    <td><?= h($vendorOtherdetail->halal_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Declaration File') ?></th>
                    <td><?= h($vendorOtherdetail->declaration_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fully Manufactured') ?></th>
                    <td><?= h($vendorOtherdetail->fully_manufactured) ?></td>
                </tr>
                <tr>
                    <th><?= __('Suppliers Name') ?></th>
                    <td><?= h($vendorOtherdetail->suppliers_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorOtherdetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorOtherdetail->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorOtherdetail->updated_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Six Sigma File') ?></th>
                    <td><?= $vendorOtherdetail->six_sigma_file ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
