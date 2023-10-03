<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Productionline> $productionline
 */
?>
<!-- <?= $this->Html->css('cstyle.css') ?> -->
<!-- <?= $this->Html->css('custom') ?> -->
<!-- <?= $this->Html->css('table.css') ?> -->
<!-- <?= $this->Html->css('listing.css') ?> -->
<!-- <?= $this->Html->css('v_index.css') ?> -->
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5 class="mb-0"><b>Production Line</b></h5>
            </div>
            <div class="col-lg-6 d-flex justify-content-end text-align-end">
                <a href="<?= $this->Url->build('/') ?>vendor/production-lines/add"><button type="button"
                        id="continueSub" class="btn bg-gradient-button mb-0 continue_btn">Add Production Line</button></a>
            </div>
        </div>
    </div>

    <div class="card-body" id="id_pohead">
        <table class="table table-bordered table-striped table-hover" id="example1">
            <thead>
                <tr>
                    <th>Production Line</th>
                    <th>Material Code</th>
                    <th>Material Description</th>
                    <th>Capacity (Per Day)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($productionline)) : ?>
                <?php foreach ($productionline as $productionlines) : ?>
                <tr  class="redirect"  data-href="<?= $this->Url->build('/') ?>vendor/production-lines/edit/<?= $productionlines->id ?>">
                    <td>
                        <?= h($productionlines->line_master->name) ?>
                    </td>
                    <td>
                        <?= h($productionlines->material->code) ?>
                    </td>
                    <td>
                        <?= h($productionlines->material->description) ?>
                    </td>
                    <td>
                        <?= h($productionlines->capacity .' '.$productionlines->material->uom) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="6">
                        No Records Found
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('.success').fadeOut('slow');
        }, 2000);

        $(document).on("click", ".redirect", function () {
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