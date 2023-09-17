<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\Cake\Collection\CollectionInterface $adminUsers
 */


?>

<?= $this->Html->css('admincss') ?>
<div class="content admin-console">
  <div class="row">
    <div class="col-12 useradd ">
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
