<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountGroup $accountGroup
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Account Groups'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accountGroups form content">
            <?= $this->Form->create($accountGroup) ?>
            <fieldset>
                <legend><?= __('Add Account Group') ?></legend>
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
