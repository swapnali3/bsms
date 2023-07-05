<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp[]|\Cake\Collection\CollectionInterface $vendorTemps
 */

?>
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('b_vendortemps_index') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body vendor-list">
                <div class="table-responsive">
                    <table class="table table-hover" id="example1">
                        <thead>
                            <tr>
                                <th><?= h('Name') ?></th>
                                <th><?= h('Email') ?></th>
                                <th><?= h('Mobile') ?></th>
                                <th><?= h('SAP Vendor Code') ?></th>
                                <th><?= h('City') ?></th>
                                <th><?= h('Pincode') ?></th>
                                <th><?= h('Contact Person') ?></th>
                                <th><?= h('Contact Email') ?></th>
                                <th><?= h('Contact Mobile') ?></th>
                                <th><?= h('Status') ?></th>
                                <!-- <th><?= h('Added Date') ?></th> -->
                                <!-- <th><?= h('Updated Date') ?></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vendorTemps as $vendorTemp) :

                                switch ($vendorTemp->status) {
                                    case 0:
                                        $status = '<button type="button" class="btn bg-info btn-info m-0" data-toggle="tooltip" data-placement="top" title="Sent to Vendor">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                  </button>';
                                        break;
                                    case 1:
                                        $status = '<button type="button" class="btn bg-info btn-info m-0" data-toggle="tooltip" data-placement="top" title="Pending for approval">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>

                                  </button>';
                                        break;
                                    case 2:
                                        $status = '<button type="button" class="btn bg-info btn-info m-0" data-toggle="tooltip" data-placement="top" title="Sent to SAP">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>

                                  </button>';
                                        break;
                                    case 3:
                                        $status ='<button type="button" class="btn bg-info btn-info m-0" data-toggle="tooltip" data-placement="top" title="Approved">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>

                                  </button>';
                                        break;
                                    case 4:
                                        $status = '<button type="button" class="btn bg-info btn-info m-0" data-toggle="tooltip" data-placement="top" title="Rejected">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>

                                  </button>';
                                        break;
                                    case 5:
                                        $status = '<button type="button" class="btn bg-info btn-info m-0" data-toggle="tooltip" data-placement="top" title="Sap Import">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>

                                      </button>';
                                        break;
                                }
                            ?>
                            <tr
                                redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>">
                                <td><?= h($vendorTemp->name) ?></td>
                                <td><?= h($vendorTemp->email) ?></td>
                                <td><?= h($vendorTemp->mobile) ?></td>
                                <td><?= h($vendorTemp->sap_vendor_code) ?></td>
                                <td><?= h($vendorTemp->city) ?></td>
                                <td><?= h($vendorTemp->pincode) ?></td>
                                <td><?= h($vendorTemp->contact_person) ?></td>
                                <td><?= h($vendorTemp->contact_email) ?></td>
                                <td><?= h($vendorTemp->contact_mobile) ?></td>
                                <td><?= $status ?></td>
                                <!-- <td><?= h($vendorTemp->added_date) ?></td> -->
                                <!-- <td><?= h($vendorTemp->updated_date) ?></td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('b_vendortemps_index') ?>