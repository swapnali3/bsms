<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorMaterial> $vendorMaterial
 */
?>
<div class="vendorMaterial index content">
    <?= $this->Html->link(__('New Vendor Material'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Material') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('material_code') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('buyer_material_code') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorMaterial as $vendorMaterial): ?>
                <tr>
                    <td><?= $this->Number->format($vendorMaterial->id) ?></td>
                    <td><?= h($vendorMaterial->material_code) ?></td>
                    <td><?= h($vendorMaterial->description) ?></td>
                    <td><?= h($vendorMaterial->buyer_material_code) ?></td>
                    <td><?= h($vendorMaterial->status) ?></td>
                    <td><?= h($vendorMaterial->added_date) ?></td>
                    <td><?= h($vendorMaterial->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorMaterial->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorMaterial->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorMaterial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorMaterial->id)]) ?>
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
