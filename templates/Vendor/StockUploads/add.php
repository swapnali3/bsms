<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stockupload $stockupload
 */

use PhpOffice\PhpSpreadsheet\Calculation\Information\Value;

?>
<!-- <?= $this->Html->css('cstyle.css') ?> -->
<!-- <?= $this->Html->css('custom') ?> -->
<!-- <?= $this->Html->css('table.css') ?> -->
<!-- <?= $this->Html->css('listing.css') ?> -->
<div class="row">
    <div class="col-12">
        <?= $this->Form->create($stockupload, ['id' => 'stockuploadForm']) ?>
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
            <div class="card-body invoice-details">
                <div class="row dgf m-0">
                    <div class="col-sm-8 col-md-3">
                        <div class="form-group">
                            <?php echo $this->Form->control('code', array('class' => 'form-control w-100', 'options' => $vendor_mateial, 'id' => 'descripe', 'style' => "height: unset !important;", 'value' => $this->getRequest()->getData('vendor_material_code'), 'empty' => 'Please Select', 'label' => 'Material Code')); ?>
                        </div>
                    </div>

                    <div class="col-sm-8 col-md-3">
                        <div class="form-group">
                            <?php echo $this->Form->control('description', array('type' => 'text','class' => 'form-control rounded-0 w-100', 'style' => "height: unset !important;", 'div' => 'form-group', 'required', 'label' => 'Material Description', 'readonly')); ?>
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
                        <button type="button" class="btn bg-gradient-submit" data-toggle="modal" data-target="#modal-sm"
                            id="stockClick">Submit</button>
                        <button type="submit" style="display: none;" id="stockInputSubmit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-1 pt-2">
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-start">
                        <h5><b>UPLOAD STOCKS</b></h5>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <?= $this->Form->create(null, ['type' => 'file', 'id' => 'sapvendorcodeform']); ?>
                <div class="row">
                    <div class="col-sm-2 col-md-2 mt-3">
                        <?= $this->Form->control('vendor_code', ['type' => 'file', 'label' =>
                        false, 'class' => 'pt-1 rounded-0', 'style' => 'visibility: hidden;
                                position: absolute;', 'div' => 'form-group', 'id' => 'vendorCodeInput']);
                        ?>
                        <?= $this->Form->button('Upload File', ['id' => 'OpenImgUpload', 'type' =>
                        'button', 'label' => 'Upload File', 'class' => 'd-block btn btn-block bg-gradient-button mb-0 file-upld-btn']); ?>
                        <span id="filessnames"></span>
                    </div>
                    <div class="col-sm-2 col-md-2 mt-3 d-flex justify-content-start align-items-baseline">
                        <button class="btn bg-gradient-submit" data-toggle="modal" data-target="#modal-sm" id="sapvendorcode"
                            type="button">
                            Submit
                        </button>
                        <button type="submit" style="display: none;" id="stockFileSubmit">Submit</button>
                    </div>
                    <div class="col-sm-12 col-md-12 mt-3">
                        <i style="color: black;">
                            <a href="<?= $this->Url->build('/') ?>webroot/templates/stock_upload.xlsx"
                                download>stock_upload_template</a>
                        </i>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <?php if (isset($stockuploadData)) : ?>
            <div class="card-footer" id="id_pohead">
                <table class="table table-hover" id="example1">
                    <thead>
                        <tr>
                            <th>Material Description</th>
                            <th>Material Code</th>
                            <th>Unit Of Measurement</th>
                            <th>Opening Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stockuploadData as $stockuploads) :  ?>
                        <?php if ($stockuploads['status']) : ?>
                        <tr>
                            <td>
                                <?= h($stockuploads['data']['desc']) ?>
                            </td>
                            <td>
                                <?= h($stockuploads['data']['material_code']) ?>
                            </td>
                            <td>
                                <?= h($stockuploads['data']['uoms']) ?>
                            </td>
                            <td>
                                <?= h($stockuploads['data']["opening_stock"]) ?>
                            </td>
                            <td>
                                <?= h($stockuploads["msg"]) ?>
                            </td>
                        </tr>
                        <?php else : ?>
                        <tr>
                            <td>
                                <?= h($stockuploads['data']['desc']) ?>
                            </td>
                            <td>
                                <?= h($stockuploads['data']['material_code']) ?>
                            </td>
                            <td colspan="2"></td>
                            <td class="text-danger text-left">
                                <?= h($stockuploads["msg"]) ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
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
                <button type="button" class="btn addSubmit" style="border:1px solid #28a745">Ok</button>
            </div>
        </div>
    </div>
</div>

<script>



    $('#stockClick').click(function () {
        submitStatus = true
    });

    $('#sapvendorcode').click(function () {
        submitStatus = false
        console.log(submitStatus);
    });


    $('.addSubmit').click(function () {
        if (submitStatus) {
            $("#stockInputSubmit").trigger('click');
            $('#stockuploadForm')[0].reset();
        }
        else {
            $("#stockFileSubmit").trigger('click');
            $('#sapvendorcodeform')[0].reset();
        }
    });


    $(document).ready(function () {

        $('#OpenImgUpload').click(function () {
            $('#vendorCodeInput').trigger('click');
        });
        $('#vendorCodeInput').change(function () {
            var file = $(this).prop('files')[0].name;
            $("#filessnames").append(file);
        });

        setTimeout(function () {
            $('.success').fadeOut('slow');
        }, 2000);

        $("#descripe").change(function () {
            var vendorId = $(this).val();
            if (vendorId != "") {
                $.ajax({
                    type: "get",
                    url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/stock-uploads', 'action' => 'material')); ?>/" + vendorId,
                    dataType: "json",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader(
                            "Content-type",
                            "application/x-www-form-urlencoded"
                        );
                    },
                    success: function (response) {
                        if (response.status == "1") {
                            $("#description").val(response.data.description);
                            $("#uom").val(response.data.uom);
                        }
                    },
                    error: function (e) {
                        alert("An error occurred: " + e.responseText.message);
                        console.log(e);
                    },
                });
            }
        });


    });
</script>