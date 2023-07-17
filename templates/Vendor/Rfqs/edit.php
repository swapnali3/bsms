<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rfq $rfq
 * @var string[]|\Cake\Collection\CollectionInterface $vendorTemps
 * @var string[]|\Cake\Collection\CollectionInterface $prHeaders
 * @var string[]|\Cake\Collection\CollectionInterface $prFooters
 */
?>
<?= $this->Html->css('cstyle.css') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('v_index.css') ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rfq->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rfq->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Rfqs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rfqs form content">
            <?= $this->Form->create($rfq) ?>
            <fieldset>
                <legend><?= __('Edit Rfq') ?></legend>
                <?php
                    echo $this->Form->control('buyer_id');
                    echo $this->Form->control('vendor_temp_id', ['options' => $vendorTemps]);
                    echo $this->Form->control('pr_header_id', ['options' => $prHeaders]);
                    echo $this->Form->control('pr_footer_id', ['options' => $prFooters]);
                    echo $this->Form->control('status');
                    echo $this->Form->control('added_date');
                    echo $this->Form->control('updated_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
