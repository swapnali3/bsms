<div class="side-nav">
    <h4 class="heading"><?= __('Actions') ?></h4>
    <a href="<?= $this->Url->build('/') ?>dealer/dashboard/">dashboard <i class="fa fa-angle-double-right">
        </i></a></li>
    <div class="card-header">Deals</div>
    <ul>
    <li><a href="<?= $this->Url->build('/') ?>dealer/addproduct/buyer">Want To Buy <i class="fa fa-angle-double-right"></i></a></li>
    <li><a href="<?= $this->Url->build('/') ?>dealer/addproduct/seller">Want To Sell <i class="fa fa-angle-double-right"></i></a></li>
    </ul>


    <div class="card-header">View Product</div>
    <ul class="">
        <li><a href="#">Stock For Sell <i class="fa fa-angle-double-right">
        </i></a></li>
        <li><a href="#">Buying Requirements <i class="fa fa-angle-double-right">
        </i></a></li>
    </ul>

    <div class="card-header">Settings</div>
        <ul class="">
            <li><a href="#">Update Profile <i class="fa fa-angle-double-right">
            </i></a></li>
            <li><a href="#">Commercial Details <i class="fa fa-angle-double-right">
            </i></a></li>
            <li><a href="#">Financial Details <i class="fa fa-angle-double-right">
            </i></a></li>
            <li><a href="#">Key Decision Makers <i class="fa fa-angle-double-right"> </i></a></li>
            <li><a href="#">Change Password <i class="fa fa-angle-double-right">
            </i></a></li>
        </ul>
</div>


<!-- 

<div class="navbar navbar-default" role="navigation">
        <?php if(isset($logged_in)) : ?>
            <div class="card">
                <div class="card-header">
                Deals
                </div>
                <div class="card-body">
                    <ul>
                    <li><a href="<?= $this->Url->build('/') ?>dealer/addproduct/buyer">Want To Buy <i class="fa fa-angle-double-right">
                            </i></a></li>
                            <li><a href="<?= $this->Url->build('/') ?>dealer/addproduct/seller">Want To Sell <i class="fa fa-angle-double-right">
                            </i></a></li>
                            <li><a href="AddProductbyExcelfile.aspx">Add Product<br>
                                (By Excel File) <i class="fa fa-angle-double-right"> </i></a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar-collapse collapse sidebar-navbar-collapse">
                <ul id="AfLogin" class="nav navbar-nav">
                    <li class="active"><a href="#">Deals </a>
                        <ul class="">
                            <li><a href="<?= $this->Url->build('/') ?>dealer/addproduct/buyer">Want To Buy <i class="fa fa-angle-double-right">
                            </i></a></li>
                            <li><a href="<?= $this->Url->build('/') ?>dealer/addproduct/seller">Want To Sell <i class="fa fa-angle-double-right">
                            </i></a></li>
                            <li><a href="AddProductbyExcelfile.aspx">Add Product<br>
                                (By Excel File) <i class="fa fa-angle-double-right"> </i></a></li>
                        </ul>
                    </li>
                    <li class="active"><a href="#">View Product </a>
                        <ul class="">
                            <li><a href="SearchPage.aspx?Type=Seller">Stock For Sell <i class="fa fa-angle-double-right">
                            </i></a></li>
                            <li><a href="SearchPage.aspx?Type=Buyer">Buying Requirements <i class="fa fa-angle-double-right">
                            </i></a></li>
                        </ul>
                    </li>
                    <li class="active"><a href="#">Report </a>
                        <ul class="">
                            <li><a href="ProductStockReport.aspx">Stock <i class="fa fa-angle-double-right">
                            </i></a></li>
                        </ul>
                    </li>
                    <li class="active"><a href="#">Setting </a>
                        <ul class="">
                            <li><a href="UpdateVendorProfile.aspx">Update Profile <i class="fa fa-angle-double-right">
                            </i></a></li>
                            <li><a href="CommercialDetailsNew.aspx">Commercial Details <i class="fa fa-angle-double-right">
                            </i></a></li>
                            <li><a href="FinancialDetailsNew.aspx">Financial Details <i class="fa fa-angle-double-right">
                            </i></a></li>
                            <li><a href="OwnerKeyDecisionMakersDetailsNew.aspx">Key Decision Makers <i class="fa fa-angle-double-right"> </i></a></li>
                            <li><a href="ChangePass.aspx">Change Password <i class="fa fa-angle-double-right">
                            </i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php endif ?>
        </div>

        -->