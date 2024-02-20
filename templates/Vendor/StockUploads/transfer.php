<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">STOCK TRANSFER</div>
            <div class="card-body">
            <?= $this->Form->create(null, ['id' => 'transferStock']) ?>
                <div class="row">
                <div class="col-3">
                    <?php echo $this->Form->control('vendor_factory_code', array('label' => 'Factory', 'class' => 'form-control rounded-0', 'options' => $vendor_factory_code, 'maxlength'=>'20', 'div' => 'form-group', 'required', 'empty' => 'Please Select')); ?>
                </div>
                <div class="col-3">
                <?php echo $this->Form->control('from_material', array('label' => 'From Material', 'class' => 'form-control rounded-0', 'options' => [],'maxlength'=>'20', 'div' => 'form-group', 'required', 'empty' => 'Please Select')); ?>
                    <span id="availableStockColumn1">Available Stock: </span>
                </div>
                <div class="col-2">
                    <label for="">Stock Transfer</label>
                    <input type="text" class="form-control" placeholder="Enter Stock" id="stockTransferInput">
                </div>
                <div class="col-3">
                <?php echo $this->Form->control('to_material', array('label' => 'To Material', 'class' => 'form-control rounded-0', 'options' => [],'maxlength'=>'20', 'div' => 'form-group', 'required', 'empty' => 'Please Select')); ?>
                    <span id="availableStockColumn2">Available Stock: </span>
                </div>

                <div class="col-1 mt-4 pt-2">
                    <a href="#" id="transfer" class="btn mb-0 continue_btn float-right" data-toggle="modal" data-target="#modal-sm">Transfer</a>
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
                <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn" onclick="performStockTransfer()">Ok</button>
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

    $("#vendor-factory-code").change(function (){
        var factoryId = $(this).val();
            if (factoryId != "") {
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
                        $.each(response.data.materials, function (key, val) { 
                             $("#from-material").append("<option value='"+val.code+"'>"+val.description+"</option>");
                             $("#to-material").append("<option value='"+val.code+"'>"+val.description+"</option>");
                             stockData[val.code] = val.current_stock;
                        });
                        console.log(stockData);
                    }
                    },
                    error: function (e) {
                        alert("An error occurred: " + e.responseText.message);
                        console.log(e);
                    },
                    complete: function () { $("#gif_loader").hide(); }
                });
            }
    });
</script>



<script>
    

    document.getElementById('from-material').addEventListener('change', function () {
        const selectedMaterial = this.value;
        document.getElementById('availableStockColumn1').textContent = `Available Stock: ${stockData[selectedMaterial] || 0}`;
        validateMaterialSelection();
    });

    document.getElementById('to-material').addEventListener('change', function () {
        const selectedMaterial = this.value;
        document.getElementById('availableStockColumn2').textContent = `Available Stock: ${stockData[selectedMaterial] || 0}`;
        validateMaterialSelection();
    });

    function validateMaterialSelection() {
        const materialColumn1 = document.getElementById('from-material').value;
        const materialColumn2 = document.getElementById('to-material').value;

        if (materialColumn1 === materialColumn2) {
            alert('Error: Cannot select the same material in both columns.');
        }
    }

    function performStockTransfer() {
    const stockTransferInput = document.getElementById('stockTransferInput');
    const transferAmount = parseInt(stockTransferInput.value);

    if (isNaN(transferAmount) || transferAmount <= 0) {
        alert('Please enter a valid positive number for stock transfer.');
        return;
    }

    const materialColumn1 = document.getElementById('from-material').value;
    const materialColumn2 = document.getElementById('to-material').value;

    if (materialColumn1 && materialColumn2) {
        stockData[materialColumn1] -= transferAmount;
        stockData[materialColumn2] += transferAmount;

        document.getElementById('availableStockColumn1').textContent = `Available Stock: ${stockData[materialColumn1] || 0}`;
        document.getElementById('availableStockColumn2').textContent = `Available Stock: ${stockData[materialColumn2] || 0}`;

        showToast('Stock Transfer Successful');

        // Hide the Bootstrap modal
        $('#modal-sm').modal('hide');
    } else {
        alert('Please select materials in both columns before transferring stock.');
    }
}



    function showToast(message) {
        alert(message);
    }
</script>