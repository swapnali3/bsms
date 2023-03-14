<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rfq $rfq
 */
?>
<?= $this->Html->css('CakeLte./AdminLTE//plugins/summernote/summernote-bs4.min.css') ?>
<?= $this->Form->create(null, ['url' => ['controller' => 'rfq-inquiries','action' => 'inquiry',$rfqs->toArray()[0]->rfq_no]]); ?>
<?= $this->Form->control('rfq_id', array('label'=> false,'type' => 'hidden', 'value' => $rfqs->toArray()[0]->id)) ?>
<div class="row card">
    <div class="column-responsive column-80">
        <div class="rfqs view content">
            
        RFQ NO : <?= $rfqs->toArray()[0]->rfq_no ?>
            <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="example1">
            <thead>
              <tr>
                
                <th>
                  <?= __('Material') ?>
                </th>
                <th>
                  <?= __('Qty') ?>
                </th>
                <th>
                  <?= __('Rate') ?>
                </th>
                <th>
                  <?= __('Delivery Date') ?>
                </th>
              </tr>
            </thead>
            <tbody>
                  
                  <?php foreach($rfqs as $key => $rfq) :?>
                      <tr>
                        <td>
                            <?= $rfq->has('PrFooters') ? $rfq->PrFooters['material'] : '' ?>
                            <?= $this->Form->control('rfq_item_id.'.$key, array('label'=> false,'type' => 'hidden', 'value' => $rfq->RfqItems['id'])) ?>
                      </td>
                      <td><?= $this->Form->control('qty.'.$key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['qty'] ? $rfq->RfqInquiries['qty'] : '', 'label'=> false,'type' => 'number', 'class' => 'form-control rounded-0','div' => 'form-group', 'required' => 'required'));  ?></td>
                      <td><?= $this->Form->control('rate.'.$key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['rate'] ? $rfq->RfqInquiries['rate'] : '','label' => false, 'maxlength' => '3','type' => 'number', 'class' => 'form-control rounded-0','div' => 'form-group', 'required' => 'required')); ?></td>
                      <td><?= $this->Form->control('delivery_date.'.$key, array('value' => $rfq->has('RfqInquiries') && $rfq->RfqInquiries['delivery_date'] ? $rfq->RfqInquiries['delivery_date'] : '','label' => false, 'type' => 'date', 'class' => 'form-control rounded-0','div' => 'form-group', 'required' => 'required')); ?></td>

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


