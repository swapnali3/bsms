<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting[]|\Cake\Collection\CollectionInterface $settings
 */
?>

<style>
    .supplier-capacity .box i {
        font-size: 12px;
        padding-left: 5px;
    }

    .supplier-capacity .box {
        background-color: #d4ddf7;
        padding: 3px 8px;
        border-radius: 3px;
        margin: 5px;
    }

    .supplier-capacity .capacity-tbl {
        width: 50%;
        margin: 10px;
    }

    .supplier-capacity .capacity-tbl td,
    .supplier-capacity .capacity-tbl th {
        padding: 12px !important;
    }

    .supplier-capacity .capacity-tbl td .form-control {
        height: 25px;
        width: 90px;
    }

    .supplier-capacity label {
        margin: 0px;
        padding-bottom: 8px;
        color: #999;
        font-size: 12px;
    }

    #selected-i .box {
        background-color: #b8e584;
    }

    .hidden {
        display: none;
    }

    .select-machine input#auto {
        width: 60%;
        margin-right: 5px;
        height: 34px;
    }

    .select-machine .btn {
        height: 33px;
        font-size: 12px;
        color: #fff;
    }

    .listing-tab {
        margin-top: -30px;
    }

    li.ui-menu-item {
        padding-left: 8px !important;
    }

    .ui-menu-item-wrapper {
        font-size: 13px !important;
    }
</style>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?= $this->Html->css('custom') ?>


<div class="supplier-capacity">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <div class="row">
                        <div class="col-md-2">
                            <label>SUPPLIER</label>
                            <h6><b>200-Vendor Plant</b></h6>
                        </div>
                        <div class="col-md-2">
                            <label>VENDOR CODE</label>
                            <h6><b>20047565</b></h6>
                        </div>
                        <div class="col-md-7">
                            <label>SELECT MACHINE</label>
                            <br>
                            <div class="select-machine d-flex">
                                <Div class="d-flex">
                                    <input type="text" id="auto" class="form-control" placeholder="search machine" />
                                    <button id="btnClick" class="btn btn-warning">Add</button>
                                </Div>
                            </div>
                        </div>
                        <div class="col-md-1 text-right">

                            <a href="#" class="btn btn-custom">Submit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table capacity-tbl" width="50%">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>No of parts</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="your-selection" class="d-none"></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<script>

    var source = ["ITEM 1000", "ITEM 2000", "ITEM 3000", "ITEM 4000", "ITEM 5000", "ITEM 6000"];
    $(function () {
        var selectedItems = []; // Array to keep track of selected items

        $("#auto").autocomplete({
            source: function (request, response) {
                response($.ui.autocomplete.filter(source, request.term));
            },
            change: function (event, ui) {
                $("#add").toggle(!ui.item);
            }
        });

        $("#btnClick").on("click", function () {
            var newSelected = $("#auto").val();

            if (selectedItems.indexOf(newSelected) === -1) {
                var newRow = '<tr>' +
                    '<td>' + newSelected + '</td>' +
                    '<td><input type="text" class="form-control"></td>' +
                    '<td><i class="fas fa-solid fa-times remove-items"></i></td>' +
                    '</tr>';

                $('.capacity-tbl tbody').append(newRow);
                selectedItems.push(newSelected); // Add the selected item to the array
            } else {
                alert("Record already exists!");
            }

            $("#auto").val('');
        });

        $(document).on("click", ".remove-items", function () {
            var removedItem = $(this).closest("tr").find("td:first").text();
            selectedItems = selectedItems.filter(function (item) {
                return item !== removedItem; // Remove the item from the array
            });
            $(this).closest("tr").remove();
        });
    });

</script>