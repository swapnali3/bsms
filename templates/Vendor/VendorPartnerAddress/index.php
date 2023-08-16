<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorPartnerAddres> $vendorPartnerAddress
 */
?>
<div class="vendorPartnerAddress index content">
    <?= $this->Html->link(__('New Vendor Partner Addres'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Partner Address') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temp_id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('address_2') ?></th>
                    <th><?= $this->Paginator->sort('pincode') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('country') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('telephone') ?></th>
                    <th><?= $this->Paginator->sort('fax_no') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorPartnerAddress as $vendorPartnerAddres): ?>
                <tr>
                    <td><?= $this->Number->format($vendorPartnerAddres->id) ?></td>
                    <td><?= $vendorPartnerAddres->has('vendor_temp') ? $this->Html->link($vendorPartnerAddres->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorPartnerAddres->vendor_temp->id]) : '' ?></td>
                    <td><?= h($vendorPartnerAddres->type) ?></td>
                    <td><?= h($vendorPartnerAddres->name) ?></td>
                    <td><?= h($vendorPartnerAddres->address) ?></td>
                    <td><?= h($vendorPartnerAddres->address_2) ?></td>
                    <td><?= h($vendorPartnerAddres->pincode) ?></td>
                    <td><?= h($vendorPartnerAddres->city) ?></td>
                    <td><?= h($vendorPartnerAddres->country) ?></td>
                    <td><?= h($vendorPartnerAddres->state) ?></td>
                    <td><?= h($vendorPartnerAddres->telephone) ?></td>
                    <td><?= h($vendorPartnerAddres->fax_no) ?></td>
                    <td><?= h($vendorPartnerAddres->added_date) ?></td>
                    <td><?= h($vendorPartnerAddres->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorPartnerAddres->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorPartnerAddres->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorPartnerAddres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorPartnerAddres->id)]) ?>
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
