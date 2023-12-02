<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader[]|\Cake\Collection\CollectionInterface $poHeaders
 */
?>
<!-- <?= $this->Html->css('cstyle.css') ?> -->
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('b_index.css') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-start align-items-center">
                        <h5 class="mb-0">Purchase Orders</h5>
                    </div>
                </div>

                <div class="row">
                <div class="col-12 add-vendor">
        <div class="card mb-2 card_box_shadow">
            <div class="card-body fm">
                <?= $this->Form->create(null, ['id' => 'addvendorform']) ?>
                <div class="row">
                    
                    <div class="col-sm-12 col-md-3 col-lg-2 mb-3">
                        <div class="form-group">
                        <?php echo $this->Form->control('vendor_code', array('class' => 'form-control', 'options' => $vendorList, 'empty' => 'Please Select')); ?>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3 col-lg-2 mb-3">
                        <div class="form-group">
                            <?php echo $this->Form->control('po_no', array('class' => 'form-control', 'options' => $poList, 'empty' => 'Please Select')); ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2 mb-3">
                        <div class="form-group">
                            <?php echo $this->Form->control('material', array('class' => 'form-control', 'options' => $materialList, 'empty' => 'Please Select')); ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2 mb-3">
                        <div class="form-group">
                            <?php echo $this->Form->control('status', array('class' => 'form-control', 'options' => $statusList, 'empty' => 'Please Select')); ?>
                        </div>
                    </div>
                    <div class="ml-2 mt-2">
                        <div class="form-group mt-4">
                        <?= $this->Form->button(__('Search'), ['class' => 'btn bg-gradient-submit', 'id' => 'id_addvendor', 'type' => 'submit']) ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2 mb-3">
                        <span class="errorm">
                            <?= $this->Flash->render() ?>
                        </span>
                    </div>
                </div>
                <div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <h6>Are you sure you want to add vendor?</h6>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="modal_cancel btn "  data-dismiss="modal">Cancel</button>
                                <button type="submit" class="modal_ok btn " >Ok</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
                </div>

            </div>

            <div class="card-body buyer_material">
                <table class="table table-hover table-responsive" id="example1">
                    <thead>
                        <tr>
                            <th>Vendor Code</th>
                            <th>PO</th>
                            <th>Item</th>
                            <th>Material</th>
                            <th>Description</th>
                            <th>PO Qty</th>
                            <th>Grn Qty</th>
                            <th>Pending Qty</th>
                            <th>Order Unit</th>
                            <th>Net Price</th>
                            <th>Price Unit</th>
                            <th>Net Value</th>
                            <th>Gross Value</th>
                            <th>Schedule Qty</th>
                            <th>ASN Qty</th>
                            <th>ASN No</th>
                            <th>Delivery Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($poReportData)) : ?>
                            <?php foreach ($poReportData as $material) : 
                                        //echo '<pre>'; print_r($material); exit;
                                ?>
                                        <tr>
                                            <td>
                                                <?= h($material['sap_vendor_code']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['po_no']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['item']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['material']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['short_text']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['po_qty']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['grn_qty']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['pending_qty']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['order_unit']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['net_price']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['price_unit']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['net_value']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['gross_value']) ?>
                                            </td>
                                            <td>
                                                <?= h($material['actual_qty'])?> 
                                            </td>
                                            <td>
                                                <?= h($material['received_qty'])?>
                                            </td>
                                            <td>
                                                <?= h($material['asn_no'])?>
                                            </td>
                                            <td>
                                                <?= h($material['delivery_date'] ? date('d-m-y', strtotime($material['delivery_date'])): '')?>
                                            </td>
                                            <td>
                                                <?php 
                                                $status = '';
                                                if($material['status'] == 3) {
                                                    $status = 'Received';
                                                }else if($material['status'] == 2) {
                                                    $status = 'In-Transit';
                                                } else if(!$material['delivery_date']) {
                                                    $status = '';
                                                }else if($material['received_qty'] == 0) {
                                                    $status = 'Scheduled';
                                                }else if($material['received_qty'] < $material['actual_qty']) {
                                                    $status = 'Partial ASN created';
                                                } else {
                                                    $status = 'ASN created';
                                                }
                                                echo $status;
                                                ?>
                                            </td>
                                        </tr>
                            <?php 
                        endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">
                                    No Records Found
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
   
    $(document).ready(function () {

        var datatable = $("#example1").DataTable({
            "paging": true,
            "responsive": false,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true,
            "ordering": true,
            "destroy": true,
            dom: 'Blfrtip',
            buttons: [{ extend: 'copy' },{ extend: 'excelHtml5', text : 'Export'}]
        });
    $("#addvendorform").validate({
      rules: {
        vendor_code: {
          required: false,
        },
      },
      messages: {
        vendor_code: {
          required: "Please enter a first name",
        },
      },
      errorElement: "span",
      errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        element.closest(".form-group").append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid");
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass("is-invalid");
      },
      submitHandler: function (form) {
        $.ajax({
          type: "POST",
          url:  "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'search-data')); ?>",
          data: $("#addvendorform").serialize(),
          dataType: "json",
          beforeSend: function () { $("#gif_loader").show(); },
          success: function (response) {
            console.log(response);
            if (response.status) {
              /*Toast.fire({
                icon: "success",
                title: response.message,
              });*/
              
              datatable.clear().draw();
              datatable.rows.add(response.data).draw(); // Add new data
              datatable.columns.adjust().draw();
            } else {
              /*Toast.fire({
                icon: "error",
                title: response.message,
              }); */
              datatable.clear().draw();
            }
          },
          complete: function () { $("#gif_loader").hide(); }
        });
      },
    });
  });

</script>
