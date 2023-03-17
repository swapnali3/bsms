<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail[]|\Cake\Collection\CollectionInterface $deliveryDetails
 */
?>

<style>
    .card-header{
	padding:1rem
}

    </style>
<div class="deliveryDetails index content card">
    <div class="card-header">
        <h5>
            <b>
                <?= __('ASN LIST') ?>
            </b>
        </h5>
    </div>
    <div class="card-body">
        <table class="table table-hover" id="example1" style="border-left: .5px solid lightgray;border-right: .5px solid lightgray; border-bottom: .5px solid lightgray;">
            <thead>
                <tr style="background-color: #d3d3d36e;">
                    <th>ASN NO</th>
                    <th>Purchase Order</th>
                    <th>Added Date</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($deliveryDetails as $deliveryDetail): ?>
                <tr class="redirect"  data-href="<?= $this->Url->build('/') ?>vendor/asn/view/<?= $deliveryDetail->id ?>">
                <td>
                        <?=  $deliveryDetail->asn_no ?>
                    </td>
                    <td>
                        <?= $deliveryDetail->has('po_header') ? $deliveryDetail->po_header->po_no : '' ?>
                    </td>
                    <td>
                        <?= h($deliveryDetail->added_date) ?>
                    </td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</div>

<script>
    $(document).ready(function () {
        $(document).on("click", ".redirect", function () {
            window.location.href = $(this).data("href");
        });

        var table = $("#example1").DataTable({
            "paging": true,
            "responsive": false, "lengthChange": false, "autoWidth": false, "searching": true,
        });
    });

</script>