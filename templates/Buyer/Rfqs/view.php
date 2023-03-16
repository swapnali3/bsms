<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rfq $rfq
 */
?>
<?= $this->Html->css('CakeLte./AdminLTE//plugins/summernote/summernote-bs4.min.css') ?>
<div class="row card">
    
    <div class="column-responsive column-80">
        <div class="rfqs view content">
            <h3>RFQ Details</h3>


            <div class="row">
                <div class="col-sm-1 col-lg-2 mt-4">
                    PR No. : <b><?=h($rfqs->toArray()[0]->pr_header->pr_no) ?></b>
                </div>

                <div class="col-sm-1 col-lg-2 mt-4">
                    RFQ No. : <b><?=h($rfqs->toArray()[0]->rfq_no) ?></b>
                </div>

                <div class="col-sm-1 col-lg-2 mt-4">
                    Vendor : <b><?=h($rfqs->toArray()[0]->vendor_temp->name) ?></b>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1 col-lg-2 mt-4">
                    Sub Total : <b><?=h($rfqs->toArray()[0]->sub_total) ?></b>
                </div>

                <div class="col-sm-1 col-lg-2 mt-4">
                    Freight : <b><?=h($rfqs->toArray()[0]->freight_value) ?></b>
                </div>

                <div class="col-sm-1 col-lg-2 mt-4">
                    Tax : <b><?=h($rfqs->toArray()[0]->tax_value) ?></b>
                </div>
                <div class="col-sm-1 col-lg-2 mt-4">
                    Total : <b><?=h($rfqs->toArray()[0]->total_value) ?></b>
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
    <div class="column-responsive column-80">
        <h3>Communications</h3>
        <hr />
        <div class="card-body p-0">
            <?php foreach($chatHistory as $chat) :?>
                <?= $chat['message'] ?>
                <div>
                    <b><?=$chat['name']?></b> &nbsp;&nbsp;<?=$chat['added_date'] ?>
                </div>
                <hr />
            <?php endforeach?>
        </div>
    </div>

    <?= $this->Form->create(null, ['id' => 'rfqForm']) ?>
    <?= $this->Form->control('rfq_id', array('type' => 'hidden', 'id' => 'rfq_id', 'value' => $rfqs->toArray()[0]->id)); ?>

    <?php echo $this->Form->control('Comments', [ 'type' => 'textarea','class' => 'summernote form-control rounded-0','div' => 'form-group', 'required', 'data-msg'=>"Please write something"]); ?>

        
        <button label="Login"
                            class="button button-rounded button-reveal button-large button-yellow button-light text-end"
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
