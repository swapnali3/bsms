<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Productionline $productionline
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Productionline'), ['action' => 'edit', $productionline->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Productionline'), ['action' => 'delete', $productionline->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productionline->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Productionline'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Productionline'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productionline view content">
            <h3><?= h($productionline->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Prdline Description') ?></th>
                    <td><?= h($productionline->prdline_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productionline->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vendor Id') ?></th>
                    <td><?= $this->Number->format($productionline->vendor_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vendormaterial Id') ?></th>
                    <td><?= $this->Number->format($productionline->vendormaterial_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prdline Capacity') ?></th>
                    <td><?= $this->Number->format($productionline->prdline_capacity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $productionline->status === null ? '' : $this->Number->format($productionline->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($productionline->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($productionline->updated_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Dailymonitor') ?></h4>
                <?php if (!empty($productionline->dailymonitor)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Vendor Id') ?></th>
                            <th><?= __('Productionline Id') ?></th>
                            <th><?= __('Target Production') ?></th>
                            <th><?= __('Confirm Production') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Added Date') ?></th>
                            <th><?= __('Updated Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($productionline->dailymonitor as $dailymonitor) : ?>
                        <tr>
                            <td><?= h($dailymonitor->id) ?></td>
                            <td><?= h($dailymonitor->vendor_id) ?></td>
                            <td><?= h($dailymonitor->productionline_id) ?></td>
                            <td><?= h($dailymonitor->target_production) ?></td>
                            <td><?= h($dailymonitor->confirm_production) ?></td>
                            <td><?= h($dailymonitor->status) ?></td>
                            <td><?= h($dailymonitor->added_date) ?></td>
                            <td><?= h($dailymonitor->updated_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Dailymonitor', 'action' => 'view', $dailymonitor->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Dailymonitor', 'action' => 'edit', $dailymonitor->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Dailymonitor', 'action' => 'delete', $dailymonitor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dailymonitor->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
