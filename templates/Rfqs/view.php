<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rfq $rfq
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rfq'), ['action' => 'edit', $rfq->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rfq'), ['action' => 'delete', $rfq->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfq->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rfqs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rfq'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rfqs view content">
            <h3><?= h($rfq->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $rfq->has('vendor_temp') ? $this->Html->link($rfq->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $rfq->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pr Header') ?></th>
                    <td><?= $rfq->has('pr_header') ? $this->Html->link($rfq->pr_header->id, ['controller' => 'PrHeaders', 'action' => 'view', $rfq->pr_header->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pr Footer') ?></th>
                    <td><?= $rfq->has('pr_footer') ? $this->Html->link($rfq->pr_footer->id, ['controller' => 'PrFooters', 'action' => 'view', $rfq->pr_footer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rfq->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Buyer Id') ?></th>
                    <td><?= $this->Number->format($rfq->buyer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($rfq->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($rfq->updated_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $rfq->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Rfq Inquiries') ?></h4>
                <?php if (!empty($rfq->rfq_inquiries)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Rfq Id') ?></th>
                            <th><?= __('Seller Id') ?></th>
                            <th><?= __('Qty') ?></th>
                            <th><?= __('Rate') ?></th>
                            <th><?= __('Delivery Date') ?></th>
                            <th><?= __('Inquiry Data') ?></th>
                            <th><?= __('Inquiry') ?></th>
                            <th><?= __('Created Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($rfq->rfq_inquiries as $rfqInquiries) : ?>
                        <tr>
                            <td><?= h($rfqInquiries->id) ?></td>
                            <td><?= h($rfqInquiries->rfq_id) ?></td>
                            <td><?= h($rfqInquiries->seller_id) ?></td>
                            <td><?= h($rfqInquiries->qty) ?></td>
                            <td><?= h($rfqInquiries->rate) ?></td>
                            <td><?= h($rfqInquiries->delivery_date) ?></td>
                            <td><?= h($rfqInquiries->inquiry_data) ?></td>
                            <td><?= h($rfqInquiries->inquiry) ?></td>
                            <td><?= h($rfqInquiries->created_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'RfqInquiries', 'action' => 'view', $rfqInquiries->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'RfqInquiries', 'action' => 'edit', $rfqInquiries->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'RfqInquiries', 'action' => 'delete', $rfqInquiries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfqInquiries->id)]) ?>
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
