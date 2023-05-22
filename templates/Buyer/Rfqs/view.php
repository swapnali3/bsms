<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rfq $rfq
 */
?>
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('CakeLte./AdminLTE//plugins/summernote/summernote-bs4.min.css') ?>
<div class="row card">
    
    <div class="column-responsive column-80">
        <div class="rfqs view content pt-2">
           
            <div class="rfq-details-head">
                <div class="row">
                    <div class="col-md-3">
                    <h6><lable> PR No. :</lable>
                    <b><?=h($rfqs->toArray()[0]->pr_header->pr_no) ?></b></h6>
                    </div>
                    <div class="col-md-3">
                    <h6><lable> RFQ No. :</lable>
                    <b><?=h($rfqs->toArray()[0]->rfq_no) ?></b></h6>
                    </div>
                    <div class="col-md-3">
                    <h6><lable> Vendor :</lable>
                    <b><?=h($rfqs->toArray()[0]->vendor_temp->name) ?></b></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                    <h6><lable> Sub Total :</lable>
                    <b><?=h($rfqs->toArray()[0]->sub_total) ?></b></h6>
                    </div>
                    <div class="col-md-3">
                    <h6><lable> Freight :</lable>
                    <b><?=h($rfqs->toArray()[0]->freight_value) ?></b></h6>
                    </div>
                    <div class="col-md-3">
                    <h6><lable> Tax :</lable>
                    <b><?=h($rfqs->toArray()[0]->tax_value) ?></b></h6>
                    </div>
                    <div class="col-md-3">
                   <h6> <lable> Total :</lable>
                    <b><?=h($rfqs->toArray()[0]->total_value) ?></b></h6>
                    </div>
                </div>
            </div>
            

            <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover" id="example1">
                    <thead>
                        <tr>
                            <!-- <th><?= h(_('RFQ No')) ?></th>
                            <th><?= h(_('PR')) ?></th>
                            <th><?= h(_('Vendor')) ?></th> -->
                            <th><?= h(_('Item')) ?></th>
                            <th><?= h(_('Material')) ?></th>
                            <th><?= h(_('Qty')) ?></th>
                            <th><?= h(_('Rate')) ?></th>
                            <th><?= h(_('Sub Total')) ?></th>
                            <th><?= h(_('Discount')) ?></th>
                            <th><?= h(_('Total')) ?></th>
                            <th><?= h(_('Delivery Date')) ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rfqs as $key => $rfq) :?>
                            <tr>
                            <!-- <td><?= $this->Number->format($rfq->rfq_no) ?></td>
                            <td><?= $rfq->has('pr_header') ? $rfq->pr_header->pr_no : '' ?></td> 
                            <td><?= $rfq->has('vendor_temp') ? $rfq->vendor_temp->name : '' ?></td> -->
                            <td><?= $rfq->has('PrFooters') ? $rfq->PrFooters['item'] : '' ?></td>
                            <td><?= $rfq->has('PrFooters') ? $rfq->PrFooters['material'] : '' ?></td>
                            <td><?= $rfq->has('RfqInquiries') ? $rfq->RfqInquiries['qty'] : '' ?></td>
                            <td><?= $rfq->has('RfqInquiries') ? $rfq->RfqInquiries['rate'] : '' ?></td>
                            <td><?= $rfq->has('RfqInquiries') ? ($rfq->RfqInquiries['qty'] * $rfq->RfqInquiries['rate']) : ''?></td>
                            <td><?= $rfq->has('RfqInquiries') ? $rfq->RfqInquiries['discount'] : '' ?></td>
                            <td><?= $rfq->has('RfqInquiries') ? $rfq->RfqInquiries['sub_total'] : '' ?></td>
                            <td><?= $rfq->has('RfqInquiries') ? $rfq->RfqInquiries['delivery_date'] : '' ?></td>

                            
                            <td class="actions">
                                
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="row card">
    <div class="column-responsive commu-review column-80">
        <h5><b>Communications</b></h5>
        <hr />
        <div class="card-body p-0">
            <?php foreach($chatHistory as $chat) :?>
                
                <div>
                    <p class="d-flex justify-content-between"><b><?=$chat['name']?></b> <i><?=$chat['added_date'] ?></i></p>
                </div>
                <h6><?= $chat['message'] ?></h6>
                <hr />
            <?php endforeach?>
        </div>
    </div>

    <?= $this->Form->create(null, ['id' => 'rfqForm']) ?>
    <?= $this->Form->control('rfq_id', array('type' => 'hidden', 'id' => 'rfq_id', 'value' => $rfqs->toArray()[0]->id)); ?>

    <?php echo $this->Form->control('Comments', [ 'type' => 'textarea','class' => 'summernote form-control rounded-0','div' => 'form-group', 'required', 'data-msg'=>"Please write something"]); ?>

        
        <button label="Login"
                            class="button btn-custom button-rounded button-reveal button-large button-yellow button-light text-end"
                            type="submit" style="float:right;">
                            <i class="icon-line-save"></i>
                            <span>SAVE RFQ</span>
                        </button>

    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/summernote/summernote-bs4.min.js') ?>
<script>
    $(document).ready(function () {
        var summernoteForm = $('.form-validate-summernote');
        var summernoteElement = $('.summernote');

        var summernoteValidator = summernoteForm.validate({
            errorElement: "div",
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            ignore: ':hidden:not(.summernote),.note-editable.card-block',
            errorPlacement: function (error, element) {
                // Add the `help-block` class to the error element
                error.addClass("invalid-feedback");
                console.log(element);
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.siblings("label"));
                } else if (element.hasClass("summernote")) {
                    error.insertAfter(element.siblings(".note-editor"));
                } else {
                    error.insertAfter(element);
                }
            }
        });

        summernoteElement.summernote({
            height: 150,
            callbacks: {
                onChange: function (contents, $editable) {
                    summernoteElement.val(summernoteElement.summernote('isEmpty') ? "" : contents);
                    summernoteValidator.element(summernoteElement);
                }
            }
        });
    });

</script>
