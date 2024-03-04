<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Rfq> $rfqs
 */
?>
<!-- <?= $this->Html->css('cstyle.css') ?> -->
<!-- <?= $this->Html->css('table.css') ?> -->
<!-- <?= $this->Html->css('listing.css') ?> -->
<!-- <?= $this->Html->css('v_vendorCustom') ?> -->
<div class="row">
    <div class="col-12">
        <div class="poHeaders index content card" class="card-header">
            <div class="card-body p-1">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="example1">
                        <thead>
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
            "responsive": false, "lengthChange": false, "autoWidth": false, "searching": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>