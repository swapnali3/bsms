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
                  <th>Manager</th>
                  <th>Status</th>
                  <th>Manager</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach($buyerUsers as $buyer) :
                  //echo '<pre>'; print_r($buyer); exit;
                  ?>
                  <tr>
                  <td><?=h($buyer->first_name . ' '.$buyer->last_name)?></td>
                  <td><?=h($buyer->sap_user)?></td>
                  <td><?=h($buyer->email)?></td>
                  <td><?=h($buyer->mobile)?></td>
                  <!-- <td><?=h($buyer->manager ? $buyer->manager->first_name .' '.$buyer->manager->last_name : '-')?></td> -->
                  <td><?=h(($buyer->status) ? 'Active' : 'Inactive')?></td>
                  <td>
                      <?php echo $this->Form->control('manager_id', array('label' => false, 'id' => null,'class' => 'form-control change-manager', 'options' => $managerList, 'empty' => ' ', 'value' => $buyer->manager_id, "data-id" => $buyer->id, "data-code" => $buyer->sap_user)); ?>
                  </td>
                  <td>
                      <?php if($buyer->status == 1) : ?>
                        <?= $this->Html->link(__('De-Activate'), '#',  ["class" => 'change-buyer-status', "data-id" => $buyer->id, "user-id" => $buyer->Users['id'], "data-value" => "0", "data-group" => 2]) ?>
                        <?php else : ?>
                          <?= $this->Html->link(__('Activate'), '#',  ["class" => 'change-buyer-status', "data-id" => $buyer->id, "user-id" => $buyer->Users['id'], "data-value" => "1", "data-group" => 2]) ?>
                        <?php endif; ?>
                  </td>
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
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <tbody>
                <?php foreach($managerUsers as $manager) :?>
                  <tr>
                  <td><?=h($manager->first_name . ' '.$manager->last_name)?></td>
                  <td><?=h($manager->email)?></td>
                  <td><?=h($manager->mobile)?></td>
                  <td><?=h(($manager->status) ? 'Active' : 'Inactive')?></td>
                  <td>
                      <?php if($manager->status == 1) : ?>
                        <?= $this->Html->link(__('De-Activate'), '#',  ["class" => 'change-buyer-status', "data-id" => $manager->id, "user-id" => $manager->Users['id'], "data-value" => "0", "data-group" => 4]) ?>
                        <?php else : ?>
                          <?= $this->Html->link(__('Activate'), '#',  ["class" => 'change-buyer-status', "data-id" => $manager->id, "user-id" => $manager->Users['id'], "data-value" => "1", "data-group" => 4]) ?>
                        <?php endif; ?>
                  </td>
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

<script>


$(document).on('focusin', '.change-manager', function(){
    console.log("Saving value " + $(this).val());
    $(this).data('val', $(this).val());
}).on('change','.change-manager', function(){
    var prev = $(this).data('val');
    var current = $(this).val();
    var id = $(this).attr("data-id");
    var buyerSAPcode = $(this).attr("data-code");
    var msg = '';
    if(current == '') {
      msg = "Are you sure to remove the manager for buyer - " + buyerSAPcode;
    } else {
      msg = "Are you sure to change the Manager("+$(this).find('option:selected').text()+") for buyer - " + buyerSAPcode;
    }

    if(confirm(msg)) {
      $(this).val(current);
      
      $.ajax({
            type: "POST",
            url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/users', 'action' => 'change-buyer-manager')); ?>",
            data: {"manager_id" : current, "id":id},

            dataType: "json",
            beforeSend: function (xhr) { 
              $("#gif_loader").show(); 
              xhr.setRequestHeader(
                    'X-CSRF-Token',
                    <?= json_encode($this->request->getAttribute('csrfToken')); ?>
                );
            },
            success: function(response) {
                console.log(response);
                if (response.status == "1") {
                    Toast.fire({
                        icon: "success",
                        title: response.message,
                    });
                    setTimeout(function () { window.location.reload(); }, 1000);
                } else {
                    Toast.fire({
                        icon: "error",
                        title: response.message,
                    });
                }
            },
            complete: function () { $("#gif_loader").hide(); }
        });
    }  else {
      $(this).val(prev);
    }
    console.log("Prev value " + prev);
    console.log("New value " + current);
});


   $('.change-buyer-status').click(function() {
      var userId = $(this).attr("user-id");
      var id = $(this).attr("data-id");
      var value = $(this).attr("data-value");
      var group = $(this).attr("data-group");
      var msg = (value == "1") ? "Activate" : "De-activate" ;
      if(confirm("Are you sure you want to " + msg + "?")) {

        $.ajax({
            type: "POST",
            url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/users', 'action' => 'change-buyer-status')); ?>/" + id,
            data: {"id" : userId, "status":value, "group":group, "table_id":id},

            dataType: "json",
            beforeSend: function (xhr) { 
              $("#gif_loader").show(); 
              xhr.setRequestHeader(
                    'X-CSRF-Token',
                    <?= json_encode($this->request->getAttribute('csrfToken')); ?>
                );
            },
            success: function(response) {
                console.log(response);
                if (response.status == "1") {
                    Toast.fire({
                        icon: "success",
                        title: response.message,
                    });
                    setTimeout(function () { window.location.reload(); }, 1000);
                } else {
                    Toast.fire({
                        icon: "error",
                        title: response.message,
                    });
                }
            },
            complete: function () { $("#gif_loader").hide(); }
        });
      }
   });
   
</script>