<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting[]|\Cake\Collection\CollectionInterface $settings
 */
?>
<!-- <div class="settings index content">
    
    <h3><?= __('Setting') ?></h3>
    <div class="table-responsive">
        Vendor Management
    </div>
</div> -->
<style>
    .search-fm {
        color: #555;
        display: flex;
        padding: 2px;
        border: 1px solid #8c8c8c;
        border-radius: 30px;
        margin: 0 0 0px;
        margin-left: 10px;
        background-color: #fff;
    }

    .search-fm input[type="search"] {
        border: none;
        background: transparent;
        margin: 0;
        padding: 7px 8px;
        font-size: 14px;
        color: inherit;
        border: 1px solid transparent;
        border-radius: inherit;
    }

    .search-fm input[type="search"]::placeholder {
        color: #bbb;
    }

    .search-fm button[type="submit"] {
        text-indent: -999px;
        overflow: hidden;
        width: 40px;
        padding: 0;
        margin: 0;
        border: 1px solid transparent;
        border-radius: inherit;
        background: transparent url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'%3E%3C/path%3E%3C/svg%3E") no-repeat center;
        cursor: pointer;
        opacity: 0.7;
    }

    .search-fm button[type="submit"]:hover {
        opacity: 1;
    }

    .search-fm button[type="submit"]:focus,
    .search-fm input[type="search"]:focus {
        box-shadow: 0 0 3px 0 #1183d6;
        border-color: #1183d6;
        outline: none;
    }

    /* toggle */
    .toggle-btn .input-switch {
        display: none;
    }

    .toggle-btn .label-switch {
        display: inline-block;
        position: relative;
    }

    .toggle-btn .label-switch::before,
    .toggle-btn .label-switch::after {
        content: "";
        display: inline-block;
        cursor: pointer;
        transition: all 0.5s;
    }

    .toggle-btn .label-switch::before {
        width: 3em;
        height: 1em;
        border: 1px solid #757575;
        border-radius: 4em;
        background: #888888;
    }

    .toggle-btn .label-switch::after {
        position: absolute;
        left: 0;
        top: -20%;
        width: 1.5em;
        height: 1.5em;
        border: 1px solid #757575;
        border-radius: 4em;
        background: #ffffff;
    }

    .input-switch:checked~.label-switch::before {
        background: #00a900;
        border-color: #008e00;
    }

    .input-switch:checked~.label-switch::after {
        left: unset;
        right: 0;
        background: #00ce00;
        border-color: #009a00;
    }

    .toggle-btn .info-text {
        display: inline-block;
    }

    .toggle-btn .info-text::before {
        content: "In-active";
    }

    .input-switch:checked~.info-text::before {
        content: "Active";
    }

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
.ui-menu-item-wrapper{
    font-size: 13px !important;
}
</style>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
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
                                <button id="click" class="btn btn-warning">Add</button>
                                </Div>

                                <!-- <button id="add" class="hidden">Item does not exist. Click here to add it.</button> -->

                            </div>
                            <!-- <a href="#" class="" data-toggle="modal" data-target="#modal-xl">Select</a> -->
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
                                <td id="your-selection"></td>
                                <td><input type="text" class="form-control"></td>
                                <td><i class="fas fa-solid fa-times remove-list"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
</div>

<script>
    //     $("#selected-i").on("click", ".fa-times", function() {
    //     var currentItem = $(this).closest('.list-box').find('span').text();
    //     var selectedBox = $(this).closest('.list-box').clone();
    //     selectedBox.find('.fa-times')
    //         .removeClass('fa-times')
    //         .addClass('fa-plus');
    //     selectedBox.appendTo('#all-item');
    //     $(this).closest('.list-box').remove();
    // });
    // $("#all-item").on("click", ".add-list", function() {
    //     var currentItem = $(this).closest('.box').find('span').text();
    //     var selectedBox = $(this).closest('.list-box').clone();
    //     selectedBox.find('.add-list')
    //         .removeClass('fa-plus')
    //         .addClass('fa-times')
    //     selectedBox.appendTo('#selected-i');
    //     $(this).closest('.list-box').remove();
    // });

    var source = ["ITEM 1000", "ITEM 2000", "ITEM 3000", "ITEM 4000", "ITEM 5000", "ITEM 6000"];

    $(function () {
        $(".remove-list").on("click", function () {
            var x=$(this).html();
            $(".box").remove(x);
        });
        $("#auto").autocomplete({
            source: function (request, response) {
                response($.ui.autocomplete.filter(source, request.term));
                //$('#outputcontent').html(thehtml);
            },
            change: function (event, ui) {
                $("#add").toggle(!ui.item);
            }
        });
      
        
        $("#click").on("click", function () {
            var newSelected = $("#auto").val();
            var thehtml = '' + $("#auto").val();
            var selectedItems = $('#your-selection').html();
            if (selectedItems.indexOf(newSelected) === -1) {
                $('#your-selection').append(thehtml);
               
            } else {
                alert("Already selected!");
            }
            $("#auto").val('');
        });


        $("#add").on("click", function () {
            source.push($("#auto").val());
            $(this).hide();
        });
    });

</script>
