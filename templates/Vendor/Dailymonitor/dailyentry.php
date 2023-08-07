<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Dailymonitor> $dailymonitor
 */
?>
<!-- <?= $this->Html->css('cstyle.css') ?> -->
<!-- <?= $this->Html->css('custom') ?> -->
<!-- <?= $this->Html->css('table.css') ?> -->
<!-- <?= $this->Html->css('listing.css') ?> -->
<?= $this->Html->css('v_index.css') ?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-start">
                        <h5>Production Confirmation</h5>
                    </div>
                </div>
            </div>
            <div class="card-header" id="id_pohead">
                <table class="table table-bordered table-hover table-striped material-list">
                    <thead>
                        <tr>
                            <th>Plan Date</th>
                            <th>Production Line</th>
                            <th>Material</th>
                            <th>Production Plan</th>
                            <th>Confirm Production</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($dailymonitor)) : ?>
                        <?php foreach ($dailymonitor as $dailymonitors) : ?>
                        <tr>
                            <td>
                                <?= h($dailymonitors->plan_date) ?>
                            </td>
                            <td>
                                <?= h($dailymonitors->production_line->line_master->name) ?>
                            </td>
                            <td>
                                <?= h($dailymonitors->material->description) ?>
                            </td>
                            <td>
                                <?= h($dailymonitors->target_production) ?>
                                <input type="hidden" value="<?php echo $dailymonitors->target_production;?>"
                                    id="plan_qty_<?= h($dailymonitors->id) ?>" data-id="<?= h($dailymonitors->id) ?>">
                            </td>
                            <?php if ($dailymonitors->status == 1) : ?>
                            <td>
                                <input type="number" class="form-control form-control-sm confirm-input"
                                    id="confirmprd<?= h($dailymonitors->id) ?>" data-id="<?= h($dailymonitors->id) ?>">
                            </td>
                            <td>
                                <button class="btn btn-success save btn-sm mb-0"
                                    id="confirmsave<?= h($dailymonitors->id) ?>"
                                    data-id="<?= h($dailymonitors->id) ?>">Save</button>
                            </td>
                            <?php elseif ($dailymonitors->status == 2) : ?>
                            <td colspan="2" class="text-center">
                                Plan Cancelled
                            </td>
                            <?php else: ?>
                            <td>
                                <input type="number" class="form-control form-control-sm"
                                    value="<?= h($dailymonitors->confirm_production) ?>" disabled>
                            </td>
                            <td></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="6">
                                No Records Found
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <?= $this->Form->create(null, ['id' => 'productionconfirmation', 'enctype'=>'multipart/form-data',  'url' => ['action' => 'upload']]) ?>
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-2">
                        <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
                        <?= $this->Form->control('upload_file', ['type' => 'file', 'label' => false, 'class' => 'pt-1 rounded-0', 'style' => 'visibility: hidden; position: absolute;', 'div' => 'form-group', 'id' => 'upload_file']); ?>
                        <?= $this->Form->button('Upload File', ['id' => 'OpenImgUpload', 'type' =>
                'button', 'label' => 'Upload File', 'class' => 'd-block btn btn-block bg-gradient-button mb-0 file-upld-btn']); ?>
                        <span id="filessnames"></span>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-2">
                        <button type="button" class="btn bg-gradient-submit" id="id_exportme">IMPORT FILE</button>
                    </div>
                    <div class="col-12 pt-2">
                        <i style="color: black;">
                            <a href="<?= $this->Url->build('/') ?>webroot/templates/production_confirmation.xlsx"
                                target="_blank" rel="noopener noreferrer">Production Confirmation.xlsx</a>
                        </i>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<script>
    var getConfirmedProductionUrl = "<?php echo \Cake\Routing\Router::url(array('controller' => '/dailymonitor', 'action' => 'confirmedproduction')); ?>"
    var uploadConfirmedProductionUrl = "<?php echo \Cake\Routing\Router::url(array('controller' => '/dailymonitor', 'action' => 'upload')); ?>";
    $(".confirm-input").keyup(function () {
        var id = $(this).attr('data-id');
        var val = parseFloat($(this).val().trim());
        var maxQty = parseFloat($("#plan_qty_" + id).val().trim());
        console.log(val + "=" + maxQty);
        if (val > maxQty) {
            $(this).val(maxQty);
        }
    });

    $('#OpenImgUpload').click(function () { $('#upload_file').trigger('click'); });

    $('#id_exportme').on('click', function () {
        var file_data = new FormData($('#productionconfirmation')[0]);
        $.ajax({
            url: uploadConfirmedProductionUrl,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-Token': $('[name="_csrfToken"]').val() },
            data: file_data,
            type: 'post',
            success: function (resp) { if (resp['status'] == 1) { setTimeout(function () { window.location.reload(); }, 500); } }
        });
    });
</script>
<?= $this->Html->script('v_dailymonitor_dailyentry') ?>