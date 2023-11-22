<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\ ake\Collection\CollectionInterface $adminUsers
 */
?>
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
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>" class="product-title">Total</a>
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
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>" class="product-title">Onboarding
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
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>" class="product-title">Approval Pending
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
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>" class="product-title">Approved
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
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>" class="product-title">Sent to SAP
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
              <a href="<?php echo $this->Url->build([ 'controller' => 'purchase-orders', 'action'=>'view']) ?>" class="product-title">Total</a>
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
              <a href="<?php echo $this->Url->build([ 'controller' => 'purchase-orders', 'action'=>'view']) ?>" class="product-title">Completed</a>
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
              <a href="<?php echo $this->Url->build([ 'controller' => 'purchase-orders', 'action'=>'view']) ?>" class="product-title">Pending</a>
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
              <a href="<?php echo $this->Url->build([ 'controller' => 'delivery-details']) ?>" class="product-title">Total</a>
              <span class="p-value">
              <?= h(isset($asnDashboardCount['total']) ? $asnDashboardCount['total'] : 0) ?>
              </span>
            </div>
          </li>
          <!-- <li class="item">
            <div class="product-img">
              <i class="fas fa-th-large text-info created_icon"></i>
            </div>
            <div class="product-info">
              <a href="<?php echo $this->Url->build([ 'controller' => 'delivery-details']) ?>" class="product-title">Created</a>
              <span class="p-value">
              <?= h(isset($asnDashboardCount['0']) ? $asnDashboardCount['0'] : 0) ?>
              </span>
            </div>
          </li>  -->
          <li class="item">
            <div class="product-img">
              <i class="far fa-calendar-check text-warning intransit_icon"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'delivery-details']) ?>" class="product-title">Intransit</a>
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
              <a href="<?php echo $this->Url->build([ 'controller' => 'delivery-details']) ?>" class="product-title">Received</a>
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
        <h3 class="card-title">Top 5 Vendors by order Value</h3>


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
      <!-- /.card-body -->
    </div>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-6">
    <div class="card card-default btm-card card_box_shadow">
      <div class="card-header">
        <h3 class="card-title">Top 5 Materials by quantity</h3>


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
      <!-- /.card-body -->
    </div>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-6">
    <div class="card card-dafault card_box_shadow">
      <div class="card-header">
        <h3 class="card-title">Po order value by period</h3>


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
      <!-- /.card-body -->
    </div>
  </div>
  
  

  <div class="col-sm-12 col-lg-6">
    <div class="card card-default btm-card card_box_shadow">
      <div class="card-header">
        <h3 class="card-title">Top Material by order value</h3>


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
      <!-- /.card-body -->
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
</script>