<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\ ake\Collection\CollectionInterface $adminUsers
 */
?>
<style>
  .hide {
    display: none;
  }
</style>
<?= $this->Html->css('select2.min.css') ?>
<?= $this->Html->script('select2.js') ?>
<?= $this->Html->css('bootstrap-multiselect') ?>
<?= $this->Html->script('bootstrap-multiselect') ?>
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('custom') ?>

<style>
  #chartdiv {
    width: 100%;
    height: 300px;
  }

  #chartdiv2 {
    width: 100%;
    height: 300px;
  }

  #chartdiv3 {
    width: 100%;
    height: 300px;
  }

  #chartdiv4 {
    width: 100%;
    height: 300px;
  }

  #chartdiv5 {
    width: 100%;
    height: 300px;
  }

  .box {
    border: 1px solid #eee;
    border-radius: 4px;
  }

  .table-container {
    overflow: auto;
    /* max-width: 100%;
    max-height: 400px;  */
    max-height: 700px;
    border: 1px solid #ccc;
    position: relative;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  th,
  td {
    padding: 8px;
    border: 1px solid #ccc;
    text-align: center;
  }

  thead tr,
  td:first-child,
  thead tr th:first-child {
    position: sticky;
    left: 0;
    z-index: 2;
    background-color: white;
  }

  thead tr {
    z-index: 3;
    top: 0;
  }

  td:first-child {
    background-color: white;
  }

  /* This hides the first row when scrolling vertically */
  /* tbody tr:first-child {
    visibility: hidden;
  } */

  .table-graph {
    max-height: 200px !important;
  }

  .card-height {
    height: 100px !important;
  }

  .supplier-wise-table td{ padding-bottom: 1.4rem !important;}
  .supplier-wise-table { margin-top: 20px;}
  </style>

<?= $this->Html->script('amcharts/index.js') ?>
<?= $this->Html->script('xy.js') ?>
<?= $this->Html->script('percent.js') ?>
<?= $this->Html->script('Animated.js') ?>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

<?= $this->Form->create(null, ['id' => 'addvendorform']) ?>
<div class="row ">










  <div class="col-lg-12">
    <div class="card mb-2">
      <div class="card-body">
        <?= $this->Form->create(null, ['id' => 'addvendorform']) ?>
        <div class="row">
          <div class="col-1">
            <label for="id_from">Date From</label>
            <input type="date" name="from" placeholder="dmy" class="form-control" id="id_from">
          </div>
          <div class="col-1">
            <label for="id_to">Date To</label>
            <input type="date" name="till" class="form-control" id="id_to">
          </div>
          <div class="col-2">
            <label for="id_vendor">Vendor</label><br>
            <select name="vendor[]" id="id_vendor" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendor)) : ?>
              <?php foreach ($vendor as $mat) : ?>
              <option value="<?= h($mat->sap_vendor_code) ?>" data-select="<?= h($mat->sap_vendor_code) ?>">
                <?= h($mat->sap_vendor_code) ?> -
                <?= h($mat->name) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-2">
            <label for="id_material">Material</label><br>
            <select name="material[]" id="id_material" multiple="multiple" class="form-control chosen">
              <?php if (isset($materials)) : ?>
              <?php foreach ($materials as $mat) : ?>
              <option value="<?= h($mat->code) ?>" data-select="<?= h($mat->code) ?>">
                <?= h($mat->code) ?> -
                <?= h($mat->description) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-2">
            <label for="id_vendortype">Type</label><br>
            <select name="vendortype[]" id="id_vendortype" multiple="multiple" class="form-control chosen">
              <?php if (isset($vendortype)) : ?>
              <?php foreach ($vendortype as $mat) : ?>
              <option value="<?= h($mat->type) ?>">
                <?= h($mat->type) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1">
            <label for="id_segment">Segment</label><br>
            <select name="segment[]" id="id_segment" multiple="multiple" class="form-control chosen">
              <?php if (isset($segment)) : ?>
              <?php foreach ($segment as $mat) : ?>
              <option value="<?= h($mat->segment) ?>" data-select="<?= h($mat->segment) ?>">
                <?= h($mat->segment) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1">
            <label for="id_pack_size">Pack Size</label><br>
            <select name="pack_size[]" id="id_pack_size" multiple="multiple" class="form-control chosen">
              <?php if (isset($pack_size)) : ?>
              <?php foreach ($pack_size as $mat) : ?>
              <option value="<?= h($mat->pack_size) ?>">
                <?= h($mat->pack_size) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1">
            <label for="id_pack_uom">Pack UOM</label><br>
            <select name="pack_uom[]" id="id_pack_uom" multiple="multiple" class="form-control chosen">
              <?php if (isset($pack_uom)) : ?>
              <?php foreach ($pack_uom as $mat) : ?>
              <option value="<?= h($mat->pack_uom) ?>">
                <?= h($mat->pack_uom) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1 mt-4 pt-2">
            <button class="btn bg-gradient-button" type="submit" id="id_sub">Search</button>
          </div>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>

  <div class="col-lg-12">
    <div class="row">
      <div class="col-sm-12 col-lg-4">
        <div class="card card_box_shadow mb-2">
          <div class="card-body py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
            <div><img width="50px" src="/bsms/img/total-vendor-icon" alt="img"></i></div>
            <div class="row flex-column">
              <label class="mb-0" style="color:#F7941D !important">Total Vendors</label>
              <span>66</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-lg-4">
        <div class="card card_box_shadow mb-2">
          <div class="card-body py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
            <div><img width="50px" src="/bsms/img/categories-icon" alt="img"></i></div>
            <div class="row flex-column">
              <label class="mb-0" style="color:#F7941D !important">Total Categories</label>
              <span>47</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-lg-4">
        <div class="card card_box_shadow mb-2">
          <div class="card-body py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
            <div><img width="50px" src="/bsms/img/products-icon" alt="img"></i></div>
            <div class="row flex-column">
              <label class="mb-0" style="color:#F7941D !important">Total Product</label>
              <span>245</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-2">
    <div class="card card_box_shadow">
      <div class="card-body card-height py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
        <div><img width="60px" src="/bsms/img/spend-icon" alt="img"></div>
        <div class="row flex-column">
          <label class="mb-0" style="color:#F7941D !important">Spend</label>
          <span>$18507</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-lg-2">
    <div class="card card_box_shadow">
      <div class="card-body card-height py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
        <div><img width="40px" src="/bsms/img/suplier-icon" alt="img"></div>
        <div class="row flex-column">
          <label class="mb-0" style="color:#F7941D !important">Suplier</label>
          <span>3625</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-lg-2">
    <div class="card card_box_shadow">
      <div class="card-body card-height py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
        <div><img width="40px" src="/bsms/img/transaction-icon" alt="img"></i></div>
        <div class="row flex-column">
          <label class="mb-0" style="color:#F7941D !important">Transaction</label>
          <span>17860</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-lg-2">
    <div class="card card_box_shadow">
      <div class="card-body card-height py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
        <div><img width="40px" src="/bsms/img/po-icon" alt="img"></i></div>
        <div class="row flex-column">
          <label class="mb-0" style="color:#F7941D !important">PO Count</label>
          <span>5720</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-lg-2">
    <div class="card card_box_shadow">
      <div class="card-body card-height py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
        <div><img width="40px" src="/bsms/img/invoice-icon" alt="img"></i></div>
        <div class="row flex-column">
          <label class="mb-0" style="color:#F7941D !important">Invoice Count</label>
          <span>124887</span>
        </div>
      </div>
    </div>
  </div>



  <div class="col-sm-12 col-lg-6">
    <div class="card card-default card_box_shadow">
      <div class="card-header">Purchase Volume Segment Wise</div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div id="chartdiv"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-6">
    <div class="card card-default card_box_shadow">
      <div class="card-header">Delivery Time</div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div id="chartdiv2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-6">
    <div class="card card-default card_box_shadow">
      <div class="card-header">Spend by Category</div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div id="chartdiv3"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-6">
    <div class="card card-default card_box_shadow">
      <div class="card-header">Suplier Wise Business Share Analysis</div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 d-flex justify-content-between">
            <div class="col-4">
              <table class="supplier-wise-table table table-borderless">
                <!-- <thead>
                  <tr>
                    <th>CATEGORY</th>
                    <th>SUPPLIER</th>
                  </tr>
                </thead> -->
                <tbody>
                  <tr>
                    <td>Category 1</td>
                    <td>720</td>
                  </tr>
                  <tr>
                    <td>Category 2</td>
                    <td>25</td>
                  </tr>
                  <tr>
                    <td>Category 3</td>
                    <td>135</td>
                  </tr>
                  <tr>
                    <td>Category 4</td>
                    <td>30</td>
                  </tr>
                  <tr>
                    <td>Category 5</td>
                    <td>24</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-8"><div id="chartdiv4"></div></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-12 ">
    <div class="card card-default card_box_shadow">
      <div class="card-header">Category Wise Indent</div>
      <div class="card-body">
        <div class="table-container table-graph">
          <table>
            <thead>
              <tr>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>

                <!-- Add more headers as needed -->
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Row 1</td>
                <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
                <td>Data 5</td>
                <td>Data 6</td>
                <td>Data 7</td>
                <td>Data 8</td>
                <td>Data 9</td>
                <td>Data 10</td>
                <td>Data 11</td>
                <td>Data 12</td>
                <td>Data 13</td>
                <td>Data 14</td>
                <td>Data 15</td>
                <td>Data 16</td>
                <td>Data 17</td>
                <td>Data 18</td>
                <td>Data 19</td>
                <!-- Add more cells as needed -->
              </tr>
              <tr>
                <td>Row 2</td>
                <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
                <td>Data 5</td>
                <td>Data 6</td>
                <td>Data 7</td>
                <td>Data 8</td>
                <td>Data 9</td>
                <td>Data 10</td>
                <td>Data 11</td>
                <td>Data 12</td>
                <td>Data 13</td>
                <td>Data 14</td>
                <td>Data 15</td>
                <td>Data 16</td>
                <td>Data 17</td>
                <td>Data 18</td>
                <td>Data 19</td>
              </tr>
              <tr>
                <td>Row 3</td>
                <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
                <td>Data 5</td>
                <td>Data 6</td>
                <td>Data 7</td>
                <td>Data 8</td>
                <td>Data 9</td>
                <td>Data 10</td>
                <td>Data 11</td>
                <td>Data 12</td>
                <td>Data 13</td>
                <td>Data 14</td>
                <td>Data 15</td>
                <td>Data 16</td>
                <td>Data 17</td>
                <td>Data 18</td>
                <td>Data 19</td>
              </tr>
              <tr>
                <td>Row 4</td>
                <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
                <td>Data 5</td>
                <td>Data 6</td>
                <td>Data 7</td>
                <td>Data 8</td>
                <td>Data 9</td>
                <td>Data 10</td>
                <td>Data 11</td>
                <td>Data 12</td>
                <td>Data 13</td>
                <td>Data 14</td>
                <td>Data 15</td>
                <td>Data 16</td>
                <td>Data 17</td>
                <td>Data 18</td>
                <td>Data 19</td>
              </tr>
              <tr>
                <td>Row 5</td>
                <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
                <td>Data 5</td>
                <td>Data 6</td>
                <td>Data 7</td>
                <td>Data 8</td>
                <td>Data 9</td>
                <td>Data 10</td>
                <td>Data 11</td>
                <td>Data 12</td>
                <td>Data 13</td>
                <td>Data 14</td>
                <td>Data 15</td>
                <td>Data 16</td>
                <td>Data 17</td>
                <td>Data 18</td>
                <td>Data 19</td>
              </tr>
              <tr>
                <td>Row 6</td>
                <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
                <td>Data 5</td>
                <td>Data 6</td>
                <td>Data 7</td>
                <td>Data 8</td>
                <td>Data 9</td>
                <td>Data 10</td>
                <td>Data 11</td>
                <td>Data 12</td>
                <td>Data 13</td>
                <td>Data 14</td>
                <td>Data 15</td>
                <td>Data 16</td>
                <td>Data 17</td>
                <td>Data 18</td>
                <td>Data 19</td>
              </tr>
              <!-- Add more rows as needed -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



</div>
<?= $this->Form->end() ?>




<script>
  var dashboard_url = `<?php echo \Cake\Routing\Router::url(array('prefix' => false, 'controller' => 'buyer/dashboard', 'action' => 'index')); ?>`;

  $('.chosen').select2({
    closeOnSelect: false,
    placeholder: 'Select',
    allowClear: true,
    tags: false,
    tokenSeparators: [','],
    templateSelection: function (selection) {
      if (selection.element && $(selection.element).attr('data-select') !== undefined) {
        return $(selection.element).attr('data-select');
      } else {
        return selection.text;
      }
    }
  });

</script>
<script src="<?= $this->Url->build('/') ?>js/chart.js"></script>
<script src="<?= $this->Url->build('/') ?>js/a_vekpro/buyer/b_dashboard_purchase_volume.js"></script>
<script src="<?= $this->Url->build('/') ?>js/a_vekpro/buyer/b_dashboard_delivery_time.js"></script>
<script src="<?= $this->Url->build('/') ?>js/a_vekpro/buyer/b_dashboard_spend_by_category.js"></script>
<script src="<?= $this->Url->build('/') ?>js/a_vekpro/buyer/b_dashboard_suplier_wise_business.js"></script>