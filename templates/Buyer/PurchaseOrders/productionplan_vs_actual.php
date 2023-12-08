<style>
    .hide {
        display: none;
    }
</style>
<?= $this->Html->css('bootstrap-multiselect') ?>
<?= $this->Html->script('bootstrap-multiselect') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 col-md-12 text-center">
                        SECONDARY AGEING REPORT
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->Form->create(null, ['id' => 'addvendorform']) ?>
                <div class="row">
                    <div class="col-2">
                        <label for="id_from">Date From</label>
                        <input type="date" name="from" class="form-control" id="id_from">
                    </div>
                    <div class="col-2">
                        <label for="id_to">Date To</label>
                        <input type="date" name="till" class="form-control" id="id_to">
                    </div>
                    <div class="col-2">
                        <label for="id_vendor">Vendor</label><br>
                        <select name="vendor[]" id="id_vendor" class="chosen" multiple="multiple" style="width: 100%;">
                            <?php if (isset($vendor)) : ?>
                            <?php foreach ($vendor as $mat) : ?>
                            <option value="<?= h($mat->sap_vendor_code) ?>">
                                <?= h($mat->sap_vendor_code) ?>
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
                            <option value="<?= h($mat->id) ?>">
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
                            <option value="<?= h($mat->segment) ?>">
                                <?= h($mat->segment) ?>
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
                            <option value="<?= h($mat->id) ?>">
                                <?= h($mat->code) ?> -
                                <?= h($mat->description) ?>
                            </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-2 mt-4 pt-2">
                        <button class="btn bg-gradient-button" type="submit" id="id_sub">Search</button>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <hr class="m-0">
            <div class="card-body buyer_material">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="example1">
                        <thead>
                            <tr>
                                <th>Plan Date</th>
                                <th>Vendor Code</th>
                                <th>Vendor Name Type</th>
                                <th>Segment</th>
                                <th>Production Line</th>
                                <th>Material</th>
                                <th>Material Desc.</th>
                                <th>Production Plan</th>
                                <th>Confirmed Production</th>
                                <th>Confirmation Date</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>No. of Stock Aging Days</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var materiallist_url = `<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'ppalist')); ?>`;
</script>
<?= $this->Html->script('a_vekpro/buyer/b_purchaseorder_ppa') ?>