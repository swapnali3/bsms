<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp[]|\Cake\Collection\CollectionInterface $vendorTemps
 */

?>
<?= $this->Html->css('custom') ?>
<style>
    .table-responsive::-webkit-scrollbar {
    height: 10px;
    width: 10px;
  }
   
  .table-responsive::-webkit-scrollbar-thumb {
    background: #BEBEFF;
    border-radius: 20px;
  }
  
  .table-responsive::-webkit-scrollbar-track {
    background: #ddd;
    border-radius: 20px;
  }

</style>

<?php $createvendactive = ($controller == 'VendorTemps' && $action == 'add') ? 'active' : ''; ?>
<?php $creatsaevendactive = ($controller == 'VendorTemps' && $action == 'sapAdd') ? 'active' : ''; ?>

    <div class="card-body vendor-list">
        <div class="row">
            <div class="col-md-12 text-right">
               <div class="btn-adding">
               <a href="<?= $this->Url->build('/') ?>buyervendor-temps/add"><button type="button" class="btn btn-custom-2 ">Add Vendor</button></a>
              <a href="<?= $this->Url->build('/') ?>buyervendor-temps/sap-add"> <button type="button" class="btn btn-custom-2 ">Add SAP Vendor</button></a>
               </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover" id="example1">
                <thead>
                    <tr>
                        <th>
                            <?= h('Status') ?>
                        </th>
                        <!-- <th class="actions"><?= __('Actions') ?></th> -->
                        <th>
                            <?= h('SAP Vendor Code') ?>
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
                        case 4 : $status = '<span class="badge bg-danger">Rejected</span>'; break;
                    }
                    ?>
                    <tr redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>">
                        <td>
                            <?= $status ?>
                        </td>
                        <!-- <td class="actions"><a type="button" class="btn btn-default" href="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>">View</a></td> -->
                        <td>
                            <?= h($vendorTemp->sap_vendor_code) ?>
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
        setTimeout(function () {
            $('.success').fadeOut('slow');
        }, 2000); // <-- time in milliseconds
        $("#example1").DataTable({
            "responsive": false, "lengthChange": false, "autoWidth": true,
            "ordering":false,
            'order': [[10, 'desc']],
            language: {
          search: "_INPUT_",
        searchPlaceholder: "Search..."
    },
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        $('#example1').on('click', 'tbody tr', function () {
            window.location = $(this).closest('tr').attr('redirect');
        });
        // $('.row').attr('style','width:110vw;')
        
    });
</script>