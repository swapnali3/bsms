<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rfq $rfq
 */
?>
<style>
    .btn-save {
        padding: 6px 30px;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 15px;
        margin-right: 15px;
    }
</style>

<?= $this->Html->css('CakeLte./AdminLTE//plugins/summernote/summernote-bs4.min.css') ?>
<?= $this->Form->create(null, ['url' => ['controller' => 'rfq-inquiries', 'action' => 'inquiry', $rfqs->toArray()[0]->rfq_no]]); ?>
<?= $this->Form->control('rfq_id', array('label' => false, 'type' => 'hidden', 'value' => $rfqs->toArray()[0]->id)) ?>

<?= $this->Form->control('subtotal_value', array('label' => false, 'type' => 'hidden', 'id' => 'subtotal_value')) ?>
<?= $this->Form->control('tax_value', array('label' => false, 'type' => 'hidden', 'id' => 'tax_value')) ?>
<?= $this->Form->control('total_value', array('label' => false, 'type' => 'hidden', 'id' => 'total_value')) ?>
<?= $this->Html->css('vendorCustom') ?>

<div class="row ml-2">
    <div class="card mb-3">
        <div class="card-header p-0 pt-2">
            <h5><b>RFQ NO :
                    <?= $rfqs->toArray()[0]->rfq_no ?>
                </b>
            </h5>
        </div>
        <div class="card-body mb-3 rfq-head-d">
            <table class="table info-tbl">
                <thead>
                    <tr>
                        <th>Material</th>
                        <th>Date</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Discount</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $subTotal = 0;
                    $discount = 0;
                    foreach ($rfqs as $key => $rfq):
                        $itemTotal = 0;
                        if ($rfq->has('RfqInquiries')) {
                            $itemTotal = ($rfq->RfqInquiries['qty'] * $rfq->RfqInquiries['rate']) - $rfq->RfqInquiries['discount'];
                            $subTotal += $itemTotal;
                        }
                        ?>
                        <tr>
                            <td>
                                <?= $rfq->has('PrFooters') ? $rfq->PrFooters['material'] : '' ?>
                                <?= $this->Form->control('rfq_item_id.' . $key, array('label' => false, 'type' => 'hidden', 'value' => $rfq->RfqItems['id'])) ?>
                            </td>
                            <td>
                                <?= $this->Form->control('delivery_date.' . $key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['delivery_date'] ? $rfq->RfqInquiries['delivery_date'] : '', 'label' => false, 'type' => 'date', 'class' => 'form-control rounded-0', 'div' => 'form-group', 'required' => 'required')); ?>
                            </td>
                            <td>
                                <?= $this->Form->control('qty.' . $key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['qty'] ? $rfq->RfqInquiries['qty'] : '', 'label' => false, 'type' => 'number', 'id' => "qty_$key", 'class' => 'check_qty form-control rounded-0', 'div' => 'form-group', 'required' => 'required', 'data-key' => $key)); ?>
                            </td>
                            <td>
                                <?= $this->Form->control('rate.' . $key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['rate'] ? $rfq->RfqInquiries['rate'] : '', 'label' => false, 'id' => "rate_$key", 'maxlength' => '3', 'type' => 'number', 'class' => 'check_qty form-control rounded-0', 'div' => 'form-group', 'required' => 'required', 'data-key' => $key)); ?>
                            </td>
                            <td>
                                <?= $this->Form->control('discount.' . $key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['discount'] ? $rfq->RfqInquiries['discount'] : '', 'label' => false, 'id' => "discount_$key", 'maxlength' => '3', 'type' => 'number', 'class' => 'check_qty form-control rounded-0', 'div' => 'form-group', 'required' => 'required', 'data-key' => $key)); ?>
                            </td>
                            <td>
                                <?= $itemTotal ?>
                            </td>
                            <?= $this->Form->control('item_subtotal_value.' . $key, array('label' => false, 'type' => 'hidden', 'id' => "item_subtotal_$key")) ?>
                        </tr>

                    <?php endforeach;
                    $discountedAmount = $subTotal + $discount;
                    $tax = $discountedAmount * 18 / 100;
                    $totalAmount = $discountedAmount + $tax;
                    ?>
                </tbody>

            </table>
            <!-- <div class="row">
                <div class="col-sm-1 col-lg-2 mt-1"><b>Material</b></div>
                <div class="col-sm-1 col-lg-2 mt-1"><b>Date</b></div>
                <div class="col-sm-1 col-lg-2 mt-1"><b>Qty</b></div>
                <div class="col-sm-1 col-lg-2 mt-1"><b>Unit Price</b></div>
                <div class="col-sm-1 col-lg-2 mt-1"><b>Discount</b></div>
                <div class="col-sm-1 col-lg-2 mt-1"><b>Sub Total</b></div>
            </div>
            

            <?php
            $subTotal = 0;
            $discount = 0;
            foreach ($rfqs as $key => $rfq):
                $itemTotal = 0;
                if ($rfq->has('RfqInquiries')) {
                    $itemTotal = ($rfq->RfqInquiries['qty'] * $rfq->RfqInquiries['rate']) - $rfq->RfqInquiries['discount'];
                    $subTotal += $itemTotal;
                }
                ?>
            <div class="row">
                <div class="col-sm-1 col-lg-2 mt-4">
                    <?= $rfq->has('PrFooters') ? $rfq->PrFooters['material'] : '' ?>
                    <?= $this->Form->control('rfq_item_id.' . $key, array('label' => false, 'type' => 'hidden', 'value' => $rfq->RfqItems['id'])) ?>
                </div>

                <div class="col-sm-1 col-lg-2 mt-4">
                    <?= $this->Form->control('delivery_date.' . $key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['delivery_date'] ? $rfq->RfqInquiries['delivery_date'] : '', 'label' => false, 'type' => 'date', 'class' => 'form-control rounded-0', 'div' => 'form-group', 'required' => 'required')); ?>
                </div>

                <div class="col-sm-1 col-lg-2 mt-4">
                    <?= $this->Form->control('qty.' . $key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['qty'] ? $rfq->RfqInquiries['qty'] : '', 'label' => false, 'type' => 'number', 'id' => "qty_$key", 'class' => 'check_qty form-control rounded-0', 'div' => 'form-group', 'required' => 'required', 'data-key' => $key)); ?>
                </div>

                <div class="col-sm- col-lg-2 mt-4">
                    <?= $this->Form->control('rate.' . $key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['rate'] ? $rfq->RfqInquiries['rate'] : '', 'label' => false, 'id' => "rate_$key", 'maxlength' => '3', 'type' => 'number', 'class' => 'check_qty form-control rounded-0', 'div' => 'form-group', 'required' => 'required', 'data-key' => $key)); ?>
                </div>

                <div class="col-sm-1 col-lg-2 mt-4">
                    <?= $this->Form->control('discount.' . $key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['discount'] ? $rfq->RfqInquiries['discount'] : '', 'label' => false, 'id' => "discount_$key", 'maxlength' => '3', 'type' => 'number', 'class' => 'check_qty form-control rounded-0', 'div' => 'form-group', 'required' => 'required', 'data-key' => $key)); ?>
                </div>

                <div class="col-sm-1 col-lg-2 mt-4 item_sub_total" id="sub_total_<?= $key ?>">
                    <?= $itemTotal ?>
                </div>
                <?= $this->Form->control('item_subtotal_value.' . $key, array('label' => false, 'type' => 'hidden', 'id' => "item_subtotal_$key")) ?>
            </div>

            <?php endforeach;
            $discountedAmount = $subTotal + $discount;
            $tax = $discountedAmount * 18 / 100;
            $totalAmount = $discountedAmount + $tax;
            ?> -->



            <div class="rfqs view content row paymnt-cal">
                <table>
                    <tbody>
                        <tr>
                            <td>Sub Total :</td>
                            <th><span id="sub_total">
                                    <?= $subTotal ?>
                            </th>
                        </tr>
                        <tr>
                            <td>Freight :</td>
                            <th>
                                <?= $this->Form->control('freight_value', array('value' => $rfq->freight_value, 'label' => false, 'id' => 'freight_calc', 'maxlength' => '3', 'type' => 'number', 'class' => 'check_qty form-control rounded-0', 'div' => 'form-group')); ?>
                            </th>
                        </tr>
                        <tr>
                            <td>Total :</td>
                            <th><span id="discounted_total">
                                    <?= $subTotal + $rfq->freight_value ?>
                                </span></th>
                        </tr>
                        <tr>
                            <td>GST(18%) :</td>
                            <th><span id="total_gst"> <?= $rfq->tax_value ?> </span></th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr class="mb-0 mt-0">
                            </td>
                        </tr>
                        <tr>
                            <td>Total Amount :</td>
                            <th><span id="total_amount">
                                    <b>
                                        <?= $rfq->total_value ?>
                                    </b></th>
                        </tr>
                    </tbody>
                </table>

                <!-- <div class="col-sm-4 col-lg-12 mt-2">
                    Sub Total : <span id="sub_total">
                        <b><?= $subTotal ?></b>
                    </span>
                </div>

                <div class="col-sm-2 col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-1 pt-1">
                            Freight :</div>
                        <div class="col-2">
                            <?= $this->Form->control('freight_value', array('value' => $rfq->freight_value, 'label' => false, 'id' => 'freight_calc', 'maxlength' => '3', 'type' => 'number', 'class' => 'check_qty form-control rounded-0', 'div' => 'form-group')); ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-12 mt-2">
                    Total : <span id="discounted_total">
                        <b><?= $subTotal + $rfq->freight_value ?></b>
                    </span>
                </div>

                <div class="col-sm-4 col-lg-12 mt-2">
                    GST(18%) : <span id="total_gst"> <b><?= $rfq->tax_value ?></b> </span>
                </div>
                   
                <div class="col-sm-4 col-lg-12 mt-2">
                <hr class="mb-2 mt-2">
                    Total Amount : <span id="total_amount">
                        <b><?= $rfq->total_value ?></b>
                    </span>
                </div> -->
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header p-2">
        <h5 class="mb-0"><b>Communications</b></h5>
    </div>
    <div class="card-body scroll-bar-body">
        <?php foreach ($chatHistory as $chat): ?>
            <div class="d-flex justify-content-between">
                <div class="c-nm">
                    <?= $chat['name'] ?>
                    <p class="mb-0"><b>Venu</b></p>
                </div>
                <div class="c-date">
                    <span>
                        <?= $chat['added_date'] ?>
                    </span>
                </div>
            </div>
            <div class="c-msg">
                <?= $chat['message'] ?>
            </div>


            <hr>
        <?php endforeach ?>
    </div>


    <?= $this->Form->control('rfq_id', array('type' => 'hidden', 'id' => 'rfq_id', 'value' => $rfqs->toArray()[0]->id)); ?>

    <div class="add-comment p-2">
        <?php echo $this->Form->control('Comments', ['type' => 'textarea', 'class' => 'summernote form-control rounded-0', 'div' => 'form-group', 'data-msg' => "Please write something"]); ?>
    </div>

    <div>
        <button label="Login"
            class="button btn-save btn-custom button-rounded button-reveal button-large button-yellow button-light text-end"
            type="submit" style="float:right;">
            <!-- <i class="icon-line-save"></i> -->
            <span>SAVE</span>
        </button>
    </div>
</div>
</div>

<?= $this->Form->end() ?>

<?= $this->Html->script('CakeLte./AdminLTE/plugins/summernote/summernote-bs4.min.js') ?>
<script>
    $(document).ready(function () {

        $(document).on('keyup', '.check_qty', function () {
            var key = $(this).attr('data-key');
            var qty = $("#qty_" + key).val();
            var rate = $("#rate_" + key).val();
            var discount = $("#discount_" + key).val();

            $("#sub_total_" + key).html((rate * qty) - discount);
            $("#item_subtotal_" + key).val((rate * qty) - discount);


            var subTotal = 0;
            $('.item_sub_total').each(function (i, obj) {
                var tmp = 0
                if ($(obj).html() == NaN) {
                    tmp = 0;
                } else {
                    tmp = $(obj).html();
                }
                subTotal = (subTotal + parseFloat(tmp));
                $("#sub_total").html(subTotal)
            });

            calculateRFQTotal()

        });

        $(document).on('keyup', '#freight_calc', function () {
            calculateRFQTotal();
        });


        function calculateRFQTotal() {
            discAmt = parseFloat($("#freight_calc").val());
            console.log(discAmt);
            if (isNaN(discAmt)) {
                discAmt = 0;
            }
            var subTotal = parseFloat($("#sub_total").html());

            $("#discounted_total").html(subTotal + discAmt);

            gst = (subTotal + discAmt) * 18 / 100;
            total = ((subTotal + discAmt) + gst);
            $("#total_gst").html(gst);
            $("#total_amount").html(total);

            $("#subtotal_value").val(subTotal);
            $("#tax_value").val(gst);
            $("#total_value").val(total);
        }





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