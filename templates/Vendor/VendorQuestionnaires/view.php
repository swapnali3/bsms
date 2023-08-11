<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorQuestionnaire $vendorQuestionnaire
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Questionnaire'), ['action' => 'edit', $vendorQuestionnaire->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Questionnaire'), ['action' => 'delete', $vendorQuestionnaire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorQuestionnaire->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Questionnaires'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Questionnaire'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorQuestionnaires view content">
            <h3><?= h($vendorQuestionnaire->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendor Temp') ?></th>
                    <td><?= $vendorQuestionnaire->has('vendor_temp') ? $this->Html->link($vendorQuestionnaire->vendor_temp->name, ['controller' => 'VendorTemps', 'action' => 'view', $vendorQuestionnaire->vendor_temp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Question') ?></th>
                    <td><?= h($vendorQuestionnaire->question) ?></td>
                </tr>
                <tr>
                    <th><?= __('Answer') ?></th>
                    <td><?= h($vendorQuestionnaire->answer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorQuestionnaire->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorQuestionnaire->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorQuestionnaire->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
