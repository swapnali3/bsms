<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp[]|\Cake\Collection\CollectionInterface $vendorTemps
 */
?>
<div class="card">
    <div class="card-header px-4 py-3">
        <div class="row">
            <div class="col-sm-12 col-lg-9">
                <h3 style="color:navy;" class="mb-0"><b>VENDOR LIST</b></h3>
            </div>
            <div class="col-sm-12 col-lg-3">
                <h4 class="float-right mb-0">
                    <b>
                        <a href="<?= $this->Url->build('/') ?>buyervendor-temps/add/"
                            style="color: navy;pointer:cursor;">
                            ADD VENDOR
                            <i class="material-icons opacity-10">add</i>
                        </a>
                    </b>
                </h4>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="card-body table table-hover" id="example1">
                <thead>
                    <tr>
                        <th>
                            <?= h('Status') ?>
                        </th>
                        <!-- <th class="actions"><?= __('Actions') ?></th> -->
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
                        case 4 : $status = '<span class="badge bg-danger">Rejected</span>'; break;
                    }
                    ?>
                    <tr redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>">
                        <td>
                            <?= $status ?>
                        </td>
                        <!-- <td class="actions"><a type="button" class="btn btn-default" href="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>">View</a></td> -->
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
            "responsive": false, "lengthChange": true, "autoWidth": true,
            'order': [[10, 'desc']],
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        $('#example1').on('click', 'tbody tr', function () {
            window.location = $(this).closest('tr').attr('redirect');
        });
        $('.row').attr('style','width:100vw;')
    });
</script>