<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\Cake\Collection\CollectionInterface $adminUsers
 */
?>
  <?= $this->Html->css('cstyle.css') ?>
  <?= $this->Html->css('table.css') ?>
  <?= $this->Html->css('listing.css') ?>
  <?= $this->Html->css('b_index.css') ?>
<div class="adminUsers index content">
    <?php if($user_type == 'sap') : ?>
    <a href="#" class="button float-right" data-toggle="modal" data-target="#exampleModal">Add New User</a>
    <?php else:?>
    <?= $this->Html->link(__('Add New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?php endif; ?>

    <h3><?= __($title) ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('last_login') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($adminUsers as $adminUser): ?>
                <tr>
                    <td><?= h($adminUser->first_name) ?></td>
                    <td><?= h($adminUser->last_name) ?></td>
                    <td><?= h($adminUser->username) ?></td>
                    <td><?= h($adminUser->has('group') ? $adminUser->group->name : '') ?></td>
                    <td><?= h($adminUser->status ? 'Active' :'Inactive') ?></td>
                    <td><?= h($adminUser->last_login) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $adminUser->id]) ?>
                        <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adminUser->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adminUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adminUser->id)]) ?>
                -->
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Onboard SAP User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Enter SAP username">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat">Go!</button>
                  </span>
                </div>
      </div>
      
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> --> 
      </div>
    </div>
  </div>
</div>