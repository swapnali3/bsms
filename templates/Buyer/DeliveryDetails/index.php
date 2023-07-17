<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail[]|\Cake\Collection\CollectionInterface $deliveryDetails
 */
?>
  <?= $this->Html->css('cstyle.css') ?>
  <?= $this->Html->css('custom') ?>
  <?= $this->Html->css('table.css') ?>
  <?= $this->Html->css('listing.css') ?>
  <?= $this->Html->css('b_index.css') ?>

<div class="deliveryDetails index content card">
    <!-- <div class="card-header">
        <h5><b><?= __('DELIVERY DETAIL') ?></b></h5>
    </div> -->
    <div class="card-body table-responsive">
        <table class="table table-hover" id="example1">
            <thead>
                <tr>

                    <th>Asn No</th>
                    <th>Vendor Code</th>
                    <th>Purchase Order</th>
                    <th>invoice No</th>
                    <th>invoice value</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
          

                <?php foreach ($deliveryDetails as $deliveryDetail) : ?>
                    <tr onclick="window.location.href = '<?= $this->Url->build(['controller' => 'asn', 'action' => 'view', $deliveryDetail->id]) ?>';">

                        <td>
                            <?= $deliveryDetail->asn_no ?>
                        </td>
                        <td>
                            <?=  $deliveryDetail->po_header->sap_vendor_code   ?>
                        </td>
                        <td>
                            <?= $deliveryDetail->has('po_header') ? $deliveryDetail->po_header->po_no : '' ?>
                        </td>


                        <td>
                            <?= h($deliveryDetail->invoice_no) ?>
                        </td>


                        <td>
                            <?= h($deliveryDetail->invoice_value) . ' ' . h($deliveryDetail->po_header->currency) ?>
                        </td>
                        <td>
                            <?= $deliveryDetail->status == 2 ? '<span class="badge bg-success">In Transit</span>' : '<span class="badge bg-warning">INTRANSIT</span>' ?>
                        </td>

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
            "responsive": false,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
        });
    });
</script>