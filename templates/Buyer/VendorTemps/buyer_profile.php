<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Html->css('cstyle.css') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('b_index.css') ?>

<div class="buyer=profile">
<div class="row">
    <div class="col-12">
        <div class="vendorTemps view content card">
            <div class="card-header">
                <h5>
                    <b>
                        <?= h($vendorTemp->name) ?>
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
                                        <?= __('Name') ?>
                                    </th>
                                    <td>
                                        Test Name
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Mobile No') ?>
                                    </th>
                                    <td>
                                       98765432
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Email Id') ?>
                                    </th>
                                    <td>
                                        test@gmail.com
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