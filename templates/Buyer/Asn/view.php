<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail $deliveryDetail
 */
?>
<style>
    th,
    td {
        padding: 10px !important;
    }
</style>
<?= $this->Html->css('custom') ?>
<div class="row content card gate-entry">
    <div class="column-responsive column-80">
        <div class="card-header">
            <div class="d-flex justify-content-between">

                <div class="head-t">
                    <h4 class="p-2 text-info"><b>Gate Entry (GE)</b></h4>
                </div>
                <?php if($deliveryDetails->toArray()[0]->status == 2) { ?>
                <div class="actionbtn">
                    <button type="button" class="btn btn-custom mark_delivered" data-id="<?= h($deliveryDetails->toArray()[0]->id) ?>">Mark Entry</button>
                </div>
                <?php } ?>
            </div>

        </div>
        <div class="deliveryDetails view content">

            <div class="">

                <div class="card-body p-3 gateentry-asn" style="background-color: #f5f7fd !important;">
                    <div class="row">
                        <div class="col-md-2">
                            <label>ASN No.</label>
                            <p><b><?= h($deliveryDetails->toArray()[0]->asn_no) ?></b></p>
                        </div>
                        <div class="col-md-2">
                            <label>PO No.</label>
                            <p><b><?= h($deliveryDetails->toArray()[0]->PoHeaders['po_no']) ?></b></p>
                        </div>
                        <div class="col-md-2">
                            <label>Invoice No</label>
                            <p><b><?= h($deliveryDetails->toArray()[0]->invoice_no) ?></b></p>
                        </div>
                        <div class="col-md-2">
                            <label> Invoice Date :</label>
                            <p><b><?= h($deliveryDetails->toArray()[0]->invoice_date) ?></b></p>
                        </div>
                        <div class="col-md-2">
                            <label> Invoice Value :</label>
                            <p><b><?= h($deliveryDetails->toArray()[0]->invoice_value) ?></b></p>
                        </div>
                        <div class="col-md-2">
                            <label> Status :</label>

                            </td>

                            <p> <?= $deliveryDetails->toArray()[0]->status == 2 ? '<span class="badge bg-success asnstatus">In Transit</span>' : '<span class="badge bg-warning">Received</span>' ?></p>
                            </td>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <?php echo $this->Form->control('vehicle_no :', array('class' => 'form-control rounded-0', 'div' => 'form-group', 'required', 'value' => $deliveryDetails->toArray()[0]->vehicle_no)); ?>
                        </div>
                        <div class="col-md-2">
                            <?php echo $this->Form->control('driver_name', array('class' => 'form-control rounded-0', 'div' => 'form-group', 'required', 'value' => $deliveryDetails->toArray()[0]->driver_name)); ?>
                        </div>
                        <div class="col-md-2">
                            <?php echo $this->Form->control('driver_contact', array('type' => 'mobile', 'class' => 'form-control rounded-0', 'div' => 'form-group', 'required', 'value' => $deliveryDetails->toArray()[0]->driver_contact)); ?>
                        </div>
                        <div class="col-md-2 align-self-end">
                            <?php
                            $files = json_decode($deliveryDetails->toArray()[0]->invoice_path, true);

                            if (!empty($files) && isset($files[0])) {
                                echo $this->Html->link('View invoice', '/' . $files[0], ['target' => '_blank', 'class' => 'view-invoice btn-custom']);
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-body mt-3">
                <table class="table table-bordered delivery-dt-tbl">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Material</th>
                            <th>UOM</th>
                            <th>Qty</th>
                            <th>Schedule Qty</th>
                            <th>Schedule Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($deliveryDetails as $deliveryDetail) : ?>
                            <tr>
                                <td><?= $deliveryDetail->has('PoFooters') ? $deliveryDetail->PoFooters['item'] : '' ?></td>
                                <td><?= $deliveryDetail->has('PoFooters') ? $deliveryDetail->PoFooters['material'] : '' ?></td>
                                <td><?= $deliveryDetail->has('PoFooters') ? $deliveryDetail->PoFooters['order_unit'] : '' ?></td>
                                <td><?= $deliveryDetail->has('AsnFooters') ? $deliveryDetail->AsnFooters['qty'] : '' ?></td>
                                <td><?= $deliveryDetail->has('PoItemSchedules') ? $deliveryDetail->PoItemSchedules['actual_qty'] : '' ?></td>
                                <td><?= $deliveryDetail->has('PoItemSchedules') ? $deliveryDetail->PoItemSchedules['delivery_date'] : '' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $("#example1").DataTable({
            "paging": true,
            "responsive": false,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "sorting": false,
        });
    });

    $('.actionbtn').click(function() {
        var dataId = $('.btn-custom').data('id');

        $.ajax({
            type: "GET",
            url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/asn', 'action' => 'update')); ?>/" + dataId,
            dataType: 'json',
            success: function (response) {
                if (response.status == 'success') {
                    
                    $(".mark_delivered").hide();
                    $(".asnstatus").html('Received');
                } else {
                    alert('Please try again...');
                }
                }
        });
    });
</script>