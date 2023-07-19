<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LineMaster $lineMaster
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Line Master'), ['action' => 'edit', $lineMaster->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Line Master'), ['action' => 'delete', $lineMaster->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lineMaster->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Line Masters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Line Master'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lineMasters view content">
            <h3><?= h($lineMaster->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sap Vendor Code') ?></th>
                    <td><?= h($lineMaster->sap_vendor_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Uom') ?></th>
                    <td><?= h($lineMaster->uom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lineMaster->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= $this->Number->format($lineMaster->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Capacity') ?></th>
                    <td><?= $this->Number->format($lineMaster->capacity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($lineMaster->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($lineMaster->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($lineMaster->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
