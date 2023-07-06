<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp[]|\Cake\Collection\CollectionInterface $vendorTemps
 */

?>

<?= $this->Html->css('custom') ?>
<?= $this->Html->css('b_vendortemps_index') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body vendor-list">
                <div class="table-responsive">
                    <table class="table table-hover" id="example1">
                        <thead>
                            <tr>
                                <th></th>
                                <th><?= h('Name') ?></th>
                                <th><?= h('Email') ?></th>
                                <th><?= h('Mobile') ?></th>
                                <th><?= h('SAP Vendor Code') ?></th>
                                <th><?= h('City') ?></th>
                                <th><?= h('Pincode') ?></th>
                                <th><?= h('Contact Person') ?></th>
                                <th><?= h('Contact Email') ?></th>
                                <th><?= h('Contact Mobile') ?></th>
                                <!-- <th><?= h('Added Date') ?></th> -->
                                <!-- <th><?= h('Updated Date') ?></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vendorTemps as $vendorTemp) :

                                switch ($vendorTemp->status) {
                                    case 0:
                                        $status = '<span class="badge lbluebadge" data-toggle="tooltip" data-placement="right" title="Sent to Vendor"><i class="fas fa-people-arrows"></i></span>';
                                        break;
                                    case 1:
                                        $status = '<span class="badge dbluebadge" data-toggle="tooltip" data-placement="right" title="Pending for approval"><i class="fas fa-user-clock"></i></span>';
                                        break;
                                    case 2:
                                        $status = '<span class="badge purplebadge" data-toggle="tooltip" data-placement="right" title="Sent to SAP"><i class="fas fa-user-plus"></i></span>';
                                        break;
                                    case 3:
                                        $status = '<span class="badge lgreenbadge" data-toggle="tooltip" data-placement="right" title="Approved"><i class="fas fa-user-check"></i></span>';
                                        break;
                                    case 4:
                                        $status = '<span class="badge redbadge" data-toggle="tooltip" data-placement="right" title="Rejected"><i class="fas fa-user-slash"></i></span>';
                                        break;
                                    case 5:
                                        $status = '<span class="badge dgreenbadge" data-toggle="tooltip" data-placement="right" id="halfapproved'.$vendorTemp->id.'" title="Approved"><i class="fas fa-user-check"></i></span><span class="badge badge-light sendcred" data-id="'.$vendorTemp->id.'" id="sendcred'.$vendorTemp->id.'" data-toggle="tooltip" data-placement="right" title="Send Credentials"><i class="fas fa-envelope-open-text text-info"></i></span>';
                                        break;
                                }
                            ?>
                                <tr>
                                    <td>
                                        <?= $status ?>
                                        <span class="badge badge-light chatload" data-toggle="modal" data-target="#modal-lg" data-placement="right" data-value="<?= $vendorTemp->id ?>" title="Chat"><i class="fas fa-comments text-info"></i></span>
                                    </td>
                                    <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>"><?= h($vendorTemp->name) ?></td>
                                    <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>"><?= h($vendorTemp->email) ?></td>
                                    <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>"><?= h($vendorTemp->mobile) ?></td>
                                    <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>"><?= h($vendorTemp->sap_vendor_code) ?></td>
                                    <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>"><?= h($vendorTemp->city) ?></td>
                                    <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>"><?= h($vendorTemp->pincode) ?></td>
                                    <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>"><?= h($vendorTemp->contact_person) ?></td>
                                    <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>"><?= h($vendorTemp->contact_email) ?></td>
                                    <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>"><?= h($vendorTemp->contact_mobile) ?></td>
                                    <!-- <td><?= h($vendorTemp->added_date) ?></td> -->
                                    <!-- <td><?= h($vendorTemp->updated_date) ?></td> -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg card card-primary card-outline direct-chat direct-chat-primary">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">Onboarding Process Ticket</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"><div class="direct-chat-messages" id="id_oldmsg"></div></div>
            
            <div class="modal-footer">
                <?= $this->Form->create($vendorTemp, ['id' => 'communiSubmit', 'style' => 'width:100%']) ?>
                <div class="input-group">
                    <input type="text" name="message" placeholder="Message ..." class="form-control">
                    <span class="input-group-append"> <button type="submit" id="add_comm" class="btn btn-primary">Send</button></span>
                </div>
                <?= $this->Form->end() ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  var userComm = '<?php echo \Cake\Routing\Router::url(array('prefix' => false, 'controller' => 'msgchat-headers', 'action' => 'index')); ?>';
  var userCommadd ='<?php echo \Cake\Routing\Router::url(array('prefix' => false, 'controller' => 'msgchat-headers', 'action' => 'add')); ?>';
  var sendmemail = '<?php echo \Cake\Routing\Router::url(array('controller' => '/VendorTemps', 'action' => 'user-credentials')); ?>';
</script>
<?= $this->Html->script('b_vendortemps_index') ?>