<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoFooter $poFooter
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Po Footer'), ['action' => 'edit', $poFooter->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Po Footer'), ['action' => 'delete', $poFooter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poFooter->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Po Footers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Po Footer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="poFooters view content">
            <h3><?= h($poFooter->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Po Header') ?></th>
                    <td><?= $poFooter->has('po_header') ? $this->Html->link($poFooter->po_header->id, ['controller' => 'PoHeaders', 'action' => 'view', $poFooter->po_header->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= h($poFooter->item) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted Indication') ?></th>
                    <td><?= h($poFooter->deleted_indication) ?></td>
                </tr>
                <tr>
                    <th><?= __('Material') ?></th>
                    <td><?= h($poFooter->material) ?></td>
                </tr>
                <tr>
                    <th><?= __('Short Text') ?></th>
                    <td><?= h($poFooter->short_text) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order Unit') ?></th>
                    <td><?= h($poFooter->order_unit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price Unit') ?></th>
                    <td><?= h($poFooter->price_unit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($poFooter->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Po Qty') ?></th>
                    <td><?= $this->Number->format($poFooter->po_qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Grn Qty') ?></th>
                    <td><?= $this->Number->format($poFooter->grn_qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pending Qty') ?></th>
                    <td><?= $this->Number->format($poFooter->pending_qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Net Price') ?></th>
                    <td><?= $this->Number->format($poFooter->net_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Net Value') ?></th>
                    <td><?= $this->Number->format($poFooter->net_value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gross Value') ?></th>
                    <td><?= $this->Number->format($poFooter->gross_value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($poFooter->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($poFooter->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
