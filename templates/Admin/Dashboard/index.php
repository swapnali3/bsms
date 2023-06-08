<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\Cake\Collection\CollectionInterface $adminUsers
 */
?>


<!-- <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Subscriptions</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            Start Date: 01/01/2023
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<style>
  .box {
    width: 30%;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    position: relative;
  }

  .btn-info {
    background-color: #08132F !important;
    color: #fff !important;
    border-color: #08132F !important;
  }

  .btn-info:hover {
    background-color: #fff !important;
    color: #08132F !important;
  }

  .btn-info {
    position: absolute;
    left: 9px;
    top: 0;
  }

  .pointer {
    cursor: pointer;
  }

  .hide {
    display: none;
  }
</style>
<div class="content">
  <div class="row">
    <div class="col-12 landing">
      <div class="card">
        <div class="card-header">
          Vekpro Administration Console
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <input type="text" class="form-control" id="id_search" placeholder="Search">
            </div>
            <div class="col-3">
              <button type="button" class="btn btn-info">Delete Trail Account</button>
            </div>
            <div class="col-3">

            </div>
            <div class="col-3">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <div class="row">
                <div class="col-6">
                  <div class="card switchcard pointer" data-prd="1">
                    <div class="card-header">
                      <h5>PRODUCTION SERVER</h5>
                    </div>
                    <div class="card-body">

                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="card switchcard pointer" data-prd="1">
                    <div class="card-header">
                      <h5>QUALITY SERVER</h5>
                    </div>
                    <div class="card-body">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-8 setting hide">
      <div class="card" style="height: 85vh;">
        <div class="card-header">
          <h5>SETTINGS</h5>
        </div>
        <div class="card-body"></div>
      </div>
    </div>
    <div class="col-8 usermgm hide">
      <div class="card" style="height: 85vh;">
        <div class="card-header">
          <h5>SETTINGS</h5>
        </div>
        <div class="card-body"></div>
      </div>
    </div>
    <div class="col-4 sidecard hide">
      <div class="card" style="height: 85vh;">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="card switchcard pointer" data-prd="1">
                <div class="card-header">
                  <h5>PRODUCTION SERVER</h5>
                </div>
                <div class="card-body">
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card switchcard pointer" data-prd="1">
                <div class="card-header">
                  <h5>QUALITY SERVER</h5>
                </div>
                <div class="card-body">
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).on("click", ".switchcard", function () {
    $(".landing, .usermgm").hide();
    $(".setting, .sidecard").show();
  });

  $(document).on("click", ".usermgm", function () {
    $(".landing, .setting").hide();
    $(".usermgm, .sidecard").show();
  });
</script>