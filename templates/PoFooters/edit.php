<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoFooter $poFooter
 * @var string[]|\Cake\Collection\CollectionInterface $poHeaders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $poFooter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $poFooter->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Po Footers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="poFooters form content">
            <?= $this->Form->create($poFooter) ?>
            <fieldset>
                <legend><?= __('Edit Po Footer') ?></legend>
                <?php
                    echo $this->Form->control('po_header_id', ['options' => $poHeaders]);
                    echo $this->Form->control('item');
                    echo $this->Form->control('deleted_indication');
                    echo $this->Form->control('material');
                    echo $this->Form->control('short_text');
                    echo $this->Form->control('po_qty');
                    echo $this->Form->control('grn_qty');
                    echo $this->Form->control('pending_qty');
                    echo $this->Form->control('order_unit');
                    echo $this->Form->control('net_price');
                    echo $this->Form->control('price_unit');
                    echo $this->Form->control('net_value');
                    echo $this->Form->control('gross_value');
                    echo $this->Form->control('added_date');
                    echo $this->Form->control('updated_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
