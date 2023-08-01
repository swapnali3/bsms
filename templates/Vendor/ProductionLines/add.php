<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Productionline $productionline
 */
?>
<!-- <?= $this->Html->css('cstyle.css') ?> -->
<!-- <?= $this->Html->css('custom') ?> -->
<!-- <?= $this->Html->css('table.css') ?> -->
<!-- <?= $this->Html->css('listing.css') ?> -->
<?= $this->Form->create($productionline) ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-start">
                        <h5><b>Add Production Line</b></h5>
                    </div>
                </div>
            </div>
            <div class="card-body invoice-details">
                <div class="row">

                    <div class="col-sm-8 col-md-2">
                        <div class="form-group">
                            <?php echo $this->Form->control('line_master_id', array('class' => 'form-control w-100', 'options' => $lineMasterList, 'style' => "height: unset !important;", 'empty' => 'Please Select', 'label' => 'Line Description')); ?>
                        </div>
                    </div>


                    <div class="col-sm-8 col-md-3">
                        <div class="form-group">
                            <?php echo $this->Form->control('material_id', array('class' => 'form-control w-100', 'options' => $vendor_mateial, 'style' => "height: unset !important;", 'empty' => 'Please Select', 'label' => 'Material Code')); ?>
                        </div>
                    </div>

                    <div class="col-sm-8 col-md-2">
                        <div class="form-group">
                            <?php echo $this->Form->control('capacity', array('type' => 'number', 'class' => 'form-control rounded-0 w-100', 'style' => "height: unset !important;", 'div' => 'form-group', 'required', 'label' => 'Capacity (Per Day)')); ?>
                        </div>
                    </div>

                    <div class="col-sm-8 col-md-3 pt-2">
                        <button type="button" class="btn bg-gradient-submit mt-4"
                            onclick="showConfirmationModal()" id="submit-btn">Submit</button>
                    </div>

                    <div id="line-capacity-view" style="display:none;">Capacity : <span id="line-capacity"></span>
                        &nbsp; &nbsp;
                        Total : <span id="total"></span> &nbsp; &nbsp;
                        Balance : <span id="balance"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h6>Are you sure you want to Add?</h6>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn" style="border:1px solid #6610f2"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn" style="border:1px solid #28a745">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->Form->end() ?>



<script>
    function showConfirmationModal() {
        if ($('#productionLineForm').valid()) {
            $('#modal-sm').modal('show');
        }
    }


    $("#descripe").change(function () {
        var vendorId = $(this).val();
        if (vendorId != "") {
            $.ajax({
                type: "get",
                url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/stock-uploads', 'action' => 'material')); ?>/" + vendorId,
                dataType: "json",
                beforeSend: function(xhr) {
                    xhr.setRequestHeader(
                        "Content-type",
                        "application/x-www-form-urlencoded"
                    );
                },
                success: function(response) {
                    if (response.status == "1") {
                        $("#description").val(response.data.description);
                        $("#uom").val(response.data.uom);
                    }
                },
                error: function(e) {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                },
            });
        }
    });

    var capacity = 0;
    var capacityBal = 0;
    var total = 0;

    $("#line-master-id").change(function () {
        var lineId = $(this).val();
        $("#line-capacity-view").hide();
        capacity = 0;
        capacityBal = 0;
        total = 0;

        if (lineId != "") {
            $.ajax({
                type: "get",
                url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/line-masters', 'action' => 'get-detail')); ?>/" + lineId,
                dataType: "json",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader(
                        "Content-type",
                        "application/x-www-form-urlencoded"
                    );
                },
                success: function (response) {
                    if (response.status) {
                        capacity = response.data.capacity;
                        total = response.data.total;
                        capacityBal = response.data.balance;

                        $("#line-capacity-view").show();
                        $("#line-capacity").text(capacity);
                        $("#total").text(total);
                        $("#balance").text(capacityBal);
                        if (capacityBal <= 0) {
                            $("#submit-btn").attr('disabled', 'disabled');
                            $("#capacity").attr('disabled', 'disabled');
                        } else {
                            $("#submit-btn").removeAttr('disabled');
                            $("#capacity").removeAttr('disabled');
                        }

                    }
                },
                error: function (e) {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                },
            });
        }
    });

    $("#capacity").keyup(function () {
        var val = $(this).val();
        console.log(val);
        if (val > capacityBal) {
            $(this).val(capacityBal);
        }
    });

</script>