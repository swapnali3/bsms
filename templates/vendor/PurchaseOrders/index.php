<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader[]|\Cake\Collection\CollectionInterface $poHeaders
 */
?>
<div class="poHeaders index content card">
    <div class="card-header">
        <h3 style="color:navy">
            <b>
                <?= __('PURCHASE ORDER LISTS') ?>
            </b>
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="example1">
                <thead>
                    <tr>
                        <th><?= h('Vendor Code') ?></th>
                        <th><?= h('PO No.') ?></th>
                        <th><?= h('Document Type') ?></th>
                        <th><?= h('Created On') ?></th>
                        <th><?= h('Created By') ?></th>
                        <th><?= h('Pay Terms') ?></th>
                        <th><?= h('Currency') ?></th>
                        <th><?= h('Exchange Rate') ?></th>
                        <!-- <th><?= h('Release Status') ?></th> -->
                        <!-- <th><?= h('Added Date') ?></th> -->
                        <th><?= h('Updated Date') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($poHeaders as $poHeader): ?>
                    <tr>
                        <td><?= h($poHeader->sap_vendor_code) ?></td>
                        <td><?= h($poHeader->po_no) ?></td>
                        <td><?= h($poHeader->document_type) ?></td>
                        <td><?= h($poHeader->created_on) ?></td>
                        <td><?= h($poHeader->created_by) ?></td>
                        <td><?= h($poHeader->pay_terms) ?></td>
                        <td><?= h($poHeader->currency) ?></td>
                        <td><?= $this->Number->format($poHeader->exchange_rate) ?></td>
                        <!-- <td><?= h($poHeader->release_status) ?></td> -->
                        <!-- <td><?= h($poHeader->added_date) ?></td> -->
                        <td><?= h($poHeader->updated_date) ?></td>
                        <td class="actions">
                            <a type="button" class="btn btn-sm btn-default" href="<?= $this->Url->build('/') ?>vendor/purchase-orders/view/<?= $poHeader->id ?>">View</a>
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
    $(document).ready(function() { 
        $("#example1").DataTable({
            "paging": true,
            "responsive": true, "lengthChange": false, "autoWidth": false, "searching" :true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
     });
</script>
