<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorPartnerAddres $vendorPartnerAddres
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Partner Addres'), ['action' => 'edit', $vendorPartnerAddres->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Partner Addres'), ['action' => 'delete', $vendorPartnerAddres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorPartnerAddres->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Partner Address'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Partner Addres'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorPartnerAddress view content">
            <h3><?= h($vendorPartnerAddres->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $vendorPartnerAddres->has('vendor_temp') ? $this->Html->link($vendorPartnerAddres->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorPartnerAddres->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($vendorPartnerAddres->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($vendorPartnerAddres->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($vendorPartnerAddres->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address 2') ?></th>
                    <td><?= h($vendorPartnerAddres->address_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pincode') ?></th>
                    <td><?= h($vendorPartnerAddres->pincode) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($vendorPartnerAddres->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($vendorPartnerAddres->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($vendorPartnerAddres->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telephone') ?></th>
                    <td><?= h($vendorPartnerAddres->telephone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fax No') ?></th>
                    <td><?= h($vendorPartnerAddres->fax_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorPartnerAddres->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorPartnerAddres->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorPartnerAddres->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
