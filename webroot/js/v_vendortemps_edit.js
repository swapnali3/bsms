$(function () {
    bsCustomFileInput.init();
});

$("#editAdress").click(function () {
    $("#modal-lg").modal("show");
});

var branchOfficeCounter = 0;

function addBranchOfficeRow() {
    $(".card").removeClass("highlight");

    var newRow = `<hr style="border-top: 1px solid rgb(0 0 0 / 10%);">
    <div class="card highlight p-0"><div class="row p-3">
    <h6 class="mb-0">Branch Office</h6>
    <div class="col-4 col-md-4">
        <div class="form-group">
            <label for="register_office_country">Country</label>
            <select name="register_office_country"
                id="register_office_country"
                class="selectpicker form-control form-control-sm my-select"
                data-live-search="true" title="Select Country">
                <?php foreach ($countries as $country): ?>
                <option value="<?php echo $country; ?>">
                    <?php echo $country; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-4 col-md-4">
        <div class="form-group">
            <label for="register_office_state">State</label>
            <select name="register_office_state"
                id="register_office_state"
                class="selectpicker form-control form-control-sm my-select"
                data-live-search="true" title="Select State">
                <?php foreach ($states as $state): ?>
                <option value="<?php echo $state; ?>">
                    <?php echo $state; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-4 col-md-4">
        <div class="form-group">
            <label for="">City</label>
            <input type="text" class="form-control form-control-sm"
                name="">
        </div>
    </div>

    <div class="col-6  col-md-6">
        <div class="form-group">
            <label for="address1">Address 1</label>
            <input type="text" class="form-control form-control-sm"
                name="">
        </div>
    </div>
    <div class="col-6  col-md-6">
        <div class="form-group">
            <label for="address2">Address 2</label>
            <input type="text" class="form-control form-control-sm"
                name="branchfactory[branchoffice][0]['address2']">
        </div>
    </div>
    <div class="col-4  col-md-4">
        <div class="form-group">
            <label for="pincode">Pincode</label>
            <input type="number" class="form-control form-control-sm"
                name="branchfactory[branchoffice][0]['pincode']">
        </div>
    </div>

    <div class="col-4  col-md-4">
        <div class="form-group">
            <label for="id_telephone">Telephone</label>
            <input type="text" id="" name=""
                class="form-control form-control-sm">
        </div>
    </div>
    <div class="col-3 col-md-3">
        <div class="form-group">
            <label for="faxno">Fax No</label>
            <input type="number" class="form-control form-control-sm"
                name="branchfactory[branchoffice][0]['faxno']">
        </div>
    </div>
    <div class="col-1 col-md-1 mt-4">
     <span class="badge redbadge delete-branch" data-toggle="tooltip" data-placement="right" title="Delete">
        <i class="fas fa-trash"></i>
     </span>
    </div>
</div>
</div>`;
    $(".address-card").append(newRow);
}

$("#id_branch_office_add").on("click", function () {
    branchOfficeCounter++;
    addBranchOfficeRow();
});

$(document).on("click", ".delete-branch", function () {
    $(this).closest(".card").remove();
});

// ===================================factory add==================================

var factoryOfficeCounter = 0;

function addFactoryOfficeRow() {
    $(".card").removeClass("highlight");

    var newRow = `<hr style="border-top: 1px solid rgb(0 0 0 / 10%);"><div class="card cadrs highlight p-0"><div class="row p-3">
    <div class="col-4 col-md-4">
        <div class="form-group">
            <label for="register_office_country">Country</label>
            <select name="register_office_country"
                id="register_office_country"
                class="selectpicker form-control form-control-sm my-select"
                data-live-search="true" title="Select Country">
                <?php foreach ($countries as $country): ?>
                <option value="<?php echo $country; ?>">
                    <?php echo $country; ?>
                </option>
                <?php endforeach; ?>
            </select>

        </div>
    </div>

    <div class="col-4 col-md-4">
        <div class="form-group">
            <label for="register_office_state">State</label>
            <select name="register_office_state"
                id="register_office_state"
                class="selectpicker form-control form-control-sm my-select"
                data-live-search="true" title="Select State">
                <?php foreach ($states as $state): ?>
                <option value="<?php echo $state; ?>">
                    <?php echo $state; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-4 col-md-4">
      <div class="form-group">
        <label for="">City</label>
        <input type="text" class="form-control form-control-sm"
            name="">
     </div>
   </div>

    <div class="col-6  col-md-6">
        <div class="form-group">
            <label for="address1">Address 1</label>
            <input type="text" class="form-control form-control-sm"
                name="branchfactory[branchoffice][0]['address1']">
        </div>
    </div>
    <div class="col-6  col-md-6">
        <div class="form-group">
            <label for="address2">Address 2</label>
            <input type="text" class="form-control form-control-sm"
                name="branchfactory[branchoffice][0]['address2']">
        </div>
    </div>
    <div class="col-4  col-md-4">
        <div class="form-group">
            <label for="pincode">Pincode</label>
            <input type="number" class="form-control form-control-sm"
                name="branchfactory[branchoffice][0]['pincode']">
        </div>
    </div>

    <div class="col-4  col-md-4">
        <div class="form-group">
            <label for="id_telephone">Telephone</label>
            <input type="text" id="" name=""
                class="form-control form-control-sm">
        </div>
    </div>
    <div class="col-3 col-md-3">
        <div class="form-group">
            <label for="faxno">Fax No</label>
            <input type="number" class="form-control form-control-sm"
                name="branchfactory[branchoffice][0]['faxno']">
        </div>
    </div>

</div>

<div class="row  m-2">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="row m-1">
                <div class="col-3">
                    <lable>Installed Capacity</lable>
                </div>
                <div class="col-3">
                    <input type="text"
                        class="form-control form-control-sm" name=""
                        id="">
                </div>
                <div class="col-3">
                    <div class="custom-file">
                        <input name="" type="file" accept=".pdf"
                            class="custom-file-input">
                        <label class="custom-file-label">Choose
                            File</label>
                    </div>
                </div>
            </div>


            <div class="row m-1">
                <div class="col-3">
                    <lable>Power Avialable</lable>
                </div>
                <div class="col-3">
                    <input type="text"
                        class="form-control form-control-sm" name=""
                        id="">
                </div>
                <div class="col-3">
                    <div class="custom-file">
                        <input name="" type="file" accept=".pdf"
                            class="custom-file-input">
                        <label class="custom-file-label">Choose
                            File</label>
                    </div>
                </div>
            </div>


            <div class="row m-1">
                <div class="col-3">
                    <lable>Machinery Avialable</lable>
                </div>
                <div class="col-3">
                    <input type="text"
                        class="form-control form-control-sm" name=""
                        id="">
                </div>
                <div class="col-3">
                    <div class="custom-file">
                        <input name="" type="file" accept=".pdf"
                            class="custom-file-input">
                        <label class="custom-file-label">Choose
                            File</label>
                    </div>
                </div>
              
            </div>

            <div class="row m-1">
                <div class="col-3">
                    <lable>Raw Material Avi. and Source</lable>
                </div>
                <div class="col-3">
                    <input type="text"
                        class="form-control form-control-sm" name=""
                        id="">
                </div>
                <div class="col-3">
                    <div class="custom-file">
                        <input name="" type="file" accept=".pdf"
                            class="custom-file-input">
                        <label class="custom-file-label">Choose
                            File</label>
                    </div>
                </div>
                <div class="col-3">
                   <span class="badge redbadge delete-factory-branch" data-toggle="tooltip" data-placement="right" title="Delete">
                      <i class="fas fa-trash"></i>
                   </span>
                </div>
              
            </div>
        </div>
    </div>
</div>
</div>`;
    $(".factory-office-card").append(newRow);
}

$("#id_factory_office_add").on("click", function () {
    branchOfficeCounter++;
    addFactoryOfficeRow();
});

$(document).on("click", ".delete-factory-branch", function () {
    $(this).closest(".cadrs").remove();
});



// ===================================factory add==================================

var addContactCounter = 0;

function addContactOfficeRow() {
    $(".card").removeClass("highlight");

    var newRow = `<hr style="border-top: 1px solid rgb(0 0 0 / 10%);"><div class="card highlight p-0">   <div class="row">
        <div class="col-12 mt-1">
            <label>Name:</label>
            <input type="text" name="contact_person[alternate][name]"
                class="form-control">
        </div>
       
    <div class="col-4 col-md-4">
      <div class="form-group">
        <label for="">City</label>
        <input type="text" class="form-control form-control-sm"
            name="">
     </div>
   </div>
   <div class="col-6  col-md-6">
       <div class="form-group">
           <label for="address1">Address 1</label>
           <input type="text" class="form-control form-control-sm"
               name="">
       </div>
   </div>
   <div class="col-6  col-md-6">
       <div class="form-group">
           <label for="address2">Address 2</label>
           <input type="text" class="form-control form-control-sm"
               name="">
       </div>
   </div>
   <div class="col-4  col-md-4">
       <div class="form-group">
           <label for="pincode">Pincode</label>
           <input type="number" class="form-control form-control-sm"
               name="">
       </div>
   </div>
   <div class="col-4 col-md-4">
   <div class="form-group">
       <label for="register_office_country">Country</label>
       <select name="register_office_country"
           id="register_office_country"
           class="selectpicker form-control form-control-sm my-select"
           data-live-search="true" title="Select Country">
           <?php foreach ($countries as $country): ?>
           <option value="<?php echo $country; ?>">
               <?php echo $country; ?>
           </option>
           <?php endforeach; ?>
       </select>

   </div>
</div>

   <div class="col-4 col-md-4">
       <div class="form-group">
           <label for="register_office_state">State</label>
           <select name="register_office_state"
               id="register_office_state"
               class="selectpicker form-control form-control-sm my-select"
               data-live-search="true" title="Select State">
               <?php foreach ($states as $state): ?>
               <option value="<?php echo $state; ?>">
                   <?php echo $state; ?>
               </option>
               <?php endforeach; ?>
           </select>
       </div>
   </div>

   <div class="col-4 col-md-4 mt-4">
   <span class="badge redbadge delete-contact-view" data-toggle="tooltip" data-placement="right" title="Delete">
      <i class="fas fa-trash"></i>
   </span>
</div>

</div>
</div>`;
    $(".customer-card").append(newRow);
}

$("#cuntact_person_add").on("click", function () {
    addContactCounter++;
    addContactOfficeRow();
});

$(document).on("click", ".delete-contact-view", function () {
    $(this).closest(".card").remove();
});


// ================================customer Adress ================================
var customerAddressCounter = 0;

function customerAddressOfficeRow() {
    $(".card").removeClass("highlight");

    var newRow = `<hr style="border-top: 1px solid rgb(0 0 0 / 10%);">
    <div class="card highlight p-0"><div class="row p-3">
    <h6 class="mb-0">Branch Office</h6>
    <div class="col-4 col-md-4">
        <div class="form-group">
            <label for="register_office_country">Country</label>
            <select name="register_office_country"
                id="register_office_country"
                class="selectpicker form-control form-control-sm my-select"
                data-live-search="true" title="Select Country">
                <?php foreach ($countries as $country): ?>
                <option value="<?php echo $country; ?>">
                    <?php echo $country; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-4 col-md-4">
        <div class="form-group">
            <label for="register_office_state">State</label>
            <select name="register_office_state"
                id="register_office_state"
                class="selectpicker form-control form-control-sm my-select"
                data-live-search="true" title="Select State">
                <?php foreach ($states as $state): ?>
                <option value="<?php echo $state; ?>">
                    <?php echo $state; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-4 col-md-4">
        <div class="form-group">
            <label for="">City</label>
            <input type="text" class="form-control form-control-sm"
                name="">
        </div>
    </div>

    <div class="col-6  col-md-6">
        <div class="form-group">
            <label for="address1">Address 1</label>
            <input type="text" class="form-control form-control-sm"
                name="">
        </div>
    </div>
    <div class="col-6  col-md-6">
        <div class="form-group">
            <label for="address2">Address 2</label>
            <input type="text" class="form-control form-control-sm"
                name="branchfactory[branchoffice][0]['address2']">
        </div>
    </div>
    <div class="col-4  col-md-4">
        <div class="form-group">
            <label for="pincode">Pincode</label>
            <input type="number" class="form-control form-control-sm"
                name="branchfactory[branchoffice][0]['pincode']">
        </div>
    </div>

    <div class="col-4  col-md-4">
        <div class="form-group">
            <label for="id_telephone">Telephone</label>
            <input type="text" id="" name=""
                class="form-control form-control-sm">
        </div>
    </div>
    <div class="col-3 col-md-3">
        <div class="form-group">
            <label for="faxno">Fax No</label>
            <input type="number" class="form-control form-control-sm"
                name="branchfactory[branchoffice][0]['faxno']">
        </div>
    </div>
    <div class="col-1 col-md-1 mt-4">
     <span class="badge redbadge delete-branch" data-toggle="tooltip" data-placement="right" title="Delete">
        <i class="fas fa-trash"></i>
     </span>
    </div>
</div>
</div>`;
    $(".customer-address").append(newRow);
}

$("#id_customer_address_add").on("click", function () {
    customerAddressCounter++;
    customerAddressOfficeRow();
});

$(document).on("click", ".delete-customer_address", function () {
    $(this).closest(".card").remove();
});
// ================================same as adreess ================================

$("#checkboxPrimary1").on("change", function () {
    if ($(this).is(":checked")) {
        $("#register_office_county").val($("#id_country").val());
        $("#register_office_stat").val($("#id_state").val());

        $("#register_office_address1").val($("id_address1").val());
        $("#register_office_address2").val($("#id_address2").val());
        $("#register_office_pincode").val($("#id_pincode").val());
        $("#register_office_city").val($("#id_city").val());

        $("#register_office_telno").val($("#id_telephone").val());
        $("#register_office_faxno").val($("id_faxno").val());
    }
});

$(".fully_manufactured_radio").on("change", function () {
    if ($(this).val() === "no") {
        $(".sub-contractors-info").show();
    } else {
        $(".sub-contractors-info").hide();
    }
});

// ============================ Production facility js =========================

$('input[name="productionFacility[lab_facilities]"]').on("change", function () {
    if ($(this).val() === "yes") {
        $(".lab_facilities-info").show();
    } else {
        $(".lab_facilities-info").hide();
    }
});
