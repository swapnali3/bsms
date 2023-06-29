<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader[]|\Cake\Collection\CollectionInterface $poHeaders
 */
?>
<?= $this->Html->css('v_vendorCustom') ?>
<div class="poHeaders index content card purchase-order">
  <div class="card-body">
    <div class="table-responsive">
      <div class="table-responsive" id="purViewId">
        <div class="search-bar d-flex mb-2">
          <input type="search" placeholder="Search all orders, meterials.." class="form-control search-box">
          <!-- <button type="button" class="btn-go searchgo ">GO</button> -->
        </div>
        <div class="po-list">
          <div class="d-flex" id="poItes">
            <!-- <?php foreach ($poHeaders as $poHeader) : ?>
              <div class="po-box details-control" data-id="<?= $poHeader->id ?>">
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
  </div>
</div>
<div class="related card">
  <div class="right-side">
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

  <div class="row">
    <div class="col-lg-12 mb-2 pe-4 d-flex justify-content-end">
      <button type="button" data-id="<?= $poHeader->id ?>" class="btn btn-primary notify mb-0" <?= $poHeader->flag === 1 ? 'disabled' : '' ?>>
        <i class="fa fa-bell"></i> Notify
      </button>
    </div>



  </div>


</div>

<script>
  $(document).on("click", ".redirect", function() {
    window.location.href = $(this).data("href");
  });
  $(document).ready(function() {
    $("#example1").DataTable({
      "paging": true,
      "responsive": false,
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

    $(document).ready(function() {
      $('div.details-control').click();
    });

    $(document).on('click', 'div.details-control', function() {

      $('div.details-control').removeClass('active');

      $(this).addClass('active');
      $(".right-side").html(format($(this).attr('data-id')));
    });



    function format(rowData) {

      $(".related").show();
      var div = $('<div/>')
        .addClass('loading')
        .text('Loading...');

      if (!rowData) {
        rowData = $('div.details-control:first').attr('data-id');
      }

      $.ajax({
        type: "GET",
        //url: '../getDeliveryDetails/' + rowData,
        url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'getPurchaseItem')); ?> /" + rowData,
        contentType: "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        //async: false,
        beforeSend: function() {
          $("#loaderss").show();
        },
        success: function(response) {
          if (response.status == 'success') {
            div
              .html(response.html)
              .removeClass('loading');
          } else {
            div
              .html(response.message)
              .removeClass('loading');
          }
        },
        complete: function() {
          $("#loaderss").hide();
        }
      });

      return div;
    }


    $('.search-box').on('keypress', function(event) {
      if (event.which === 13) {
        var searchName = $(this).closest('.search-bar').find('.search-box').val();
        $(".related tbody:first").empty().hide().append(`<tr>
          <td colspan="6" class="text-center">
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
      var div = $('<div/>')
        .addClass('loading')
        .text('Loading...');
      $("#poItes").empty();

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
                  <br> <small><b>
                     ` + val.sap_vendor_code + `
                    </b></small>
                </div>
              </div>`);

              $('div.details-control:first').click();

            });
          } else {
            //     $(".related tbody:first").empty().hide().append(`<tr>
            //   <td colspan="6" class="text-center">
            //     <p>No data found !</p>
            //   </td>
            // </tr>`);


          }
        }
      });
    }
    $(document).ready(function() {
      $('div.details-control').click();
    });


    var Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
    });
    $(".notify").click(function(e) {
      e.preventDefault();

      var id = $(this).attr("data-id");

      // alert($username);

      $.ajax({
        type: "GET",
        url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'po-notify')); ?>/" + id,
        dataType: "json",
        success: function(response) {
          if (response.status == "1") {
            Toast.fire({
              icon: "success",
              title: response.message,
            });

          } else {
            Toast.fire({
              icon: "error",
              title: response.message,
            });
          }
        },
        error: function(xhr, status, error) {
          // Handle error case if needed
        },
      });
    });

  });
</script>