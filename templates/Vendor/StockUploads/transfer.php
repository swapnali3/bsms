<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">STOCK TRANSFER</div>
            <div class="card-body">
                <?= $this->Form->create(null, ['id' => 'transferStock']) ?>
                <div class="row">
                    <div class="col-3">
                        <?php echo $this->Form->control('vendor_factory_code', array('label' => 'Factory', 'class' => 'form-control rounded-0', 'options' => $vendor_factory_code, 'maxlength' => '20', 'div' => 'form-group', 'required', 'empty' => 'Please Select')); ?>
                    </div>
                    <div class="col-3">
                        <?php echo $this->Form->control('from_material', array('label' => 'From Material', 'class' => 'form-control rounded-0', 'options' => [], 'maxlength' => '20', 'div' => 'form-group', 'required', 'empty' => 'Please Select')); ?>
                        <span id="availableStockColumn1">Available Stock: </span>
                    </div>

                    <div class="col-3">
                        <?php echo $this->Form->control('to_material', array('label' => 'To Material', 'class' => 'form-control rounded-0', 'options' => [], 'maxlength' => '20', 'div' => 'form-group', 'required', 'empty' => 'Please Select')); ?>
                        <span id="availableStockColumn2">Available Stock: </span>
                    </div>
                    <div class="col-2">
                        <label for="">Stock Transfer</label>
                        <input type="text" class="form-control" placeholder="Enter Stock" id="stockTransferInput">
                    </div>

                    <div class="col-1 mt-4 pt-2">
                        <button type="button" id="transfer" class="btn mb-0 continue_btn float-right"
                            data-toggle="modal" data-target="#modal-sm" disabled>Transfer</button>
                    </div>

                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h6>Are you sure you want to Update?</h6>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn cancel_btn" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn continue_btn" onclick="performStockTransfer()">Ok</button>
            </div>
        </div>
    </div>
</div>

<script>

    stockData = {
        Material1: 100,
        Material2: 150,
        Material3: 200
    };
    $("#stockTransferInput").on("input", function () {
        const inputValue = $(this).val();
        const materialColumn1 = $("#from-material").val();
        const materialColumn2 = $("#to-material").val();
        const transferButton = $("#transfer");

        if (materialColumn1 === "" || materialColumn2 === "") {
            $(this).val('');
            transferButton.prop('disabled', true);
        } else {
            const totalStock = stockData[materialColumn1];

            if (!/^[1-9]\d*$/.test(inputValue) || parseInt(inputValue) > totalStock) {
                $(this).val('');
                transferButton.prop('disabled', true);
            } else {
                transferButton.prop('disabled', false);
            }
        }
    });



    $("#vendor-factory-code").change(function () {
        var factoryId = $(this).val();

        // Store the selected values
        var fromMaterialValue = $("#from-material").val();
        var toMaterialValue = $("#to-material").val();

        stockData = {};
        $("#from-material, #to-material").empty();

        if (factoryId === "") {
            $("#from-material").append("<option value=''>Please Select</option>");
            $("#to-material").append("<option value=''>Please Select</option>");
        } else {
            $.ajax({
                type: "get",
                url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/stock-uploads', 'action' => 'get-factory-materials')); ?>/" + factoryId,
                dataType: "json",
                beforeSend: function (xhr) {
                    $("#gif_loader").show();
                    xhr.setRequestHeader(
                        "Content-type",
                        "application/x-www-form-urlencoded"
                    );
                },
                success: function (response) {
                    if (response.status) {
                        // Add "Please Select" option first
                        $("#from-material").append("<option value=''>Please Select</option>");
                        $("#to-material").append("<option value=''>Please Select</option>");

                        $.each(response.data.materials, function (key, val) {
                            $("#from-material").append("<option value='" + val.code + "'>" + val.description + "</option>");
                            $("#to-material").append("<option value='" + val.code + "'>" + val.description + "</option>");
                            stockData[val.code] = val.current_stock;
                        });
                        console.log(stockData);

                        // Reapply the stored selected values
                        $("#from-material").val(fromMaterialValue);
                        $("#to-material").val(toMaterialValue);
                    }
                },
                error: function (e) {
                    Toast.fire({
                        icon: 'error',
                        title: 'An error occurred: ' + e.responseText.message
                    });
                    console.log(e);
                },
                complete: function () {
                    $("#gif_loader").hide();
                }
            });
        }
    });


</script>



<script>

    $("#from-material").change(function () {
        const selectedMaterial = $(this).val();
        const stockTransferInput = $("#stockTransferInput");

        if (selectedMaterial === "") {
            stockTransferInput.prop('disabled', true); // Disable the stock transfer input
            stockTransferInput.val(''); // Clear the input value
        } else {
            stockTransferInput.prop('disabled', false); // Enable the stock transfer input
            $('#availableStockColumn1').html(`Available Stock: <strong>${stockData[selectedMaterial] || 0}</strong>`);
            validateMaterialSelection();
        }
    });

    $("#to-material").change(function () {
        const selectedMaterial = $(this).val();
        $('#availableStockColumn2').html(`Available Stock: <strong>${stockData[selectedMaterial] || 0}</strong>`);
        validateMaterialSelection();
    });

    function validateMaterialSelection() {
        const materialColumn1 = $("#from-material").val();
        const materialColumn2 = $("#to-material").val();

        const stockTransferInput = $("#stockTransferInput");

        if (materialColumn1 === "") {
            stockTransferInput.prop('disabled', true); // Disable the stock transfer input
            stockTransferInput.val(''); // Clear the input value
        } else {
            stockTransferInput.prop('disabled', false); // Enable the stock transfer input
        }

        if (materialColumn1 === materialColumn2) {
            Toast.fire({
                icon: 'error',
                title: 'Error: Cannot select the same Material for Stock Transfer.'
            });

            // Clear both input values and span text
            $("#from-material, #to-material").val("");
            $('#availableStockColumn1, #availableStockColumn2').text("Available Stock:");

            return false; // Returning false to indicate validation failure
        }

        return true; // Returning true to indicate validation success
    }


    function performStockTransfer() {
        const stockTransferInput = $("#stockTransferInput");
        const transferAmount = parseFloat(stockTransferInput.val());

        if (isNaN(transferAmount) || transferAmount <= 0) {
            Toast.fire({
                icon: 'error',
                title: 'Please enter a valid positive number for stock transfer.'
            });
            return;
        }


        const materialColumn1 = $("#from-material").val();
        const materialColumn2 = $("#to-material").val();

        if (materialColumn1 && materialColumn2) {
            // Convert stock values to numbers and add the transfer amount
            stockData[materialColumn1] = (+stockData[materialColumn1] || 0) - transferAmount;
            stockData[materialColumn2] = (+stockData[materialColumn2] || 0) + transferAmount;

            $('#availableStockColumn1').text(`Available Stock: ${stockData[materialColumn1]}`);
            $('#availableStockColumn2').text(`Available Stock: ${stockData[materialColumn2]}`);

            Toast.fire({
                icon: 'success',
                title: 'Stock Transfer Successful'
            });

            // Hide the Bootstrap modal
            $('#modal-sm').modal('hide');
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Please select materials in both columns before transferring stock.'
            });
        }
    }



</script>