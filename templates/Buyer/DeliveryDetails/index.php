<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail[]|\Cake\Collection\CollectionInterface $deliveryDetails
 */
?>
<div class="deliveryDetails index content card">
    <h3><?= __('Delivery Details') ?></h3>
        <table class="table table-bordered table-hover" id="example1">
            <thead>
                <tr>
                    <th>Purchase Order</th>
                    <th>Item</th>
                    <th>Challan No.</th>
                    <th>Qty</th>
                    <th>Ewaybill No.</th>
                    <th>E-invoice No</th>
                    <th>Status</th>
                    <th>Added Date</th>
                    <th>Updated Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($deliveryDetails as $deliveryDetail): ?>
                <tr>
                    <td><?= $deliveryDetail->has('po_header') ? $deliveryDetail->po_header->po_no : '' ?></td>
                    <td><?= $deliveryDetail->has('po_footer') ? $deliveryDetail->po_footer->item : '' ?></td>
                    <td><?= h($deliveryDetail->challan_no) ?></td>
                    <td><?= $this->Number->format($deliveryDetail->qty) ?></td>
                    <td><?= h($deliveryDetail->eway_bill_no) ?></td>
                    <td><?= h($deliveryDetail->einvoice_no) ?></td>
                    <td><span class="badge bg-warning"><?= h($deliveryDetail->status ? '' : 'Intransit') ?></span></td>
                    <td><?= h($deliveryDetail->added_date) ?></td>
                    <td><?= h($deliveryDetail->updated_date) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>

<script>
    $(document).ready(function() { 
        var table = $("#example1").DataTable({
            "paging": true,
            "responsive": false, "lengthChange": false, "autoWidth": false, "searching" :true,
        });
    });
    
</script>
