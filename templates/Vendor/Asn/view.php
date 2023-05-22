<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail $deliveryDetail
 */

 //echo '<pre>'; print_r($deliveryDetails); exit;
?>
<?= $this->Html->css('vendorCustom') ?>
<div class="row content card">
    <div class="column-responsive column-80">
        <div class="deliveryDetails view content">
            
            <div class="card mt-2 mb-1">
                <div class="card-header " style="background-color: #d4ddf7  !important;">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-lg-2">
                             ASN No : <b><?= h($deliveryDetails[0]->asn_no) ?></b>
                    </div>
                    <div class="col-sm-12 col-lg-2">
                            PO No : <b><?= h($deliveryDetails[0]->PoHeaders['po_no']) ?></b>
                    </div>
                    <div class="col-sm-12 col-lg-2">
                          Status: <span class='asnstatus'>
                          <?php 
                            if($deliveryDetails[0]->status == '1') {
                                echo 'Created';
                            } else if($deliveryDetails[0]->status == '2') {
                                echo 'Delivered';
                            } ?>
                            </span>
                    </div>
                    <?php 
                            if($deliveryDetails[0]->status == '1') { ?>
                    <div class="col-sm-12 col-lg-2">
                            <button class="btn btn-custom mb-0 mark_delivered" >Mark Delivered</button>
                    </div>
                    <?php  } ?>
                    </div>
                    
                </div>
                <div class="card-body" style="background-color:#f5f7fd">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                        <h5 class="tracking-det"><b><?= __('Tracking Details') ?></b></h5>
                        </div>
                    
                    </div>
                        <div class="row tracking-dt">
                        <div class="col-sm-12 col-lg-2 mt-2">
                                <label>Invoice No. :</label> <b><?= h($deliveryDetails[0]->invoice_no) ?></b>
                            </div>
                            <div class="col-sm-12 col-lg-2 mt-2">
                                <label>Invoice Date :</label> <b><?= h($deliveryDetails[0]->invoice_date) ?></b>
                            </div>
                            <div class="col-sm-12 col-lg-2 mt-2">
                               <label> Invoice Value :</label> <b><?= h($deliveryDetails[0]->invoice_value) ?></b>
                            </div>
                            <div class="col-sm-12 col-lg-2 mt-2">
                                <label>Vehicle No. :</label> <b><?= h($deliveryDetails[0]->vehicle_no) ?></b>
                            </div>
                            <div class="col-sm-12 col-lg-2 mt-2">
                               <label> Driver Name :</label> <b><?= h($deliveryDetails[0]->driver_name) ?></b>
                            </div>
                            <div class="col-sm-12 col-lg-2 mt-2">
                               <label> Driver Contact :</label> <b><?= h($deliveryDetails[0]->driver_contact) ?></b>
                            </div>

                            <div class="col-sm-12 col-lg-2">
                            <?php $files = json_decode($deliveryDetails[0]->invoice_path, true);

                            if(!empty($files)) {
                                echo $this->Html->link('View invoice','/'.$files[0],['target' => '_blank','class'=>'btn btn-custom mt-4']);
                            }
                        ?>
                            </div>
                        </div>

                        
                </div>
            </div>

            <div class="card-body p-0 pb-3">
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
            "ordering":false,
            "searching": false, "sorting":false,
        });

        $(".mark_delivered").on('click', function () {
            $.ajax({
                type: "GET",
                url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/asn', 'action' => 'mark-delivered', $deliveryDetails[0]->id)); ?>",
                dataType: 'json',
                success: function (response) {
                if (response.status == 'success') {
                    //location.reload(true);
                    $(".mark_delivered").hide();
                    $(".asnstatus").html('Delivered');
                } else {
                    alert('Please try again...');
                }
                }
            });
        });

        

    });

</script>