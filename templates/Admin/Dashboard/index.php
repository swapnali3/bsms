<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\Cake\Collection\CollectionInterface $adminUsers
 */


?>

<?= $this->Html->css('admincss') ?>
<div class="content admin-console">
  <div class="row">
  <div class="col-sm-12 col-md-3 col-lg-3">
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

  <div class="col-sm-12 col-md-3 col-lg-3">
    <div class="card card_box_shadow">
      <div class="card-header">
        <h3 class="card-title">Buyers</h3>
      </div>
      <div class="card-body py-0" style="min-height: 100%;">
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
              <i class="fas fa-th-large text-info"></i>
            </div>
            <div class="product-info">
              <a href="<?php echo $this->Url->build([ 'controller' => '/users']) ?>" class="product-title">Total</a>
              <span class="p-value">
                <?= h($buyerCounts['total']) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="far fa-calendar-check text-success"></i>

            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => '/users']) ?>" class="product-title">Active</a>
              <span class="p-value">
              <?= h($buyerCounts['1']) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="far fa-clock text-danger"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'users']) ?>" class="product-title">Inactive</a>
              <span class="p-value">
              <?= h(isset($buyerCounts['0']) ? $buyerCounts['0'] : 0) ?>
              </span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>


  <div class="col-sm-12 col-md-3 col-lg-3">
    <div class="card card_box_shadow">
      <div class="card-header">
        <h3 class="card-title">Managers</h3>
      </div>
      <div class="card-body py-0" style="min-height: 100%;">
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
              <i class="fas fa-th-large text-info"></i>
            </div>
            <div class="product-info">
              <a href="<?php echo $this->Url->build([ 'controller' => 'users']) ?>" class="product-title">Total</a>
              <span class="p-value">
                <?= h($managerCounts['total']) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="far fa-calendar-check text-success"></i>

            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'users']) ?>" class="product-title">Active</a>
              <span class="p-value">
              <?= h(isset($managerCounts['1']) ? $managerCounts['1'] : 0) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="far fa-clock text-danger"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'users']) ?>" class="product-title">Inactive</a>
              <span class="p-value">
              <?= h(isset($managerCounts['0']) ? $managerCounts['0'] : 0) ?>
              </span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

    <!-- <div class="col-12 landing">
      <div class="card">
        <div class="card-header">
          <h5><b> Administration Console</b></h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-8">
              <div class="search-box">
                <input type="text" class="form-control rounded-pill" id="id_search" placeholder="Search here">
                <i class="fas fa-search"></i>
              </div>
            </div>
            
            <div class="col-12 mt-3">
              <h5 class="text-success pl-1 mb-0"><b>YOUR ACCOUNT</b></h5>
            </div>
            <div class="col-3">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <div class="row">
                <div class="col-4">
                  <div class="card switchcard pointer " data-prd="1">

                    <div class="card-body rounded">
                      <div class="main-data">
                        <div class="row">
                          <div class="col-md-12">
                            <h5 class="text-bold">DEV</h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 align-self-center text-center">
                            <div class="img">
                              <i class="fas fa-check-circle"></i>
                            </div>
                          </div>
                          <div class="col-md-10" style="border-bottom:2px solid #ddd">
                            <h6 class="pt-2"><b>Status</b></h6>
                            <div class="d-flex btm-d">
                              <div class="d-flex text-warning">
                                <p>Deactivated</p>
                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 align-self-center text-center">
                            <div class="img">
                              <i class="far fa-comment-alt"></i>
                            </div>
                          </div>
                          <div class="col-md-10" style="border-bottom:2px solid #ddd">
                            <h6 class="pt-2"><b>Server Configuration</b></h6>
                            <div class="d-flex btm-d">

                              <div class="d-flex text-secondary mr-2">
                                <p>192.168.5.59</p>
                              </div>
                              <div class="d-flex text-success">
                                <p>10% Utilization</p>
                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 align-self-center text-center">
                            <div class="img">
                              <i class="fas fa-upload"></i>
                            </div>
                          </div>
                          <div class="col-md-10">
                            <h6 class="pt-2"><b>Publish</b></h6>
                            <div class="d-flex btm-d">

                              <div class="d-flex text-secondary mr-2">
                                <i class="far fa-clock pt-1"></i>
                                <p>12 hours ago</p>
                              </div>
                              <div class="d-flex text-success">
                                <i class="fas fa-check-circle pt-1"></i>
                                <p>submitted</p>
                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 text-right">
                            <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu">
                              <a class="dropdown-item settings" id="settings" href="#" data-prd="0"><i class="fas fa-cog"></i> Settings</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#"><i class="fas fa-check-square"></i> Activation</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item disabled" href="#" style><i class="fas fa-times-circle"></i>
                                Deactivation</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#"><i class="fas fa-upload"></i> Publish</a>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="card switchcard pointer" data-prd="0">

                    <div class="card-body rounded">
                      <div class="main-data">
                        <div class="row">
                          <div class="col-md-12">
                            <h5 class="text-bold">PRD</h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 align-self-center text-center">
                            <div class="img">
                              <i class="fas fa-check-circle"></i>
                            </div>
                          </div>
                          <div class="col-md-10" style="border-bottom:2px solid #ddd">
                            <h6 class="pt-2"><b>Status</b></h6>
                            <div class="d-flex btm-d">

                              <div class="d-flex text-success">
                                <p>Activated</p>
                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 align-self-center text-center">
                            <div class="img">
                              <i class="far fa-comment-alt"></i>
                            </div>
                          </div>
                          <div class="col-md-10" style="border-bottom:2px solid #ddd">
                            <h6 class="pt-2"><b>Server </b></h6>
                            <div class="d-flex btm-d">

                              <div class="d-flex text-secondary mr-2">
                                <p>192.168.4.59</p>
                              </div>
                              <div class="d-flex text-success">
                                <p>10% Utilization</p>
                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 align-self-center text-center">
                            <div class="img">
                              <i class="fas fa-upload"></i>
                            </div>
                          </div>
                          <div class="col-md-10">
                            <h6 class="pt-2"><b>Publish</b></h6>
                            <div class="d-flex btm-d">

                              <div class="d-flex text-secondary mr-2">
                                <i class="far fa-clock pt-1"></i>
                                <p>12 hours ago</p>
                              </div>
                              <div class="d-flex text-success">
                                <i class="fas fa-check-circle pt-1"></i>
                                <p>submitted</p>
                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 text-right">
                            <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu">
                              <a class="dropdown-item settings" href="#" id="settings" data-prd="1"><i class="fas fa-cog"></i> Settings</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item disabled" href="#"><i class="fas fa-check-square"></i>
                                Activation</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item"><i class="fas fa-times-circle"></i> Deactivation</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#"><i class="fas fa-upload"></i> Publish</a>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <div class="col-12 setting hide">
      <div class="card" style="height: 88vh;">
        <div class="card-header">
          <h5 class="mb-0"><b>SETTINGS</b></h5>
        </div>
        <div class="card-body">
          <div class="col-md-12">
            <div class="settings form content">
              <form method="post" accept-charset="utf-8" action="admin/settings/update">
                <div style="display:none;"><input type="hidden" name="_method" value="PUT"><input type="hidden" name="_csrfToken" autocomplete="off" value="QHPE9oRzqNipo31TSZCZCPAg7PGpdxR3cdNlNXQiOTbRpXnc805rp/penuPNILFZN47r0rDStDYLOg67aDmFiEPCQai+cMlFyRKNl5BPI0FJ4FRRQRABV+mWHL/GLQifzjuv2q8Qg2oGt9ziievRBw==">
                </div>
                <fieldset>
                  <div class="row">
                    <div class="col-4 mb-3">
                      <div class="input text"><label for="sms-url">Sms Url</label><input type="text" name="sms_url" class="custom-select rounded-0" div="form-group" id="sms-url" value="https://www.fast2sms.com/dev/bulkV2"></div>
                    </div>
                    <div class="col-4 mb-3">
                      <div class="input text"><label for="sms-api-key">Sms Api Key</label><input type="text" name="sms_api_key" class="custom-select rounded-0" div="form-group" id="sms-api-key" value="TUJOiyzGtxRpCSM5wu4QvFgs2onN19mAecDPZ37Y6XHWkjlE8K3VEDCRNMLb02gX1pYFqn5mo9vIke6J">
                      </div>
                    </div>
                    <div class="col-4 mb-3">
                      <div class="input text"><label for="sap-url">Sap Url</label><input type="text" name="sap_url" class="custom-select rounded-0" div="form-group" id="sap-url" value="http://123.108.46.252">
                      </div>
                    </div>
                    <div class="col-4 mb-3">

                      <div class="input text"><label for="sap-segment">Sap Segment</label><input type="text" name="sap_segment" class="custom-select rounded-0" div="form-group" id="sap-segment" value="sap/bc/sftmob/VENDER_UPD"></div>
                    </div>
                    <div class="col-4 mb-3">
                      <div class="input text"><label for="sap-client">Sap Client</label><input type="text" name="sap_client" class="custom-select rounded-0" div="form-group" id="sap-client" value="300"></div>
                    </div>
                    <div class="col-4 mb-3">
                      <div class="input text"><label for="sap-port">Sap Port</label><input type="text" name="sap_port" class="custom-select rounded-0" div="form-group" id="sap-port" value="8000"></div>
                    </div>
                    <div class="col-4 mb-3">
                      <div class="input text"><label for="sap-username">Sap Username</label><input type="text" name="sap_username" class="custom-select rounded-0" div="form-group" id="sap-username" value="vcsupport1"></div>
                    </div>
                    <div class="col-4 mb-3">

                      <div class="input text"><label for="sap-password">Sap Password</label><input type="text" name="sap_password" class="custom-select rounded-0" div="form-group" id="sap-password" value="aarti@123"></div>
                    </div>
                    <div class="col-md-12">
                      <button class="submit_btn btn btn-info" type="submit">Submit</button>
                    </div>
                  </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 usermgm hide">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">USER ADMINISTRATION</h5>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="">
              <!-- <button type="button" class="btn btn-primary">Add</button> -->
            </div>


          </div>
          <div class="user-list-tbl table-reponsive">
            <table class="table" id="adminuserview" style="width: 100%;">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Mobile No</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 useradd hide">
      <div class="card" style="height: 88vh;">
        <div class="card-header">
          <h5 class="mb-0">USER ADMINISTRATION</h5>
        </div>


        <?= $this->Form->create(null, ['id' => 'userForm']) ?>
        <div class="card-body">
          <div class="row">
            <div class="col-4 mt-3">
              <label for="mobileno">Role</label>
              <select class="custom-select" id="myCustomSelect" name="group_id" required>
                <!-- <option disabled selected>Please Select</option>
                <option value="1">Admin</option> -->
                <option value="2" selected>Buyer</option>
              </select>
            </div>
            <div class="col-4 mt-3">
              <div class="form-group">
                <?php
                      echo $this->Form->control('first_name', [
                          'class' => 'form-control',
                          'placeholder' => 'Enter First Name'
                      ]);
                      ?>
              </div>
            </div>
            <div class="col-4 mt-3">
              <div class="form-group">
                <?php
                      echo $this->Form->control('last_name', [
                          'class' => 'form-control',
                          'placeholder' => 'Enter Last Name'
                      ]);
                      ?>
              </div>
            </div>
            <div class="col-4 mt-3">
              <div class="form-group">
                <?php echo $this->Form->control('email', array('class' => 'form-control rounded-0', 'placeholder' => 'please enter email id', 'required')); ?>
              </div>
            </div>
            
            
            <div class="col-4 mt-3">
              <div class="form-group">
                <?php echo $this->Form->control('mobile', array('class' => 'form-control tel numberonly', 'minlength' => '10', 'maxlength' => '10', 'pattern' => '[9,8,7,6]{1}[0-9]{9}', 'type' => 'tel', 'placeholder' => 'please enter mobile number')); ?>
              </div>
            </div>


            <div class="col-4 mt-3">
              <div class="form-group">
                <?php echo $this->Form->control('company_code_id', array('class' => 'form-control', 'options' => $company_codes, 'empty' => 'Please Select', 'required')); ?>
              </div>
            </div>

            <div class="col-4 mt-3">
              <div class="form-group">
              <?php echo $this->Form->control('purchasing_organization_id', array('class' => 'form-control', 'empty' => 'Please Select', 'required')); ?>
              </div>
            </div>

            
          </div>
          <div>
            <button type="button" class="submit_btn btn btn-primary">Submit</button>
          </div>
        </div>
        <?= $this->Form->end() ?>


      </div>
    </div>
    <!-- <div class="col-4 sidecard hide">
      <div class="card" style="height: 88vh;">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="card switchcard pointer">
                <div class="card-body rounded">
                  <div class="main-data">
                    <div class="row">
                      <div class="col-md-12">
                        <h5 class="text-bold">DEV</h5>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2 align-self-center text-center">
                        <div class="img">
                          <i class="fas fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col-md-10" style="border-bottom:2px solid #ddd">
                        <h6 class="pt-2"><b>Status</b></h6>
                        <div class="d-flex btm-d">

                          <div class="d-flex text-warning">
                            <p>Deactivated</p>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2 align-self-center text-center">
                        <div class="img">
                          <i class="far fa-comment-alt"></i>
                        </div>
                      </div>
                      <div class="col-md-10" style="border-bottom:2px solid #ddd">
                        <h6 class="pt-2"><b>Server Configuration</b></h6>
                        <div class="d-flex btm-d">

                          <div class="d-flex text-secondary mr-2">
                            <i class="far fa-clock pt-1"></i>
                            <p>192.168.5.59</p>
                          </div>
                          <div class="d-flex text-success">
                            <p>10% Utilization</p>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2 align-self-center text-center">
                        <div class="img">
                          <i class="fas fa-upload"></i>
                        </div>
                      </div>
                      <div class="col-md-10">
                        <h6 class="pt-2"><b>Publish</b></h6>
                        <div class="d-flex btm-d">

                          <div class="d-flex text-secondary mr-2">
                            <i class="far fa-clock pt-1"></i>
                            <p>12 hours ago</p>
                          </div>
                          <div class="d-flex text-success">
                            <i class="fas fa-check-circle pt-1"></i>
                            <p>submitted</p>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-right">
                        <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                        <div class="dropdown-menu">
                          <a class="dropdown-item settings" id="settings" href="#" data-prd="0"><i class="fas fa-cog"></i> Settings</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item disabled" href="#"><i class="fas fa-check-square"></i> Activation</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" style><i class="fas fa-times-circle"></i> Deactivation</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"><i class="fas fa-upload"></i> Publish</a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card switchcard pointer" data-prd="1">
                <div class="card-body rounded">
                  <div class="main-data">
                    <div class="row">
                      <div class="col-md-12">
                        <h5 class="text-bold">PRD</h5>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2 align-self-center text-center">
                        <div class="img">
                          <i class="fas fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col-md-10" style="border-bottom:2px solid #ddd">
                        <h6 class="pt-2"><b>Status</b></h6>
                        <div class="d-flex btm-d">
                          <div class="d-flex text-success">
                            <p>Activated</p>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2 align-self-center text-center">
                        <div class="img">
                          <i class="far fa-comment-alt"></i>
                        </div>
                      </div>
                      <div class="col-md-10" style="border-bottom:2px solid #ddd">
                        <h6 class="pt-2"><b>Server Configuration</b></h6>
                        <div class="d-flex btm-d">

                          <div class="d-flex text-secondary mr-2">
                            <i class="far fa-clock pt-1"></i>
                            <p>12 hours ago</p>
                          </div>
                          <div class="d-flex text-success">
                            <p>10% Utilization</p>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2 align-self-center text-center">
                        <div class="img">
                          <i class="fas fa-upload"></i>
                        </div>
                      </div>
                      <div class="col-md-10">
                        <h6 class="pt-2"><b>Publish</b></h6>
                        <div class="d-flex btm-d">

                          <div class="d-flex text-secondary mr-2">
                            <i class="far fa-clock pt-1"></i>
                            <p>12 hours ago</p>
                          </div>
                          <div class="d-flex text-success">
                            <i class="fas fa-check-circle pt-1"></i>
                            <p>submitted</p>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-right">
                        <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                        <div class="dropdown-menu">
                          <a class="dropdown-item settings" href="#" id="settings" data-prd="1"><i class="fas fa-cog"></i> Settings</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"><i class="fas fa-check-square"></i> Activation</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item disabled"><i class="fas fa-times-circle"></i> Deactivation</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"><i class="fas fa-upload"></i> Publish</a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</div>



<script>
  var userurl = '<?= $this->Url->build(['controller' => 'dashboard','action' => 'userView']); ?>';
  var useraddurl = '<?= $this->Url->build(['controller' => 'dashboard','action' => 'userAdd']); ?>';

  function getRemote(remote_url, method = "GET", type = "json", convertapi = true) {
  var resp = $.ajax({ type: method, dataType: type, url: remote_url, async: false }).responseText;
  if (convertapi) { return JSON.parse(resp); }
  return resp;
}

  $(document).on("change", "#company-code-id", function () {
  var companycode = $(this).val();
  var resp = getRemote(baseurl + "api/api/master-by-company-code/" + companycode);
  var opt = "<option selected='' value=''>Please Select</option>";
  resp = resp["message"];
  $.each(resp["PurchasingOrganizations"], function(i, v){opt += `<option value="`+v.id+`">`+v.name+`</option>`;})
  $("#purchasing-organization-id").html(opt);
});

</script>
