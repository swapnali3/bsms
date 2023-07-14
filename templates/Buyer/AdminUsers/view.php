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
                        <div class="prof-img text-center">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="desc">
                            <ul>
                                <li>
                                    <p>Name : <b><?= $adminUser->first_name .' '. $adminUser->last_name ?></b></p>
                                </li>
                                <li>
                                    <p>Mobile No :<b><?= $adminUser->mobile?></b></p>
                                </li>
                                <li>
                                    <p>Email ID : <b><?= $adminUser->username?></b></p>
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
                <div class="card mb-0" style="height:100%">
                    <div class="right-s">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="des mt-3">
                                    <div class="row">
                                        <div class="clo-md-6 col-lg-6 pr-0">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <?= __('Address') ?>
                                                    </td>
                                                    <th style="padding:10px 10px;">
                                                        <b>Mira Road</b>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?= __('City') ?>
                                                    </td>
                                                    <th>
                                                        <b>Mumbai</b>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?= __('Pincode') ?>
                                                    </td>
                                                    <th>
                                                        <b>400709</b>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?= __('State') ?>
                                                    </td>
                                                    <th>
                                                        <b>MH</b>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?= __('Country') ?>
                                                    </td>
                                                    <th>
                                                        <b>India</b>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?= __('Pan No') ?>
                                                    </td>
                                                    <th>
                                                        <b>2345678908765432</b>
                                                    </th>
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
        </div>
    </div>
</div>