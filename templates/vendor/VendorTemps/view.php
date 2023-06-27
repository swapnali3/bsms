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
<?= $this->Html->css('v_vendorCustom') ?>
<?= $this->Html->css('v_vendortemp_view') ?>
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
                                <p>Name : <b>
                                        <?= h($vendorTemp->name) ?>
                                    </b></p>
                            </li>
                            <li>
                                <p>Mobile No :<b>
                                        <?= h($vendorTemp->mobile) ?>
                                    </b></p>
                            </li>
                            <li>
                                <p>Email ID : <b>
                                        <?= h($vendorTemp->email) ?>
                                    </b></p>
                            </li>
                            <li>
                                <p>SAP Vendor Code :
                                    <b>
                                        <?= !empty($vendorTemp->sap_vendor_code) ? $vendorTemp->sap_vendor_code : '' ?>
                                    </b>
                                </p>
                            </li>
                            <li>
                                <p>Status : <b>
                                        <?= $status ?>
                                    </b></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-0" style="height:100%">
                <div class="right-s">
                    <?= $this->Form->create(null, ['url' => '/vendor/vendor-temps/view/', 'type' => 'file', 'id' => 'profileUpdate']) ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="des">
                                <div class="row">
                                    <div class="clo-md-6 col-lg-6 pr-0">
                                        <table style="border-right:1px solid #ddd;">
                                            <tr>
                                                <td>
                                                    <?= __('Address 1') ?>
                                                </td>
                                                <th style="padding:10px 10px;">
                                                    <div class="form-group mb-0">
                                                        <input type="text" name="address1"
                                                            value="<?= h($vendorTemp->address) ?>" class="form-control"
                                                            required>
                                                </th>
                                    </div>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= __('Address 2') ?>
                                        </td>
                                        <th style="padding:4px 10px;">
                                            <div class="form-group mb-0">
                                                <input type="text" name="address2"
                                                    value="<?= h($vendorTemp->address_2) ?>" class="form-control">
                                            </div>
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
                                            <?= __('State') ?>
                                        </td>
                                        <th>
                                            <?= h($vendorTemp->state) ?>
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
                                                <div class="form-group mb-0">
                                                    <input type="text" name="contact_person"
                                                        value=" <?= h($vendorTemp->contact_person) ?>"
                                                        class="form-control">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?= __('Contact Mobile') ?>
                                            </td>
                                            <th style="padding:4px 10px;">
                                                <div class="form-group mb-0">
                                                    <input type="number" name="contact_mobiles"
                                                        value="<?= h($vendorTemp->contact_mobile) ?>"
                                                        class="form-control">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?= __('Contact Email Id') ?>
                                            </td>
                                            <th style="padding:4px 10px;">
                                                <div class="form-group mb-0">
                                                    <input type="email" name="contact_email"
                                                        value=" <?= h($vendorTemp->contact_email) ?>"
                                                        class="form-control">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?= __('Contact Department') ?>
                                            </td>
                                            <th style="padding:4px 10px;">
                                                <div class="form-group mb-0">
                                                    <input type="text" name="contact_department"
                                                        value="<?= h($vendorTemp->contact_department) ?>"
                                                        class="form-control">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?= __('Contact Designation') ?>
                                            </td>
                                            <th style="padding:4px 10px;">
                                                <div class="form-group mb-0">
                                                    <input type="text" name="contact_designation"
                                                        value="<?= h($vendorTemp->contact_designation) ?>"
                                                        class="form-control">
                                                </div>
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
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                    <div class="docs">
                                        <h6 class="text-info pl-3" style="color:#004d87 !important">All Documents</h6>
                                        <div class="d-flex">
                                            <div class="i">
                                                <td>
                                                    <?= __('GST NO') ?>
                                                </td>
                                                <th>
                                                    <i class="fas text-info fa-download"></i>
                                                </th>
                                            </div>
                                            <div class="i">
                                                <tr>
                                                    <td>
                                                        <?= __('Pan Card') ?>
                                                    </td>
                                                    <th>
                                                    <?= $this->Html->link('<i class="fas text-info fa-download"></i>','/'.$vendorTemp->pan_file, array('escape' => false));?>
                                                    </th>
                                                </tr>
                                            </div>
                                            <div class="i">
                                                <tr>
                                                    <td>
                                                        <?= __('Bank Card') ?>
                                                    </td>
                                                    <th>
                                                    <?= $this->Html->link('<i class="fas text-info fa-download"></i>','/'.$vendorTemp->bank_file, array('escape' => false));?>
                                                    </th>
                                                </tr>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="text-right m-2">
                                        <button type="submit" class="btn btn-custom">Update</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <?= $this->form->end() ?>
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
<?= $this->Html->script('v_vendortemps_view') ?>
