<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dailymonitor $dailymonitor
 */
?>
<?= $this->Html->css('cstyle.css') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('v_index.css') ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Dailymonitor'), ['action' => 'edit', $dailymonitor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Dailymonitor'), ['action' => 'delete', $dailymonitor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dailymonitor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Dailymonitor'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Dailymonitor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dailymonitor view content">
            <h3><?= h($dailymonitor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($dailymonitor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vendor Id') ?></th>
                    <td><?= $dailymonitor->vendor_id === null ? '' : $this->Number->format($dailymonitor->vendor_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Productionline Id') ?></th>
                    <td><?= $dailymonitor->productionline_id === null ? '' : $this->Number->format($dailymonitor->productionline_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Production Plan') ?></th>
                    <td><?= $dailymonitor->target_production === null ? '' : $this->Number->format($dailymonitor->target_production) ?></td>
                </tr>
                <tr>
                    <th><?= __('Confirm Production') ?></th>
                    <td><?= $dailymonitor->confirm_production === null ? '' : $this->Number->format($dailymonitor->confirm_production) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $dailymonitor->status === null ? '' : $this->Number->format($dailymonitor->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($dailymonitor->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($dailymonitor->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
