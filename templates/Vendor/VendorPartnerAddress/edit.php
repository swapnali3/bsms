<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorPartnerAddres $vendorPartnerAddres
 * @var string[]|\Cake\Collection\CollectionInterface $vendorTemps
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vendorPartnerAddres->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vendorPartnerAddres->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Vendor Partner Address'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorPartnerAddress form content">
            <?= $this->Form->create($vendorPartnerAddres) ?>
            <fieldset>
                <legend><?= __('Edit Vendor Partner Addres') ?></legend>
                <?php
                    echo $this->Form->control('vendor_temp_id', ['options' => $vendorTemps]);
                    echo $this->Form->control('type');
                    echo $this->Form->control('name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('address_2');
                    echo $this->Form->control('pincode');
                    echo $this->Form->control('city');
                    echo $this->Form->control('country');
                    echo $this->Form->control('state');
                    echo $this->Form->control('telephone');
                    echo $this->Form->control('fax_no');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
