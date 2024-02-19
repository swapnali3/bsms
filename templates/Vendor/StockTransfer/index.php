<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\VendorMaterial> $vendorMaterial
 */
?>
<style>
    .hide {
        display: none;
    }
</style>
<?= $this->Html->css('bootstrap-multiselect') ?>
<?= $this->Html->script('bootstrap-multiselect') ?>
<?= $this->Html->css('dropdown-filter') ?>
<!-- <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.5.4/select2-bootstrap4.min.css') ?> -->
<!-- <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css') ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js') ?> -->
<?= $this->Html->css('select2.min.css') ?>
<?= $this->Html->script('select2.js') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">STOCK TRANSFER</div>
            <div class="card-body">
            <div class="row">
        <div class="col-3">
            <label for="id_vendor">Vendor</label><br>
            <select class="form-control" id="vendorSelect">
                <option value="Vendor1">Vendor 1</option>
            </select>
        </div>
        <div class="col-3">
            <label>Material-Column 1</label><br>
            <select class="form-control" id="materialColumn1">
                <option value="" disabled selected>Select Material</option>
                <option value="Material1">Material 1</option>
                <option value="Material2">Material 2</option>
                <option value="Material3">Material 3</option>
            </select>
            <span id="availableStockColumn1">Available Stock: </span>
        </div>
        <div class="col-2">
            <label for="">Stock Transfer</label>
            <input type="text" class="form-control" placeholder="Enter Stock" id="stockTransferInput">
        </div>
        <div class="col-3">
            <label>Material-Column 2</label><br>
            <select class="form-control" id="materialColumn2">
                <option value="" disabled selected>Select Material</option>
                <option value="Material1">Material 1</option>
                <option value="Material2">Material 2</option>
                <option value="Material3">Material 3</option>
            </select>
            <span id="availableStockColumn2">Available Stock: </span>
        </div>

        <div class="col-1 mt-4 pt-2">
            <a href="#" id="transfer" class="btn mb-0 continue_btn float-right" data-toggle="modal" data-target="#modal-sm">Transfer</a>
        </div>
    </div> 
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
    const stockData = {
        Material1: 100,
        Material2: 150,
        Material3: 200
    };

    document.getElementById('materialColumn1').addEventListener('change', function () {
        const selectedMaterial = this.value;
        document.getElementById('availableStockColumn1').textContent = `Available Stock: ${stockData[selectedMaterial] || 0}`;
        validateMaterialSelection();
    });

    document.getElementById('materialColumn2').addEventListener('change', function () {
        const selectedMaterial = this.value;
        document.getElementById('availableStockColumn2').textContent = `Available Stock: ${stockData[selectedMaterial] || 0}`;
        validateMaterialSelection();
    });

    function validateMaterialSelection() {
        const materialColumn1 = document.getElementById('materialColumn1').value;
        const materialColumn2 = document.getElementById('materialColumn2').value;

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

        const materialColumn1 = document.getElementById('materialColumn1').value;
        const materialColumn2 = document.getElementById('materialColumn2').value;

        if (materialColumn1 && materialColumn2) {
            stockData[materialColumn1] -= transferAmount;
            stockData[materialColumn2] += transferAmount;

            document.getElementById('availableStockColumn1').textContent = `Available Stock: ${stockData[materialColumn1] || 0}`;
            document.getElementById('availableStockColumn2').textContent = `Available Stock: ${stockData[materialColumn2] || 0}`;

            showToast('Stock Transfer Successful');

            setTimeout(() => {
                location.reload();
            }, 2000);
        } else {
            alert('Please select materials in both columns before transferring stock.');
        }
    }

    function showToast(message) {
        alert(message);
    }
</script>

<script>
    var materiallist_url = `<?php echo \Cake\Routing\Router::url(array('controller' => '/materials', 'action' => 'materiallist')); ?>`;
</script>
<?= $this->Html->script('a_vekpro/buyer/b_material_index') ?>