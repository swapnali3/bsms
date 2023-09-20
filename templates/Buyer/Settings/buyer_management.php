<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting[]|\Cake\Collection\CollectionInterface $settings
 */
?>


<div class="settings index content">
    
    <div class="card">
        <div class="card-header d-flex p-2 justify-content-between">
            <div class="col-md-6">
            <div class="d-flex">
            <input type="search" placeholder="Search..." class="form-control search">
            </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <button class="btn bg-gradient-button mr-2 mb-0">CREATE</button>
                    <button class="btn bg-gradient-button mb-0">EXPORT TO CSV</button>
                </div>
            </div>
        </div>
        
        <div class="card-body p-2">
            <div class="table-responssive">
                <table class="table table-bordered users-tbl mb-0">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Employee Code</th>
                            <th>Email</th>
                            <th class="stus">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Test Name</td>
                            <td>ABC456</td>
                            <td>test@gmail.com</td>
                            <td>
                           <div class="toggle-btn">
                           <input class='input-switch' type="checkbox" id="demo"/>
                            <label class="label-switch" for="demo"></label>
                            <span class="info-text"></span>
                           </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Test Name</td>
                            <td>ABC456</td>
                            <td>test@gmail.com</td>
                            <td>
                           <div class="toggle-btn">
                           <input class='input-switch' type="checkbox" id="demo1"/>
                            <label class="label-switch" for="demo1"></label>
                            <span class="info-text"></span>
                           </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Test Name</td>
                            <td>ABC456</td>
                            <td>test@gmail.com</td>
                            <td>
                           <div class="toggle-btn">
                           <input class='input-switch' type="checkbox" id="demo2"/>
                            <label class="label-switch" for="demo2"></label>
                            <span class="info-text"></span>
                           </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Test Name</td>
                            <td>ABC456</td>
                            <td>test@gmail.com</td>
                            <td>
                           <div class="toggle-btn">
                           <input class='input-switch' type="checkbox" id="demo3"/>
                            <label class="label-switch" for="demo3"></label>
                            <span class="info-text"></span>
                           </div>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>

    </div>
    <div class="table-responsive">
    
    </div>
</div>
