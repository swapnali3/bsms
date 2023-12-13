<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Stockupload> $stockupload
 */
?>
<style>
    .hide {
        display: none;
    }
</style>
<?= $this->Html->css('bootstrap-multiselect') ?>
<?= $this->Html->script('bootstrap-multiselect') ?>
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.5.4/select2-bootstrap4.min.css') ?>
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css') ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        Opening Stock
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->Form->create(null, ['id' => 'addvendorform']) ?>
                <div class="row">
                    <div class="col-4">
                        <label for="id_vendor">Vendor</label><br>
                        <select name="vendor[]" id="id_vendor" class="chosen" multiple="multiple" style="width: 100%;">
                            <?php if (isset($vendor)) : ?>
                            <?php foreach ($vendor as $mat) : ?>
                            <option value="<?= h($mat->sap_vendor_code) ?>" data-select="<?= h($mat->sap_vendor_code) ?>">
                                <?= h($mat->sap_vendor_code) ?>
                            </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="id_material">Material</label><br>
                        <select name="material[]" id="id_material" multiple="multiple" class="form-control chosen">
                            <?php if (isset($materials)) : ?>
                            <?php foreach ($materials as $mat) : ?>
                            <option value="<?= h($mat->id) ?>" data-select="<?= h($mat->id) ?>">
                                <?= h($mat->code) ?> -
                                <?= h($mat->description) ?>
                            </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="id_vendortype">Type</label><br>
                        <select name="vendortype[]" id="id_vendortype" multiple="multiple" class="form-control chosen">
                            <?php if (isset($vendortype)) : ?>
                            <?php foreach ($vendortype as $mat) : ?>
                            <option value="<?= h($mat->id) ?>" data-select="<?= h($mat->id) ?>">
                                <?= h($mat->code) ?> -
                                <?= h($mat->name) ?>
                            </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="id_segment">Segment</label><br>
                        <select name="segment[]" id="id_segment" multiple="multiple" class="form-control chosen">
                            <?php if (isset($segment)) : ?>
                            <?php foreach ($segment as $mat) : ?>
                            <option value="<?= h($mat->segment) ?>" data-select="<?= h($mat->segment) ?>">
                                <?= h($mat->segment) ?>
                            </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-2 mt-4">
                        <button class="btn bg-gradient-button" type="submit" id="id_sub">Search</button>
                        <a href="<?= $this->Url->build('/') ?>buyer/stock-uploads/add" id="continueSub"
                            class="btn mb-0 continue_btn float-right">Add Material</a>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <hr class="m-0">
            <div class="card-body" id="id_pohead">
                <table class="table table-bordered table-striped table-hover" id="example1">
                    <thead>
                        <tr>
                            <th>Vendor Code</th>
                            <th>Factory Code</th>
                            <th>PO No</th>
                            <th>Vendor Type</th>
                            <th>Segment</th>
                            <th>Line Item</th>
                            <th>Material Code</th>
                            <th>Material Description</th>
                            <th>Opening Stock</th>
                            <th>UOM</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var stocklist_url = `<?php echo \Cake\Routing\Router::url(array('controller' => '/stock-uploads', 'action' => 'stocklist')); ?>`;
</script>
<?= $this->Html->script('a_vekpro/buyer/b_stock_index') ?>