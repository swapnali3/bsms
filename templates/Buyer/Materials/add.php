<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorMaterial $vendorMaterial
 */
?>
<!-- <?= $this->Html->css('cstyle.css') ?> -->
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('v_index.css') ?>


<div class="card">
<div class="card-header d-flex justify-content-between align-items-center">
    <div class="col-lg-6 pl-0">
        <h5 class="m-0"><b>Upload Material Master</b></h5>
    </div>
    
    <div class="col-lg-6 form-content d-flex justify-content-end pr-0">
        <?= $this->Form->create($materials, ['id' => 'formUpload', 'url' => ['controller' => '/materials', 'action' => 'upload']]) ?>
        <div class="row align-items-center">
            <div class="col-auto pr-1" data-toggle="tooltip" data-original-title="Download Template" data-placement="bottom">
                <a href="<?= $this->Url->build('/') ?>webroot/templates/material_master.xlsx" class="material_file" download target="_blank" rel="noopener noreferrer"><i class="fa fa-solid fa-file-download"></i></a>
            </div>
            <div class="col-auto pr-1">
                <?= $this->Form->control('upload_file', [
                    'type' => 'file',
                    'label' => false,
                    'class' => 'pt-1 rounded-0',
                    'style' => 'visibility: hidden; position: absolute;',
                    'div' => 'form-group',
                    'id' => 'bulk_file'
                ]); ?>
                <?= $this->Form->button('Upload File', [
                    'id' => 'OpenImgUpload',
                    'type' => 'button',
                    'label' => 'Upload File',
                    'class' => 'upload_file d-block btn bg-gradient-button mb-0 file-upld-btn'
                ]); ?>
            </div>
            <div class="col-auto pr-0">
                <button class="btn bg-gradient-submit" id="id_import" type="button">Submit</button>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

</div>

<div class="card">
    <div class="card-header p-0 mb-0 mt-3 ml-3 mr-3" id="id_pohead">
        <table class="table table-hover" id="example1">
            <thead>
                <tr>
                    <th>Vendor Code</th>
                    <th>Material Code</th>
                    <th>Material Description</th>
                    <th>Minimum Stock</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </tbody>
        </table>
    </div>
</div>
<script>
    function showConfirmationModal() {
        $('#modal-sm').modal('show');
    }

    // $(window).load(function() {
    //     alert("dsf");
    //     $('#vendormaterialform')[0].reset();
    // });

    $(document).ready(function() {

        $('.addSubmit').click(function() {
        if (submitStatus && $('#stockuploadForm').valid()) {
            $('#stockuploadForm')[0].submit();
        } else {
            $('#id_import').trigger('click');
        }
        $('#modal-sm').modal('hide');

    });

        $('#OpenImgUpload').click(function() {
            $('#bulk_file').trigger('click');
        });
        $('#bulk_file').change(function() {
            var file = $(this).prop('files')[0].name;
            $("#filessnames").empty().append(file);
        });

        setTimeout(function() {
            $('.success').fadeOut('slow');
        }, 2000);

        $("#id_import").click(function () {
        var fd = new FormData($('#formUpload')[0]);

        $.ajax({
            url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/materials', 'action' => 'upload')); ?>",
            type: "post",
            dataType: 'json',
            processData: false, // important
            contentType: false, // important
            data: fd,
            beforeSend: function () { $("#gif_loader").show(); },
            success: function(response) {
                if (response.status == 1) {   
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });

    
                    $("#example1 tbody").empty();

                    // Loop through the response data and build the table rows dynamically
                    $.each(response.data, function (key, val) { 
                        var rowHtml = `<tr>
                        <td>` + val.sap_vendor_code + `</td>
                        <td> `+ val.material_code + `</td>
                        <td> `+ val.description +` </td>
                        <td> `+ val.minimum_stock +` </td>
                        <td> `+ val.uom +`</td>
                        <td> `+ val.error + `</td>
                        </tr>`;
                        $("#example1 tbody").append(rowHtml);
                    });

                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    });    
                }
                $("#formUpload")[0].reset();
            },
            error: function () {
                Toast.fire({
                    icon: 'error',
                    title: 'An error occured, please try again.'
                });
            },
            complete: function () { $("#gif_loader").hide(); }
        });
    });
        

});
</script>