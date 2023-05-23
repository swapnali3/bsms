<style>
    .vendor-profile table {
    font-size: 14px;
}
.vendor-profile tr {
    display: block;
    padding: 5px 10px;
}
</style>
<div class="buyer-profile">
<div class="row">
    <div class="col-12">
        <div class="vendorTemps view content card">
            <div class="card-header">
                <h6 class="mt-2 ml-2 text-info">
                    <b>
                        <?= $adminUser->first_name .' '. $adminUser->last_name ?>
                    </b>
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="vendor-profile">
                            <table class="mb-0">

                                <tr>
                                    <th>
                                        <?= __('Mobile No :') ?>
                                    </th>
                                    <td>
                                       <?= $adminUser->mobile?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Email Id :') ?>
                                    </th>
                                    <td>
                                    <?= $adminUser->username?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Address :') ?>
                                    </th>
                                    <td>
                                        Mumbai
                                    </td>
                                </tr>




                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>