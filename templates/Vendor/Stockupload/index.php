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
            <a href="<?= $this->Url->build('/') ?>vendor/stockupload/add"><button type="button" id="continueSub" class="btn mb-0 continue_btn btn-dark">Add Stock</button></a>
            </div>
        </div>
    </div>

    <div class="card-header p-0 mb-0 mt-3 ml-3 mr-3" id="id_pohead">
        <table class="table table-bordered material-list">
            <thead>
                <tr>
                    <th>Opening Stock</th>
                    <th>Vendor Material Id</th>
                    <th>Added Date</th>
                    <th>Update Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stockupload as $stockuploads) : ?>
                    <tr>
                        <td><?= h($stockuploads->opening_stock) ?></td>
                        <td><?= h($stockuploads->vendor_material_id) ?></td>
                        <td><?= h($stockuploads->added_date->format('d-m-Y')) ?></td>
                        <td><?= h($stockuploads->updated_date->format('d-m-Y')) ?></td>
                    </tr>
            </tbody>
        <?php endforeach; ?>
        </table>
    </div>
</div>