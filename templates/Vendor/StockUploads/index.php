<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Stockupload> $stockupload
 */
?>
</style>
<?= $this->Html->css('custom') ?>
<div class="card">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5>Stock Upload</h5>
            </div>
            <div class="col-lg-6 d-flex justify-content-end text-align-end">
                <a href="<?= $this->Url->build('/') ?>vendor/stock-uploads/add"><button type="button" id="continueSub" class="btn mb-0 continue_btn btn-dark">Add Stock</button></a>
            </div>
        </div>
    </div>

    <div class="card-header p-0 mb-0 mt-3 ml-3 mr-3" id="id_pohead">
        <table class="table table-hover" id="example1">
            <thead>
                <tr>
                    <th>Material Code</th>
                    <th>Material Description</th>
                    <th>Opening Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($stockupload)) : ?>
                    <?php foreach ($stockupload as $stockuploads) : ?>
                        <tr class="redirect" data-href="<?= $this->Url->build('/') ?>vendor/stockupload/edit/<?= $stockuploads->id ?>">
                            <td>
                                <?= h($stockuploads->vm_vendor_code) ?>
                            </td>
                            <td>
                                <?= h($stockuploads->vm_description) ?>
                            </td>
                            <td>
                                <?= h($stockuploads->opening_stock . ' '. $stockuploads->vm['uom']) ?>
                            </td>
                        </tr>
            </tbody>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="5">
                No Records Found
            </td>
        </tr>
    <?php endif; ?>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.success').fadeOut('slow');
        }, 2000);

        $(document).on("click", ".redirect", function() {
            window.location.href = $(this).data("href");
        });

        var table = $("#example1").DataTable({
            "paging": true,
            "responsive": false,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "ordering": false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
        });
    });
</script>