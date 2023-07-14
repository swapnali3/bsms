<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchasingOrganization $purchasingOrganization
 */
?>
<?= $this->Html->css('cstyle.css') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('b_index.css') ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $purchasingOrganization->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $purchasingOrganization->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Purchasing Organizations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchasingOrganizations form content">
            <?= $this->Form->create($purchasingOrganization) ?>
            <fieldset>
                <legend><?= __('Edit Purchasing Organization') ?></legend>
                <?php
                    echo $this->Form->control('name');
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
