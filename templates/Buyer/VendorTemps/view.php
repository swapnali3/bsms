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


<div class="row">
    <div class="col-12">
        <div class="vendorTemps view content card">
            <div class="card-header">
                <h5>
                    <?= h($vendorTemp->name) ?>
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <table class="table">
                                <tr>
                                    <th>
                                        <?= __('Purchasing Organization') ?>
                                    </th>
                                    <td>
                                        <?= $vendorTemp->has('purchasing_organization') ? $vendorTemp->purchasing_organization->name : '' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Schema Group') ?>
                                    </th>
                                    <td>
                                        <?= $vendorTemp->has('schema_group') ? $vendorTemp->schema_group->name : '' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Address') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->address) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Pincode') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->pincode) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Email Id') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->email) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Order Currency') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->order_currency) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Pan No') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->pan_no) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Contact Email Id') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->contact_email) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Cin No') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->cin_no) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Added Date') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->added_date) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Status') ?>
                                    </th>
                                    <td>
                                        <?= $status ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <table class="table">
                                <tr>
                                    <th>
                                        <?= __('Account Group') ?>
                                    </th>
                                    <td>
                                        <?= $vendorTemp->has('account_group') ? $vendorTemp->account_group->name : '' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Name') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->name) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('City') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->city) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Mobile') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->mobile) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Country') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->country) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Gst No') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->gst_no) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Contact Person') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->contact_person) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Contact Mobile') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->contact_mobile) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Tan No') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->tan_no) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Payment Term') ?>
                                    </th>
                                    <td>
                                        <?= $this->Text->autoParagraph(h($vendorTemp->payment_term)); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Updated Date') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->updated_date) ?>
                                    </td>
                                </tr>

                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text">
                <?php if($vendorTemp->status == 1) : ?>
                    <?= $this->Html->link(__('Approve'), ['action' => 'approve-vendor', $vendorTemp->id, 'app'], ['class' => 'btn btn-success' ]) ?>
                    <?= $this->Html->link(__('Reject'), '#', ['class' => 'btn btn-danger reject', 'data-toggle'=> "modal", 'data-target' => "#remarkModal"]) ?>
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