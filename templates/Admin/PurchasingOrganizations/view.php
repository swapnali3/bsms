<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchasingOrganization $purchasingOrganization
 */
?>
<?= $this->Html->css('custom_table.css') ?>
<?= $this->Html->css('custom.css') ?>
<?= $this->Html->css('table.css') ?>
<div class="row po_padding">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Purchasing Organization'), ['action' => 'edit', $purchasingOrganization->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Purchasing Organization'), ['action' => 'delete', $purchasingOrganization->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchasingOrganization->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Purchasing Organizations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Purchasing Organization'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchasingOrganizations view content">
            <h3><?= h($purchasingOrganization->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($purchasingOrganization->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($purchasingOrganization->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($purchasingOrganization->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($purchasingOrganization->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($purchasingOrganization->updated_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Vendor Temps') ?></h4>
                <?php if (!empty($purchasingOrganization->vendor_temps)) : ?>
                <div class="table-responsive">
                    <table class="table table-responsive dataTable no-footer">
                        <thead><tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Purchasing Organization Id') ?></th>
                            <th><?= __('Account Group Id') ?></th>
                            <th><?= __('Schema Group Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('City') ?></th>
                            <th><?= __('Pincode') ?></th>
                            <th><?= __('Mobile') ?></th>
                            <th><?= __('Email Id') ?></th>
                            <th><?= __('Country') ?></th>
                            <th><?= __('Payment Term') ?></th>
                            <th><?= __('Order Currency') ?></th>
                            <th><?= __('Gst No') ?></th>
                            <th><?= __('Pan No') ?></th>
                            <th><?= __('Contact Person') ?></th>
                            <th><?= __('Contact Email Id') ?></th>
                            <th><?= __('Contact Mobile') ?></th>
                            <th><?= __('Cin No') ?></th>
                            <th><?= __('Tan No') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Valid Date') ?></th>
                            <th><?= __('Buyer Id') ?></th>
                            <th><?= __('Added Date') ?></th>
                            <th><?= __('Updated Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr></thead>
                        <?php foreach ($purchasingOrganization->vendor_temps as $vendorTemps) : ?>
                        <tr>
                            <td><?= h($vendorTemps->id) ?></td>
                            <td><?= h($vendorTemps->purchasing_organization_id) ?></td>
                            <td><?= h($vendorTemps->account_group_id) ?></td>
                            <td><?= h($vendorTemps->schema_group_id) ?></td>
                            <td><?= h($vendorTemps->name) ?></td>
                            <td><?= h($vendorTemps->address) ?></td>
                            <td><?= h($vendorTemps->city) ?></td>
                            <td><?= h($vendorTemps->pincode) ?></td>
                            <td><?= h($vendorTemps->mobile) ?></td>
                            <td><?= h($vendorTemps->email_id) ?></td>
                            <td><?= h($vendorTemps->country) ?></td>
                            <td><?= h($vendorTemps->payment_term) ?></td>
                            <td><?= h($vendorTemps->order_currency) ?></td>
                            <td><?= h($vendorTemps->gst_no) ?></td>
                            <td><?= h($vendorTemps->pan_no) ?></td>
                            <td><?= h($vendorTemps->contact_person) ?></td>
                            <td><?= h($vendorTemps->contact_email_id) ?></td>
                            <td><?= h($vendorTemps->contact_mobile) ?></td>
                            <td><?= h($vendorTemps->cin_no) ?></td>
                            <td><?= h($vendorTemps->tan_no) ?></td>
                            <td><?= h($vendorTemps->status) ?></td>
                            <td><?= h($vendorTemps->valid_date) ?></td>
                            <td><?= h($vendorTemps->buyer_id) ?></td>
                            <td><?= h($vendorTemps->added_date) ?></td>
                            <td><?= h($vendorTemps->updated_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'VendorTemps', 'action' => 'view', $vendorTemps->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'VendorTemps', 'action' => 'edit', $vendorTemps->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'VendorTemps', 'action' => 'delete', $vendorTemps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorTemps->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
