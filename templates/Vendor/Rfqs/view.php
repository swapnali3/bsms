<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rfq $rfq
 */
?>
<?= $this->Html->css('CakeLte./AdminLTE//plugins/summernote/summernote-bs4.min.css') ?>
<?= $this->Form->create(null, ['url' => ['controller' => 'rfq-inquiries','action' => 'inquiry',$rfqs->toArray()[0]->rfq_no]]); ?>
<?= $this->Form->control('rfq_id', array('label'=> false,'type' => 'hidden', 'value' => $rfqs->toArray()[0]->id)) ?>

<?= $this->Form->control('subtotal_value', array('label'=> false,'type' => 'hidden', 'id' => 'subtotal_value')) ?>
<?= $this->Form->control('tax_value', array('label'=> false,'type' => 'hidden', 'id' => 'tax_value')) ?>
<?= $this->Form->control('total_value', array('label'=> false,'type' => 'hidden', 'id' => 'total_value')) ?>

<div class="row card">
    <div class="column">
        <div class="rfqs view content">
            
        RFQ NO : <?= $rfqs->toArray()[0]->rfq_no ?>
     <div class="card-body">
        <div class="table-responsive">
            <div class="row">
                <div class="col-sm-1 col-lg-1 mt-4">Material</div>
                <div class="col-sm-1 col-lg-1 mt-4">Date</div>
                <div class="col-sm-1 col-lg-1 mt-4">Qty</div>
                <div class="col-sm-1 col-lg-1 mt-4">Unit Price</div>
                <div class="col-sm-1 col-lg-1 mt-4">Discount</div>
                <div class="col-sm-1 col-lg-1 mt-4">Sub Total</div>
            </div>

            <?php 
            $subTotal = 0;
            $discount = 0;
            foreach($rfqs as $key => $rfq) :
                $itemTotal = 0;
                if($rfq->has('RfqInquiries')) {
                    $itemTotal = ($rfq->RfqInquiries['qty'] * $rfq->RfqInquiries['rate']) - $rfq->RfqInquiries['discount'];
                    $subTotal += $itemTotal;
                }
                ?>
                <div class="row">
                    <div class="col-sm-1 col-lg-1 mt-4">
                        <?= $rfq->has('PrFooters') ? $rfq->PrFooters['material'] : '' ?>
                        <?= $this->Form->control('rfq_item_id.'.$key, array('label'=> false,'type' => 'hidden', 'value' => $rfq->RfqItems['id'])) ?>
                    </div>

                    <div class="col-sm-1 col-lg-1 mt-4">
                        <?= $this->Form->control('delivery_date.'.$key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['delivery_date'] ? $rfq->RfqInquiries['delivery_date'] : '','label' => false, 'type' => 'date', 'class' => 'form-control rounded-0','div' => 'form-group', 'required' => 'required')); ?>
                    </div>

                    <div class="col-sm-1 col-lg-1 mt-4">
                        <?= $this->Form->control('qty.'.$key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['qty'] ? $rfq->RfqInquiries['qty'] : '', 'label'=> false,'type' => 'number', 'id'=> "qty_$key", 'class' => 'check_qty form-control rounded-0','div' => 'form-group', 'required' => 'required', 'data-key' => $key));  ?>
                    </div>

                    <div class="col-sm-1 col-lg-1 mt-4">
                        <?= $this->Form->control('rate.'.$key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['rate'] ? $rfq->RfqInquiries['rate'] : '','label' => false, 'id'=> "rate_$key", 'maxlength' => '3','type' => 'number', 'class' => 'check_qty form-control rounded-0','div' => 'form-group', 'required' => 'required', 'data-key' => $key)); ?>
                    </div>

                    <div class="col-sm-1 col-lg-1 mt-4">
                        <?= $this->Form->control('discount.'.$key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['discount'] ? $rfq->RfqInquiries['discount'] : '','label' => false, 'id'=> "discount_$key", 'maxlength' => '3','type' => 'number', 'class' => 'check_qty form-control rounded-0','div' => 'form-group', 'required' => 'required', 'data-key' => $key)); ?>
                    </div>

                    <div class="col-sm-1 col-lg-1 mt-4 item_sub_total" id="sub_total_<?=$key ?>">
                    <?=$itemTotal ?>
                    </div>
                    <?= $this->Form->control('item_subtotal_value.'.$key, array('label'=> false,'type' => 'hidden', 'id' => "item_subtotal_$key")) ?>
                </div>
            <?php endforeach; 
            
            $discountedAmount = $subTotal + $discount;
            $tax = $discountedAmount * 18 /100;
            $totalAmount = $discountedAmount + $tax;
            ?>

        </div>

        <div class="col-sm-4 col-lg-2 mt-2">
            Sub Total : <span id="sub_total"> <?=$subTotal ?> </span>
        </div>
        <div class="col-sm-4 col-lg-1">
            Freight : <?= $this->Form->control('freight_value', array('value' => $rfq->freight_value ,'label' => false,'id' => 'freight_calc', 'maxlength' => '3','type' => 'number', 'class' => 'check_qty form-control rounded-0','div' => 'form-group')); ?>
        </div>
        <div class="col-sm-4 col-lg-2 mt-2">
             Total : <span id="discounted_total"> <?=$subTotal + $rfq->freight_value ?></span>
        </div>
        
        <div class="col-sm-4 col-lg-2 mt-2">
            GST(18%) : <span id="total_gst"> <?=$rfq->tax_value ?> </span>
        </div>
        <div class="col-sm-4 col-lg-2 mt-2">
            Total Amount : <span id="total_amount"> <?= $rfq->total_value?> </span>
        </div>
      </div>
        </div>
    </div>
</div>

<div class="card">
    <div>
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
    
    <?= $this->Form->control('rfq_id', array('type' => 'hidden', 'id' => 'rfq_id', 'value' => $rfqs->toArray()[0]->id)); ?>

    <?php echo $this->Form->control('Comments', [ 'type' => 'textarea','class' => 'summernote form-control rounded-0','div' => 'form-group', 'data-msg'=>"Please write something"]); ?>
          
    <div>
        <button label="Login"
            class="button button-rounded button-reveal button-large button-yellow button-light text-end"
            type="submit" style="float:right;">
            <i class="icon-line-save"></i>
            <span>SAVE</span>
        </button>
    </div>
</div>

<?= $this->Form->end() ?>

<?= $this->Html->script('CakeLte./AdminLTE/plugins/summernote/summernote-bs4.min.js') ?>
<script>
    $(document).ready(function () {

        $(document).on('keyup', '.check_qty', function () {
        var key = $(this).attr('data-key');
        var qty = $("#qty_"+key).val();
        var rate = $("#rate_"+key).val();
        var discount = $("#discount_"+key).val();

        $("#sub_total_"+key).html((rate*qty) - discount);
        $("#item_subtotal_"+key).val((rate*qty) - discount);

        
        var subTotal = 0;
        $('.item_sub_total').each(function(i, obj) {
          var tmp = 0
          if($(obj).html() == NaN) {
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
        if(isNaN(discAmt)) {
            discAmt = 0;
        }
        var subTotal = parseFloat($("#sub_total").html());

        $("#discounted_total").html(subTotal+discAmt);

        gst  = (subTotal+discAmt)*18/100;
        total  = ((subTotal+discAmt) + gst);
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


