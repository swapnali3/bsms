<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail $deliveryDetail
 */
?>
<style>
    th, td {
    padding: 10px !important;
}
</style>
<?= $this->Html->css('custom') ?>
<div class="row content card gate-entry">
    <div class="column-responsive column-80">
    <div class="card-header">
                    <h3><b><?= __('Gate Entry') ?></b></h3>
                </div>
        <div class="deliveryDetails view content">
           <div class="d-flex ge-head">
           <h6 class="mr-4"> ASN No. - <b><?= h($deliveryDetails->toArray()[0]->asn_no) ?></b></h6>
            <h6> PO No. - <b><?= h($deliveryDetails->toArray()[0]->PoHeaders['po_no']) ?></b></h6>
           </div>
            <div class="card">
                
                <div class="card-body p-3 gateentry-asn">
                    <div class="row">
                       <div class="col-md-2">
                       <label>Invoice No :</label>
                       <b><?= h($deliveryDetails->toArray()[0]->invoice_no) ?></b>
                       </div>
                       <div class="col-md-2">
                       <label> Invoice Date :</label>
                        <b><?= h($deliveryDetails->toArray()[0]->invoice_date) ?></b>
                       </div>
                       <div class="col-md-2">
                       <label> Invoice Value :</label>
                                <b><?= h($deliveryDetails->toArray()[0]->invoice_value) ?></b>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        <?php echo $this->Form->control('vehicle_no :', array('class' => 'form-control rounded-0','div' => 'form-group', 'required', 'value' => $deliveryDetails->toArray()[0]->vehicle_no));?>
                        </div>
                        <div class="col-md-2">
                        <?php echo $this->Form->control('driver_name', array('class' => 'form-control rounded-0','div' => 'form-group', 'required', 'value' => $deliveryDetails->toArray()[0]->driver_name));?>
                        </div>
                        <div class="col-md-2">
                        <?php echo $this->Form->control('driver_contact', array('type' => 'mobile', 'class' => 'form-control rounded-0','div' => 'form-group', 'required', 'value' => $deliveryDetails->toArray()[0]->driver_contact));?>
                        </div>
                        <div class="col-md-12">
                        <?php $files = json_decode($deliveryDetails->toArray()[0]->invoice_path, true);
                            echo $this->Html->link('View invoice','/'.$files[0],['target' => '_blank','class' => 'veiw-invoice btn btn-info mt-3']);
                        ?>
                        </div>

                    </div>
                      

                        
                </div>
            </div>

            <div class="card-body">
            <table class="table table-bordered">
            <thead>
                <tr  style="background-color: #ddd;"><th>Item</th><th>Material</th><th>UOM</th><th>Qty</th><th>Schedule Qty</th><th>Schedule Date</th></tr>
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