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
                    <th>status</th>
                    <th>Production Line</th>
                    <th>Target Production</th>
                    <th>Confirm Production</th>
                    <th>Added Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($dailymonitor)) : ?>
                <?php foreach ($dailymonitor as $dailymonitors) : ?>
                    <tr>
                        <td><?= $dailymonitors->status == 1 ? '<span class="badge lgreenbadge" data-toggle="tooltip" data-placement="right" title="Confirm Production"><i class="fas fa-user-check"></i></span>' : ($dailymonitors->status == 0 ? '<span class="badge dbluebadge" data-toggle="tooltip" data-placement="right" title="On Insert"><i class="fas fa-user-clock"></i></span>' : '<span class="badge lgreenbadge" data-toggle="tooltip" data-placement="right" title="confirm modified"><i class="fas fa-user-slash"></i></span>') ?></td>
                        <td><?= h($dailymonitors->prdline_description) ?></td>
                        <td><?= h($dailymonitors->target_production) ?></td>
                        <td><?= h($dailymonitors->confirm_production) ?></td>
                        <td><?= h($dailymonitors->added_date->format('d-m-Y')) ?></td>
                        <td><?= h($dailymonitors->updated_date->format('d-m-Y')) ?></td>
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