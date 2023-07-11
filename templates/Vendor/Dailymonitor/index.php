<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Dailymonitor> $dailymonitor
 */
?>
</style>
<?= $this->Html->css('custom') ?>
<div class="card">
    <div class="card-header pb-1 pt-2">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                <h5>Weekly Production Planner</h5>
            </div>
            <div class="col-lg-6 d-flex justify-content-end text-align-end">
                <a href="<?= $this->Url->build('/') ?>vendor/dailymonitor/add"><button type="button" id="continueSub" class="btn mb-0 continue_btn btn-dark">Add Monitor</button></a>
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
                    <th>Target Production</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($dailymonitor)) : ?>
                <?php foreach ($dailymonitor as $dailymonitors) : ?>
                    <tr>
                        <td><?= h($dailymonitors->plan_date) ?></td>
                        <td><?= h($dailymonitors->prdline_description) ?></td>
                        <td><?= h($dailymonitors->material_description) ?></td>
                        <td><?= h($dailymonitors->target_production) ?></td>
                        <td>
                            <div class="float-left">
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dailymonitors->id], ['class' => 'btn btn-info btn-sm mb-0']) ?>
                            </div>
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
        </table>
    </div>
</div>