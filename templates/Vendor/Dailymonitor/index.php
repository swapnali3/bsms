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
<!-- <?= $this->Html->css('v_index.css') ?> -->
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.5.4/select2-bootstrap4.min.css') ?>
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css') ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-lg-6 d-flex justify-content-start">
                        <h5 class="mb-0"><b>Production Planner</b></h5>
                    </div>
                    <div class="col-sm-6 col-lg-6 d-flex justify-content-end add-monitor-btn">
                        <a href="<?= $this->Url->build('/') ?>vendor/dailymonitor/add"><button type="button" id="continueSub" class="btn continue_btn bg-gradient-button">Add Plan</button></a>
                    </div>
                </div>
            </div>
            <div class="card-body" id="id_pohead">
            <?= $this->Form->create(null, ['id' => 'planerform']) ?>
            <div class="row">
                
                <div class="col-sm-12 col-md-3 col-lg-2">
                    <label for="id_plan_date">Plan Date</label><br>
                    <input class="form-control" type="date" name="plan_date" id="id_plan_date">
                </div>
                <div class="col-sm-12 col-md-3 col-lg-2">
                    <label for="id_prod_line">Production Line</label><br>
                    <select name="segment[]" id="id_prod_line" multiple="multiple" class="form-control chosen">
                        <?php if (isset($segment)) : ?>
                        <?php foreach ($segment as $mat) : ?>
                        <option value="<?= h($mat->segment) ?>" data-select="<?= h($mat->segment) ?>">
                            <?= h($mat->segment) ?>
                        </option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-4">
                    <label for="id_material">Material</label><br>
                    <select name="material[]" id="id_material" multiple="multiple" class="form-control chosen">
                        <?php if (isset($materialList)) : ?>
                        <?php foreach ($materialList as $mat) : ?>
                        <option value="<?= h($mat->id) ?>" data-select="<?= h($mat->code) ?>">
                            <?= h($mat->code) ?>
                            <?= h($mat->description) ?>
                        </option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-1 mt-2">
                    <div class="form-group mt-4">
                        <?= $this->Form->button(__('Search'), ['class' => 'btn bg-gradient-submit', 'id' => 'id_sub', 'type' => 'submit']) ?>
                    </div>
                </div>
            </div>
            <?= $this->Form->end() ?>
                <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th>Plan Date</th>
                            <th>Production Line</th>
                            <th>Material</th>
                            <th>Material Desc.</th>
                            <th>Production Plan</th>
                            <th>Confirmed Production</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($dailymonitor)) : ?>
                        <?php foreach ($dailymonitor as $dailymonitors) : 

                        //echo '<pre>'; print_r($dailymonitors); exit;
                            $status = 'Active';
                            if($dailymonitors->status == 2) { 
                                $status = 'Cancelled'; 
                            } else if($dailymonitors->status == 3) { 
                                $status = 'Production Confirmed'; 
                            }
                            ?>
                            <tr>
                                <td><?= h($dailymonitors->plan_date->i18nFormat('dd-MM-YYYY')) ?></td>
                                <td><?= h($dailymonitors->production_line->line_master->name) ?></td>
                                <td><?= h($dailymonitors->material->code) ?></td>
                                <td><?= h($dailymonitors->material->description) ?></td>
                                <td><?= h($dailymonitors->target_production. ' '. $dailymonitors->material->uom) ?></td>
                                <td><?= h($dailymonitors->confirm_production. ' '. $dailymonitors->material->uom) ?></td>
                                <td><?= h($status) ?></td>
                                <td>
                                    <?php if($dailymonitors->status == 1) : ?>
                                    <div class="float-left">
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dailymonitors->id], ['class' => 'btn btn-info btn-sm mb-0']) ?>
                                    
                                        <!-- <?= $this->Html->link(__('Cancel'), "#", ['data-value' => $dailymonitors->id, 'data-key' => 'cancel', 'class' => 'btn btn-info btn-sm mb-0 cancel']) ?> -->
                                    </div>
                                    <?php endif; ?>
                                </td>
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
                </table></div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.chosen').select2({
        closeOnSelect : false,
        placeholder: 'Select',
        allowClear: true,
        tags: false,
        tokenSeparators: [',', ' '],
        templateSelection: function(selection) {
            if (selection.element && $(selection.element).attr('data-select') !== undefined) {
                return $(selection.element).attr('data-select');
            } else {
                return selection.text;
            }
        }
    });
    $(document).ready(function() {
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
    
        $(document).on("click", ".cancel", function() {
            var value = $(this).attr('data-value');
            var action = $(this).attr('data-key');
            if (value != "") {
                $.ajax({
                    type: "get",
                    url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/daily-monitor', 'action' => 'change-status')); ?>/" + action +"/"+value,
                    dataType: "json",
                    beforeSend: function(xhr) {
                        $("#gif_loader").show();
                        xhr.setRequestHeader(
                            "Content-type",
                            "application/x-www-form-urlencoded"
                        );
                    },
                    success: function(response) {
                        if (response.status == "1") {
                            table.draw();
                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            });
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.message
                            });
                        }
                    },
                    error: function(e) {
                        alert("An error occurred: " + e.responseText.message);
                        console.log(e);
                    },
                    complete: function () { $("#gif_loader").hide(); }
                });
            }
        });
    });

</script>