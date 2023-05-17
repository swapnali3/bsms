<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 */


switch ($vendorTemp->status) {
    case 0:
        $status = '<span class="badge bg-warning">Sent to Vendor</span>';
        break;
    case 1:
        $status = '<span class="badge bg-info">Pending for approval</span>';
        break;
    case 2:
        $status = '<span class="badge bg-info">Sent to SAP</span>';
        break;
    case 3:
        $status = '<span class="badge bg-success">Approved</span>';
        break;
    case 4:
        $status = '<span class="badge bg-danger">Rejected</span>';
        break;

}

?>
<?= $this->Html->css('vendorCustom') ?>

<div class="profile-page pb-4 pl-2">
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="height:100%">
                <div class="left-s">
                    <!-- <div class="head">
                <h5 class="text-uppercase text-info">Personal Details</h5>
            </div> -->
                    <div class="prof-img text-center">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="desc">
                        <ul>
                            <li>
                                <p>Name : <b> <?= h($vendorTemp->name) ?></b></p>
                            </li>
                            <li>
                                <p>Mobile No :<b> <?= h($vendorTemp->mobile) ?></b></p>
                            </li>
                            <li>
                                <p>Email ID : <b><?= h($vendorTemp->email) ?></b></p>
                            </li>
                            <li>
                                <p>SAP Vendor Code :
                                    <b><?= !empty($vendorTemp->sap_vendor_code) ? $vendorTemp->sap_vendor_code : '' ?></b>
                                </p>
                            </li>
                            <li>
                                <p>Status : <b> <?= $status ?></b></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-0" style="height:100%">
                <div class="right-s">
                    <div class="row">
                        <!-- <div class="col-md-12">
            <div class="head">
                <h5 class="text-uppercase text-info">Other Details</h5>
            </div>
            </div> -->
                        <div class="col-md-12">
                            <div class="des">
                                <div class="row">
                                    <div class="clo-md-6 col-lg-6 pr-0">
                                        <table style="border-right:1px solid #ddd;">
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
                                                    <?= __('City') ?>
                                                </td>
                                                <th>
                                                    <?= h($vendorTemp->city) ?>
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
                                                    <?= __('Country') ?>
                                                </td>
                                                <th>
                                                    <?= h($vendorTemp->country) ?>
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
                                                    <?= __('Pan No') ?>
                                                </td>
                                                <th>
                                                    <?= h($vendorTemp->pan_no) ?>
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



                                        </table>
                                    </div>
                                    <div class="clo-md-6 col-lg-6 pl-0">

                                        <table>
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
                                                    <?= __('Gst No') ?>
                                                </td>
                                                <th>
                                                    <?= h($vendorTemp->gst_no) ?>
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
                                                    <?= __('Contact Person') ?>
                                                </td>
                                                <th style="padding:4px 10px;">

                                                    <input type="text" value=" <?= h($vendorTemp->contact_person) ?>"
                                                        class="form-control">
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?= __('Contact Mobile') ?>
                                                </td>
                                                <th style="padding:4px 10px;">
                                                    <input type="number" value="<?= h($vendorTemp->contact_mobile) ?>"
                                                        class="form-control">

                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?= __('Contact Email Id') ?>
                                                </td>
                                                <th style="padding:4px 10px;">

                                                    <input type="email" value=" <?= h($vendorTemp->contact_email) ?>"
                                                        class="form-control">
                                                </th>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <?= __('Payment Term') ?>
                                                </td>
                                                <th>
                                                    <?= (h($vendorTemp->payment_term)); ?>
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



                                        </table>

                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="text-right m-2">
                                            <button type="button" class="btn-custom prof-udt" data-toggle="modal" data-target="#modal-confirm">Update</button>
                                        </div>
                                        <div class="modal fade" id="modal-confirm">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title">Are you sure?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <!-- <div class="modal-body">
                                                <p>Are you sure?</p>
                                                </div> -->
                                                <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-updt btn-custom">Save changes</button>
                                                <button type="button" class="btn btn-font btn-secondary" data-dismiss="modal">Close</button>
                                               
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row">
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
                            <table class="table mb-0">
                                <tr>
                                    <td>
                                        <?= __('SAP Vendor Code') ?>
                                    </td>
                                    <th>
                                        <?= !empty($vendorTemp->sap_vendor_code) ? $vendorTemp->sap_vendor_code : '' ?>
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
                            <table class="table mb-0" style="font-size: 0.8rem;">
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
                <?php if ($vendorTemp->status == 1): ?>
                    <?= $this->Html->link(__('Approve'), ['action' => 'approve-vendor', $vendorTemp->id, 'app'], ['class' => 'btn btn-default']) ?>
                    <?= $this->Html->link(__('Reject'), '#', ['class' => 'btn btn-default reject', 'data-toggle' => "modal", 'data-target' => "#remarkModal"]) ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Modal Reject remarks-->
<div class="modal fade" id="remarkModal" tabindex="-1" role="dialog" aria-labelledby="remarkModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <?= $this->Form->create(null, ['id' => 'rejectRemarks', 'url' => ['action' => 'approve-vendor', $vendorTemp->id, 'rej']]) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rejection Remark</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
        echo $this->Form->control('remarks', ['label' => false, 'type' => 'textarea', 'class' => 'form-control rounded-0', 'div' => 'form-group']);

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
$(document).ready(function() {
    $(".reject").onClick(function() {

    });
});
</script>