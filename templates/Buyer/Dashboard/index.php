<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\ ake\Collection\CollectionInterface $adminUsers
 */
?>
<?= $this->Html->css('select2.min.css') ?>
<?= $this->Html->script('select2.js') ?>
<?= $this->Html->css('bootstrap-multiselect') ?>
<?= $this->Html->script('bootstrap-multiselect') ?>
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('custom') ?>

<style>
  .hide {
    display: none;
  }

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
    /* background-color: white; */
  }

  thead tr {
    z-index: 3;
    top: 0;
  }

  thead tr th:first-child {
    z-index: 12;
    background-color: #F7941D;
  }

  .table-graph td:first-child {
    background-color: #F7941D;
  }

  /* This hides the first row when scrolling vertically */
  /* tbody tr:first-child {
    visibility: hidden;
  } */

  .table-graph {
    max-height: 200px !important;
  }

  .table-graph thead tr {
    background-color: #F7941D !important;
  }

  .card-height {
    height: 100px !important;
  }

  .slider-container {
    background-color: #eee;
    width: 100%;
    position: relative;
    height: 20px;
    border-radius: 1px;
    /* Round corners */
    overflow: hidden;
    /* Hide the overflow */
  }

  .slider {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
  }

  .percentage {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: black;
    /* Text color */
  }

  .supplier-wise-table td {
    padding-bottom: .1rem !important;
  }

  /* .supplier-wise-table { margin-top: 20px;} */

  .graph-container {
      width: 500px;
      margin-left: 20px;
    }

    .containers {
      display: flex;
      justify-content: space-between;
      width: 500px;
    }

    .one,
    .two,
    .three,
    .four,
    .five {
      height: 230px;
      width: 40px;
      background-color: #eee;
      border-radius: 2px;
      display: flex;
      flex-direction: column;
      justify-content: end;
      position: relative;
    }

    ul li {
      list-style: none;
    }

    .color-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .color-two,
    .color-three {
      margin-left: 40px;
    }

    .color-one,
    .color-two,
    .color-three {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .c-one,
    .c-two,
    .c-three {
      width: 50px;
      height: 20px;
    }

    .c-one {
      background-color: #F4B678;
    }

    .c-two {
      background-color: #EF9234;
    }

    .c-three {
      background-color: #FFBF00;
    }

    .one span,
    .two span,
    .three span,
    .four span,
    .five span {
      position: absolute;
      bottom: -13%;
      left: 0;
    }

    .one-one,
    .two-one,
    .three-one,
    .four-one,
    .five-one {
      background-color: #F4B678;
    }

    .one-two,
    .two-two,
    .three-two,
    .four-two,
    .five-two {
      background-color: #EF9234;
    }

    .one-three,
    .two-three,
    .three-three,
    .four-three,
    .five-three {
      background-color: #FFBF00;
    }

    .one-one,
    .two-one,
    .three-one,
    .four-one,
    .five-one,
    .one-two,
    .two-two,
    .three-two,
    .four-two,
    .five-two,
    .one-three,
    .two-three,
    .three-three,
    .four-three,
    .five-three {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
    }
</style>

<?= $this->Html->script('amcharts/index.js') ?>
<?= $this->Html->script('xy.js') ?>
<?= $this->Html->script('percent.js') ?>
<?= $this->Html->script('Animated.js') ?>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

<div class="row ">

  <div class="col-lg-12">
    <div class="card mb-2">
      <div class="card-body">
        <?= $this->Form->create(null, ['id' => 'addvendorform']) ?>
        <div class="row">
          <div class="col-1">
            <label for="id_year">Year</label>
            <select class="form-control" name="year" id="id_year">
              <?php if (isset($years)) : ?>
              <?php foreach ($years as $year) : ?>
              <option value="<?= h($year['year']) ?>" data-select="<?= h($year['year']) ?>">
                <?= h($year['year']) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1">
            <label for="id_month">Month</label>
            <select name="month" class="form-control" id="id_month">
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>
          <div class="col-2">
            <label for="id_sap_vendor_code">Vendor</label><br>
            <select name="sap_vendor_code[]" id="id_sap_vendor_code" class="chosen" multiple="multiple"
              style="width: 100%;">
              <?php if (isset($vendors)) : ?>
              <?php foreach ($vendors as $mat) : ?>
              <option value="<?= h($mat['sap_vendor_code']) ?>" data-select="<?= h($mat['sap_vendor_code']) ?>">
                <?= h($mat['sap_vendor_code']) ?> -
                <?= h($mat['name']) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-2">
            <label for="id_code">Material</label><br>
            <select name="code[]" id="id_code" multiple="multiple" class="form-control chosen">
              <?php if (isset($materials)) : ?>
              <?php foreach ($materials as $mat) : ?>
              <option value="<?= h($mat['code']) ?>" data-select="<?= h($mat['code']) ?>">
                <?= h($mat['code']) ?> -
                <?= h($mat['description']) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-2">
            <label for="id_type">Type</label><br>
            <select name="type[]" id="id_type" multiple="multiple" class="form-control chosen">
              <?php if (isset($types)) : ?>
              <?php foreach ($types as $mat) : ?>
              <option value="<?= h($mat['type']) ?>">
                <?= h($mat['type']) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1">
            <label for="id_segment">Segment</label><br>
            <select name="segment[]" id="id_segment" multiple="multiple" class="form-control chosen">
              <?php if (isset($segments)) : ?>
              <?php foreach ($segments as $mat) : ?>
              <option value="<?= h($mat['segment']) ?>" data-select="<?= h($mat['segment']) ?>">
                <?= h($mat['segment_code']) ?> -
                <?= h($mat['segment']) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1">
            <label for="id_pack_size">Pack Size</label><br>
            <select name="pack_size[]" id="id_pack_size" multiple="multiple" class="form-control chosen">
              <?php if (isset($packsizes)) : ?>
              <?php foreach ($packsizes as $mat) : ?>
              <option value="<?= h($mat['pack_size']) ?>">
                <?= h($mat['pack_size']) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1">
            <label for="id_uom">Pack UOM</label><br>
            <select name="uom[]" id="id_uom" multiple="multiple" class="form-control chosen">
              <?php if (isset($uoms)) : ?>
              <?php foreach ($uoms as $mat) : ?>
              <option value="<?= h($mat['uom']) ?>">
                <?= h($mat['uom']) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1 mt-4 pt-2">
            <button class="btn bg-gradient-button" type="button" id="id_sub">Search</button>
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
            <div>
              <?= $this->Html->image('total-vendor-icon.png', ['width' => '50']) ?>
            </div>
            <div class="row flex-column">
              <label class="mb-0" style="color:#F7941D !important">Total Vendors</label>
              <span>
                <?= h($card_total_vendor['vendor']) ?>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-lg-4">
        <div class="card card_box_shadow mb-2">
          <div class="card-body py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
            <div>
            <?= $this->Html->image('categories-icon.jpg', ['width' => '50']) ?>
            </div>
            <div class="row flex-column">
              <label class="mb-0" style="color:#F7941D !important">Total Categories</label>
              <span id="card_total_category">
                <?= h($card_total_category['segment']) ?>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-lg-4">
        <div class="card card_box_shadow mb-2">
          <div class="card-body py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
            <div>
              <?= $this->Html->image('products-icon.png', ['width' => '50']) ?>
            </div>
            <div class="row flex-column">
              <label class="mb-0" style="color:#F7941D !important">Total Product</label>
              <span id="card_total_product">
                <?= h($card_total_product['code']) ?>
              </span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="col-sm-12 col-lg-2">
    <div class="card card_box_shadow">
      <div class="card-body card-height py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
        <div>
        <?= $this->Html->image('spend-icon.jpg', ['width' => '50']) ?>
        </div>
        <div class="row flex-column">
          <label class="mb-0" style="color:#F7941D !important">Spend</label>
          <span id="card_spend">
            <?= h($card_spend) ?>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-2">
    <div class="card card_box_shadow">
      <div class="card-body card-height py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
        <div>
        <?= $this->Html->image('suplier-icon.png', ['width' => '50']) ?>
        </div>
        <div class="row flex-column">
          <label class="mb-0" style="color:#F7941D !important">Supplier</label>
          <span id="card_supplier">
            <?= h($card_supplier) ?>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-2">
    <div class="card card_box_shadow">
      <div class="card-body card-height py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
        <div>
        <?= $this->Html->image('transaction-icon.jpg', ['width' => '50']) ?>
        </div>
        <div class="row flex-column">
          <label class="mb-0" style="color:#F7941D !important">Transaction</label>
          <span id="card_transactions">
            <?= h($card_transactions) ?>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-2">
    <div class="card card_box_shadow">
      <div class="card-body card-height py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
        <div>
        <?= $this->Html->image('po-icon.png', ['width' => '50']) ?>
        </div>
        <div class="row flex-column">
          <label class="mb-0" style="color:#F7941D !important">PO Count</label>
          <span id="card_po_count">
            <?= h($card_po_count) ?>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-2">
    <div class="card card_box_shadow">
      <div class="card-body card-height py-0 d-flex align-items-center pt-3 pb-3 justify-content-around box">
        <div>
        <?= $this->Html->image('invoice-icon.jpg', ['width' => '50']) ?> 
        </div>
        <div class="row flex-column">
          <label class="mb-0" style="color:#F7941D !important">Invoice Count</label>
          <span id="card_invoice_count">
            <?= h($card_invoice_count) ?>
          </span>
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
            <div id="chartdiv2">
            <div class="graph-container">
    <ul class="color-container">
      <li class="color-one">
        <div class="c-one"></div>
        <span>Early</span>
      </li>
      <li class="color-two">
        <div class="c-two"></div>
        <span>On-Time</span>
      </li>
      <li class="color-three">
        <div class="c-three"></div>
        <span>Late</span>
      </li>
    </ul>
    <div class="containers">
      <div class="one">
        <div class="one-one"></div>
        <div class="one-two"></div>
        <div class="one-three"></div><span></span>
      </div>
      <div class="two">
        <div class="two-one"></div>
        <div class="two-two"></div>
        <div class="two-three"></div><span></span>
      </div>
      <div class="three">
        <div class="three-one"></div>
        <div class="three-two"></div>
        <div class="three-three"></div><span></span>
      </div>
      <div class="four">
        <div class="four-one"></div>
        <div class="four-two"></div>
        <div class="four-three"></div><span></span>
      </div>
      <div class="five">
        <div class="five-one"></div>
        <div class="five-two"></div>
        <div class="five-three"></div><span></span>
      </div>
    </div>
  </div>
            </div>
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
      <div class="card-header">Supplier Wise Business Share Analysis</div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 d-flex justify-content-between">
            <div class="col-12">
              <table class="supplier-wise-table table table-borderless">
                <thead>
                  <tr>
                    <th>CATEGORY</th>
                    <th>SUPPLIER</th>
                    <th>SUPPLIER SHARE</th>
                  </tr>
                </thead>
                <tbody id="swbsa">
                  <?php if (isset($swbsa)) : ?>
                  <?php foreach ($swbsa as $mat) : ?>
                  <tr>
                    <td class="d-flex flex-column">
                      <div><b>
                          <?= h($mat['segment']) ?>
                        </b></div>
                      <div>
                        <?= h($mat['name']) ?>
                      </div>
                    </td>
                    <td>
                      <?= h($mat['sap_vendor_code']) ?>
                    </td>
                    <td>
                      <div class="slider-container">
                        <div class="slider bg-<?= h($mat['color']) ?>" style="width: <?= h($mat['net_value']) ?>%;">
                        </div>
                        <span class="percentage">
                          <?= h($mat['net_value']) ?>%
                        </span>
                      </div>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-12 ">
    <div class="card card-default card_box_shadow">
      <div class="card-header">Category Wise Indent</div>
      <div class="card-body">
        <div class="table-container table-graph" id="category_wise_indent">
          <?= $category_wise_indent ?>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  var str_data;
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

  var purchase_volume_segment_wise = [
    <?php if (isset($purchase_volume_segment_wise)) : ?>
    <?php foreach($purchase_volume_segment_wise as $mat) : ?>
    { value: <?= h($mat['value']) ?>, category: "<?= h($mat['category']) ?>" },
    <?php endforeach; ?>
    <?php endif; ?>
  ];

  var spend_by_category = [
    <?php if (isset($spend_by_category)) : ?>
    <?php foreach($spend_by_category as $mat) : ?>
    { value: <?= h($mat['value']) ?>, category: "<?= h($mat['category']) ?>" },
    <?php endforeach; ?>
    <?php endif; ?>
  ];

  var delivery_time = [
    <?php if (isset($delivery_time)) : ?>
    <?php foreach($delivery_time as $mat) : ?>
    { "year": "<?= h($mat['year']) ?>", "early": <?= h($mat['early']) ?>, "on_time": <?= h($mat['on_time']) ?>, "late": <?= h($mat['late']) ?>},
    <?php endforeach; ?>
    <?php endif; ?>
  ];


  $(document).on("click", "#id_sub", function () {
    $.ajax({
      type: "POST",
      url: window.location.href,
      data: $("#addvendorform").serialize(),
      dataType: "json",
      beforeSend: function () { $("#gif_loader").show(); },
      success: function (r) {
        str_data = r;
        console.log(r);
        $("#card_spend").text(r.card_spend);
        $("#card_supplier").text(r.card_supplier);
        $("#card_transactions").text(r.card_transactions);
        $("#card_po_count").text(r.card_po_count);
        $("#card_invoice_count").text(r.card_invoice_count);

        pivot_data = {};
        type_list = [];
        the_table = '<table><thead><tr><th>Category</th>';
        $.each(r.category_wise_indent, function (index, row) {
          if (!pivot_data.hasOwnProperty(row['segment'])) {
            pivot_data[row['segment']] = {};
            if (!pivot_data[row['segment']].hasOwnProperty(row['type'])) {
              pivot_data[row['segment']][row['type']] = {};
            }
          }
          pivot_data[row['segment']][row['type']] = row['po_qty'];
          if (type_list.indexOf(row['type']) === -1) {
            type_list.push(row['type']);
          }
        });

        $.each(type_list, function (index, row) {
          the_table += '<th>' + row + '</th>';
        });

        the_table += '</tr></thead>';
        $.each(pivot_data, function (index, row) {
          the_table += '<tr><td>' + index + '</td>';
          $.each(type_list, function (index, roww) {
            if (row[roww]) { the_table += '<td>' + row[roww] + '</td>'; }
            else { the_table += '<td>0</td>'; }
          });
          the_table += "</tr>";
        });

        the_table += '</table>';
        $.each(r.swbsa, function (index, row) {
          $("#swbsa").html(`<tr><td class="d-flex flex-column"><div><b>` + row['segment'] + `</b></div><div>` + row['name'] + `</div></td><td>` + row['sap_vendor_code'] + `</td><td><div class="slider-container"><div class="slider bg-` + row['color'] + `" style="width: ` + row['net_value'] + `%;"></div><span class="percentage">` + row['net_value'] + `%</span></div></td></tr>`);
        });

        $("#category_wise_indent").html(the_table);
        refresh_spendbycategory(r.spend_by_category);
        refresh_purchasevolume(r.purchase_volume_segment_wise);
        refresh_deliverytime(r.delivery_time);
      },
      complete: function () { $("#gif_loader").hide(); }
    });
  });
  var currentDate = new Date();
  if (currentDate.getDate() < 5){
    var currentMonth = currentDate.getMonth();
  } else {
    var currentMonth = currentDate.getMonth() + 1;
  }
  $('#id_month').val(currentMonth);
  $("#id_sub").click();
</script>

<script src="<?= $this->Url->build('/') ?>js/chart.js"></script>
<script src="<?= $this->Url->build('/') ?>js/a_vekpro/buyer/b_dashboard_purchase_volume.js"></script>
<script src="<?= $this->Url->build('/') ?>js/a_vekpro/buyer/b_dashboard_delivery_time.js"></script>
<script src="<?= $this->Url->build('/') ?>js/a_vekpro/buyer/b_dashboard_spend_by_category.js"></script>