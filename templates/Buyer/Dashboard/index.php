<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\ ake\Collection\CollectionInterface $adminUsers
 */
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<style>
  .products-list>.item {
    padding: 1px; 
  }
  
  .products-list .product-info {
    margin-left: 20px;
    font-size: x-small;
    margin-top:5px
  }
  .user-panel .image{
    margin-right: 10px;
  }
  .products-list .product-img {
    float: clear;
  }

  .products-list .product-img .cust-img {
    width: 20px;
    height: 20px;
  }

  .product-description {

    font-size: 7px;
  }

  .card-header {
    padding: 0rem.0rem;
    margin-left: 10px;
    margin-top: 5px
  }

  .product-title {
    color: black;
  }



  .badge-warning {
    color: black;
    background-Color: lightgrey
  }

  .main-footer {
    /* padding: 0rem; */
  }

  .mt-4, .my-4{
    margin-top:0.5rem !important
  }



  .card-title{
    font-size:0.9rem;
    font-family:system-ui;
  }

  .card-body{
    padding:0.25rem
  }
  .badge-warning{
    background-Color:white;
    font-size: 12px;
  }

  .products-list .product-title{
    font-weight:400;
  }



</style>
<div class="row mt-4 mx-1">
  <!-- <div class="col-sm-12 col-lg-3">
    <div class="card mb-2" style="border-radius:1rem;">

      <div class="card-header p-3 pt-2">
        <div
          class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">shopping_cart</i>
        </div>
        <div class="text-end pt-1">
          <h1 class="text-sm mb-0 text-capitalize"><b>Purchase Orders</b></h1>
          <h4 class="mb-0">
            <?= $totalPos ?>
          </h4>
        </div>
      </div>

      <hr class="dark horizontal my-0">
      <div class="card-footer p-3">
        <button type="button" class="button">
          <?= $this->Html->link(__('More Info!'), ['controller' => 'purchase-orders', 'action' => 'index'], ['style'=>'color:white;'], ['class' => 'small-box-footer', 'escape' => false]) ?>

        </button>

      </div>
    </div>
  </div> -->

  <div class="col-sm-12 col-lg-3">
    <div class="card">
      <div class="card-header">
        <h1 class="card-title">Vendors</h1>


      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <ul class="products-list product-list-in-card pl-2 pr-2">
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image"
                style="width: 2vw;height: auto;">
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Total
                <span class="badge badge-warning float-right">6</span></a>

            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image"
                style="width: 2vw;height: auto;">

            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Onboarding
                <span class="badge badge-warning float-right">2</span></a>
              <span class="product-description">
                
              </span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image" class=""
                style="width: 2vw;height: auto;">
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Approved
                <span class="badge badge-warning float-right">3</span></a>
              <span class="product-description">
                
              </span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image" class=""
                style="width: 2vw;height: auto;">
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Sent to SAP
                <span class="badge badge-warning float-right">1</span></a>
              <span class="product-description">
                
              </span>
            </div>
          </li>
          <!-- /.item -->
        </ul>
      </div>

      <!-- /.card-footer -->
    </div>
    <!-- <div class="card mb-2" style="border-radius:1rem;">

      <div class="card-header p-3 pt-2">
        <div
          class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">shopping_cart</i>
        </div>
        <div class="text-end pt-1">
          <h1 class="text-sm mb-0 text-capitalize"><b>Purchase Orders</b></h1>
          <h4 class="mb-0">
            <?= $totalPos ?>
          </h4>
        </div> -->
  </div>

  <div class="col-sm-12 col-lg-3">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Purchase Orders</h3>


      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <ul class="products-list product-list-in-card pl-2 pr-2">
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image" class=""
                style="width: 2vw;height: auto;">
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Total
                <span class="badge badge-warning float-right">20</span></a>
              <span class="product-description">
                
              </span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image" class=""
                style="width: 2vw;height: auto;">
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Completed
                <span class="badge badge-warning float-right">15</span></a>
              <span class="product-description">
                
              </span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image" class=""
                style="width: 2vw;height: auto;">
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Pending
                <span class="badge badge-warning float-right">5</span></a>
              <span class="product-description">
                
              </span>
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
        <ul class="products-list product-list-in-card pl-2 pr-2">
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image" class=""
                style="width: 2vw;height: auto;">
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Total Amount
                <span class="badge badge-warning float-right">₹500000.00</span></a>
              <span class="product-description">
                
              </span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image" class=""
                style="width: 2vw;height: auto;">
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Paid
                <span class="badge badge-warning float-right">₹400000.00</span></a>
              <span class="product-description">
                
              </span>
            </div>
          </li>
          <!-- /.item -->
          <li class="item">
            <div class="product-img">
              <img src="<?= $this->Url->build('/') ?>img/checklist.png" alt="Product Image" class=""
                style="width: 2vw;height: auto;">
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="javascript:void(0)" class="product-title">Balance
                <span class="badge badge-warning float-right">₹100000.00</span></a>
              <span class="product-description">
                
              </span>
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
        <h3 class="card-title">Intransit</h3>

      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
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
      </div>
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

    <div class="card card-default">
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

    <div class="card card-default">
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