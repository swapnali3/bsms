<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader[]|\Cake\Collection\CollectionInterface $poHeaders
 */
?>
<!-- <?= $this->Html->css('cstyle.css') ?> -->
<!-- <?= $this->Html->css('table.css') ?> -->
<!-- <?= $this->Html->css('listing.css') ?> -->
<?= $this->Html->css('v_purchaseorder_index') ?>
<!-- <?= $this->Html->css('v_vendorCustom') ?> -->
<div class="poHeaders index content card purchase-order purchase-order-card card_boxshadow">
  <div class="card-body">
    <div class="table-responsive">
      <div class="table-responsive" id="purViewId">
        <div class="search-bar d-flex mb-2">
          <input type="search" placeholder="Search all orders, materials, vendor" class="form-control search-box">
          <!-- <button type="button" class="btn-go searchgo ">GO</button> -->
        </div>
        <div class="po-list">
          <div class="d-flex" id="poItes">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="related card related-card">
  <div class="card-header p-2" id="id_pohead"></div>
  <div class="table-responsive right-side p-2">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Item</th>
          <th>Material</th>
          <th>Short Text</th>
          <th>Pending Qty</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="4" class="text-center">
            <p>No data found !</p>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row p-3">
    <?php if($factoryExists) : ?>
    <div class="col-lg-12 mb-2 pe-4 d-flex justify-content-end flagButton">
      <!-- <button type="button" data-id="" class="btn bg-gradient-button notify mb-0">
        <i class="fa fa-envelope"></i> Acknowledge
      </button> -->
    </div>
    <?php else : ?>
    Please add Factory details to Acknowledge PO
    <?php endif; ?>
  </div>
</div>

<script>
  var uri = `<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'po-api')); ?>`;

  $(document).on("click", ".redirect", function () { window.location.href = $(this).data("href"); });

  $(document).ready(function () {
    $("#example1").DataTable({
      "paging": true,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "ordering": false,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
      },
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('div.details-control').click();

    poform();
  });

  $(document).on('click', 'div.details-control', function () {
    $('div.details-control').removeClass('active');
    $(this).addClass('active');

    var poHeaderID = $(this).data('id');
    var flagdata = $("#" + poHeaderID).data('flag');

    if (flagdata < 1) {
      // $('.flagButton').empty().append('<input class="form-control" placeholder="Reject Remark" type="text" id="id_remark" style="width: 50vw;"><button type="button" class="ml-2 btn bg-gradient-button notify mb-0"><i class="fa fa-envelope"></i> Acknowledge</button><button type="button" class="btn bg-gradient-danger ignoreme ml-2"><i class="fa fa-exclamation"></i> Reject</button>');
      $('.flagButton').empty().append('<button type="button" class="ml-2 btn bg-gradient-button notify mb-0"><i class="fa fa-envelope"></i> Acknowledge</button>');
      $('.notify').attr('data-id', poHeaderID);
      $('.ignoreme').attr('data-id', poHeaderID);
    } else { $('.flagButton').empty(); }

    $(".right-side").html(format($(this).attr('data-id')));
    $(".card-header").html(poHeaders($(this).attr('data-id')));
  });

  
  function searchPo(search = "") {
    var div = $('<div/>').addClass('loading').text('Loading...');
    $("#poItes").html('');
    $(".related tbody:first").show();
    $.ajax({
      type: "GET",
      url: uri + "/" + search,
      dataType: 'json',
      beforeSend: function () { $("#gif_loader").show(); },
      success: function (response) {
        if (response.status) {
          $.each(response.data, function (key, val) {
            $("#poItes").append(`<div class="po-box details-control" data-id="` + val.id + `"> <div class="pono"><small class="mb-0">
                    <?= h('PO No ') ?>
                    <br>
                  </small>
                  <b>` + val.po_no + `</b>
                </div>
                <div class="po-code">
                  <small class="mb-0">
                    <?= h('Vendor Code:') ?>
                  </small>
                  <br> <small><b class="sap_vendorcode"> ` + val.sap_vendor_code + ` </b></small>
                </div>
                <span class="hide flagdata" id='` + val.id + `' data-flag=` + val.acknowledge + `></span>
              </div>`);
          });
          $('div.details-control:first').click();
        } else { $('.related').find('.flagButton .notify').css('display', 'none'); }
      },
      error: function (xhr, status, error) { },
      complete: function () { $("#gif_loader").hide(); }
    });
  }

  function poform(search = "") {
    var div = $('<div/>').addClass('loading').text('Loading...');
    $("#poItes").html('');
    $(".related tbody:first").show();
    if (search != "") { uri += "/" + search }
    $.ajax({
      type: "GET",
      url: uri,
      dataType: 'json',
      beforeSend: function () { $("#gif_loader").show(); },
      success: function (response) {
        if (response.status) {
          $.each(response.data, function (key, val) {
            $("#poItes").append(`<div class="po-box details-control" data-id="` + val.id + `"> <div class="pono"><small class="mb-0">
                    <?= h('PO No ') ?>
                    <br>
                  </small>
                  <b>` + val.po_no + `</b>
                </div>
                <div class="po-code">
                  <small class="mb-0">
                    <?= h('Vendor Code:') ?>
                  </small>
                  <br> <small><b class="sap_vendorcode"> ` + val.sap_vendor_code + ` </b></small>
                </div>
                <span class="hide flagdata" id='` + val.id + `' data-flag=` + val.acknowledge + `></span>
              </div>`);
            $('div.details-control:first').click();
          });
        } else { $('.related').find('.flagButton .notify').css('display', 'none'); }
      },
      error: function (xhr, status, error) { },
      complete: function () { $("#gif_loader").hide(); }
    });
  }

  function poHeaders(rowDatas) {
    console.log("ID-" + rowDatas);
    $.ajax({
      type: "GET",
      url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'poDetails')); ?>/" + rowDatas,
      contentType: "application/x-www-form-urlencoded; charset=utf-8",
      dataType: "json",
      //async: false,
      beforeSend: function () { $("#gif_loader").show(); },
      success: function (response) {
        if (response.status) { 
          $(".card-header").html(response.html);
         }
      },
      complete: function () { $("#gif_loader").hide(); }
    });
  }

  function format(rowData) {
    $(".related").show();
    var div = $('<div/>').addClass('loading').text('Loading...');
    if (!rowData) { rowData = $('div.details-control:first').attr('data-id'); }

    $.ajax({
      type: "GET",
      //url: '../getDeliveryDetails/' + rowData,
      url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'getPurchaseItem')); ?>/" + rowData,
      contentType: "application/x-www-form-urlencoded; charset=utf-8",
      dataType: "json",
      //async: false,
      beforeSend: function () { $("#gif_loader").show(); },
      success: function (response) {
        if (response.status == 'success') { div.html(response.html).removeClass('loading'); }
        else { div.html(response.message).removeClass('loading'); }
      },
      complete: function () { $("#gif_loader").hide(); }
    });
    return div;
  }

  $('.search-box').on('keyup', function (event) {
    //if (event.which === 13) {
      var searchName = $(this).val();
      $(".related tbody").empty().append(`<tr>
          <td colspan="7" class="text-center">
            <p>No data found !</p>
          </td>
        </tr>`);
        searchPo(searchName);
      //return false;
    //}
  });

  /*$('.search-box').on('keydown', function (event) {
    if (event.which === 8) { // Check if Backspace key is pressed 
      var searchName = $(this).val();
      if (searchName.length === 1) {
        $(".related tbody").empty().hide();
        searchPo(searchName);
      }
    }
  }); */



  // $(document).on('click', '.notify', function (e) {
  //   e.preventDefault();
  //   var id = $(this).attr("data-id");
  //   $.ajax({
  //     type: "GET",
  //     url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'po-notify')); ?>/" +
  //       id,
  //     dataType: "json",
  //     beforeSend: function () { $("#gif_loader").show(); },
  //     success: function (response) {
  //       if (response.status == "1") {
  //         Toast.fire({
  //           icon: "success",
  //           title: response.message,
  //         });
  //         $('.ignoreme').hide();
  //         $('.notify').hide();
  //         $('#id_remark').hide();
  //         $('#example2 tr').removeAttr('style');
  //         $('#' + id).data('flag', 1);
  //       } else {
  //         Toast.fire({
  //           icon: "error",
  //           title: response.message,
  //         });
  //       }
  //     },
  //     error: function (xhr, status, error) { console.log(xhr, status, error); },
  //     complete: function () { $("#gif_loader").hide(); }
  //   });
  // });

  $(document).on('click', '.notify', function (e) {
    e.preventDefault();
    var notifyButton = $(this);
    var ignoreButton = $('.ignoreme');
    var remarkInput = $('#id_remark');
    var id = notifyButton.attr("data-id");

    $.ajax({
        type: "GET",
        url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'po-notify')); ?>/" + id,
        dataType: "json",
        beforeSend: function () {
            ignoreButton.prop('disabled', true);
            notifyButton.prop('disabled', true);
            remarkInput.prop('readonly', true);
            $("#gif_loader").show();
        },
        success: function (response) {
            if (response.status == "1") {
                Toast.fire({ icon: "success", title: response.message });
                ignoreButton.hide();
                notifyButton.hide();
                remarkInput.hide();
                $('#example2 tr').removeAttr('style');
                $('#' + id).data('flag', 1);
            } else {
                Toast.fire({ icon: "error", title: response.message });
                ignoreButton.prop('disabled', false).show();
                notifyButton.prop('disabled', false).show();
                remarkInput.prop('readonly', false).show();
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr, status, error);
            ignoreButton.prop('disabled', false).show();
            notifyButton.prop('disabled', false).show();
            remarkInput.prop('readonly', false).show();
            Toast.fire({ icon: "error", title: 'Failed to make the request.' });
        },
        complete: function () {
            $("#gif_loader").hide();
        }
    });
});



  // $(document).on('click', '.ignoreme', function (e) {
  //   e.preventDefault();
  //   var id = $(this).attr("data-id");
  //   var remark = $("#id_remark").val();
  //   if (remark)
  //   {$.ajax({
  //     type: "GET",
  //     url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'po-ignore')); ?>/" +
  //       id,
  //     data : {"remark":remark},
  //     dataType: "json",
  //     beforeSend: function () { $("#gif_loader").show(); },
  //     success: function (response) {
  //       if (response.status == "1") {
  //         Toast.fire({ icon: "success", title: response.message});
  //         $('.ignoreme').hide();
  //         $('.notify').hide();
  //         $('#id_remark').hide();
  //         $('#example2 tr').removeAttr('style');
  //         $('#' + id).data('flag', 1);
  //       }
  //       else { Toast.fire({ icon: "error", title: response.message}); }
  //     },
  //     error: function (xhr, status, error) { console.log(xhr, status, error); },
  //     complete: function () { $("#gif_loader").hide(); }
  //   });} else{ Toast.fire({ icon: "error", title: 'Remark Mandatory' }); }
  // });
  $(document).on('click', '.ignoreme', function (e) {
    e.preventDefault();
    var ignoreButton = $(this);
    var notifyButton = $('.notify');
    var remarkInput = $('#id_remark');
    var id = ignoreButton.attr("data-id");
    var remark = remarkInput.val();

    if (remark) {
        $.ajax({
            type: "GET",
            url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'po-ignore')); ?>/" + id,
            data: { "remark": remark },
            dataType: "json",
            beforeSend: function () {
                ignoreButton.prop('disabled', true);
                notifyButton.prop('disabled', true);
                remarkInput.prop('readonly', true);
                $("#gif_loader").show();
            },
            success: function (response) {
                if (response.status == "1") {
                    Toast.fire({ icon: "success", title: response.message });
                    ignoreButton.hide();
                    notifyButton.hide();
                    remarkInput.hide();
                    $('#example2 tr').removeAttr('style');
                    $('#' + id).data('flag', 1);
                } else {
                    Toast.fire({ icon: "error", title: response.message });
                    ignoreButton.prop('disabled', false).show();
                    notifyButton.prop('disabled', false).show();
                    remarkInput.prop('readonly', false).show();
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr, status, error);
                ignoreButton.prop('disabled', false).show();
                notifyButton.prop('disabled', false).show();
                remarkInput.prop('readonly', false).show();
                Toast.fire({ icon: "error", title: 'Failed to make the request.' });
            },
            complete: function () {
                $("#gif_loader").hide();
            }
        });
    } else {
        Toast.fire({ icon: "error", title: 'Remark Mandatory' });
    }
});



</script>