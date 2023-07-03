<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\ ake\Collection\CollectionInterface $adminUsers
 */
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
<style>
    aside.main-sidebar {
    background-color: #08132F !important;
    }
    .nav-link.active {
        background-color: #8E9B2C !important;
    }
    .content-wrapper{
      min-height: 780px !important;
    }
  
</style>
<?= $this->Html->css('custom') ?>
<div class="buyer-dash">
<div class="row mt-4 mx-1 mb-1 first-row">
  

  <div class="col-sm-12 col-lg-3">
    <div class="card">
      <div class="card-header">
        <h1 class="card-title">Vendors</h1>


      </div>

      <?php  
      $totalVendorTemps  = $totalVendorOnboarding + $totalVendorApproved + $totalSentSap
       ?>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
            <i class="fas fa-th-large text-info"></i>
            </div>
            <div class="product-info">
              <a href="javascript:void(0)" class="product-title">Total</a>
              <span class="p-value"><?= h($totalVendorTemps) ?></span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
            <i class="fas fa-user-plus text-danger"></i>

            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Onboarding
               </a>
                <span class="p-value"><?= h($totalVendorOnboarding) ?></span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
            <i class="far fa-check-square text-success"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Approved
               </a>
                <span class="p-value"><?= h($totalVendorApproved) ?></span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
            <i class="fas fa-share-square text-warning"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Sent to SAP
              
        </a>
                <span class="p-value"><?= h($totalSentSap) ?></span>
            </div>
          </li>
          <!-- /.item -->
        </ul>
      </div>

      <!-- /.card-footer -->
    </div>
    
  </div>

  <div class="col-sm-12 col-lg-3">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Purchase Orders</h3>

        
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
            <i class="fas fa-th-large text-info"></i>
            </div>
            <div class="product-info">
              <a href="javascript:void(0)" class="product-title">Total</a>
              <span class="p-value"><?= h($totalPos) ?></span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
            <i class="far fa-calendar-check text-success"></i>

            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Completed</a>
              <span class="p-value"><?= h($poCompleteCount) ?></span>
            </div>
          </li>
          <?php  
            $poPending = $totalPos - $poCompleteCount
          ?>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
            <i class="far fa-clock text-danger"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Pending</a>
                <span class="p-value"><?= $poPending ?></span>
            </div>
          </li>
         
        </ul>
      </div>
    
      <!-- /.card-body -->

      <!-- /.card-footer -->
    </div>
  </div>

  <div class="col-sm-12 col-lg-3">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Payments</h3>


      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
            <i class="fas fa-th-large text-info"></i>
            </div>
            <div class="product-info">
              <a href="javascript:void(0)" class="product-title">Total Amount</a>
              <span class="p-value">500000.00</span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
            <i class="far fa-calendar-check text-warning"></i>

            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Paid</a>
              <span class="p-value">400000.00</span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
            <i class="fas fa-balance-scale text-success"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Balance</a>
                <span class="p-value">100000.00</span>
            </div>
          </li>
         
        </ul>
      </div>
    
      <!-- /.card-body -->

      <!-- /.card-footer -->
    </div>
  </div>

  <div class="col-sm-12 col-lg-3">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">ASN</h3>

      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
            <i class="fas fa-th-large text-info"></i>
            </div>
            <div class="product-info">
              <a href="javascript:void(0)" class="product-title">Created</a>
              <span class="p-value"><?= h($totalAsnCreated) ?></span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
            <i class="far fa-calendar-check text-warning"></i>

            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Intransit</a>
              <span class="p-value"><?= h($totalAsnIntransit) ?></span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
            <i class="fas fa-truck text-info"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Received</a>
                <span class="p-value"><?= h($totalAsnReceived) ?></span>
            </div>
          </li>
         
        </ul>
      </div>
      <!-- <div class="card-body p-0">
        <ul class="products-list product-list-in-card pl-2 pr-2">
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image" class=""
                style="width: 2vw;height: auto;">
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Dispatched
                <span class="badge badge-warning float-right">10</span></a>
              <span class="product-description">
                
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image" class=""
                style="width: 2vw;height: auto;">
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Intrasit
                <span class="badge badge-warning float-right">5</span></a>
              <span class="product-description">
                
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image" class=""
                style="width: 2vw;height: auto;">
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Delivered
                <span class="badge badge-warning float-right">5</span></a>
              <span class="product-description">
                
              </span>
            </div>
          </li>
          
        </ul>
      </div> -->
      <!-- /.card-body -->

      <!-- /.card-footer -->
    </div>
    
  </div>

</div>
<div class="row mx-1">
  <div class="col-sm-12 col-lg-6">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Top Vendors by order Value</h3>


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

  <div class="col-sm-12 col-lg-6">

    <div class="card card-dafault">
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


</div>
<div class="row mx-1">
  <div class="col-sm-12 col-lg-6">

    <div class="card card-default btm-card">
      <div class="card-header">
        <h3 class="card-title">Top Material by quantity</h3>


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

  <div class="col-sm-12 col-lg-6">

    <div class="card card-default btm-card">
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
</div>
<script src="<?= $this->Url->build('/') ?>js/chart.js"></script>
<script>
  //-------------
  //- BAR CHART -
  //-------------
  var areaChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label: 'Payment',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label: 'Order',
        backgroundColor: 'rgba(210, 214, 222, 1)',
        borderColor: 'rgba(210, 214, 222, 1)',
        pointRadius: false,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [120, 100, 150, 200, 150, 100, 140]
      },
    ]
  }
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChartCanvas1 = $('#barChart2').get(0).getContext('2d')
  var barChartData = $.extend(true, {}, areaChartData)
  var temp0 = areaChartData.datasets[0]
  var temp1 = areaChartData.datasets[1]
  barChartData.datasets[0] = temp1
  barChartData.datasets[1] = temp0

  var barChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    datasetFill: false
  }

  new Chart(barChartCanvas, {
    type: 'bar',
    data: barChartData,
    options: barChartOptions
  })
  new Chart(barChartCanvas1, {
    type: 'bar',
    data: barChartData,
    options: barChartOptions
  })



  //-------------
  //- DONUT CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
  var donutChartCanvas1 = $('#donutChart1').get(0).getContext('2d');
  var donutData = {
    labels: [
      '0000100119',
      '0000100114',
      '0000100123',
    ],
    datasets: [
      {
        data: [5000, 2000, 1500],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12'],
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
    labels: [
      'PHFG0411',
      'PHFG0417',
  
    ],
    datasets: [
      {
        data: [345345345, 503232340],
        backgroundColor: ['#f56954', '#00a65a'],
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

<!-- <script>
  $(document).ready(function () {
    var table = $("#example1").DataTable({
      "paging": true,
      "responsive": false, "lengthChange": false, "autoWidth": false, "searching": true,
    });
  });
</script> -->