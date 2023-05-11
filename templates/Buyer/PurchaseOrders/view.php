<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader $poHeader
 */
?>


   
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <?= $this->Html->css('CakeLte./AdminLTE//plugins/summernote/summernote-bs4.min.css') ?>
  <?= $this->Html->css('custom') ?>
<div class="row">
  <div class="col-12">
    <div class="poHeaders view content card">
      <div class="card-header">
        <h5>PO NO :<b>
          <?= h($poHeader->po_no) ?>
  </b></h5>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>
              <?= __('Vendor Code') ?>
            </th>
            <th>
              <?= __('Po No') ?>
            </th>
            <th>
              <?= __('Document Type') ?>
            </th>
            <th>
              <?= __('Created By') ?>
            </th>
            <th>
              <?= __('Pay Terms') ?>
            </th>
            <th>
              <?= __('Currency') ?>
            </th>
            <th>
              <?= __('Release Status') ?>
            </th>
            <th>
              <?= __('Exchange Rate') ?>
            </th>
            <th>
              <?= __('Created On') ?>
            </th>
            <th>
              <?= __('Added Date') ?>
            </th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>
              <?= h($poHeader->sap_vendor_code) ?>
            </td>
            <td>
              <?= h($poHeader->po_no) ?>
            </td>
            <td>
              <?= h($poHeader->document_type) ?>
            </td>
            <td>
              <?= h($poHeader->created_by) ?>
            </td>
            <td>
              <?= h($poHeader->pay_terms) ?>
            </td>
            <td>
              <?= h($poHeader->currency) ?>
            </td>
            <td>
              <?= h($poHeader->release_status) ?>
            </td>
            <td>
              <?= $this->Number->format($poHeader->exchange_rate) ?>
            </td>
            <td>
              <?= h($poHeader->created_on) ?>
            </td>
            <td>
              <?= h($poHeader->added_date) ?>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="related card">
      <div class="card-header">
        <h5><b>
          <?= __('PO Item List') ?>
  </b></h5>
      </div>
      <div class="card-body">
        <?php if (!empty($poHeader->po_footers)) : ?>
        <div class="table-responsive">
          <table class="table" id="example1">
            <thead>
              <tr>
                <th width="5%"></th>
                <th>
                  <?= __('Item') ?>
                </th>
                <th>
                  <?= __('Material') ?>
                </th>
                <th>
                  <?= __('Short Text') ?>
                </th>
                <th>
                  <?= __('Po Qty') ?>
                </th>
                <th>
                  <?= __('Grn Qty') ?>
                </th>
                <th>
                  <?= __('Pending Qty') ?>
                </th>
                <th>
                  <?= __('Order Unit') ?>
                </th>
                <th>
                  <?= __('Net Price') ?>
                </th>
                <th>
                  <?= __('Price Unit') ?>
                </th>
                <th>
                  <?= __('Net Value') ?>
                </th>
                <th>
                  <?= __('Gross Value') ?>
                </th>
                <th class="actions">
                  <?= __('Actions') ?>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($poHeader->po_footers as $poFooters) : ?>
              <tr>
              <td class= "details-control" footer-id="<?=$poFooters->id?>">
              <span class="material-symbols-outlined flu" data-alt="+">
                add
              </span>    
            </td>
                <td>
                  <?= h($poFooters->item) ?>
                </td>
                <td>
                  <?= h($poFooters->material) ?>
                </td>
                <td>
                  <?= h($poFooters->short_text) ?>
                </td>
                <td>
                  <?= h($poFooters->po_qty) ?>
                </td>
                <td>
                  <?= h($poFooters->grn_qty) ?>
                </td>
                <td>
                  <?= h($poFooters->pending_qty) ?>
                </td>
                <td>
                  <?= h($poFooters->order_unit) ?>
                </td>
                <td>
                  <?= h($poFooters->net_price) ?>
                </td>
                <td>
                  <?= h($poFooters->price_unit) ?>
                </td>
                <td>
                  <?= h($poFooters->net_value) ?>
                </td>
                <td>
                  <?= h($poFooters->gross_value) ?>
                </td>

                <td class="actions">
                  <div class="btn-group">
                    <?= $this->Html->link(__('Schedule'), "#", ['class' => 'schedule_item btn-warning btn btn-default', 'data-toggle'=> "modal", 'data-target' => "#scheduleModal" ,'header-id' => $poHeader->id, 'footer-id' => $poFooters->id, 'item-no' => $poFooters->item]) ?>
                    <button type="button" class="btn btn-default btn-success view-btn dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <?= $this->Html->link(__('View'), "#", ['class' => 'dispatch_item dropdown-item', 'data-toggle'=> "modal", 'data-target' => "#item_$poFooters->item" ,'header-id']) ?>
                    </div>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
</div>

<?php foreach ($poHeader->po_footers as $poFooters) :
    $actualQty = $poFooters->po_qty;
    $totalQty = 0;
    ?>
<!-- delivery modal -->
<div class="modal fade" id="item_<?= h($poFooters->item) ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">

    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title"><b>Delivery Detail :</b>
          <?= h($poHeader->po_no .' - '. $poFooters->item) ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table" id="example1">
          <thead>
            <tr>
              <th>
                <?= __('Item') ?>
              </th>
              <th>
                <?= __('Short Text') ?>
              </th>
              <th>
                <?= __('Challan No.') ?>
              </th>
              <th>
                <?= __('Qty') ?>
              </th>
              <th>
                <?= __('Eway Bill No.') ?>
              </th>
              <th>
                <?= __('Einvoice No') ?>
              </th>
              <th class="actions">
                <?= __('Actions') ?>
              </th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($poFooters->delivery_details as $delivery) :
                        $totalQty = $totalQty + $delivery->qty;
                        ?>
            <tr>
              <td>
                <?= h($poFooters->item) ?>
              </td>
              <td>
                <?= h($poFooters->short_text) ?>
              </td>
              <td>
                <?= h($delivery->challan_no) ?>
              </td>
              <td>
                <?= h($delivery->qty) ?>
              </td>
              <td>
                <?= h($delivery->eway_bill_no) ?>
              </td>
              <td>
                <?= h($delivery->einvoice_no) ?>
              </td>
              <td class="actions">
                <!-- <?= $this->Html->link(__('View'), ['controller' => 'PoFooters', 'action' => 'view', $poFooters->id]) ?> -->
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <b>Actual Qty :</b>
        <?php echo $actualQty ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <b>Delivered Qty :</b>
        <?php echo $totalQty ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Modal stock -->
<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <?= $this->Form->create(null, ['id' => 'scheduleForm',  'url' => ['controller' => 'po-footers', 'action' => 'create-schedule']]) ?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div><b>PO : </b><?=$poHeader->po_no ?></div>
        <div id="item_title"></div>
        <?php
            echo $this->Form->control('po_header_id', ['id' => 'po_header_id', 'type' => 'hidden', 'class' => 'form-control rounded-0','div' => 'form-group']);  
            echo $this->Form->control('po_footer_id', ['id' => 'po_footer_id', 'type' => 'hidden', 'class' => 'form-control rounded-0','div' => 'form-group']);  
            echo $this->Form->control('actual_qty', ['id' => 'actual_qty', 'type' => 'number', 'class' => 'form-control rounded-0','div' => 'form-group']);  
            echo $this->Form->control('delivery_date', ['type' => 'date','class' => 'form-control rounded-0','div' => 'form-group']);
        ?>
      </div>
      <div id="error_msg"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal stock -->
<div class="modal fade" id="notifyModal" tabindex="-1" role="dialog" aria-labelledby="notifyModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
    <div class="overlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>

      <?= $this->Form->create(null, ['id' => 'notifyForm',  'url' => ['controller' => 'purchase-orders', 'action' => 'save-schedule-remarks']]) ?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Communication</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <table class="table table-bordered commu-tbl">
  <tr style="align:middle">
    <th>Name</th>
    <th>Date</th>
    <th>Status</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
</table> 
        <div id="past_messages"></div>
        <?php
            echo $this->Form->control('schedule_id', [ 'type' => 'hidden', 'id' => 'schedule_id']);
            echo $this->Form->control('message', [ 'type' => 'textarea', 'class' => 'form-control rounded-0']);
            //echo $this->Form->control('message', [ 'type' => 'textarea','class' => 'summernote form-control rounded-0','div' => 'form-group', 'required', 'data-msg'=>"Please write something"]);
        ?>
      </div>
      <div id="error_msg"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container" style="display:none;">
  <table cellpadding="0" cellspacing="0" border="0" class="dataTable table table-bordered table-hover table-striped"
    id="example2">
    <thead>
      <tr>
        <th>L3Type</th>
        <th>L3Variation</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>A</td>
        <td>5</td>
      </tr>
      <tr>
        <td>B</td>
        <td>4</td>
      </tr>
    </tbody>
  </table>
</div>

<?= $this->Html->script('CakeLte./AdminLTE/plugins/summernote/summernote-bs4.min.js') ?>

<script>
  $(document).ready(function () {

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

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


    $(".schedule_item").click(function () {
      $("#po_header_id").val($(this).attr('header-id'));
      $("#po_footer_id").val($(this).attr('footer-id'));
      $("#item_title").html('<b>Item : </b>' + $(this).attr('item-no'));
    });

    $('#scheduleModal').on('hidden.bs.modal', function (e) {
      $('#scheduleModal form')[0].reset();
    });


    $.validator.setDefaults({
      submitHandler: function () {
        var formdatas = new FormData($('#scheduleForm')[0]);
        $.ajax({
          type: "POST",
          url: "<?php echo \Cake\Routing\Router::url(array('controller' => 'purchase-orders', 'action' => 'create-schedule')); ?> ",
          data: $("#scheduleForm").serialize(),
          dataType: 'json',
          success: function (response) {
            console.log(response);
            if (response.status == 'success') {
              $('#scheduleModal').modal('toggle');
              Toast.fire({
                icon: 'success',
                title: response.message
              });
            } else {
              Toast.fire({
                icon: 'error',
                title: response.message
              });
            }

          }
        });
        return false;
      }
    });
    $('#scheduleForm').validate({
      rules: {
        actual_qty: {
          required: true,
          number: true
        },
        delivery_date: {
          required: true,
        }
      },
      messages: {
        qty: {
          required: "Please provide a qty",
          number: "Please enter number only"
        },
        delivery_date: {
          required: "Please select date",
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });


    var table = $("#example1").DataTable({
      "paging": true,
      "responsive": true,
       "lengthChange": false,
        "autoWidth": false,
         "searching": true,
         language: {
          search: "_INPUT_",
        searchPlaceholder: "Search..."
    },
    });

     

    $(document).on("click", ".flu", function () {
      if ($(this).data('alt') == '+') {
        $(this).data('alt', '-');
        $(this).empty();
        $(this).append('Remove');
      } else {
        $(this).data('alt', '+');
        $(this).empty();
        $(this).append('add');
      }
    });

    $('#example1 tbody').on('click', 'td.details-control', function () {

      var tr = $(this).closest('tr');
      var row = table.row(tr);

      if (row.child.isShown()) {
        row.child.hide();
        tr.removeClass('shown');
      }
      else {
        row.child(format($(this).attr('footer-id'))).show();
        tr.addClass('shown');
      }
    });


    function format(rowData) {
      var div = $('<div/>')
        .addClass('loading')
        .text('Loading...');

      $.ajax({
        type: "GET",
        //url: '../getDeliveryDetails/' + rowData,
        url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'get-schedules')); ?> /" + rowData,
        dataType: 'json',
        success: function (response) {
          if (response.status == 'success') {
            div
              .html(response.html)
              .removeClass('loading');
          } else {
            div
              .html(response.message)
              .removeClass('loading');
          }
        }
      });

      return div;
    }

    //notify schedule delivery to vendor

    $(document).on('click','.notify_item', function () {
      $("#schedule_id").val($(this).attr('schedue-id'));

      $.ajax({
        type: "GET",
        //url: '../getDeliveryDetails/' + rowData,
        url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'get-schedule-messages')); ?> /" + $(this).attr('schedue-id'),
        dataType: 'json',
        success: function (response) {
          if (response.status == 'success') {
            $("#past_messages").html(response.html);
          } 
          $(".overlay").hide();
        }
      });

    });


    $('#notifyForm').validate({
      ignore: ":not(.summernote),.note-editable.panel-body",
      rules: {
        message: { required: true },
      },
      messages: {
        message: { required: "Please enter remarks", },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) { $(element).addClass('is-invalid'); },
      unhighlight: function (element, errorClass, validClass) { $(element).removeClass('is-invalid'); },
      submitHandler: function () {
        var formdatas = new FormData($('#notifyForm')[0]);
        $.ajax({
          type: "POST",
          url: "<?php echo \Cake\Routing\Router::url(array('controller' => 'purchase-orders', 'action' => 'save-schedule-remarks')); ?>",
          data: $("#notifyForm").serialize(),
          dataType: 'json',
          success: function (response) {
            console.log(response);
            if (response.status == 'success') {
              $('#notifyModal').modal('toggle');
              Toast.fire({
                icon: 'success',
                title: response.message
              });
              //location.reload(true);
            } else {
              Toast.fire({ icon: 'error', title: response.message });
            }

          }
        });
        return false;
      }
    });
  });
</script>