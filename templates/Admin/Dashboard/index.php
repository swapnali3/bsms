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
  .box{
    width: 30%;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    position: relative;
  }
  .btn-info{
    background-color: #08132F !important;
    color:#fff !important;
    border-color: #08132F !important;
  }
  .btn-info:hover{
    background-color: #fff !important;
    color:#08132F !important;
  }
  .btn-info {
    position: absolute;
    left: 9px;
    top: 0;
}
</style>
<div class="content">
  <div class="row">
    <div class="col-md-12">
    <div class="card">
      <div class="card-header">
          <h5>Master Login</h5>
      </div>
      <div class="card-body">
          <div class="d-flex justify-content-start">
          <div class="box p-4 border rounded text-center ">
           <a href="#">
           <div class="btn btn-info mt-2">DEV</div>
                <img class="flow-img" src="<?= $this->Url->build('/') ?>img/login.gif" width="120">
                <br>
                <p class="text-dark">Development testing server</p>
           </a>
            </div>
            
            <div class="box p-4 border rounded text-center ml-4">
             <a href="#">
             <div class="btn btn-info mt-2">PRD</div>
                <img class="flow-img" src="<?= $this->Url->build('/') ?>img/login.gif" width="120">
                <br>
                <p class="text-dark">Production Live server</p>
             </a>
            </div>
            
          </div>
      </div>
    </div>
    </div>
    
  </div>
</div>