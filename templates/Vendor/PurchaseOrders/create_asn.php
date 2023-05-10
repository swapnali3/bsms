<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader[]|\Cake\Collection\CollectionInterface $poHeaders
 */
?>
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('table') ?>
<?= $this->Form->create(null,['action' => 'asn-materials', 'id' => 'asnForm']) ?>
<?= $this->form->control('po_header_id', ['id' =>'po_header_id', 'label' => false, 'type' => 'hidden', 'value'=> '']) ?>
<div class="poHeaders index content card create-asn">
    <div class="card-header p-3">
        <div class="row">
            <div class="col-md-6">
            <!-- <h4 class="text-info" style="color:#004d87 !important;">
            <b>
                <?= __('CREATE ASN') ?>
            </b>
        </h4> -->
            </div>
            <div class="col-md-6">
            <div class="action-btn d-flex justify-content-end">
       <a href="#" class="btn btn-info mb-0 mr-1"><i class="fa fa-solid fa-file-import"></i> Upload ASN File</a>
       <button type="submit" class="btn btn-secondary mb-0 continue_btn">Continue</button>
       </div>
            </div>
        </div>
       
       
    </div>
    <div class="card-body">
        <div class="">
            <!-- <h5><b>Select Material</b></h5> -->
            <div class="d-flex">
                <div class="t1">
                <h5><b>Select Material</b></h5> <table class="table" id="example1">
                <thead>
                    <tr>
                        <!-- <th width="5%"></th>
                        <th>
                            <?= h('Vendor Code') ?>
                        </th> -->
                        <th class="pono">
                            <?= h('PO No.') ?>
                        </th>
                        <!-- <th>
                            <?= h('Document Type') ?>
                        </th>
                        <th>
                            <?= h('Created On') ?>
                        </th>
                        <th>
                            <?= h('Created By') ?>
                        </th>
                        <th>
                            <?= h('Pay Terms') ?>
                        </th>
                        <th>
                            <?= h('Currency') ?>
                        </th>
                        <th>
                            <?= h('Exchange Rate') ?>
                        </th> -->
                        <!-- <th><?= h('Release Status') ?></th> -->
                        <!-- <th><?= h('Added Date') ?></th> -->
                        <!-- <th>
                            <?= h('Updated Date') ?>
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($poHeaders as $poHeader): ?>
                    <tr>
                    <!-- <td class="details-control" header-id="<?=$poHeader->id?>">
                        <span class="material-symbols-outlined flu" data-alt="+">
                            add
                        </span>    
                        </td> -->
                        <!-- <td><?= h($poHeader->sap_vendor_code) ?></td> -->
                        <td class="details-control ponum" header-id="<?=$poHeader->id?>"><?= h($poHeader->po_no) ?></td>
                        <!-- <td><?= h($poHeader->document_type) ?></td>
                        <td><?= h($poHeader->created_on) ?></td>
                        <td><?= h($poHeader->created_by) ?></td>
                        <td><?= h($poHeader->pay_terms) ?></td>
                        <td><?= h($poHeader->currency) ?></td>
                        <td><?= $this->Number->format($poHeader->exchange_rate) ?> </td> -->
                        <!-- <td><?= h($poHeader->release_status) ?></td> -->
                        <!-- <td><?= h($poHeader->added_date) ?></td> -->
                        <!-- <td>
                            <?= h($poHeader->updated_date) ?>
                        </td> -->
                    </tr>
                    <?php endforeach; ?>
                    
                    
                </tbody>
            </table></div>
                <div class="t2"> 
                <table class="table table-bordered material-list" id="example2">
            <thead>
                <tr>
                    <th>
                    <input type="checkbox" id="ckbCheckAll">
                    </th>
                    <th>Item</th>
                    <th>Material</th>
                    <th>Short Text</th>
                    <th>Pending Qty</th>
                    <th>Set Delivery Qty</th>
                </tr>
            </thead>
             <tbody>
               <tr>
                <td colspan="6" class="text-center"> <p>No data found !</p></td>
               </tr>
             </tbody>
            </table>
                </div>
            </div>
           
           
        </div>
    </div>
    <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div> -->
</div>
<?= $this->form->end() ?>

<script>
    $(document).ready(function () {

        var table = $("#example1").DataTable({
      "paging": false,
      "responsive": true,
       "lengthChange": false,
        "autoWidth": false,
        "ordering": false,
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

      $(".t2").html(format($(this).attr('header-id')));
      $("#po_header_id").val($(this).attr('header-id'));
    });


    function format(rowData) {
      var div = $('<div/>')
        .addClass('loading')
        .text('Loading...');

      $.ajax({
        type: "GET",
        //url: '../getDeliveryDetails/' + rowData,
        url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'get-items')); ?> /" + rowData,
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

    $(document).on("click", "#ckbCheckAll",function(){
        if(this.checked){
            $('.checkBoxClass').each(function(){
                this.checked = true;
                $("#select"+$(this).data("id")).trigger("change");
            });
        }else{
             $('.checkBoxClass').each(function(){
                this.checked = false;
                $("#select"+$(this).data("id")).trigger("change");
            });
        }
        if($('.checkBoxClass:checked').length) {
            $(".continue_btn").addClass('btn-success');
            $(".continue_btn").removeClass('btn-secondary');
        } else {
            $(".continue_btn").addClass('btn-secondary ');
            $(".continue_btn").removeClass('btn-success');
        }
    });

    $(document).on("change", ".checkBoxClass",function(){
        if($(this).is(':checked')){ $("#qty"+$(this).data("id")).val($(this).data("pendingqty"));}
        else {$("#qty"+$(this).data("id")).val('0');}
    });
    
        $(document).on("change", ".checkBoxClass",function(){
        if($('.checkBoxClass:checked').length == $('.checkBoxClass').length){
            $('#ckbCheckAll').prop('checked',true);
        }else{
            $('#ckbCheckAll').prop('checked',false);
        }

        if($('.checkBoxClass:checked').length) {
            $(".continue_btn").addClass('btn-success');
            $(".continue_btn").removeClass('btn-secondary');
        } else {
            $(".continue_btn").addClass('btn-secondary ');
            $(".continue_btn").removeClass('btn-success');
        }

    });


    });
    // for select all checkbox
    // $("#ckbCheckAll").click(function () {
    //         $(".checkBoxClass").attr('checked', this.checked);
    //     });
    

    
</script>
