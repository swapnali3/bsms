<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorQuestionnaire> $vendorQuestionnaires
 */
?>
<div class="vendorQuestionnaires index content">
    <?= $this->Html->link(__('New Vendor Questionnaire'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Questionnaires') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temp_id') ?></th>
                    <th><?= $this->Paginator->sort('question') ?></th>
                    <th><?= $this->Paginator->sort('answer') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorQuestionnaires as $vendorQuestionnaire): ?>
                <tr>
                    <td><?= $this->Number->format($vendorQuestionnaire->id) ?></td>
                    <td><?= $vendorQuestionnaire->has('vendor_temp') ? $this->Html->link($vendorQuestionnaire->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorQuestionnaire->vendor_temp->id]) : '' ?></td>
                    <td><?= h($vendorQuestionnaire->question) ?></td>
                    <td><?= h($vendorQuestionnaire->answer) ?></td>
                    <td><?= h($vendorQuestionnaire->added_date) ?></td>
                    <td><?= h($vendorQuestionnaire->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorQuestionnaire->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorQuestionnaire->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorQuestionnaire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorQuestionnaire->id)]) ?>
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
