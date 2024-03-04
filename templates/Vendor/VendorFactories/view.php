<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorFactory $vendorFactory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Factory'), ['action' => 'edit', $vendorFactory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Factory'), ['action' => 'delete', $vendorFactory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorFactory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Factories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Factory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorFactories view content">
            <h3><?= h($vendorFactory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $vendorFactory->has('vendor_temp') ? $this->Html->link($vendorFactory->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorFactory->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Factory Code') ?></th>
                    <td><?= h($vendorFactory->factory_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($vendorFactory->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address 2') ?></th>
                    <td><?= h($vendorFactory->address_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pincode') ?></th>
                    <td><?= h($vendorFactory->pincode) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($vendorFactory->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($vendorFactory->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($vendorFactory->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Installed Capacity') ?></th>
                    <td><?= h($vendorFactory->installed_capacity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Installed Capacity File') ?></th>
                    <td><?= h($vendorFactory->installed_capacity_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Machinery Available') ?></th>
                    <td><?= h($vendorFactory->machinery_available) ?></td>
                </tr>
                <tr>
                    <th><?= __('Machinery Available File') ?></th>
                    <td><?= h($vendorFactory->machinery_available_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Power consumption') ?></th>
                    <td><?= h($vendorFactory->power_available) ?></td>
                </tr>
                <tr>
                    <th><?= __('Power consumption File') ?></th>
                    <td><?= h($vendorFactory->power_available_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Raw Material') ?></th>
                    <td><?= h($vendorFactory->raw_material) ?></td>
                </tr>
                <tr>
                    <th><?= __('Raw Material File') ?></th>
                    <td><?= h($vendorFactory->raw_material_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorFactory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorFactory->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorFactory->updated_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Vendor Commencements') ?></h4>
                <?php if (!empty($vendorFactory->vendor_commencements)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Vendor Factory Id') ?></th>
                            <th><?= __('Vendor Temp Id') ?></th>
                            <th><?= __('Commencement Year') ?></th>
                            <th><?= __('Commencement Material') ?></th>
                            <th><?= __('First Year') ?></th>
                            <th><?= __('First Year Qty') ?></th>
                            <th><?= __('Second Year') ?></th>
                            <th><?= __('Second Year Qty') ?></th>
                            <th><?= __('Third Year') ?></th>
                            <th><?= __('Third Year Qty') ?></th>
                            <th><?= __('Added Date') ?></th>
                            <th><?= __('Updated Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($vendorFactory->vendor_commencements as $vendorCommencements) : ?>
                        <tr>
                            <td><?= h($vendorCommencements->id) ?></td>
                            <td><?= h($vendorCommencements->vendor_factory_id) ?></td>
                            <td><?= h($vendorCommencements->vendor_temp_id) ?></td>
                            <td><?= h($vendorCommencements->commencement_year) ?></td>
                            <td><?= h($vendorCommencements->commencement_material) ?></td>
                            <td><?= h($vendorCommencements->first_year) ?></td>
                            <td><?= h($vendorCommencements->first_year_qty) ?></td>
                            <td><?= h($vendorCommencements->second_year) ?></td>
                            <td><?= h($vendorCommencements->second_year_qty) ?></td>
                            <td><?= h($vendorCommencements->third_year) ?></td>
                            <td><?= h($vendorCommencements->third_year_qty) ?></td>
                            <td><?= h($vendorCommencements->added_date) ?></td>
                            <td><?= h($vendorCommencements->updated_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'VendorCommencements', 'action' => 'view', $vendorCommencements->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'VendorCommencements', 'action' => 'edit', $vendorCommencements->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'VendorCommencements', 'action' => 'delete', $vendorCommencements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorCommencements->id)]) ?>
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
