<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorSmallScale> $vendorSmallScales
 */
?>
<div class="vendorSmallScales index content">
    <?= $this->Html->link(__('New Vendor Small Scale'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Small Scales') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temp_id') ?></th>
                    <th><?= $this->Paginator->sort('year') ?></th>
                    <th><?= $this->Paginator->sort('registration_no') ?></th>
                    <th><?= $this->Paginator->sort('certificate_file') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorSmallScales as $vendorSmallScale): ?>
                <tr>
                    <td><?= $this->Number->format($vendorSmallScale->id) ?></td>
                    <td><?= $vendorSmallScale->has('vendor_temp') ? $this->Html->link($vendorSmallScale->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorSmallScale->vendor_temp->id]) : '' ?></td>
                    <td><?= $vendorSmallScale->year === null ? '' : $this->Number->format($vendorSmallScale->year) ?></td>
                    <td><?= h($vendorSmallScale->registration_no) ?></td>
                    <td><?= h($vendorSmallScale->certificate_file) ?></td>
                    <td><?= h($vendorSmallScale->added_date) ?></td>
                    <td><?= h($vendorSmallScale->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorSmallScale->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorSmallScale->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorSmallScale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorSmallScale->id)]) ?>
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
