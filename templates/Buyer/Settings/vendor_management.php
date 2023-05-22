<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting[]|\Cake\Collection\CollectionInterface $settings
 */
?>
<!-- <div class="settings index content">
    
    <h3><?= __('Setting') ?></h3>
    <div class="table-responsive">
        Vendor Management
    </div>
</div> -->
<?= $this->Html->css('custom') ?>
<style>
    .search-fm {
        color: #555;
        display: flex;
        padding: 2px;
        border: 1px solid #8c8c8c;
        border-radius: 30px;
        margin: 0 0 0px;
        margin-left: 10px;
        background-color: #fff;
    }

    .search-fm input[type="search"] {
        border: none;
        background: transparent;
        margin: 0;
        padding: 7px 8px;
        font-size: 14px;
        color: inherit;
        border: 1px solid transparent;
        border-radius: inherit;
    }

    .search-fm input[type="search"]::placeholder {
        color: #bbb;
    }

    .search-fm button[type="submit"] {
        text-indent: -999px;
        overflow: hidden;
        width: 40px;
        padding: 0;
        margin: 0;
        border: 1px solid transparent;
        border-radius: inherit;
        background: transparent url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'%3E%3C/path%3E%3C/svg%3E") no-repeat center;
        cursor: pointer;
        opacity: 0.7;
    }

    .search-fm button[type="submit"]:hover {
        opacity: 1;
    }

    .search-fm button[type="submit"]:focus,
    .search-fm input[type="search"]:focus {
        box-shadow: 0 0 3px 0 #1183d6;
        border-color: #1183d6;
        outline: none;
    }

    /* toggle */
    .toggle-btn .input-switch {
        display: none;
    }

    .toggle-btn .label-switch {
        display: inline-block;
        position: relative;
    }

    .toggle-btn .label-switch::before,
    .toggle-btn .label-switch::after {
        content: "";
        display: inline-block;
        cursor: pointer;
        transition: all 0.5s;
    }

    .toggle-btn .label-switch::before {
        width: 3em;
        height: 1em;
        border: 1px solid #757575;
        border-radius: 4em;
        background: #888888;
    }

    .toggle-btn .label-switch::after {
        position: absolute;
        left: 0;
        top: -20%;
        width: 1.5em;
        height: 1.5em;
        border: 1px solid #757575;
        border-radius: 4em;
        background: #ffffff;
    }

    .input-switch:checked~.label-switch::before {
        background: #00a900;
        border-color: #008e00;
    }

    .input-switch:checked~.label-switch::after {
        left: unset;
        right: 0;
        background: #00ce00;
        border-color: #009a00;
    }

    .toggle-btn .info-text {
        display: inline-block;
    }

    .toggle-btn .info-text::before {
        content: "In-active";
    }

    .input-switch:checked~.info-text::before {
        content: "Active";
    }

   
</style>

<div class="settings index content">
    <div class="card">
        <div class="card-header d-flex pb-2 pt-2" style="background-color:#f5f7fd">
            <div class="col-md-8">
                <div class="d-flex">
                    <input type="search" placeholder="Search..." class="form-control search">
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-custom mr-2 mb-0">CREATE</button>
                    <button class="btn btn-custom mb-0">EXPORT TO CSV</button>
                </div>
            </div>
        </div>

        <div class="card-body p-2">
            <div class="table-responssive">
                <table class="table table-bordered users-tbl mb-0">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Vendor Code</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Test Name</td>
                            <td>ABC456</td>
                            <td>test@gmail.com</td>
                            <td style="width:15%;">
                                <div class="toggle-btn">
                                    <input class='input-switch' type="checkbox" id="demo" />
                                    <label class="label-switch" for="demo"></label>
                                    <span class="info-text"></span>
                                </div>
                            </td>
                            <td><?= $this->Html->link(__('Supplier Capacity'), ['controller' => '/settings', 'action' => 'supplier-capacity'], ['class' => "nav-link", 'escape' => false]) ?></td>
                        </tr>
                        <tr>
                            <td>Test Name</td>
                            <td>ABC456</td>
                            <td>test@gmail.com</td>
                            <td style="width:15%;">
                                <div class="toggle-btn">
                                    <input class='input-switch' type="checkbox" id="demo1" />
                                    <label class="label-switch" for="demo1"></label>
                                    <span class="info-text"></span>
                                </div>
                            </td>
                            <td><?= $this->Html->link(__('Supplier Capacity'), ['controller' => '/settings', 'action' => 'supplier-capacity'], ['class' => "nav-link", 'escape' => false]) ?></td>
                        </tr>
                        <tr>
                            <td>Test Name</td>
                            <td>ABC456</td>
                            <td>test@gmail.com</td>
                            <td style="width:15%;">
                                <div class="toggle-btn">
                                    <input class='input-switch' type="checkbox" id="demo2" />
                                    <label class="label-switch" for="demo2"></label>
                                    <span class="info-text"></span>
                                </div>
                            </td>
                            <td><?= $this->Html->link(__('Supplier Capacity'), ['controller' => '/settings', 'action' => 'supplier-capacity'], ['class' => "nav-link", 'escape' => false]) ?></td>
                        </tr>
                        <tr>
                            <td>Test Name</td>
                            <td>ABC456</td>
                            <td>test@gmail.com</td>
                            <td style="width:15%;">
                                <div class="toggle-btn">
                                    <input class='input-switch' type="checkbox" id="demo3" />
                                    <label class="label-switch" for="demo3"></label>
                                    <span class="info-text"></span>
                                </div>
                            </td>
                            <td><?= $this->Html->link(__('Supplier Capacity'), ['controller' => '/settings', 'action' => 'supplier-capacity'], ['class' => "nav-link", 'escape' => false]) ?></td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>