<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorCommencement> $vendorCommencements
 */
?>
<div class="vendorCommencements index content">
    <?= $this->Html->link(__('New Vendor Commencement'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Commencements') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_factory_id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temp_id') ?></th>
                    <th><?= $this->Paginator->sort('commencement_year') ?></th>
                    <th><?= $this->Paginator->sort('commencement_material') ?></th>
                    <th><?= $this->Paginator->sort('first_year') ?></th>
                    <th><?= $this->Paginator->sort('first_year_qty') ?></th>
                    <th><?= $this->Paginator->sort('second_year') ?></th>
                    <th><?= $this->Paginator->sort('second_year_qty') ?></th>
                    <th><?= $this->Paginator->sort('third_year') ?></th>
                    <th><?= $this->Paginator->sort('third_year_qty') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorCommencements as $vendorCommencement): ?>
                <tr>
                    <td><?= $this->Number->format($vendorCommencement->id) ?></td>
                    <td><?= $vendorCommencement->has('vendor_factory') ? $this->Html->link($vendorCommencement->vendor_factory->id, ['controller' => 'VendorFactories', 'action' => 'view', $vendorCommencement->vendor_factory->id]) : '' ?></td>
                    <td><?= $vendorCommencement->has('vendor_temp') ? $this->Html->link($vendorCommencement->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorCommencement->vendor_temp->id]) : '' ?></td>
                    <td><?= h($vendorCommencement->commencement_year) ?></td>
                    <td><?= h($vendorCommencement->commencement_material) ?></td>
                    <td><?= $vendorCommencement->first_year === null ? '' : $this->Number->format($vendorCommencement->first_year) ?></td>
                    <td><?= h($vendorCommencement->first_year_qty) ?></td>
                    <td><?= $vendorCommencement->second_year === null ? '' : $this->Number->format($vendorCommencement->second_year) ?></td>
                    <td><?= h($vendorCommencement->second_year_qty) ?></td>
                    <td><?= $vendorCommencement->third_year === null ? '' : $this->Number->format($vendorCommencement->third_year) ?></td>
                    <td><?= h($vendorCommencement->third_year_qty) ?></td>
                    <td><?= h($vendorCommencement->added_date) ?></td>
                    <td><?= h($vendorCommencement->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorCommencement->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorCommencement->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorCommencement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorCommencement->id)]) ?>
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
