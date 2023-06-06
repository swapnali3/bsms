<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UsersPermission> $usersPermissions
 */
?>
<div class="usersPermissions index content">
    <?= $this->Html->link(__('New Users Permission'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users Permissions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('permissionsName') ?></th>
                    <th><?= $this->Paginator->sort('permissionsLevel') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usersPermissions as $usersPermission): ?>
                <tr>
                    <td><?= $this->Number->format($usersPermission->id) ?></td>
                    <td><?= h($usersPermission->permissionsName) ?></td>
                    <td><?= h($usersPermission->permissionsLevel) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usersPermission->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersPermission->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersPermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersPermission->id)]) ?>
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
