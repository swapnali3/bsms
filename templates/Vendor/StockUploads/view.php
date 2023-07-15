<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stockupload $stockupload
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Stockupload'), ['action' => 'edit', $stockupload->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Stockupload'), ['action' => 'delete', $stockupload->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockupload->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Stockupload'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Stockupload'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stockupload view content">
            <h3><?= h($stockupload->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($stockupload->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Opening Stock') ?></th>
                    <td><?= $this->Number->format($stockupload->opening_stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vendor Material Id') ?></th>
                    <td><?= $this->Number->format($stockupload->vendor_material_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vendor Id') ?></th>
                    <td><?= $this->Number->format($stockupload->vendor_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($stockupload->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($stockupload->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
