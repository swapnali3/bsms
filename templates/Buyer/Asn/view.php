<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail $deliveryDetail
 */
?>
<?= $this->Html->css('custom') ?>
<div class="row content card gate-entry">
    <div class="column-responsive column-80">
    <div class="card-header">
                    <h3><b><?= __('Gate Entry') ?></b></h3>
                </div>
        <div class="deliveryDetails view content">
            <h6> ASN No. - <b><?= h($deliveryDetails->toArray()[0]->asn_no) ?></b></h6>
            <h6> PO No. - <b><?= h($deliveryDetails->toArray()[0]->PoHeaders['po_no']) ?></b></h6>
            <div class="card">
                
                <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12 col-lg-1 mt-4">
                                Invoice No.
                                <b><?= h($deliveryDetails->toArray()[0]->invoice_no) ?></b>
                            </div>
                            <div class="col-sm-12 col-lg-1 mt-4">
                                Invoice Date
                                <b><?= h($deliveryDetails->toArray()[0]->invoice_date) ?></b>
                            </div>
                            <div class="col-sm-12 col-lg-1 mt-4">
                                Invoice Value
                                <b><?= h($deliveryDetails->toArray()[0]->invoice_value) ?></b>
                            </div>

                            <div class="col-sm-8 col-lg-1 mt-2">
                                <?php echo $this->Form->control('vehicle_no', array('class' => 'form-control rounded-0','div' => 'form-group', 'required', 'value' => $deliveryDetails->toArray()[0]->vehicle_no));?>
                            </div>
                            <div class="col-sm-8 col-lg-1 mt-2">
                                <?php echo $this->Form->control('driver_name', array('class' => 'form-control rounded-0','div' => 'form-group', 'required', 'value' => $deliveryDetails->toArray()[0]->driver_name));?>
                            </div>

                            <div class="col-sm-8 col-lg-1 mt-2">
                                <?php echo $this->Form->control('driver_contact', array('type' => 'mobile', 'class' => 'form-control rounded-0','div' => 'form-group', 'required', 'value' => $deliveryDetails->toArray()[0]->driver_contact));?>
                            </div>

                            <div class="col-sm-12 col-lg-1 mt-4">
                            <?php $files = json_decode($deliveryDetails->toArray()[0]->invoice_path, true);
                            echo $this->Html->link('View invoice','/'.$files[0],['target' => '_blank']);
                        ?>
                            </div>
                        </div>

                        
                </div>
            </div>

            <div class="card-body">
            <table class="table" style="border-left: .5px solid lightgray;border-right: .5px solid lightgray; border-bottom: .5px solid lightgray;">
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