<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail $deliveryDetail
 */
?>
<?= $this->Html->css('vendorCustom') ?>
<div class="row content card">
    <div class="column-responsive column-80">
        <div class="deliveryDetails view content">
            <h3> ASN No. - <?= h($deliveryDetails->toArray()[0]->asn_no) ?>  &nbsp; &nbsp; &nbsp; PO No. - <?= h($deliveryDetails->toArray()[0]->PoHeaders['po_no']) ?></h3>
            <div class="card">
                <div class="card-header">
                    <h3><b><?= __('Tracking Details') ?></b></h3>
                </div>
                <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12 col-lg-3 mt-4">
                                Invoice No. : <b><?= h($deliveryDetails->toArray()[0]->invoice_no) ?></b>
                            </div>
                            <div class="col-sm-12 col-lg-3 mt-4">
                                Invoice Date : <b><?= h($deliveryDetails->toArray()[0]->invoice_date) ?></b>
                            </div>
                            <div class="col-sm-12 col-lg-3 mt-4">
                                Invoice Value : <b><?= h($deliveryDetails->toArray()[0]->invoice_value) ?></b>
                            </div>
                            <div class="col-sm-12 col-lg-3 mt-4">
                                Vehicle No. : <b><?= h($deliveryDetails->toArray()[0]->vehicle_no) ?></b>
                            </div>
                            <div class="col-sm-12 col-lg-3 mt-4">
                                Driver Name : <b><?= h($deliveryDetails->toArray()[0]->driver_name) ?></b>
                            </div>
                            <div class="col-sm-12 col-lg-3 mt-4">
                                Driver Contact : <b><?= h($deliveryDetails->toArray()[0]->driver_contact) ?></b>
                            </div>

                            <div class="col-sm-12 col-lg-3 mt-4">
                            <?php $files = json_decode($deliveryDetails->toArray()[0]->invoice_path, true);
                            echo $this->Html->link('View invoice','/'.$files[0],['target' => '_blank']);
                        ?>
                            </div>
                        </div>

                        
                </div>
            </div>

            <div class="card-body">
            <table class="table" id="example1" style="border-left: .5px solid lightgray;border-right: .5px solid lightgray; border-bottom: .5px solid lightgray;">
            <thead>
                <tr  style="background-color: #d3d3d36e;"><td>Item</td><td>Material</td><td>UOM</td><td>Qty</td><td>Schedule Qty</td><td>Schedule Date</td></tr>
            </thead>
            <tbody>
                <?php foreach($deliveryDetails as $deliveryDetail) : ?>
                <tr>
                    <td><?= $deliveryDetail->has('PoFooters') ? $deliveryDetail->PoFooters['item']: '' ?></td>
                    <td><?= $deliveryDetail->has('PoFooters') ? $deliveryDetail->PoFooters['material']: '' ?></td>
                    <td><?= $deliveryDetail->has('PoFooters') ? $deliveryDetail->PoFooters['order_unit']: '' ?></td>
                    <td><?= $deliveryDetail->has('AsnFooters') ? $deliveryDetail->AsnFooters['qty']: '' ?></td>
                    <td><?= $deliveryDetail->has('PoItemSchedules') ? $deliveryDetail->PoItemSchedules['actual_qty']: '' ?></td>
                    <td><?= $deliveryDetail->has('PoItemSchedules') ? $deliveryDetail->PoItemSchedules['delivery_date']: '' ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
                </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var table = $("#example1").DataTable({
            "paging": true,
            "responsive": false, "lengthChange": false, "autoWidth": false, 
            "searching": false, "sorting":false,
        });
    });

</script>