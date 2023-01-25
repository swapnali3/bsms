<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp[]|\Cake\Collection\CollectionInterface $vendorTemps
 */
?>
<div class="vendorTemps index content card">
    

    <div class="card-header">
        <h3 class="card-title">Vendor List</h3>
        <?= $this->Html->link(__('New Vendor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    </div>
              
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="example1">
            <thead>
                <tr>
                    <th><?= h('Purchasing Organization') ?></th>
                    <th><?= h('Account Group') ?></th>
                    
                    <th><?= h('Name') ?></th>
                    
                    <th><?= h('City') ?></th>
                    <th><?= h('Pincode') ?></th>
                    <th><?= h('Mobile') ?></th>
                    <th><?= h('Email') ?></th>
                    
                    
                    <th><?= h('Contact Person') ?></th>
                    <th><?= h('Contact Email') ?></th>
                    <th><?= h('Contact Mobile') ?></th>
                    
                    <th><?= h('Status') ?></th>
                    <th><?= h('Added Date') ?></th>
                    <th><?= h('Updated Date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorTemps as $vendorTemp): 
                    
                    switch($vendorTemp->status) {
                        case 0 : $status = '<span class="badge bg-warning">Sent to Vendor</span>'; break;
                        case 1 : $status = '<span class="badge bg-info">Pending for approval</span>'; break;
                        case 2 : $status = '<span class="badge bg-success">Approved</span>'; break;
                    }
                    ?>
                <tr>
                    <td><?= $vendorTemp->has('purchasing_organization') ? $vendorTemp->purchasing_organization->name : '' ?></td>
                    <td><?= $vendorTemp->has('account_group') ? $vendorTemp->account_group->name : '' ?></td>
                    
                    <td><?= h($vendorTemp->name) ?></td>
                    
                    <td><?= h($vendorTemp->city) ?></td>
                    <td><?= h($vendorTemp->pincode) ?></td>
                    <td><?= h($vendorTemp->mobile) ?></td>
                    <td><?= h($vendorTemp->email) ?></td>
                    
                    
                    <td><?= h($vendorTemp->contact_person) ?></td>
                    <td><?= h($vendorTemp->contact_email) ?></td>
                    <td><?= h($vendorTemp->contact_mobile) ?></td>
                    
                    <td><?= $status ?></td>
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
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div> -->
</div>


<script>
    $(document).ready(function() { 
        $("#example1").DataTable({
            "responsive": false, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
     });
</script>