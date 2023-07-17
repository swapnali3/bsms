<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stockupload $stockupload
 */
?>
<?= $this->Html->css('cstyle.css') ?>
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('v_index.css') ?>
<?= $this->Form->create($stockupload) ?>
<div class="card">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5><b>Add Stock Upload</b></h5>
            </div>
            <!-- <div class="col-lg-6 d-flex justify-content-end text-align-end">
                <p><a href="#">List Stock Upload</a></p>
            </div> -->
        </div>
    </div>
    <div class="card-body invoice-details p-0">
        <div class="row dgf m-0">
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('description', array('class' => 'form-control w-100', 'options' => $vendor_mateial, 'id' => 'descripe', 'style' => "height: unset !important;", 'empty' => 'Please Select', 'label' => 'Material Description')); ?>
                </div>
            </div>

            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('vendor_material_code', array('id'=> 'vendor-material-code',  'class' => 'form-control rounded-0 w-100', 'style' => "height: unset !important;", 'div' => 'form-group', 'required', 'label' => 'Material Code', 'readonly')); ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('uom', array('type' => 'text', 'class' => 'form-control rounded-0 w-100', 'style' => "height: unset !important;", 'div' => 'form-group',  'label' => 'Unit Of Measurement', 'readonly')); ?>
                </div>
            </div>


            <div class="col-sm-8 col-md-3">
                <div class="form-group">
                    <?php echo $this->Form->control('opening_stock', array('type' => 'number', 'class' => 'form-control rounded-0 w-100', 'style' => "height: unset !important;", 'div' => 'form-group')); ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-3 d-flex justify-content-start align-items-end">
                <button type="button" class="btn btn-custom" onclick="showConfirmationModal()">Submit</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h6>Are you sure you want to Add?</h6>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn" style="border:1px solid #6610f2" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn" style="border:1px solid #28a745">Ok</button>
            </div>
        </div>
    </div>
</div>

<?= $this->Form->end() ?>



<div class="card">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5><b>UPLOAD STOCKS</b></h5>
            </div>
        </div>
    </div>

    <?= $this->Form->create(null, ['type' => 'file', 'id' => 'sapvendorcodeform']); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-2 col-md-2 mt-3">
                <?= $this->Form->control('vendor_code', ['type' => 'file', 'label' =>
                false, 'class' => 'pt-1 rounded-0', 'style' => 'visibility: hidden;
                        position: absolute;', 'div' => 'form-group', 'id' => 'vendorCodeInput']);
                ?>
                <?= $this->Form->button('Upload File', ['id' => 'OpenImgUpload', 'type' =>
                'button', 'label' => 'Upload File', 'class' => 'd-block btn btn-secondary mb-0 file-upld-btn']); ?>
                <span id="filessnames"></span>
            </div>
            <div class="col-sm-2 col-md-2 mt-3 d-flex justify-content-start align-items-baseline">
                <button class="btn btn-custom" id="sapvendorcode" type="submit">
                    Submit
                </button>
            </div>
            <div class="col-sm-12 col-md-12 mt-3">
                <i style="color: black;">
                    <a href="<?= $this->Url->build('/') ?>webroot/templates/stock_upload.xlsx" download>stock_upload_template</a>
                </i>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class="card">
    <div class="card-header p-0 mb-0 mt-3 ml-3 mr-3" id="id_pohead">
        <table class="table table-hover" id="example1">
            <thead>
                <tr>
                    <th>Material Description</th>
                    <th>Material Code</th>
                    <th>Unit Of Measurement</th>
                    <th>Opening Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($stockuploadData)) : ?>

                    <?php foreach ($stockuploadData as $stockuploads) :  ?>
                        <?php if ($stockuploads['status']) : ?>

                            <tr>
                                <td>
                                    <?= h($stockuploads['descr']) ?>
                                </td>
                                <td>
                                    <?= h($stockuploads['vendorCode']) ?>
                                </td>
                                <td>
                                    <?= h($stockuploads['uomCode']) ?>
                                </td>
                                <td>
                                    <?= h($stockuploads['data']["opening_stock"]) ?>
                                </td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td>
                                    <?= h($stockuploads['data']) ?>
                                </td>
                                <td>
                                    <?= h($stockuploads['vendorCode']) ?>
                                </td>
                                <td colspan="1"></td>
                                <td class="text-danger text-left">
                                    <?= h($stockuploads["msg"]) ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            </tbody>
        </table>
    </div>
</div>




<script>
    function showConfirmationModal() {
        $('#modal-sm').modal('show');
    }

    $(document).ready(function() {
        $('#OpenImgUpload').click(function() {
            $('#vendorCodeInput').trigger('click');
        });
        $('#vendorCodeInput').change(function() {
            var file = $(this).prop('files')[0].name;
            $("#filessnames").append(file);
        });

        setTimeout(function() {
            $('.success').fadeOut('slow');
        }, 2000);

        $("#descripe").change(function() {
            var vendorId = $(this).val();
            if (vendorId != "") {
                $.ajax({
                    type: "get",
                    url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/stock-uploads', 'action' => 'vendor-material')); ?>/" + vendorId,
                    dataType: "json",
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader(
                            "Content-type",
                            "application/x-www-form-urlencoded"
                        );
                    },
                    success: function(response) {
                        if (response.status == "1") {
                            $("#vendor-material-code").val(response.data.code);
                            $("#uom").val(response.data.uom);
                        }
                    },
                    error: function(e) {
                        alert("An error occurred: " + e.responseText.message);
                        console.log(e);
                    },
                });
            }
        });


    });
</script>