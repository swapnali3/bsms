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

<?= $this->Html->css('custom') ?>
<?= $this->Html->css('vendortemps_view') ?>
<div class="row">
    <div class="col-12">
        <di class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3 style="color: teal;">
                            <?= h($vendorTemp->name) ?>
                        </h3>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3 mx-auto">
                                <table style="width: 20vw;">
                                    <thead>
                                        <tr style="border-bottom: .5px solid black;">
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>SAP Vendor Code</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Purchasing Organization</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Schema Group</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Address 1</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Address 2</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Pincode</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Gst No</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>TAN No</th>
                                            <td>Person</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-3 mx-auto">
                                <table style="width: 20vw;">
                                    <thead>
                                        <tr style="border-bottom: .5px solid black;">
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Email Id</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Order Currency</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Pan No</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>CIN No</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Added Date</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Updated Date</th>
                                            <td>Person</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-3 mx-auto">
                                <table style="width: 20vw;">
                                    <thead>
                                        <tr style="border-bottom: .5px solid black;">
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Person</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Email Id</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Mobile</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Department</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Designation</th>
                                            <td>Person</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-3 mx-auto">
                                <table style="width: 20vw;">
                                    <thead>
                                        <tr style="border-bottom: .5px solid black;">
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Status</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Account Group</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Mobile</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>State</th>
                                            <td>Person</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Term</th>
                                            <td>Person</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer p-3 text-right float-right">
                <?php if ($vendorTemp->status == 1): ?>
                <button type="button" class="btn btn-success btn-sm mb-0" data-toggle="modal" data-target="#modal-sm">
                    Approve
                </button>
                <?= $this->Html->link(__('Reject'), '#', ['class' => 'btn btn-danger reject mb-0 btn-sm', 'data-toggle' => "modal", 'data-target' => "#remarkModal"]) ?>
                <!-- modal -->
                <div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <h6>Are you sure you want to aprrove?</h6>
                            </div>
                            <div class="modal-footer justify-content-between p-1">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                <?= $this->Html->link(__('Ok'), ['action' => 'approve-vendor', $vendorTemp->id, 'app'], ['class' => 'btn btn-success mb-0']) ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end modal -->
                <?php endif; ?>
            </div>
        </di>
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
<<<<<<< Updated upstream
<script>
    $(document).ready(function () {
       
        // $(".reject").onClick(function () {

        // });
        // var interval = $("#flashMessage").attr("data-timeout");

    });
</script>
=======
<?= $this->Html->script('vendortemps_view') ?>
>>>>>>> Stashed changes
