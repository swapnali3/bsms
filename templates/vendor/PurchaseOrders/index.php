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
        <div class="table-responsive p-2" id="purViewId">
        <div class="search-bar mb-2">
          <input type="search" placeholder="Search all orders, meterials" class="form-control search-box">
        </div>
        <div class="po-list">
          <div class="d-flex">
            <?php foreach ($poHeaders as $poHeader) : ?>
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
            <?php endforeach; ?>
          </div>
        </div>
      </div>
        </div>
    </div>
</div>
<div class="related card">

</div>

<script>
    $(document).on("click", ".redirect", function () {
        window.location.href = $(this).data("href");
    });
    $(document).ready(function () {
        $("#example1").DataTable({
            "paging": true,
            "responsive": false, "lengthChange": false, "autoWidth": false, "searching": true,
            "ordering":false,
            language: {
          search: "_INPUT_",
        searchPlaceholder: "Search..."
    },
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
