<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SchemaGroup[]|\Cake\Collection\CollectionInterface $schemaGroups
 */
?>
<?= $this->Html->css('cstyle.css') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('b_index.css') ?>
<div class="schemaGroups index content">
    <?= $this->Html->link(__('New Schema Group'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Schema Groups') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schemaGroups as $schemaGroup): ?>
                <tr>
                    <td><?= $this->Number->format($schemaGroup->id) ?></td>
                    <td><?= h($schemaGroup->name) ?></td>
                    <td><?= $this->Number->format($schemaGroup->status) ?></td>
                    <td><?= h($schemaGroup->added_date) ?></td>
                    <td><?= h($schemaGroup->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $schemaGroup->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $schemaGroup->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $schemaGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schemaGroup->id)]) ?>
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
