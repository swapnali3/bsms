<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Dailymonitor> $dailymonitor
 */
?>
<?= $this->Html->css('cstyle.css') ?>
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('v_index.css') ?>
<div class="card">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5>Production Confirmation</h5>
            </div>
        </div>
    </div>

    <div class="card-header p-0 mb-0 mt-3 ml-3 mr-3" id="id_pohead">
        <table class="table table-bordered material-list">
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
                        <td><?= h($dailymonitors->plan_date) ?></td>
                        <td><?= h($dailymonitors->production_line->line_master->name) ?></td>
                        <td><?= h($dailymonitors->material->description) ?></td>
                        <td><?= h($dailymonitors->target_production) ?>
                        <input type="hidden" value="<?php echo $dailymonitors->target_production;?>" id="plan_qty_<?= h($dailymonitors->id) ?>" data-id="<?= h($dailymonitors->id) ?>">
                    </td>
                        <?php if ($dailymonitors->status == 1) : ?>
                            <td>
                                <input type="number" class="form-control form-control-sm confirm-input" id="confirmprd<?= h($dailymonitors->id) ?>" data-id="<?= h($dailymonitors->id) ?>">
                            </td>
                            <td>
                                <button class="btn btn-success save btn-sm mb-0" id="confirmsave<?= h($dailymonitors->id) ?>" data-id="<?= h($dailymonitors->id) ?>">Save</button>
                            </td>
                            <?php elseif ($dailymonitors->status == 2) : ?>
                                <td colspan="2">
                                Plan Cancelled
                            </td>
                        <?php else: ?>
                            <td>
                                <input type="number" class="form-control form-control-sm" value="<?= h($dailymonitors->confirm_production) ?>" disabled>
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
</div>
<script>
    var getConfirmedProductionUrl="<?php echo \Cake\Routing\Router::url(array('controller' => '/dailymonitor', 'action' => 'confirmedproduction')); ?>"

    $(".confirm-input").keyup( function () {
            var id = $(this).attr('data-id');
            var val = parseFloat($(this).val().trim());
            var maxQty = parseFloat($("#plan_qty_"+id).val().trim());
            console.log(val + "=" + maxQty);
            if(val > maxQty) {
                $(this).val(maxQty);
            }
        });

</script>
<?= $this->Html->script('v_dailymonitor_dailyentry') ?>