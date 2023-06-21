<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 * @var \Cake\Collection\CollectionInterface|string[] $purchasingOrganizations
 * @var \Cake\Collection\CollectionInterface|string[] $accountGroups
 * @var \Cake\Collection\CollectionInterface|string[] $schemaGroups
 */
?>

<script>
    var addurl = "<?php echo \Cake\Routing\Router::url(array('controller' => '/vendor-temps', 'action' => 'addvendor')); ?>";
</script>

<?= $this->Html->css('custom') ?>
<?= $this->Html->css('vendortemps_add') ?>
<div class="add-vendor">
    <div class="row">
        <div class="col-12">
            <div class="card m-2">
                <div class="card-body fm">
                    <?= $this->Form->create(null, ['id'=>'addvendorform']) ?>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <div class="form-group">
                            <?php echo $this->Form->control('name', array('class' => 'form-control','label'=>'Full Name','placeholder'=>'Please Enter Full Name'));?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <div class="form-group">
                                <?php echo $this->Form->control('mobile', array('class' => 'form-control tel numberonly', 'minlength' => '10', 'maxlength' => '10','pattern' => '[9,8,7,6]{1}[0-9]{9}', 'type' => 'tel','placeholder'=>'please enter mobile number'));?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <div class="form-group">
                                <?php echo $this->Form->control('email', array('class' => 'form-control rounded-0','placeholder'=>'please enter email id'));?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <div class="form-group">
                                <?php echo $this->Form->control('payment_term', array('class' => 'form-control','options' => $payment_term, 'empty' => 'Please Select'));?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <div class="form-group">
                                <?php echo $this->Form->control('purchasing_organization_id', array('class' => 'form-control', 'empty' => 'Please Select'));?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <div class="form-group">
                                <?php echo $this->Form->control('account_group_id', array('class' => 'form-control', 'empty' => 'Please Select'));?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <div class="form-group">
                                <?php echo $this->Form->control('schema_group_id', array('class' => 'form-control', 'empty' => 'Please Select'));?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                            <span class="errorm">
                                <?= $this->Flash->render() ?>
                            </span>
                        </div>
                        <div class="col-sm-12 col-lg-12 col-md-12 mt-4">
                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-custom mb-0', 'id'=>'id_addvendor', 'type'=>'submit']) ?>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
        <div class="col-12">
            <?= $this->Form->create(null, ['type' => 'file']); ?>
            <div class="card">
                <div class="card-header p-3">
                    <h5 style="color:darkblue;">
                        Bulk Vendor Import
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <?= $this->Form->control('vendor_code', [
                            'type' => 'file', 'label' => false, 'class' => 'pt-1 rounded-0', 'style' => 'visibility: hidden; position: absolute;', 'div' => 'form-group', 'id' => 'vendorCodeInput'
                            ]); ?>
                            <?= $this->Form->button('SELECT File', [
                                'id' => 'OpenImgUpload',
                                'type' => 'button',
                                'class' => 'd-block btn btn-secondary btn-block mb-0 file-upld-btn'
                            ]); ?>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <button type="submit" class="btn btn-primary" id="id_exportme">IMPORT</button>
                        </div>
                        <div class="col-12 pt-2">
                            <i style="color: black;">
                                <a href="<?= $this->Url->build('/') ?>webroot/templates/vendor_import_template.xlsx"
                                    target="_blank" rel="noopener noreferrer">Sample_Excel_Template.xlsx</a>
                            </i>
                        </div>
                    </div>
                    <?php if (isset($results)) : ?>
                    <div class="row py-0">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable no-footer" id="example1">
                                    <thead>
                                        <tr style="color: white;">
                                            <td>Name</td>
                                            <td>Mobile</td>
                                            <td>Email</td>
                                            <td>Payment Terms</td>
                                            <td>Purchase Organization</td>
                                            <td>Account Group</td>
                                            <td>Schema Group</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($results as $row):?>
                                        <tr>
                                            <td>
                                                <?= h($row["data"][1]) ?>
                                            </td>
                                            <td>
                                                <?= h($row["data"][2]) ?>
                                            </td>
                                            <td>
                                                <?= h($row["data"][3]) ?>
                                            </td>
                                            <td>
                                                <?= h($row["data"][4]) ?>
                                            </td>
                                            <td>
                                                <?= h($row["data"][5]) ?>
                                            </td>
                                            <td>
                                                <?= h($row["data"][6]) ?>
                                            </td>
                                            <td>
                                                <?= h($row["data"][7]) ?>
                                            </td>
                                            <?php if($row['status']) : ?>
                                            <td class="text-success">
                                                <?= h($row['msg']) ?>
                                            </td>
                                            <?php else:?>
                                            <td class="text-danger">
                                                <b><?= h($row['msg']) ?></b>
                                            </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
                <div class="card-footer">Note<span class="text-danger">*</span> : <i>Imported Vendor's will receive credentials on mail</i></div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?= $this->Html->script('vendortemps_add') ?>
