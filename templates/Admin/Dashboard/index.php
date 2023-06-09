<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\Cake\Collection\CollectionInterface $adminUsers
 */
?>

<?= $this->Html->css('admincss') ?>
<div class="content admin-console">
  <div class="row">
    <div class="col-12 landing">
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
            <!-- <div class="col-3">
              <button type="button" class="btn btn-info">Delete Trail Account</button>
            </div> -->
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
                            <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"></i>
                            <div class="dropdown-menu">
                              <a class="dropdown-item settings" id="settings" href="#" data-prd="0"><i
                                  class="fas fa-cog"></i> Settings</a>
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
                            <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"></i>
                            <div class="dropdown-menu">
                              <a class="dropdown-item settings" href="#" id="settings" data-prd="1"><i
                                  class="fas fa-cog"></i> Settings</a>
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
    </div>
    <div class="col-8 setting hide">
      <div class="card" style="height: 88vh;">
        <div class="card-header">
          <h5 class="mb-0"><b>SETTINGS</b></h5>
        </div>
        <div class="card-body">
          <div class="col-md-12">
            <div class="settings form content">
              <form method="post" accept-charset="utf-8" action="/bsms/admin/settings/update">
                <div style="display:none;"><input type="hidden" name="_method" value="PUT"><input type="hidden"
                    name="_csrfToken" autocomplete="off"
                    value="QHPE9oRzqNipo31TSZCZCPAg7PGpdxR3cdNlNXQiOTbRpXnc805rp/penuPNILFZN47r0rDStDYLOg67aDmFiEPCQai+cMlFyRKNl5BPI0FJ4FRRQRABV+mWHL/GLQifzjuv2q8Qg2oGt9ziievRBw==">
                </div>
                <fieldset>
                  <div class="row">
                    <div class="col-4 mb-3">
                      <div class="input text"><label for="sms-url">Sms Url</label><input type="text" name="sms_url"
                          class="custom-select rounded-0" div="form-group" id="sms-url"
                          value="https://www.fast2sms.com/dev/bulkV2"></div>
                    </div>
                    <div class="col-4 mb-3">
                      <div class="input text"><label for="sms-api-key">Sms Api Key</label><input type="text"
                          name="sms_api_key" class="custom-select rounded-0" div="form-group" id="sms-api-key"
                          value="TUJOiyzGtxRpCSM5wu4QvFgs2onN19mAecDPZ37Y6XHWkjlE8K3VEDCRNMLb02gX1pYFqn5mo9vIke6J">
                      </div>
                    </div>
                    <div class="col-4 mb-3">
                      <div class="input text"><label for="sap-url">Sap Url</label><input type="text" name="sap_url"
                          class="custom-select rounded-0" div="form-group" id="sap-url" value="http://123.108.46.252">
                      </div>
                    </div>
                    <div class="col-4 mb-3">

                      <div class="input text"><label for="sap-segment">Sap Segment</label><input type="text"
                          name="sap_segment" class="custom-select rounded-0" div="form-group" id="sap-segment"
                          value="sap/bc/sftmob/VENDER_UPD"></div>
                    </div>
                    <div class="col-4 mb-3">
                      <div class="input text"><label for="sap-client">Sap Client</label><input type="text"
                          name="sap_client" class="custom-select rounded-0" div="form-group" id="sap-client"
                          value="300"></div>
                    </div>
                    <div class="col-4 mb-3">
                      <div class="input text"><label for="sap-port">Sap Port</label><input type="text" name="sap_port"
                          class="custom-select rounded-0" div="form-group" id="sap-port" value="8000"></div>
                    </div>
                    <div class="col-4 mb-3">
                      <div class="input text"><label for="sap-username">Sap Username</label><input type="text"
                          name="sap_username" class="custom-select rounded-0" div="form-group" id="sap-username"
                          value="vcsupport1"></div>
                    </div>
                    <div class="col-4 mb-3">

                      <div class="input text"><label for="sap-password">Sap Password</label><input type="text"
                          name="sap_password" class="custom-select rounded-0" div="form-group" id="sap-password"
                          value="aarti@123"></div>
                    </div>
                    <div class="col-md-12">
                      <button class="btn btn-info" type="submit">Submit</button>
                    </div>
                  </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-8 usermgm hide">
      <div class="card">
        <div class="card-header" style="background-color:#f5f7fd;">
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
                  <th>First Name</th>
                  <th>Last Name</th>
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
    <div class="col-8 useradd hide">
      <div class="card" style="height: 88vh;">
        <div class="card-header" style="background-color:#f5f7fd;">
          <h5 class="mb-0">USER ADMINISTRATION</h5>
        </div>
        <div class="card-body">
          <form>
            <div class="card-body">
              <div class="row">
                <div class="col-6 mt-3">
                  <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <div class="form-group">
                    <label for="">Mobile No</label>
                    <input type="number" class="form-control" id="mobileno" placeholder="Enter Mobile No">
                  </div>
                </div>
                <div class="col-6 mt-3">
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                  </div>

                </div>
                <div class="col-6 mt-3">
                  <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" id="confpassword" placeholder="Password">
                  </div>

                </div>
              </div>

              <div class="">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

            </div>


          </form>
        </div>
      </div>
    </div>
    <div class="col-4 sidecard hide">
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
                        <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false"></i>
                        <div class="dropdown-menu">
                          <a class="dropdown-item settings" id="settings" href="#" data-prd="0"><i
                              class="fas fa-cog"></i> Settings</a>
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
                        <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false"></i>
                        <div class="dropdown-menu">
                          <a class="dropdown-item settings" href="#" id="settings" data-prd="1"><i
                              class="fas fa-cog"></i> Settings</a>
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
    </div>
  </div>
</div>