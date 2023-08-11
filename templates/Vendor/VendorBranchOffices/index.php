<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorBranchOffice> $vendorBranchOffices
 */
?>
<div class="vendorBranchOffices index content">
    <?= $this->Html->link(__('New Vendor Branch Office'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Branch Offices') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temp_id') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('address_2') ?></th>
                    <th><?= $this->Paginator->sort('pincode') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('country') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('telephone') ?></th>
                    <th><?= $this->Paginator->sort('registration_year') ?></th>
                    <th><?= $this->Paginator->sort('registration_no') ?></th>
                    <th><?= $this->Paginator->sort('registration_certificate') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorBranchOffices as $vendorBranchOffice): ?>
                <tr>
                    <td><?= $this->Number->format($vendorBranchOffice->id) ?></td>
                    <td><?= $vendorBranchOffice->has('vendor_temp') ? $this->Html->link($vendorBranchOffice->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorBranchOffice->vendor_temp->id]) : '' ?></td>
                    <td><?= h($vendorBranchOffice->address) ?></td>
                    <td><?= h($vendorBranchOffice->address_2) ?></td>
                    <td><?= h($vendorBranchOffice->pincode) ?></td>
                    <td><?= h($vendorBranchOffice->city) ?></td>
                    <td><?= h($vendorBranchOffice->country) ?></td>
                    <td><?= h($vendorBranchOffice->state) ?></td>
                    <td><?= h($vendorBranchOffice->telephone) ?></td>
                    <td><?= h($vendorBranchOffice->registration_year) ?></td>
                    <td><?= h($vendorBranchOffice->registration_no) ?></td>
                    <td><?= h($vendorBranchOffice->registration_certificate) ?></td>
                    <td><?= h($vendorBranchOffice->added_date) ?></td>
                    <td><?= h($vendorBranchOffice->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorBranchOffice->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorBranchOffice->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorBranchOffice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorBranchOffice->id)]) ?>
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
