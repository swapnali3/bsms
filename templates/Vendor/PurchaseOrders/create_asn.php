<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader[]|\Cake\Collection\CollectionInterface $poHeaders
 */
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('table') ?>
<?= $this->Form->create(null, ['action' => 'asn-materials', 'id' => 'asnForm']) ?>
<?= $this->form->control('po_header_id', ['id' => 'po_header_id', 'label' => false, 'type' => 'hidden', 'value' => '']) ?>

<div class="poHeaders index content card create-asn">
    <div class="card-body">
        <div class="content-d">
            <div class="t1 pt-1">
                <div class="row">
                    <div class="col-md-6">
                        <h5><b>Select Material</b></h5>
                    </div>
                    <div class="col-md-6">
                        <div class="action-btn d-flex justify-content-end">
                            <a href="#" class="btn btn-info mb-0 mr-1"><i class="fa fa-solid fa-file-import"></i> Upload ASN File</a>
                            <button type="submit" class="btn btn-secondary mb-0 continue_btn" disabled>Continue</button>
                        </div>
                    </div>
                </div>
                <div class="scrollable-div">
                    <div class="search-bar mb-2">
                        <input type="search" placeholder="Search all orders, meterials" class="form-control search-box">
                    </div>
                    <div class="polist">
                        <div class="d-flex">
                            <?php foreach ($poHeaders as $poHeader) : ?>
                                <div class="po-box details-control  ponum" header-id="<?= $poHeader->id ?>">
                                    <p class="po-no mb-0">PO No</p>
                                    <b class="text-info"><?= h($poHeader->po_no) ?></b>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="t2 mt-2 mb-1">

                <div class="right-side">

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
                                <td colspan="6" class="text-center">
                                    <p>No data found !</p>
                                </td>
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
    $(document).ready(function() {

        var table = $("#example1").DataTable({
            "paging": false,
            "responsive": false,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": false,
            "searching": true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
        });



        $(document).on("click", ".flu", function() {
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

        $(document).on('click', 'div.details-control', function() {

            $('div.details-control').removeClass('active');

            $(this).addClass('active');

            $(".continue_btn").addClass('btn-secondary ');
            $(".continue_btn").removeClass('btn-success');
            $(".continue_btn").attr('disabled', 'disabled');
            
            $(".right-side").html(format($(this).attr('header-id')));
            $("#po_header_id").val($(this).attr('header-id'));
        });


        function format(rowData) {
            var div = $('<div/>')
                .addClass('loading')
                .text('Loading...');

            if (!rowData) {
                rowData = $('div.details-control:first').attr('header-id');
            }

            $.ajax({
                type: "GET",
                //url: '../getDeliveryDetails/' + rowData,
                url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'get-items')); ?>/" + rowData,
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


        $(document).on("click", "#ckbCheckAll", function() {
            if (this.checked) {
                $('.checkBoxClass').each(function() {
                    $("#qty" + $(this).data("id")).val($(this).data("pendingqty"));
                    this.checked = true;
                    $("#select" + $(this).data("id")).trigger("change");
                });
            } else {

                $('.checkBoxClass').each(function() {
                    $("#qty" + $(this).data("id")).val('0');
                    this.checked = false;
                    $("#select" + $(this).data("id")).trigger("change");
                });
            }
            if ($('.checkBoxClass:checked').length) {
                $(".continue_btn").addClass('btn-success');
                $(".continue_btn").removeAttr('disabled');
                $(".continue_btn").removeClass('btn-secondary');
            } else {
                $(".continue_btn").addClass('btn-secondary ');
                $(".continue_btn").removeClass('btn-success');
                $(".continue_btn").attr('disabled', 'disabled');
            }
        });

        $(document).on("change", ".checkBoxClass", function() {

            if ($(this).is(':checked')) {

                $("#qty" + $(this).data("id")).val($(this).data("pendingqty"));
            } else {
                $("#qty" + $(this).data("id")).val('0');
            }
        });

        $(document).on("change", ".checkBoxClass", function() {
            if ($('.checkBoxClass:checked').length == $('.checkBoxClass').length) {
                $('#ckbCheckAll').prop('checked', true);
            } else {
                $('#ckbCheckAll').prop('checked', false);
            }

            if ($('.checkBoxClass:checked').length) {
                $(".continue_btn").addClass('btn-success');
                $(".continue_btn").removeAttr('disabled');
                $(".continue_btn").removeClass('btn-secondary');
            } else {
                $(".continue_btn").addClass('btn-secondary ');
                $(".continue_btn").removeClass('btn-success');
                $(".continue_btn").attr('disabled', 'disabled');
            }

        });


    });
    // for select all checkbox
    // $("#ckbCheckAll").click(function () {
    //         $(".checkBoxClass").attr('checked', this.checked);
    //     });
</script>