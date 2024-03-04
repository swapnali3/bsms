<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorFacility> $vendorFacilities
 */
?>
<div class="vendorFacilities index content">
    <?= $this->Html->link(__('New Vendor Facility'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendor Facilities') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vendor_temp_id') ?></th>
                    <th><?= $this->Paginator->sort('lab_facility') ?></th>
                    <th><?= $this->Paginator->sort('lab_facility_file') ?></th>
                    <th><?= $this->Paginator->sort('isi_registration') ?></th>
                    <th><?= $this->Paginator->sort('isi_registration_file') ?></th>
                    <th><?= $this->Paginator->sort('test_facility') ?></th>
                    <th><?= $this->Paginator->sort('test_facility_file') ?></th>
                    <th><?= $this->Paginator->sort('sales_services') ?></th>
                    <th><?= $this->Paginator->sort('sales_services_file') ?></th>
                    <th><?= $this->Paginator->sort('quality_control') ?></th>
                    <th><?= $this->Paginator->sort('quality_control_file') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorFacilities as $vendorFacility): ?>
                <tr>
                    <td><?= $this->Number->format($vendorFacility->id) ?></td>
                    <td><?= $vendorFacility->has('vendor_temp') ? $this->Html->link($vendorFacility->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorFacility->vendor_temp->id]) : '' ?></td>
                    <td><?= h($vendorFacility->lab_facility) ?></td>
                    <td><?= h($vendorFacility->lab_facility_file) ?></td>
                    <td><?= h($vendorFacility->isi_registration) ?></td>
                    <td><?= h($vendorFacility->isi_registration_file) ?></td>
                    <td><?= h($vendorFacility->test_facility) ?></td>
                    <td><?= h($vendorFacility->test_facility_file) ?></td>
                    <td><?= h($vendorFacility->sales_services) ?></td>
                    <td><?= h($vendorFacility->sales_services_file) ?></td>
                    <td><?= h($vendorFacility->quality_control) ?></td>
                    <td><?= h($vendorFacility->quality_control_file) ?></td>
                    <td><?= h($vendorFacility->added_date) ?></td>
                    <td><?= h($vendorFacility->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorFacility->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorFacility->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorFacility->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorFacility->id)]) ?>
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
