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
<!-- <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.5.4/select2-bootstrap4.min.css') ?> -->
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css') ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js') ?>
<?= $this->Html->css('bootstrap-multiselect') ?>
<?= $this->Html->script('bootstrap-multiselect') ?>
<?= $this->Html->css('custom') ?>
<div class="row buyer-dash">

  <div class="col-sm-12 col-lg-4">
    <div class="card card_box_shadow">
      <div class="card-header">
        <h1 class="card-title">Vendors</h1>
      </div>
      <div class="card-body py-0">
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
              <i class="fas fa-th-large text-info"></i>
            </div>
            <div class="product-info">
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>"
                class="product-title">Total</a>
              <span class="p-value">
                <?= h($vendorDashboardCount['total']) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="fas fa-user-plus text-danger onboarding_icon"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>"
                class="product-title">Onboarding
              </a>
              <span class="p-value">
                <?= h(isset($vendorDashboardCount[0]) ? $vendorDashboardCount[0] : 0) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="fas fa-hourglass-half text-danger"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>"
                class="product-title">Approval Pending
              </a>
              <span class="p-value">
                <?= h(isset($vendorDashboardCount[1]) ? $vendorDashboardCount[1] : 0) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="far fa-check-square text-success"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>"
                class="product-title">Approved
              </a>
              <span class="p-value">
                <?= h(isset($vendorDashboardCount[3]) ? $vendorDashboardCount[3] : 0) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="fas fa-share-square text-warning"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>" class="product-title">Sent to
                SAP
              </a>
              <span class="p-value">
                <?= h(isset($vendorDashboardCount[2]) ? $vendorDashboardCount[2] : 0) ?>
              </span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-4">
    <div class="card card_box_shadow" style="min-height: 93%;">
      <div class="card-header">
        <h3 class="card-title">Purchase Orders</h3>
      </div>
      <div class="card-body py-0" style="min-height: 100%;">
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
              <i class="fas fa-th-large text-info"></i>
            </div>
            <div class="product-info">
              <a href="<?php echo $this->Url->build([ 'controller' => 'purchase-orders', 'action'=>'view']) ?>"
                class="product-title">Total</a>
              <span class="p-value">
                <?= h($totalPos) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="far fa-calendar-check text-success"></i>

            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'purchase-orders', 'action'=>'view']) ?>"
                class="product-title">Completed</a>
              <span class="p-value">
                <?= h($poCompleteCount) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="far fa-clock text-danger"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'purchase-orders', 'action'=>'view']) ?>"
                class="product-title">Pending</a>
              <span class="p-value">
                <?= ($totalPos - $poCompleteCount ) ?>
              </span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-3 col-lg-3">
    <div class="card card_box_shadow" style="min-height: 93%;">
      <div class="card-header">
        <h3 class="card-title">ASN</h3>
      </div>
      <div class="card-body py-0">
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
              <i class="fas fa-th-large text-info"></i>
            </div>
            <div class="product-info">
              <a href="<?php echo $this->Url->build([ 'controller' => 'delivery-details']) ?>"
                class="product-title">Total</a>
              <span class="p-value">
                <?= h(isset($asnDashboardCount['total']) ? $asnDashboardCount['total'] : 0) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="far fa-calendar-check text-warning intransit_icon"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'delivery-details']) ?>"
                class="product-title">Intransit</a>
              <span class="p-value">
                <?= h(isset($asnDashboardCount['2']) ? $asnDashboardCount['2'] : 0) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="fas fa-truck text-info received_icon"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="#" class="product-title">Received</a>
              <span class="p-value">
                <?= h(isset($asnDashboardCount['3']) ? $asnDashboardCount['3'] : 0) ?>
              </span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-6">
    <div class="card card-default card_box_shadow">
      <div class="card-header">
        <div class="row">
          <div class="col-3">Top 5 Vendors by order Value</div>
          <div class="col-3">
            <select name="segment1[]" id="id_segment1" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($segment)) : ?>
              <?php foreach ($segment as $mat) : ?>
              <option value="<?= h($mat->segment) ?>" data-select="<?= h($mat->segment) ?>">
                <?= h($mat->segment) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-3">
            <select name="type1[]" id="id_type1" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendortype)) : ?>
              <?php foreach ($vendortype as $mat) : ?>
              <option value="<?= h($mat->id) ?>" data-select="<?= h($mat->id) ?>">
                <?= h($mat->code) ?> -
                <?= h($mat->name) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-3">
            <select name="vendor1[]" id="id_vendor1" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendor)) : ?>
              <?php foreach ($vendor as $mat) : ?>
              <option value="<?= h($mat->sap_vendor_code) ?>" data-select="<?= h($mat->sap_vendor_code) ?>">
                <?= h($mat->sap_vendor_code) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="chartjs-size-monitor">
          <div class="chartjs-size-monitor-expand">
            <div class=""></div>
          </div>
          <div class="chartjs-size-monitor-shrink">
            <div class=""></div>
          </div>
        </div>
        <canvas id="donutChart"
          style="min-height: 180px; height: 220px; max-height: 250px; max-width: 100%; display: block; width: 487px;"
          width="487" height="150" class="chartjs-render-monitor"></canvas>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-6">
    <div class="card card-default btm-card card_box_shadow">
      <div class="card-header">
        <div class="row">
          <div class="col-3">Top 5 Materials by quantity</div>
          <div class="col-3">
            <select name="segment2[]" id="id_segment2" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($segment)) : ?>
              <?php foreach ($segment as $mat) : ?>
              <option value="<?= h($mat->segment) ?>" data-select="<?= h($mat->segment) ?>">
                <?= h($mat->segment) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-3">
            <select name="type2[]" id="id_type2" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendortype)) : ?>
              <?php foreach ($vendortype as $mat) : ?>
              <option value="<?= h($mat->id) ?>" data-select="<?= h($mat->id) ?>">
                <?= h($mat->code) ?> -
                <?= h($mat->name) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-3">
            <select name="vendor2[]" id="id_vendor2" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendor)) : ?>
              <?php foreach ($vendor as $mat) : ?>
              <option value="<?= h($mat->sap_vendor_code) ?>" data-select="<?= h($mat->sap_vendor_code) ?>">
                <?= h($mat->sap_vendor_code) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="chartjs-size-monitor">
          <div class="chartjs-size-monitor-expand">
            <div class=""></div>
          </div>
          <div class="chartjs-size-monitor-shrink">
            <div class=""></div>
          </div>
        </div>
        <canvas id="donutChart1"
          style="min-height: 180px; height: 220px; max-height: 250px; max-width: 100%; display: block; width: 300px;"
          width="487" height="250" class="chartjs-render-monitor"></canvas>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-6">
    <div class="card card-dafault card_box_shadow">
      <div class="card-header">
        <div class="row">
          <div class="col-3">Po order value by period</div>
          <div class="col-3">
            <select name="segment3[]" id="id_segment3" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($segment)) : ?>
              <?php foreach ($segment as $mat) : ?>
              <option value="<?= h($mat->segment) ?>" data-select="<?= h($mat->segment) ?>">
                <?= h($mat->segment) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-3">
            <select name="type3[]" id="id_type3" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendortype)) : ?>
              <?php foreach ($vendortype as $mat) : ?>
              <option value="<?= h($mat->id) ?>" data-select="<?= h($mat->id) ?>">
                <?= h($mat->code) ?> -
                <?= h($mat->name) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-3">
            <select name="vendor3[]" id="id_vendor3" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendor)) : ?>
              <?php foreach ($vendor as $mat) : ?>
              <option value="<?= h($mat->sap_vendor_code) ?>" data-select="<?= h($mat->sap_vendor_code) ?>">
                <?= h($mat->sap_vendor_code) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="chart">
          <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
              <div class=""></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
              <div class=""></div>
            </div>
          </div>
          <canvas id="barChart"
            style="min-height: 165px; height: 220px; max-height: 250px; max-width: 100%; display: block; width: 200;"
            width="200" height="250" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-6">
    <div class="card card-default btm-card card_box_shadow">
      <div class="card-header">
        <div class="row">
          <div class="col-3">Top Material by order value</div>
          <div class="col-3">
            <select name="segment4[]" id="id_segment4" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($segment)) : ?>
              <?php foreach ($segment as $mat) : ?>
              <option value="<?= h($mat->segment) ?>" data-select="<?= h($mat->segment) ?>">
                <?= h($mat->segment) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-3">
            <select name="type4[]" id="id_type4" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendortype)) : ?>
              <?php foreach ($vendortype as $mat) : ?>
              <option value="<?= h($mat->id) ?>" data-select="<?= h($mat->id) ?>">
                <?= h($mat->code) ?> -
                <?= h($mat->name) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-3">
            <select name="vendor4[]" id="id_vendor4" class="chosen" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendor)) : ?>
              <?php foreach ($vendor as $mat) : ?>
              <option value="<?= h($mat->sap_vendor_code) ?>" data-select="<?= h($mat->sap_vendor_code) ?>">
                <?= h($mat->sap_vendor_code) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="chart">
          <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
              <div class=""></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
              <div class=""></div>
            </div>
          </div>
          <canvas id="barChart2"
            style="min-height: 250pxx; height: 220px; max-height: 250px; max-width: 100%; display: block; width: 487px;"
            width="487" height="250" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?= $this->Url->build('/') ?>js/chart.js"></script>

<script>
  //-------------
  //- BAR CHART -
  //-------------
  var poOrderData = {
    labels: [<?php echo implode(',', $orderByPeriodList['code'])?>],
    datasets: [
      {
        label: 'Order',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [<?php echo implode(',', $orderByPeriodList['order'])?>],
      },
    ]
  }

  var materialOrderData = {
    labels: [<?php echo implode(',', $topMaterialValuesList['code'])?>],
    datasets: [
      {
        label: 'Value',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [<?php echo implode(',', $topMaterialValuesList['value'])?>],
      },
    ]
  }

  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChartCanvas1 = $('#barChart2').get(0).getContext('2d')


  var barChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    datasetFill: false
  }

  new Chart(barChartCanvas, {
    type: 'bar',
    data: poOrderData,
    options: barChartOptions
  })
  new Chart(barChartCanvas1, {
    type: 'bar',
    data: materialOrderData,
    options: barChartOptions
  })



  //-------------
  //- DONUT CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
  var donutChartCanvas1 = $('#donutChart1').get(0).getContext('2d');
  var donutData = {
    labels: [<?php echo implode(',', $topVendorList['code'])?>],
    datasets: [
      {
        data: [<?php echo implode(',', $topVendorList['value'])?>],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#f23c1a', "#f78s18"],
      }
    ]
  }
  var donutOptions = {
    maintainAspectRatio: false,
    responsive: true,
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
  })

  var donutData1 = {
    labels: [<?php echo implode(',', $topMaterialList['code'])?>],
    datasets: [
      {
        data: [<?php echo implode(',', $topMaterialList['qty'])?>],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#f23c1a', "#f78s18"],
      }
    ]
  }
  var donutOptions1 = {
    maintainAspectRatio: false,
    responsive: true,
  }
  new Chart(donutChartCanvas1, {
    type: 'doughnut',
    data: donutData1,
    options: donutOptions1
  })

//   $(".chosen").multiselect({
//     enableClickableOptGroups: false,
//     enableCollapsibleOptGroups: false,
//     enableFiltering: true,
//     includeSelectAllOption: false,
//     buttonText: function (options, select) {
//         if (options.length === 0) {
//             return 'Select';
//         }
//         else if (options.length > 1) {
//             return options.length + 'Filter';
//         }
//         else {
//             var labels = [];
//             options.each(function () {
//                 if ($(this).attr('label') !== undefined) {
//                     labels.push($(this).attr('label'));
//                 }
//                 else {
//                     labels.push($(this).html());
//                 }
//             });
//             return labels.join(', ');
//         }
//     }

// });
$('.chosen').select2({
    closeOnSelect : false,
    placeholder: 'Select',
    allowClear: true,
    tags: true,
    tokenSeparators: [',', ' '],
    templateSelection: function(selection) {
        if (selection.element && $(selection.element).attr('data-select') !== undefined) {
            return $(selection.element).attr('data-select');
        } else {
            return selection.text;
        }
    }
});
</script>