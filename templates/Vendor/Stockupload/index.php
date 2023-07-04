<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Stockupload> $stockupload
 */
?>
<div class="stockupload index content">
    <?= $this->Html->link(__('New Stockupload'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Stockupload') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('opening_stock') ?></th>
                    <th><?= $this->Paginator->sort('vendor_material_id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_id') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stockupload as $stockupload): ?>
                <tr>
                    <td><?= $this->Number->format($stockupload->id) ?></td>
                    <td><?= $this->Number->format($stockupload->opening_stock) ?></td>
                    <td><?= $this->Number->format($stockupload->vendor_material_id) ?></td>
                    <td><?= $this->Number->format($stockupload->vendor_id) ?></td>
                    <td><?= h($stockupload->added_date) ?></td>
                    <td><?= h($stockupload->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $stockupload->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stockupload->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stockupload->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockupload->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
