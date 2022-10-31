<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>
<div class="row">
    
    <div class="column-responsive column-80">
        <div class="buyerSellerUsers form content">
            <?= $this->Form->create($buyerSellerUser) ?>
            <fieldset>
                <legend><?= __('NEW USER ! REGISTER HERE') ?></legend>
                <?php

                    $option = array('' => 'Type', 'buyer' => 'Buyer', 'seller' => 'Seller');
                    echo $this->Form->control('user_type', array('type' => 'select', 'options' => $option,'empty' => 'Select', 'id' => 'user_type'));
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('re_password');
                    echo $this->Form->control('company_name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('cities');
                    echo $this->Form->control('email');
                    echo $this->Form->control('contact');
                    echo $this->Form->control('alt_contact');
                    echo $this->Form->control('business_type');
                    echo $this->Form->control('product_deals', array('type' => 'select','options' => $products,'empty' => 'Select', 'id' => 'product'));
                    echo $this->Form->control('TIN');
                    echo $this->Form->control('GST');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
