<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Html->css('cstyle.css') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('b_index.css') ?>
<?= $this->Html->css('b_vendorCustom') ?>
<div class="buyer-profile">
    <div class="profile-page pb-4 pl-2">
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="height:100%">
                    <div class="left-s">
                        <div class="m-5 text-center">
                            <img width="200px"
                                src="<?= $this->Url->build('/') ?>img/<?= substr($adminUser->first_name,0,1) ?>.png"
                                alt="Buyer">
                        </div>
                        <div class="desc">
                            <ul>
                                <li>
                                    <p>Name : <b>
                                            <?= $adminUser->first_name .' '. $adminUser->last_name ?>
                                        </b></p>
                                </li>
                                <li>
                                    <p>Mobile No :<b>
                                            <?= $adminUser->mobile?>
                                        </b></p>
                                </li>
                                <li>
                                    <p>Email ID : <b>
                                            <?= $adminUser->username?>
                                        </b></p>
                                </li>
                                <li>
                                    <p>Status : <b><span class="badge bg-success">Active</span></b></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <div class="row">
                            <div class="clo-md-6 col-lg-6 pr-0">
                                <table>
                                    <tr>
                                        <td>
                                            <?= __('Address') ?>
                                        </td>
                                        <th style="padding:10px 10px;"></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= __('City') ?>
                                        </td>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= __('Pincode') ?>
                                        </td>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= __('State') ?>
                                        </td>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= __('Country') ?>
                                        </td>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= __('Pan No') ?>
                                        </td>
                                        <th></th>
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