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
                <h5>Daily Monitor</h5>
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
                    <th>Target Production</th>
                    <th>Confirm Production</th>
                    <th>Added Date</th>
                    <th>Update Date</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($dailymonitor as $dailymonitors) : ?>
                <tr>
                <td><?= h($dailymonitors->target_production) ?></td>
                <td><?= h($dailymonitors->confirm_production) ?></td>
                <td><?= h($dailymonitors->updated_date) ?></td>
                <td><?= h($dailymonitors->added_date) ?></td>
                <td><?= $dailymonitors->status == 0 ? '<span class="badge bg-success">On Insert</span>' : ($dailymonitors->status == 1 ? '<span class="badge bg-info">confirm production</span>' : '<span class="badge bg-info">confirm modified</span>') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>