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
                <h5>Vendor Material</h5>
            </div>
        </div>
    </div>

    <div class="card-header p-0 mb-0 mt-3 ml-3 mr-3" id="id_pohead">
        <table class="table table-bordered material-list">
            <thead>
                <tr>
                    <th>Material</th>
                    <th>Minimum Stock</th>
                    <th>UOM</th>
                    <th>Vendor Material Code</th>
                    <th>Buyer Material Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tbody id="id_vendorMaterialList">
                <tr>
                    <td colspan="6" class="p-2">
                        No Records Found
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    var geturl = "<?php echo \Cake\Routing\Router::url(array('controller' => 'vendormaterial', 'action' => 'getvendormaterial')); ?>";
    var posturl = "<?php echo \Cake\Routing\Router::url(array('controller' => '/vendormaterial', 'action' => 'postvendormaterial')); ?>";
</script>
<?= $this->Html->script('b_vendormaterial_index') ?>