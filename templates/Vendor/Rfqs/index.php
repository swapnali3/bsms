<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Rfq> $rfqs
 */
?>
<style>
    .table td,
    .table th {
        padding: 0.2rem
    }

    .table thead th {
        padding: 0.2rem
    }
</style>

<div class="poHeaders index content card" class="card-header">
    <div class="card-header">
        <h5 style="color:black">
            <b>
                <?= __('Rfqs') ?>
            </b>
        </h5>
    </div>
    <!-- <h3><?= __('Rfqs') ?></h3> -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover" id="example1">
                <thead style="BACKGROUND-COLOR: GAINSBORO">
                    <tr>
                        <th>
                            <?= h(_('RFQ No')) ?>
                        </th>
                        <th>
                            <?= h(_('PR')) ?>
                        </th>
                        <th>
                            <?= h(_('Added Date')) ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rfqs as $rfq): ?>
                    <tr redirect="<?= $this->Url->build('/') ?>vendor/rfqs/view/<?= $rfq->rfq_no ?>">
                        <td>
                            <?= $this->Number->format($rfq->rfq_no) ?>
                        </td>
                        <td>
                            <?= $rfq->has('pr_header') ? $rfq->pr_header->pr_no : '' ?>
                        </td>
                        <td>
                            <?= h($rfq->added_date) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    $('#example1').on('click', 'tbody tr', function () {
        window.location = $(this).closest('tr').attr('redirect');
    });

    $(document).ready(function () {
        $("#example1").DataTable({
            "responsive": { "details": { "type": none } },
            "paging": true,
            "responsive": true, "lengthChange": false, "autoWidth": false, "searching": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>