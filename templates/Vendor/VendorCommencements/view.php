<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorCommencement $vendorCommencement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Commencement'), ['action' => 'edit', $vendorCommencement->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Commencement'), ['action' => 'delete', $vendorCommencement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorCommencement->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Commencements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Commencement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorCommencements view content">
            <h3><?= h($vendorCommencement->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Factory') ?></th>
                    <td><?= $vendorCommencement->has('vendor_factory') ? $this->Html->link($vendorCommencement->vendor_factory->id, ['controller' => 'VendorFactories', 'action' => 'view', $vendorCommencement->vendor_factory->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $vendorCommencement->has('vendor_temp') ? $this->Html->link($vendorCommencement->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorCommencement->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Commencement Year') ?></th>
                    <td><?= h($vendorCommencement->commencement_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Commencement Material') ?></th>
                    <td><?= h($vendorCommencement->commencement_material) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Year Qty') ?></th>
                    <td><?= h($vendorCommencement->first_year_qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Second Year Qty') ?></th>
                    <td><?= h($vendorCommencement->second_year_qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Third Year Qty') ?></th>
                    <td><?= h($vendorCommencement->third_year_qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorCommencement->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Year') ?></th>
                    <td><?= $vendorCommencement->first_year === null ? '' : $this->Number->format($vendorCommencement->first_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Second Year') ?></th>
                    <td><?= $vendorCommencement->second_year === null ? '' : $this->Number->format($vendorCommencement->second_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Third Year') ?></th>
                    <td><?= $vendorCommencement->third_year === null ? '' : $this->Number->format($vendorCommencement->third_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorCommencement->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorCommencement->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
