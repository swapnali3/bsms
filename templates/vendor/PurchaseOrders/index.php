<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader[]|\Cake\Collection\CollectionInterface $poHeaders
 */
?>
<?= $this->Html->css('vendorCustom') ?>
<div class="poHeaders index content card purchase-order">
  <div class="card-body">
    <div class="table-responsive">
      <div class="table-responsive" id="purViewId">
        <div class="search-bar d-flex mb-2">
          <input type="search" placeholder="Search all orders, meterials.." class="form-control search-box">
          <button type="button" class="btn-go">GO</button>
        </div>
        <div class="po-list">
          <div class="d-flex">
            <?php foreach ($poHeaders as $poHeader) : ?>
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
            <?php endforeach; ?>
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
        dataType: 'json',
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
        }
      });

      return div;
    }

    $(document).ready(function() {
      $('div.details-control:first').click();
    });

  });
</script>