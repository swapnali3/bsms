<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader $poHeader
 * @var \App\Model\Entity\PoHeader $poHeader
 */
?>
  <?= $this->Html->css('cstyle.css') ?>
  <?= $this->Html->css('custom') ?>
  <?= $this->Html->css('table.css') ?>
  <?= $this->Html->css('listing.css') ?>
  <?= $this->Html->css('b_index.css') ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<?= $this->Html->css('CakeLte./AdminLTE//plugins/summernote/summernote-bs4.min.css') ?>

<div class="row purchase-order">
  <div class="col-12">
    <div class="poHeaders view content card" id="">
      <!-- <div class="card-header">
      
      </div> -->
      <div class="table-responsive p-2" id="purViewId">
        <div class="search-bar mb-2">
          <input type="search" placeholder="Search all orders, meterials" class="form-control search-box">
          <!-- <button type="button" class="btn-go searchgo ">GO</button> -->
        </div>
        <div class="po-list">
          <div class="d-flex" id="poItemss">
            <!-- <?php foreach ($poHeaders as $poHeader) : ?>
              <div class="po-box" data-id="<?= $poHeader->id ?>">
                <div class="pono">
                  <small class="mb-0">
                    <?= h('PO No ') ?>
                    <br>
                  </small>
                  <b>
                    <?= h($poHeader->po_no) ?>
                  </b>
                </div>
                <div class="po-code">
                  <small class="mb-0">
                    <?= h('Vendor Code:') ?>
                  </small>
                  <br> <small><b>
                      <?= h($poHeader->sap_vendor_code) ?>
                    </b></small>
                </div>
              </div>
            <?php endforeach; ?> -->
          </div>
        </div>
      </div>
    </div>

    <div class="related card">
      <div class="">
        <div class="table-responsive card-body" id="id_potableresp" style="display:none;"></div>
      </div>
    </div>
  </div>
</div>

<!-- <?php foreach ($poHeader->po_footers as $poFooters) :
        $actualQty = $poFooters->po_qty;
        $totalQty = 0;
      ?> -->
<!-- delivery modal -->
<div class="modal fade" id="item_<?= h($poFooters->item) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">

    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title"><b>Delivery Detail :</b>
          <?= h($poHeader->po_no . ' - ' . $poFooters->item) ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table" id="example2">
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
<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
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
      <div class="alert-body text-center d-none">
      <h6>Are you sure you want to create schedule ?</h6>
      </div>
        <div class="a-data">
        <div><b>PO : </b>
          <?= $poHeader->po_no ?>
        </div>
        <div id="item_title"></div>
        <?php
        echo $this->Form->control('po_header_id', ['id' => 'po_header_id', 'type' => 'hidden', 'class' => 'form-control rounded-0', 'div' => 'form-group']);
        echo $this->Form->control('po_footer_id', ['id' => 'po_footer_id', 'type' => 'hidden', 'class' => 'form-control rounded-0', 'div' => 'form-group']);
        ?>

        <div class="form-group">
          <?php
          echo $this->Form->control('actual_qty', ['id' => 'actual_qty', 'type' => 'number', 'class' => 'form-control rounded-0', 'div' => 'form-group']);
          ?>
        </div>
        <div class="form-group">
          <?php
          echo $this->Form->control('delivery_date', ['id' => 'delivery_date','type' => 'date', 'class' => 'form-control rounded-0', 'div' => 'form-group']);
          ?>
        </div>

        <span class="actualTotalValue d-none"></span>
        </div>

      </div>
      <div id="error_msg"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary dismiss-btn"  data-dismiss="modal" >Close</button>
        <button type="button" class="btn btn-secondary d-none"  id="btnClose" >Close</button>
        <button type="button" class="btn btn-custom btnSub">Submit</button>
        <button type="submit" class="btn btn-success btn-sm d-none">Ok</button>
        
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal stock -->
<div class="modal fade" id="notifyModal" tabindex="-1" role="dialog" aria-labelledby="notifyModalLabel" aria-hidden="true">
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

        <div id="past_messages"></div>
        <?php
        echo $this->Form->control('schedule_id', ['type' => 'hidden', 'id' => 'schedule_id']);
        echo $this->Form->control('message', ['type' => 'textarea', 'class' => 'form-control rounded-0']);
        //echo $this->Form->control('message', [ 'type' => 'textarea','class' => 'summernote form-control rounded-0','div' => 'form-group', 'required', 'data-msg'=>"Please write something"]);
        ?>
      </div>
      <div id="error_msg"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="padding: 9px 15px;">Close</button>
        <button type="submit" class="btn btn-custom-2">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container" style="display:none;">
  <table cellpadding="0" cellspacing="0" border="0" class="dataTable table table-bordered table-hover table-striped" id="example2">
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
  function getRemote(remote_url, method = "GET", type = "json", convertapi = true) {
    var resp = $.ajax({
      type: method,
      dataType: type,
      url: remote_url,
      async: false
    }).responseText;
    if (convertapi) {
      return JSON.parse(resp);
    }
    return resp;
  }
  $(document).ready(function() {
    // create schedule popup
    $(".btnSub").on("click",function(e) {
      e.preventDefault();
      
      
      
    })

    // var Toast = Swal.mixin({
    //   toast: true,
    //   position: 'top-end',
    //   showConfirmButton: false,
    //   timer: 3000
    // });

    var summernoteForm = $('.form-validate-summernote');
    var summernoteElement = $('.summernote');

    var summernoteValidator = summernoteForm.validate({
      errorElement: "div",
      errorClass: 'is-invalid',
      validClass: 'is-valid',
      ignore: ':hidden:not(.summernote),.note-editable.card-block',
      errorPlacement: function(error, element) {
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
        onChange: function(contents, $editable) {
          summernoteElement.val(summernoteElement.summernote('isEmpty') ? "" : contents);
          summernoteValidator.element(summernoteElement);
        }
      }
    });

    $('#purViewId').on('click', '.po-box', function() {
      $("#id_pofooter").empty();
      $('.po-box').removeClass("active");
      $(this).addClass("active");
      var poid = $(this).attr('data-id');


      $.ajax({
        type: "GET",
        //url: '../getDeliveryDetails/' + rowData,
        url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'get-po-Footers')); ?>/" + poid,
        contentType: "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        // async: false,
        beforeSend: function() {
          $("#loaderss").show();
        },
        success: function(response) {
          $("#id_potableresp").empty().hide().append(`<table class="table" id="example1"></table>`);
          if (response.status == 'success') {
            $("#example1").append(`<thead>
              <tr>
                <th width="5%"></th>
                <th><?= __('Item') ?></th>
                <th><?= __('Material') ?></th>
                <th><?= __('Short Text') ?></th>
                <th><?= __('Po Qty') ?></th>
                <th><?= __('Grn Qty') ?></th>
                <th><?= __('Pending Qty') ?></th>
                <th><?= __('Order Unit') ?></th>
                <th><?= __('Net Price') ?></th>
                <th><?= __('Price Unit') ?></th>
                <th><?= __('Net Value') ?></th>
                <th><?= __('Gross Value') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody id="id_pofooter"></tbody>`)

            $.each(response.data.po_footers, function(key, val) {
              var poHeaderId = response.data.po_header;
              $("#id_pofooter").append(`<tr class="odd" data-trid="id_tr` + val.id + `">
              <td class="details-control" data-id="` + val.id + `" footer-id="` + val.id + `">
                <span class="material-symbols-outlined flu" id="id_st` + val.id + `" data-id="` + val.id + `" data-alt="+">add</span></td>
              <td>` + val.item + `</td>
              <td>` + val.material + `</td>
              <td>` + val.short_text + `</td>
              <td class="poqtyvalu">` + val.po_qty + `</td>
              <td>` + val.grn_qty + `</td>
              <td>` + val.pending_qty + `</td>
              <td>` + val.order_unit + `</td>
              <td>` + val.net_price + `</td>
              <td>` + val.price_unit + `</td>
              <td>` + val.net_value + `</td>
              <td>` + val.gross_value + `</td>
              <td class="actions">
                  <div class="btn-group">
                  <a href="#" class="schedule_item btn-warning btn btn-default" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#scheduleModal" header-id="` + val.po_header_id + `" footer-id="` + val.id + `" item-no=` + val.item + `>Schedule</a>
                    <button type="button" class="btn btn-default btn-success view-btn dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu view-drpdwn" role="menu">
                    <a href="#" class="dispatch_item dropdown-item" data-toggle="modal" data-target="#item_` + val.item + `" header-id="">View</a>
                    </div>
                  </div>
                </td>
              </tr>`);
            });
            setTimeout(function() {
              //your code to be executed after 1 second
              $("#id_potableresp").show();
              $("#example1").DataTable({
                "paging": true,
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "searching": false
              });
            }, 500);
          }
        },
        complete: function() {
          $("#loaderss").hide();
        }
      });

    });

    $(document).on("click", ".schedule_item", function() {
      $("#po_header_id").val($(this).attr('header-id'));
      $("#po_footer_id").val($(this).attr('footer-id'));
      $("#item_title").html('<b>Item : </b>' + $(this).attr('item-no'));

      $('#id_st' + $(this).attr('footer-id')).click();

    });

    $('#scheduleModal').on('hidden.bs.modal', function(e) {
      $('#scheduleModal form')[0].reset();
    });


    $.validator.setDefaults({
      submitHandler: function() {
        var formdatas = new FormData($('#scheduleForm')[0]);
        $.ajax({
          type: "POST",
          url: "<?php echo \Cake\Routing\Router::url(array('controller' => 'purchase-orders', 'action' => 'create-schedule')); ?> ",
          data: $("#scheduleForm").serialize(),
          dataType: 'json',
          success: function(response) {
            console.log(response);
            if (response.status == 'success') {
              Toast.fire({
                icon: 'success',
                title: response.message
              });
              $('#scheduleModal').modal('toggle');
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
    
    $('#actual_qty').keyup(function() {

      var totalvalueqty = parseInt($('.poqtyvalu').text());
      var totallistqty = parseInt($('.actualTotalValue').text());

      var actualTotalqty = totalvalueqty - totallistqty;

      var userqtyvalues = parseInt($('#actual_qty').val());

      if (actualTotalqty >= userqtyvalues) {
        $('#scheduleForm').valid(); // Trigger form validation

      } else {
        //$('#scheduleForm').find('input[name="actual_qty"]').val(''); // Clear the input value
      }

    });

      $('#scheduleForm').validate({

        rules: {
          actual_qty: {
            required: true,
            number: true,
            checkQty: true
          },
          delivery_date: {
            required: true
          }
        },
        messages: {
          actual_qty: {
            required: "Please provide a quantity",
            number: "Please enter a valid number",
            checkQty: "Do not exceed PO qty value"
          },
          delivery_date: {
            required: "Please select a date"
          }
        },

        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });


    $.validator.addMethod('checkQty', function(value, element) {

      var totalvalueqty = parseInt($('.poqtyvalu').text());
      var totallistqty = parseInt($('.actualTotalValue').text());
      var actualTotalqty = totalvalueqty - totallistqty;
      var userqtyvalues = parseInt($('#actual_qty').val());

      if (actualTotalqty >= userqtyvalues) {
        return true;
      }
      return false;
    }, 'message');


    var table = $("#example2").DataTable({
      "paging": true,
      "responsive": false,
      "lengthChange": false,
      "autoWidth": false,
      "searching": false,
      //      language: {
      //       search: "_INPUT_",
      //     searchPlaceholder: "Search..."
      // },
    });



    $(document).on("click", ".flu", function() {
      var response = "";
      if ($(this).data('alt') == '+') {
        $(this).data('alt', '-').empty().append('Remove');
        response = getRemote("<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'get-schedules')); ?>/" + $(this).data("id"))
        var currTR = this.parentNode.parentNode;
        var newTR = document.createElement("tr");
        newTR.setAttribute('id', 'id_subtr' + $(this).data('id'))

        if (response.totalQty) {
          $(".actualTotalValue").text(response.totalQty);
        }

        if (response.html != '') {
          newTR.innerHTML = `<td colspan="6">` + response.html + `</td><td colspan="7"></td>`;
        } else {
          newTR.innerHTML = `<td colspan="6">` + response.message + `</td><td colspan="7"></td>`;
        }
        currTR.parentNode.insertBefore(newTR, currTR.nextSibling);
      } else {
        $(this).data('alt', '+').empty().append('add');
        $("#id_subtr" + $(this).data('id')).remove();
      }
    });

    //notify schedule delivery to vendor

    $(document).on('click', '.notify_item', function() {
      $("#schedule_id").val($(this).attr('schedue-id'));

      $.ajax({
        type: "GET",
        //url: '../getDeliveryDetails/' + rowData,
        url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'get-schedule-messages')); ?> /" + $(this).attr('schedue-id'),
        dataType: 'json',
        success: function(response) {
          if (response.status == 'success') {
            $("#past_messages").html(response.html);
          }
          $(".overlay").hide();
        }
      });

    });


    $('.search-box').on('keypress', function(event) {
      if (event.which === 13) {
        var searchName = $(this).closest('.search-bar').find('.search-box').val();
        $(".related tbody:first").empty().hide().append(`<tr>
          <td colspan="13" class="text-center">
            <p>No data found !</p>
          </td>
        </tr>`);
        poform(searchName);
        return false;
      }
    });

    $('.search-box').on('keydown', function(event) {

      if (event.which === 8) { // Check if Backspace key is pressed 
        var searchName = $(this).closest('.search-bar').find('.search-box').val();
        if (searchName.length === 1) {
          $(".related tbody:first").empty().hide();
          poform(searchName);
        }
      }
    });


    poform();

    function poform(search = "") {

      $("#poItemss").empty();

      $(".related tbody:first").show();

      var uri = "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'po-api')); ?>";
      if (search != "") {
        uri += "/" + search
      }
      $.ajax({
        type: "GET",
        url: uri,
        dataType: 'json',
        success: function(response) {
          if (response.status == 'success') {
            $.each(response.message, function(key, val) {
              $("#poItemss").append(`<div class="po-box details-control" data-id="` + val.id + `"> <div class="pono"><small class="mb-0">
                    <?= h('PO No ') ?>
                    <br>
                  </small>
                  <b>` + val.po_no + `</b>
                </div>
                <div class="po-code">
                  <small class="mb-0">
                    <?= h('Vendor Code:') ?>
                  </small>
                  <br> <small><b>
                     ` + val.sap_vendor_code + `
                    </b></small>
                </div>
              </div>`);
            });
            $('div.details-control:first').click();
          } else {
            // $("#poItemss").empty().hide().append(`No data Found`);
            // $(".related").hide();

          }
        }
      });
    }



    $('#notifyForm').validate({
      ignore: ":not(.summernote),.note-editable.panel-body",
      rules: {
        message: {
          required: true
        },
      },
      messages: {
        message: {
          required: "Please enter remarks",
        },
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      },
      submitHandler: function() {
        var formdatas = new FormData($('#notifyForm')[0]);
        $.ajax({
          type: "POST",
          url: "<?php echo \Cake\Routing\Router::url(array('controller' => 'purchase-orders', 'action' => 'save-schedule-remarks')); ?>",
          data: $("#notifyForm").serialize(),
          dataType: 'json',
          success: function(response) {
            console.log(response);
            if (response.status == 'success') {
              $('#notifyModal').modal('toggle');
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
  });
  $(document).ready(function() {

  // Form submission
  $('.btnSub').click(function(event) {
    event.preventDefault(); // Prevent default form submission

    // Perform form validation
    var actualQty = $('#actual_qty').val();
    var deliveryDate = $('#delivery_date').val();

    console.log(deliveryDate + "sdf  "  +actualQty);

    if (actualQty === '') {
      $('#actual_qty').valid();
      return true;

    }

    if (deliveryDate == '') {
      $('#delivery_date').valid();
      return true;
    }

    // Display alert body and OK button
    $('.a-data').addClass('d-none');
    $('.alert-body').removeClass('d-none');
    $('.btnSub').addClass('d-none');
    $('#btnClose').removeClass('d-none');
    $('#error_msg').hide();
    $('.dismiss-btn').hide();
    $('.btn-success').removeClass('d-none');
   
	
  });
  $('#btnClose').click(function() {
    $('.a-data').addClass('d-block');
    $('.dismiss-btn').show();
    $('.btnSub').addClass('d-block');
    $('.alert-body').hide();
    $('.btn-success').hide();
    $('#btnClose').hide();
    $('#btnClose').removeClass('d-none');
    
    
  });
});

</script>