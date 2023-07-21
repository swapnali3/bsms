<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LineMaster $lineMaster
 */
?>
<?= $this->Html->css('v_index.css') ?>
<?= $this->Html->css('custom_table') ?>
<?= $this->Html->css('v_linemasters_add') ?>
<div class="row">
    <div class="col-12">
        <?= $this->Form->create($lineMaster) ?>
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <?php echo $this->Form->control('name', ['class'=> 'form-control']); ?>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <?php echo $this->Form->control('capacity', ['class'=> 'form-control']); ?>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                    <?php echo $this->Form->control('uom', array('class' => 'form-control w-100', 'options' => $uom, 'style' => "height: unset !important;", 'empty' => 'Please Select','label'=>'Unit Of Measurement')); ?>
                        <?php echo $this->Form->control('status', ['value'=> 1, 'style' => 'visibility: hidden; position: absolute;','label' => false]); ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <?= $this->Form->button(__('Submit'), ['class'=> 'btn btn-gradient-true']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-gradient-false']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<?= $this->Form->create(null, ['id' => 'formUpload', 'url' => ['controller' => '/line-masters', 'action' => 'upload']]) ?>
<div class="card">
    <div class="card-header">
        <h5><b>Bulk upload Line Master</b></h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-2">
                <?= $this->Form->control('upload_file', ['id' => 'bulk_file','type' => 'file']); ?>
                <span id="filessnames"></span>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2">
                <button type="button" class="btn btn-primary" id="id_exportme">IMPORT FILE</button>
            </div>
            <div class="col-12 pt-2">
                <i style="color: black;">
                    <a href="<?= $this->Url->build('/') ?>webroot/templates/line_master_upload.xlsx"
                        target="_blank" rel="noopener noreferrer">Master Template.xlsx</a>
                </i>
            </div>
        </div>
    </div>
    
</div>
<?= $this->Form->end() ?>

<script>
    $("#id_exportme").click(function() {
    var fd = new FormData($('#formUpload')[0]);

    $.ajax({
        url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/line-masters', 'action' => 'upload')); ?>",
        type: "post",
        dataType: 'json',
        processData: false, // important
        contentType: false, // important
        data: fd,
        success: function(response) {
            if(response.status) {
                Toast.fire({
                icon: 'success',
                title: response.message
              });

              //setTimeout(function() {history.go(-1);}, 1000);
              
            } else {
                Toast.fire({
                icon: 'error',
                title: response.message
              });
            }
        },
        error: function() {
            Toast.fire({
                icon: 'error',
                title: 'An error occured, please try again.'
              });
        }
    });
});
    </script>