<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorMaterial> $vendorMaterial
 */
?>
</style>
<?= $this->Html->css('custom') ?>
<div class="card">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5>Vendor Materials</h5>
            </div>
            <div class="col-lg-6 d-flex justify-content-end text-align-end">
                <a href="<?= $this->Url->build('/') ?>vendor/vendor-material/add"><button type="button" id="continueSub" class="btn mb-0 continue_btn btn-dark">Add Material</button></a>
            </div>
        </div>
    </div>

    <div class="card-header p-0 mb-0 mt-3 ml-3 mr-3">
        <table class="table table-hover" id="example1">
            <thead>
                <tr>
                    <th>Material Code</th>
                    <th>Material Description</th>
                    <th>Minimum Stock</th>
                    <th>Unit Of Measurement</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($vendorMaterial)) : ?>
                    <?php foreach ($vendorMaterial as $vendorMaterials) : ?>
                        <tr class="redirect" data-href="<?= $this->Url->build('/') ?>vendor/vendor-material/edit/<?= $vendorMaterials->id ?>">
                            <td><?= h($vendorMaterials->vendor_material_code) ?></td>
                            <td><?= h($vendorMaterials->description) ?></td>
                            <td><?= h($vendorMaterials->minimum_stock) ?></td>
                            <td><?= h($vendorMaterials->uom_desp) ?></td>
                            <!-- <td>
                            <div class="float-left">
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorMaterials->id], ['class' => 'btn btn-info btn-sm mb-0']) ?>
                            </div>
                        </td> -->
                        </tr>
                    <?php endforeach; ?>
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