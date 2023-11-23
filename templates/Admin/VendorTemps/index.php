<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp[]|\Cake\Collection\CollectionInterface $vendorTemps
 */
?>

<?= $this->Html->css('custom') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('b_index.css') ?>
<?= $this->Html->css('b_vendortemps_index') ?>
<?= $this->Html->css('admincss') ?>

<div class="vendorTemps index content">
    <?= $this->Html->link(__('New Vendor'), ['action' => 'add'], ['class' => 'new_vendor_btn button float-right']) ?>
    <h3><?= __('Vendors') ?></h3>
    <div class="table-responsive">
        <table class="table table-hover table-responsive dataTable no-footer" id="tb_pg">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('purchasing_organization_id') ?></th>
                    <th><?= $this->Paginator->sort('account_group_id') ?></th>
                    <th><?= $this->Paginator->sort('schema_group_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('pincode') ?></th>
                    <th><?= $this->Paginator->sort('mobile') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('country') ?></th>
                    <th><?= $this->Paginator->sort('order_currency') ?></th>
                    <th><?= $this->Paginator->sort('gst_no') ?></th>
                    <th><?= $this->Paginator->sort('pan_no') ?></th>
                    <th><?= $this->Paginator->sort('contact_person') ?></th>
                    <th><?= $this->Paginator->sort('contact_email') ?></th>
                    <th><?= $this->Paginator->sort('contact_mobile') ?></th>
                    <th><?= $this->Paginator->sort('cin_no') ?></th>
                    <th><?= $this->Paginator->sort('tan_no') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorTemps as $vendorTemp): 
                    
                    switch($vendorTemp->status) {
                        case 0 : $status = 'Sent to Vendor'; break;
                        case 1 : $status = 'Pending for approval'; break;
                        case 2 : $status = 'approved'; break;
                    }
                    ?>
                <tr>
                    <td><?= $this->Number->format($vendorTemp->id) ?></td>
                    <td><?= $vendorTemp->has('purchasing_organization') ? $this->Html->link($vendorTemp->purchasing_organization->name, ['controller' => 'PurchasingOrganizations', 'action' => 'view', $vendorTemp->purchasing_organization->id]) : '' ?></td>
                    <td><?= $vendorTemp->has('account_group') ? $this->Html->link($vendorTemp->account_group->name, ['controller' => 'AccountGroups', 'action' => 'view', $vendorTemp->account_group->id]) : '' ?></td>
                    <td><?= $vendorTemp->has('schema_group') ? $this->Html->link($vendorTemp->schema_group->name, ['controller' => 'SchemaGroups', 'action' => 'view', $vendorTemp->schema_group->id]) : '' ?></td>
                    <td><?= h($vendorTemp->name) ?></td>
                    <td><?= h($vendorTemp->address) ?></td>
                    <td><?= h($vendorTemp->city) ?></td>
                    <td><?= h($vendorTemp->pincode) ?></td>
                    <td><?= h($vendorTemp->mobile) ?></td>
                    <td><?= h($vendorTemp->email) ?></td>
                    <td><?= h($vendorTemp->country) ?></td>
                    <td><?= h($vendorTemp->order_currency) ?></td>
                    <td><?= h($vendorTemp->gst_no) ?></td>
                    <td><?= h($vendorTemp->pan_no) ?></td>
                    <td><?= h($vendorTemp->contact_person) ?></td>
                    <td><?= h($vendorTemp->contact_email) ?></td>
                    <td><?= h($vendorTemp->contact_mobile) ?></td>
                    <td><?= h($vendorTemp->cin_no) ?></td>
                    <td><?= h($vendorTemp->tan_no) ?></td>
                    <td><?= h($status) ?></td>
                    <td><?= h($vendorTemp->added_date) ?></td>
                    <td><?= h($vendorTemp->updated_date) ?></td>
                    <td class="actions">
                    <?php if($vendorTemp->status == 1) : ?>
                            <?= $this->Html->link(__('Approve'), ['action' => 'approve-vendor', $vendorTemp->id, 'app']) ?>
                    <?php endif; ?>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendorTemp->id]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="paginator">
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        
    </div> -->
</div>



<script>
    $(document).ready(function () {
    $("#tb_pg").DataTable({
        pagination: true,
        searching: false,
        lengthChange: false
    });
});
</script>