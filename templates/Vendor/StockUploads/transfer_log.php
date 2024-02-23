<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">TRANSFER LOG</div>
            <div class="card-body">
        <table class="table table-hover table-striped table-bordered" id="example1">
            <thead>
                <tr>
                    <th>Vendor Code</th>
                    <th>Factory Code</th>
                    <th>From Material</th>
                    <th>To Material</th>
                    <th>Transfer Qty.</th>
                    <th>Transfer Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logs as $log): ?>
                    <tr>
                        <td><?= h($log->sap_vendor_code) ?></td>
                        <td><?= h($log->vendor_factory_code) ?></td>
                        <td><?= h($log->from_material) ?></td>
                        <td><?= h($log->to_material) ?></td>
                        <td><?= h($this->Number->format($log->transfer_qty)) ?></td>
                        <td><?= h($log->added_date->i18nFormat('dd-MM-YYYY')) ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        </div>
    </div>
</div>

