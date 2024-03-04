<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorTurnover> $vendorTurnovers
 */
?>
<div class="vendorTurnovers index content">
    <?= $this->Html->link(__('New Vendor Turnover'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Turnovers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temp_id') ?></th>
                    <th><?= $this->Paginator->sort('first_year') ?></th>
                    <th><?= $this->Paginator->sort('first_year_turnonver') ?></th>
                    <th><?= $this->Paginator->sort('second_year') ?></th>
                    <th><?= $this->Paginator->sort('second_year_turnonver') ?></th>
                    <th><?= $this->Paginator->sort('third_year') ?></th>
                    <th><?= $this->Paginator->sort('third_year_turnonver') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorTurnovers as $vendorTurnover): ?>
                <tr>
                    <td><?= $this->Number->format($vendorTurnover->ID) ?></td>
                    <td><?= $vendorTurnover->has('vendor_temp') ? $this->Html->link($vendorTurnover->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorTurnover->vendor_temp->id]) : '' ?></td>
                    <td><?= h($vendorTurnover->first_year) ?></td>
                    <td><?= $vendorTurnover->first_year_turnonver === null ? '' : $this->Number->format($vendorTurnover->first_year_turnonver) ?></td>
                    <td><?= h($vendorTurnover->second_year) ?></td>
                    <td><?= $vendorTurnover->second_year_turnonver === null ? '' : $this->Number->format($vendorTurnover->second_year_turnonver) ?></td>
                    <td><?= h($vendorTurnover->third_year) ?></td>
                    <td><?= $vendorTurnover->third_year_turnonver === null ? '' : $this->Number->format($vendorTurnover->third_year_turnonver) ?></td>
                    <td><?= h($vendorTurnover->added_date) ?></td>
                    <td><?= h($vendorTurnover->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorTurnover->ID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorTurnover->ID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorTurnover->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorTurnover->ID)]) ?>
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
