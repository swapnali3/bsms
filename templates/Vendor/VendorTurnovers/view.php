<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTurnover $vendorTurnover
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Turnover'), ['action' => 'edit', $vendorTurnover->ID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Turnover'), ['action' => 'delete', $vendorTurnover->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorTurnover->ID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Turnovers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Turnover'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorTurnovers view content">
            <h3><?= h($vendorTurnover->ID) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $vendorTurnover->has('vendor_temp') ? $this->Html->link($vendorTurnover->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorTurnover->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('First Year') ?></th>
                    <td><?= h($vendorTurnover->first_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Second Year') ?></th>
                    <td><?= h($vendorTurnover->second_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Third Year') ?></th>
                    <td><?= h($vendorTurnover->third_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($vendorTurnover->ID) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Year Turnonver') ?></th>
                    <td><?= $vendorTurnover->first_year_turnonver === null ? '' : $this->Number->format($vendorTurnover->first_year_turnonver) ?></td>
                </tr>
                <tr>
                    <th><?= __('Second Year Turnonver') ?></th>
                    <td><?= $vendorTurnover->second_year_turnonver === null ? '' : $this->Number->format($vendorTurnover->second_year_turnonver) ?></td>
                </tr>
                <tr>
                    <th><?= __('Third Year Turnonver') ?></th>
                    <td><?= $vendorTurnover->third_year_turnonver === null ? '' : $this->Number->format($vendorTurnover->third_year_turnonver) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorTurnover->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorTurnover->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
