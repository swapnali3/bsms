<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UsersAcl> $usersAcl
 */
?>
<style>

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?= $this->Html->css('admin-style') ?>
<div class="role-mgmt-setting">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Role Managment</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="top-head">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="uname" placeholder="Enter name">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="name" class="form-label">Role</label>
                                        <input type="text" class="form-control" id="uname" placeholder="Enter role">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="main-tbl-grid">
                               
                                    <table class="table table-bordered mb-0 tbl-head"
                                        style="background-color:#527195;color:#fff">
                                        <tbody>
                                            <tr>
                                                <!--Top level heading row-->
                                                <td style="width:20%"> </td>
                                                <!-- <td style="width:20%"><input type="checkbox" id="" title="Select All">
                                                </td> -->
                                                <td style="width:20%"><input type="checkbox" id=""> View</td>
                                                <td style="width:20%"><input type="checkbox" id=""> Create</td>
                                                <td style="width:20%"><input type="checkbox" id=""> Update</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                    <span class="tbl-date">
                                        <table class="table table-bordered bg-light mb-0">
                                            <!----------------Module lavel heading------------------------------------->
                                            <tbody>
                                                <tr>
                                                    <td style="width:20%;cursor: pointer;" id="showDiv"> <span class="accordion" ><i
                                                                class="fas fa-plus" ></i> Vendor</span></td>
                                                    
                                                    <td style="width:20%"><input type="checkbox"
                                                            class="view-chk"></td>
                                                    <td style="width:20%"><input type="checkbox"
                                                            class="create-chk"></td>
                                                    <td style="width:20%"><input type="checkbox"
                                                            class="update-chk"></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </span>
                                    <div class="panel" id="tbl-data-accordon">
                                        <table class="table ">
                                            <tbody>
                                                <tr>
                                                    <td style="width:20%"><span> PO</span></td>
                                                    
                                                     
                                                    <td style="width:20%"><input type="checkbox"
                                                            class="view-chk"></td>
                                                    <td style="width:20%"><input type="checkbox"
                                                            class="create-chk"></td>
                                                    <td style="width:20%"><input type="checkbox"
                                                            class="update-chk"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%"><span>Transit</span></td>
                                                    
                                                     
                                                    <td style="width:20%"><input type="checkbox"
                                                            class="view-chk"></td>
                                                    <td style="width:20%"><input type="checkbox"
                                                            class="create-chk"></td>
                                                    <td style="width:20%"><input type="checkbox"
                                                            class="update-chk"></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    
                               
                            </div>
                           
                            <div class="submit-btn mt-2">
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#showDiv").click(function() {
            $("#tbl-data-accordon").toggle();
            $(this).find("i").toggleClass("fas fa-plus fas fa-minus");
        });
        $(".view-chk").click(function() {
            $(".view-chk").not(this).prop('checked', this.checked);
        });
        $("#tbl-data-accordon").hide(); // Hide the "vendor-tab" div initially
    });
</script>