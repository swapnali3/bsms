<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp[]|\Cake\Collection\CollectionInterface $vendorTemps
 */
?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12 col-lg-10">
                <h1 style="color:navy;"><b>VENDOR LIST</b></h1>
            </div>
            <div class="col-sm-12 col-lg-2 pt-3">
                <h4><b>
                        <?= $this->Html->link(__('NEW VENDOR '), ['action' => 'add']) ?><i
                            class="fa fa-chevron-circle-right nav-icon" style="color: navy;"></i>
                    </b></h4>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="example1">
                <thead>
                    <tr>
                        <th>
                            <?= h('Status') ?>
                        </th>
                        <th class="actions">
                            <?= __('Actions') ?>
                        </th>
                        <th>
                            <?= h('Name') ?>
                        </th>
                        <th>
                            <?= h('City') ?>
                        </th>
                        <th>
                            <?= h('Pincode') ?>
                        </th>
                        <th>
                            <?= h('Mobile') ?>
                        </th>
                        <th>
                            <?= h('Email') ?>
                        </th>
                        <th>
                            <?= h('Contact Person') ?>
                        </th>
                        <th>
                            <?= h('Contact Email') ?>
                        </th>
                        <th>
                            <?= h('Contact Mobile') ?>
                        </th>
                        
                        <th>
                            <?= h('Added Date') ?>
                        </th>
                        <th>
                            <?= h('Updated Date') ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vendorTemps as $vendorTemp): 
                    
                    switch($vendorTemp->status) {
                        case 0 : $status = '<span class="badge bg-warning">Sent to Vendor</span>'; break;
                        case 1 : $status = '<span class="badge bg-info">Pending for approval</span>'; break;
                        case 2 : $status = '<span class="badge bg-info">Sent to SAP</span>'; break;
                        case 3 : $status = '<span class="badge bg-success">Approved</span>'; break;
                        case 4 : $status = '<span class="badge bg-danger">Rjected</span>'; break;
                    }
                    ?>
                    <tr>
                        <td>
                            <?= $status ?>
                        </td>
                        <td class="actions">
                            <a type="button" class="btn btn-default" href="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>">View</a>
                        </td>
                        <td>
                            <?= h($vendorTemp->name) ?>
                        </td>
                        <td>
                            <?= h($vendorTemp->city) ?>
                        </td>
                        <td>
                            <?= h($vendorTemp->pincode) ?>
                        </td>
                        <td>
                            <?= h($vendorTemp->mobile) ?>
                        </td>
                        <td>
                            <?= h($vendorTemp->email) ?>
                        </td>
                        <td>
                            <?= h($vendorTemp->contact_person) ?>
                        </td>
                        <td>
                            <?= h($vendorTemp->contact_email) ?>
                        </td>
                        <td>
                            <?= h($vendorTemp->contact_mobile) ?>
                        </td>
                        <td>
                            <?= h($vendorTemp->added_date) ?>
                        </td>
                        <td>
                            <?= h($vendorTemp->updated_date) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
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