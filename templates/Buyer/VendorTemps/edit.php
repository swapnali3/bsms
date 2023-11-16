<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 * @var \Cake\Collection\CollectionInterface|string[] $purchasingOrganizations
 * @var \Cake\Collection\CollectionInterface|string[] $accountGroups
 * @var \Cake\Collection\CollectionInterface|string[] $schemaGroups
 */
?>

<!-- <?= $this->Html->css('cstyle.css') ?> -->
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('table.css') ?>
<!-- <?= $this->Html->css('listing.css') ?> -->
<!-- <?= $this->Html->css('b_index.css') ?> -->
<?= $this->Html->css('b_vendortemps_add') ?>
<script>
    var addurl = "<?php echo \Cake\Routing\Router::url(array('controller' => '/vendor-temps', 'action' => 'edit', $vendorTemp->id)); ?>";
</script>

<div class="row">
    <div class="col-12 add-vendor">
        <div class="card mb-2 card_box_shadow">
            <div class="card-body fm">
                <?= $this->Form->create($vendorTemp, ['id' => 'addvendorform']) ?>
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-1 mb-3">
                        <div class="form-group">
                        <?php echo $this->Form->control('title', array('class' => 'form-control', 'options' => $titles, 'required' => 'required', 'empty' => 'Select')); ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                        <div class="form-group">
                            <?php
                            echo $this->Form->control('name', [
                                'class' => 'form-control',
                                'label' => 'Company Name',
                                'placeholder' => 'Please Enter Full Company Name'
                            ]);
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                        <div class="row p-0">
                            <div class="col-3 pr-0">
                                <div class="form-group">
                                    <?php echo $this->Form->control('country_code', array('label' => 'Code', 'class' => 'form-control tel numberonly', 'type' => 'tel', 'value' => '+91', 'readonly' => 'readonly')); ?>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <?php echo $this->Form->control('mobile', array('class' => 'form-control tel numberonly', 'minlength' => '10', 'maxlength' => '10', 'pattern' => '[9,8,7,6]{1}[0-9]{9}', 'type' => 'tel', 'placeholder' => 'please enter mobile number')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2 mb-3">
                        <div class="form-group">
                            <?php echo $this->Form->control('email', array('class' => 'form-control rounded-0', 'placeholder' => 'please enter email id')); ?>
                        </div>
                    </div>
                    <!-- <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                        <div class="form-group">
                            <?php //echo $this->Form->control('company_code_id', array('class' => 'form-control', 'options' => $company_codes, 'empty' => 'Please Select')); ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2 mb-3">
                        <div class="form-group">
                            <?php //echo $this->Form->control('purchasing_organization_id', array('class' => 'form-control', 'empty' => 'Please Select')); ?>
                        </div>
                    </div> -->

                    <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                        <div class="form-group">
                        <?php echo $this->Form->control('vendor_type', array('class' => 'form-control', 'options' => ['001 - CARTON','002 - LABEL',
'003 - COUPON',
'004 - MIS STICKER',
'005 - HTL',
'006 - HUMDUM',
'007 - HTL LABEL',
'008 - BOTTLES & CAP',
'009 - BOTTLES',
'010 - BOTTLES & CAP & LABEL & CARTON',
'011 - BUCKET & LID','012 - 50 LTR. DRUM','013 - CAP'], 'empty' => 'Please Select')); ?>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3 col-lg-2 mb-3">
                        <div class="form-group">
                            <?php echo $this->Form->control('account_group_id', array('class' => 'form-control', 'options' => $accountGroups, 'empty' => 'Please Select')); ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                        <div class="form-group">
                            <?php echo $this->Form->control('reconciliation_account_id', array('class' => 'form-control', 'options' => $reconciliation_account, 'empty' => 'Please Select')); ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                        <div class="form-group">
                            <?php echo $this->Form->control('payment_term_id', array('class' => 'form-control', 'options' => $payment_term, 'empty' => 'Please Select')); ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2 mb-3">
                        <div class="form-group">
                            <?php echo $this->Form->control('schema_group_id', array('class' => 'form-control', 'empty' => 'Please Select')); ?>
                        </div>
                    </div>
                    <div class="ml-2 mt-2">
                        <div class="form-group mt-4">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn bg-gradient-submit', 'id' => 'id_addvendor', 'type' => 'button']) ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2 mb-3">
                        <span class="errorm">
                            <?= $this->Flash->render() ?>
                        </span>
                    </div>
                </div>
                <div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <h6>Are you sure you want to edit vendor detail ?</h6>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="modal_cancel btn "  data-dismiss="modal">Cancel</button>
                                <button type="submit" class="modal_ok btn " >Ok</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

<script>
    $('#id_addvendor').click(function () {
  if ($("#addvendorform").valid()) {
    $('#modal-sm').modal('show');
  }
});

$('#modal-sm').on('click', '.btn-success', function () {
  if ($("#addvendorform").valid()) {
    $('#modal-sm').modal('hide');
    $('#addvendorform')[0].submit(); // Submit the form
  }
});
</script>