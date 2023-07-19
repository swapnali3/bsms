<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\LineMaster> $lineMasters
 */
?>
<div class="lineMasters index content">
    <?= $this->Html->link(__('New Line Master'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Line Masters') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('sap_vendor_code') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('uom') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lineMasters as $lineMaster): ?>
                <tr>
                    <td><?= $this->Number->format($lineMaster->id) ?></td>
                    <td><?= h($lineMaster->sap_vendor_code) ?></td>
                    <td><?= $this->Number->format($lineMaster->name) ?></td>
                    <td><?= h($lineMaster->uom) ?></td>
                    <td><?= $this->Number->format($lineMaster->status) ?></td>
                    <td><?= h($lineMaster->added_date) ?></td>
                    <td><?= h($lineMaster->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lineMaster->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lineMaster->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lineMaster->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lineMaster->id)]) ?>
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
