<div class="buyer=profile">
<div class="row">
    <div class="col-12">
        <div class="vendorTemps view content card">
            <div class="card-header">
                <h5>
                    <b>
                        <?= $adminUser->first_name .' '. $adminUser->last_name ?>
                    </b>
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="table vendor-info mb-0">

                                <tr>
                                    <th>
                                        <?= __('Mobile No') ?>
                                    </th>
                                    <td>
                                       <?= $adminUser->mobile?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Email Id') ?>
                                    </th>
                                    <td>
                                    <?= $adminUser->username?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Address') ?>
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