<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 */


 switch($vendorTemp->status) {
    case 0 : $status = '<span class="badge bg-warning">Sent to Vendor</span>'; break;
    case 1 : $status = '<span class="badge bg-info">Pending for approval</span>'; break;
    case 2 : $status = '<span class="badge bg-info">Sent to SAP</span>'; break;
    case 3 : $status = '<span class="badge bg-success">Approved</span>'; break;
    case 4 : $status = '<span class="badge bg-danger">Rejected</span>'; break;

}

?>
<style>
    .table td, .table th{
        padding:0.2rem
    }
        
    
</style>


<div class="row">
    <div class="col-12">
        <div class="vendorTemps view content card">
            <div class="card-header">
                <h5><b>
                    <?= h($vendorTemp->name) ?></b>
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <table class="table" style="font-size: 0.8rem;">
                                <tr>
                                    <td>
                                        <?= __('SAP Vendor Code') ?>
                                    </td>
                                    <th>
                                        <?= !empty($vendorTemp->sap_vendor_code) ?  $vendorTemp->sap_vendor_code : '' ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Purchasing Organization') ?>
                                    </td>
                                    <th>
                                        <?= $vendorTemp->has('purchasing_organization') ? $vendorTemp->purchasing_organization->name : '' ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Schema Group') ?>
                                    </td>
                                    <th>
                                        <?= $vendorTemp->has('schema_group') ? $vendorTemp->schema_group->name : '' ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Address') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->address) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Pincode') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->pincode) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Email Id') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->email) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Order Currency') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->order_currency) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Pan No') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->pan_no) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Contact Email Id') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->contact_email) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Cin No') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->cin_no) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Added Date') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->added_date) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Status') ?>
                                    </td>
                                    <th>
                                        <?= $status ?>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <table class="table" style="font-size: 0.8rem;">
                                <tr>
                                    <td>
                                        <?= __('Account Group') ?>
                                    </td>
                                    <th>
                                        <?= $vendorTemp->has('account_group') ? $vendorTemp->account_group->name : '' ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Name') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->name) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('City') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->city) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Mobile') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->mobile) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Country') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->country) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Gst No') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->gst_no) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Contact Person') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->contact_person) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Contact Mobile') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->contact_mobile) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Tan No') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->tan_no) ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Payment Term') ?>
                                    </td>
                                    <th>
                                        <?= $this->Text->autoParagraph(h($vendorTemp->payment_term)); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?= __('Updated Date') ?>
                                    </td>
                                    <th>
                                        <?= h($vendorTemp->updated_date) ?>
                                    </th>
                                </tr>

                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text">
                <?php if($vendorTemp->status == 1) : ?>
                    <?= $this->Html->link(__('Approve'), ['action' => 'approve-vendor', $vendorTemp->id, 'app'], ['class' => 'btn btn-default' ]) ?>
                    <?= $this->Html->link(__('Reject'), '#', ['class' => 'btn btn-default reject', 'data-toggle'=> "modal", 'data-target' => "#remarkModal"]) ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Reject remarks-->
<div class="modal fade" id="remarkModal" tabindex="-1" role="dialog" aria-labelledby="remarkModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <?= $this->Form->create(null, ['id' => 'rejectRemarks',  'url' => ['action' => 'approve-vendor', $vendorTemp->id, 'rej']]) ?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rejection Remark</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
            echo $this->Form->control('remarks', ['label' => false, 'type' => 'textarea', 'class' => 'form-control rounded-0','div' => 'form-group']);  
            
        ?>
      </div>
      <div id="error_msg"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Reject</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
    $(document).ready(function () {
        $(".reject").onClick( function () {
                
        }); 
    });
</script>