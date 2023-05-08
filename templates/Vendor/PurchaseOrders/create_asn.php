<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader[]|\Cake\Collection\CollectionInterface $poHeaders
 */
?>
<?= $this->Html->css('vendorCustom') ?>
<div class="poHeaders index content card create-asn">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
            <h4 class="text-info" style="color:#004d87 !important;">
            <b>
                <?= __('CREATE ASN') ?>
            </b>
        </h4>
            </div>
            <div class="col-md-6">
            <div class="action-btn d-flex justify-content-end">
       <a href="#" class="btn btn-info mb-0 mr-1"><i class="fa fa-solid fa-file-import"></i> Upload ASN File</a>
        <a href="#" class="btn btn-secondary mb-0">Continue</a>
       </div>
            </div>
        </div>
       
       
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <h5><b>Select Material</b></h5>
            <table class="table table-hover" id="example1">
                <thead>
                    <tr style="background-color: #d3d3d36e;">
                   
                        <th>
                            <?= h('Vendor Code') ?>
                        </th>
                        <th>
                            <?= h('PO No.') ?>
                        </th>
                        <th>
                            <?= h('Document Type') ?>
                        </th>
                        <th>
                            <?= h('Created On') ?>
                        </th>
                        <th>
                            <?= h('Created By') ?>
                        </th>
                        <th>
                            <?= h('Pay Terms') ?>
                        </th>
                        <th>
                            <?= h('Currency') ?>
                        </th>
                        <th>
                            <?= h('Exchange Rate') ?>
                        </th>
                        <!-- <th><?= h('Release Status') ?></th> -->
                        <!-- <th><?= h('Added Date') ?></th> -->
                        <th>
                            <?= h('Updated Date') ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($poHeaders as $poHeader): ?>
                    <tr class="redirect"  data-href="<?= $this->Url->build('/') ?>vendor/purchase-orders/view/<?= $poHeader->id ?>">
                   
                        <td><?= h($poHeader->sap_vendor_code) ?></td>
                        <td><?= h($poHeader->po_no) ?></td>
                        <td><?= h($poHeader->document_type) ?></td>
                        <td><?= h($poHeader->created_on) ?></td>
                        <td><?= h($poHeader->created_by) ?></td>
                        <td><?= h($poHeader->pay_terms) ?></td>
                        <td><?= h($poHeader->currency) ?></td>
                        <td><?= $this->Number->format($poHeader->exchange_rate) ?> </td>
                        <!-- <td><?= h($poHeader->release_status) ?></td> -->
                        <!-- <td><?= h($poHeader->added_date) ?></td> -->
                        <td>
                            <?= h($poHeader->updated_date) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div> -->
</div>


<script>
    $(document).on("click", ".redirect", function () {
        window.location.href = $(this).data("href");
    });
    $(document).ready(function () {
        $("#example1").DataTable({
            "paging": true,
            "responsive": true, "lengthChange": false, "autoWidth": false, "searching": true,
            language: {
          search: "_INPUT_",
        searchPlaceholder: "Search..."
    },
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
