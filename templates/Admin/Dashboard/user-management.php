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
  .left-data{
    width: 20%;
  }
  .right-data{
    width: 90%;
  }
</style>
<?= $this->Html->css('admin-style') ?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
    <div class="card">
      <div class="card-header">
          <h5>User Management</h5>
      </div>
      <div class="card-body pt-2">
        <!-- <div class="actionbtn text-right">
          <button class="btn btn-custom mb-2">Add New</button>
        </div> -->
         <div class="d-flex">
          <div class="left-data border p-3">
            <div class="search-bar">
              <input type="text" class="form-control" placeholder="search users....">
            </div>
            <ul class="p-0 usernm-listing" style="list-style:none;">
              <li class="unmli unmClick_vendor">Snehal Vendor</li>
              <li class="unmli unmClick_buyer">Snehal Buyer</li>
              <!-- <li class="unmClick">Snehal</li>
              <li class="unmClick">Snehal</li>
              <li class="unmClick">Snehal Vendor</li>
              <li class="unmClick">Snehal Buyer</li>
              <li class="unmClick">Snehal</li>
              <li class="unmClick">Snehal</li>
              <li class="unmClick">Snehal Vendor</li>
              <li class="unmClick">Snehal Buyer</li>
              <li class="unmClick">Snehal</li>
              <li class="unmClick">Snehal</li>
              <li class="unmClick">Snehal Vendor</li>
              <li class="unmClick">Snehal Buyer</li>
              <li class="unmClick">Snehal</li>
              <li class="unmClick">Snehal</li>
              <li class="unmClick">Snehal Vendor</li>
              <li class="unmClick">Snehal Buyer</li>
              <li class="unmClick">Snehal</li>
              <li class="unmClick">Snehal</li> -->
            </ul>
          </div>
          <div class="right-data border p-3">
            <div class="footer-buttom">
              <div class="row">
                <div class="col-md-12 text-right">
                  <button type="button" class="btn btn-custom-2">Add New</button>
                  <button type="button" class="btn btn-custom">Edit</button>
                </div>
              </div>
            </div>
            <div class="main-data unmClickData_buyer">
                <div class="row">
                  <div class="col-md-6">
                    <h6>Name: <b>Venu Chippa</b></h6>
                    <h6>Email: <B>venu@fts-pl.com</B></h6>
                    <h6>Mobile No: <B>9855664433</B></h6>
                    <h6>Status: <B>Active</B></h6>
                    <h6>Address: <B>Mira Road</B></h6>
                    <h6>City: <B>Mumbai</B></h6>
                    <h6>State: <B>MH</B></h6>
                    <h6>Pincode: <B>400708</B></h6>
                    <h6>Country: <B>India</B></h6>
                    <h6>PAN NO: <B>44556B56</B></h6>
                  </div>
                 
                </div>
            </div>
            <div class="main-data unmClickData_vendor">
                <div class="row">
                  <div class="col-md-6">
                    <h6>Name: <b>Venu Chippa</b></h6>
                    <h6>Email: <b>venu@fts-pl.com</b></h6>
                    <h6>Mobile No: <b>9855664433</b></h6>
                    <h6>SAP Vendor Code : <b>000002</b></h6>
                    <h6>Status: <B>Approved</B></h6>
                    <h6>Address 1: <B>Mira Road</B></h6>
                    <h6>Address 2: <B>Mira Road</B></h6>
                    <h6>City: <B>Mumbai</B></h6>
                    <h6>State: <B>MH</B></h6>
                    <h6>Pincode: <B>400708</B></h6>
                    <h6>Country: <B>India</B></h6>
                    <h6>PAN NO: <B>44556B56</B></h6>
                    <h6>CIN NO: <B>44556B56</B></h6>
                    <h6>GST NO: <B>44556B56</B></h6>
                    <h6>TAN NO: <B>44556B56</B></h6>
                  </div>
                  <div class="col-md-6">
                    <h6>Purchasing Organization	: <b>Pur. Orgzn 1</b></h6>
                    <h6>Schema Group	: <b>Schema Group 1</b></h6>
                    <h6>Account Group	: <b>Account Group 1</b></h6>
                    <h6>Contact Person : <B>Ram</B></h6>
                    <h6>Contact Mobile : <B>9876564423</B></h6>
                    <h6>Contact Email Id : <b>use@test.com</b></h6>
                    <h6>Contact Department: <B>department</B></h6>
                    <h6>Contact Designation	: <B>Manger</B></h6>
                    <h6>Payment Term	: <B>0001</B></h6>
                    <h6>Order Currency	: <B>INR</B></h6>
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
<script>
 $(document).ready(function(){
  $(".unmClickData_vendor").show();
  $(".unmClickData_buyer").hide();
  
      // $(".main-data").hide();
      
      $(".unmClick_buyer").click(function(){
        $(".main-data").hide(); // Hide all main-data elements
        $(".unmClickData_buyer").show(); // Show buyer data
      });
      
      $(".unmClick_vendor").click(function(){
        $(".main-data").hide(); // Hide all main-data elements
        $(".unmClickData_vendor").show(); // Show vendor data
      });
    });
</script>