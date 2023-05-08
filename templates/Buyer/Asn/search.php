<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 * @var \Cake\Collection\CollectionInterface|string[] $purchasingOrganizations
 * @var \Cake\Collection\CollectionInterface|string[] $accountGroups
 * @var \Cake\Collection\CollectionInterface|string[] $schemaGroups
 */
?>
<?= $this->Html->css('custom') ?>
<div class="row">
    
    <div class="col-12">
        <div class="card">
            <?= $this->Form->create() ?>
            <div class="card-header">
            <h4 class="p-2 text-info"><b>Gate Entry (GE)</b></h3>
            </div>
            <div class="card-body gate-entry">
                <div class="row">
                <!-- <div class="col-sm-12 col-md-6">
                <h5>Enter ASN No</h5>
                </div> -->
                    <div class="col-sm-12 col-md-12">
                       <div class="content-box">
                       <img  class="scanner-img" src="<?= $this->Url->build('/')  ?>img/barcode-scanner.png"> 
                        <br>  
                        <span>Waiting for ASN Barcode to be scanned...</span>  
                        <p><b>OR</b></p>
                        <!-- <h5 class="mb-2 gate-entry-haed font-weight-bold">ENTER ASN NO :</h5> -->
                            <?php echo $this->Form->control('asn_no', array('label' => false, 'class' => 'form-control rounded-0', "placeholder"=>"Start entering ASN Number",'div' => 'form-group', 'required')); ?>
                            <?= $this->Form->button(__('GO'), ['class' => 'btn btn-info btn-block mt-3']) ?>
                       </div>
                    </div>
                       
                   
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
