<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LineMaster $lineMaster
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Line Masters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lineMasters form content">
            <?= $this->Form->create($lineMaster) ?>
            <fieldset>
                <legend><?= __('Add Line Master') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('uom');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
