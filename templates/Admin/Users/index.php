<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\Cake\Collection\CollectionInterface $adminUsers
 */


?>

<?= $this->Html->css('admincss') ?>
<div class="content admin-console">
  <div class="row">
    <div class="col-12 usermgm ">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Buyer List</h5>
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
                  <th>SAP User</th>
                  <th>Username</th>
                  <th>Mobile No</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($buyerUsers as $buyer) :?>
                  <tr>
                  <td><?=h($buyer->first_name . ' '.$buyer->last_name)?></td>
                  <td><?=h($buyer->Buyers['sap_user'])?></td>
                  <td><?=h($buyer->username)?></td>
                  <td><?=h($buyer->mobile)?></td>
                  <td><?=h($buyer->user_group->name)?></td>
                </tr>
                  <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Manager List</h5>
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
              <tbody>
              <tbody>
                <?php foreach($managerUsers as $manager) :?>
                  <tr>
                  <td><?=h($manager->first_name . ' '.$manager->last_name)?></td>
                  <td><?=h($manager->username)?></td>
                  <td><?=h($manager->mobile)?></td>
                  <td><?=h($manager->user_group->name)?></td>
                </tr>
                  <?php endforeach;?>
              </tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>