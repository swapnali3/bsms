<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorIncometax $vendorIncometax
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Incometax'), ['action' => 'edit', $vendorIncometax->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Incometax'), ['action' => 'delete', $vendorIncometax->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorIncometax->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Incometaxes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Incometax'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorIncometaxes view content">
            <h3><?= h($vendorIncometax->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $vendorIncometax->has('vendor_temp') ? $this->Html->link($vendorIncometax->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorIncometax->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Certificate No') ?></th>
                    <td><?= h($vendorIncometax->certificate_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Certificate File') ?></th>
                    <td><?= h($vendorIncometax->certificate_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Balance Sheet File') ?></th>
                    <td><?= h($vendorIncometax->balance_sheet_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorIncometax->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Certificate Date') ?></th>
                    <td><?= h($vendorIncometax->certificate_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorIncometax->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorIncometax->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
