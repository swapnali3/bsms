<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser $adminUser
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="adminUsers form content">
            <?= $this->Form->create($adminUser) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('first_name', ['class' => 'form-control rounded-0','div' => 'form-group']);  
                    echo $this->Form->control('last_name', ['class' => 'form-control rounded-0','div' => 'form-group']);
                    echo $this->Form->control('username', ['label' => 'Email','class' => 'form-control rounded-0','div' => 'form-group']);
                    echo $this->Form->control('mobile', ['class' => 'form-control rounded-0','div' => 'form-group']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
