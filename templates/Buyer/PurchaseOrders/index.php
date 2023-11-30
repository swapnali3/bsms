<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader[]|\Cake\Collection\CollectionInterface $poHeaders
 */
?>
<!-- <?= $this->Html->css('cstyle.css') ?> -->
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('b_index.css') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-start align-items-center">
                        <h5 class="mb-0">Purchase Orders</h5>
                    </div>
                </div>
            </div>

            <div class="card-body buyer_material">
                <table class="table table-hover table-responsive" id="example1">
                    <thead>
                        <tr>
                            <th>Vendor Code</th>
                            <th>PO</th>
                            <th>Item</th>
                            <th>Material</th>
                            <th>Description</th>
                            <th>PO Qty</th>
                            <th>Grn Qty</th>
                            <th>Pending Qty</th>
                            <th>Order Unit</th>
                            <th>Net Price</th>
                            <th>Price Unit</th>
                            <th>Net Value</th>
                            <th>Gross Value</th>
                            <th>Schedule Qty</th>
                            <th>ASN Qty</th>
                            <th>ASN No</th>
                            <th>Delivery Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($poReportData)) : ?>
                            <?php foreach ($poReportData as $material) : 
                                        //echo '<pre>'; print_r($material); exit;
                                ?>
                                        <tr>
                                            <td>
                                                <?= h($material['sap_vendor_code']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['po_no']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['item']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['material']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['short_text']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['po_qty']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['grn_qty']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['pending_qty']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['order_unit']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['net_price']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['price_unit']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['net_value']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['gross_value']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['actual_qty'])?> 
                                            </td>
                                            <td>
                                                <?= h($material['received_qty'])?>
                                            </td>
                                            <td>
                                                <?= h($material['asn_no'])?>
                                            </td>
                                            <td>
                                                <?= h($material['delivery_date'] ? date('d-m-y', strtotime($material['delivery_date'])): '')?>
                                            </td>
                                            <td>
                                                <?php 
                                                $status = '';
                                                if($material['status'] == 3) {
                                                    $status = 'Received';
                                                }else if($material['status'] == 2) {
                                                    $status = 'In-Transit';
                                                } else if(!$material['delivery_date']) {
                                                    $status = '';
                                                }else if($material['received_qty'] == 0) {
                                                    $status = 'Scheduled';
                                                }else if($material['received_qty'] < $material['actual_qty']) {
                                                    $status = 'Partial ASN created';
                                                } else {
                                                    $status = 'ASN created';
                                                }
                                                echo $status;
                                                ?>
                                            </td>
                                        </tr>
                            <?php 
                        endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">
                                    No Records Found
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#example1").DataTable({
            "paging": true,
            "responsive": false,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true,
            "ordering": false,
            "destroy": true,
            dom: 'Blfrtip',
            buttons: [{ extend: 'copy' },{ extend: 'excelHtml5', text : 'Export'}]
        });
    });
</script>
