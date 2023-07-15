<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorMaterial $vendorMaterial
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Material'), ['action' => 'edit', $vendorMaterial->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Material'), ['action' => 'delete', $vendorMaterial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorMaterial->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Material'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Material'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorMaterial view content">
            <h3><?= h($vendorMaterial->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Material Code') ?></th>
                    <td><?= h($vendorMaterial->material_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($vendorMaterial->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Buyer Material Code') ?></th>
                    <td><?= h($vendorMaterial->buyer_material_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorMaterial->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorMaterial->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorMaterial->updated_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $vendorMaterial->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
