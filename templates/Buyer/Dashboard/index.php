<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\ ake\Collection\CollectionInterface $adminUsers
 */
?>
<style>
  .hide {
    display: none;
  }
</style>
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css') ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js') ?>
<?= $this->Html->css('bootstrap-multiselect') ?>
<?= $this->Html->script('bootstrap-multiselect') ?>
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('custom') ?>

<style>
  #chartdiv {
    width: 100%;
    height: 300px;
  }

  #chartdiv2 {
    width: 100%;
    height: 300px;
  }

  #chartdiv3 {
    width: 100%;
    height: 300px;
  }

  #chartdiv4 {
    width: 100%;
    height: 300px;
  }
</style>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<?= $this->Form->create(null, ['id' => 'addvendorform']) ?>
<div class="row buyer-dash">
  <div class="col-sm-12 col-lg-4">
    <div class="card card_box_shadow">
      <div class="card-header">
        <h1 class="card-title">Vendors</h1>
      </div>
      <div class="card-body py-0">
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
              <i class="fas fa-th-large text-info"></i>
            </div>
            <div class="product-info">
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>"
                class="product-title">Total</a>
              <span class="p-value">
                <?= h($vendorDashboardCount['total']) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="fas fa-user-plus text-danger onboarding_icon"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>"
                class="product-title">Onboarding
              </a>
              <span class="p-value">
                <?= h(isset($vendorDashboardCount[0]) ? $vendorDashboardCount[0] : 0) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="fas fa-hourglass-half text-danger"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>"
                class="product-title">Approval Pending
              </a>
              <span class="p-value">
                <?= h(isset($vendorDashboardCount[1]) ? $vendorDashboardCount[1] : 0) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="far fa-check-square text-success"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>"
                class="product-title">Approved
              </a>
              <span class="p-value">
                <?= h(isset($vendorDashboardCount[3]) ? $vendorDashboardCount[3] : 0) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="fas fa-share-square text-warning"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'vendor-temps']) ?>" class="product-title">Sent to
                SAP
              </a>
              <span class="p-value">
                <?= h(isset($vendorDashboardCount[2]) ? $vendorDashboardCount[2] : 0) ?>
              </span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-4">
    <div class="card card_box_shadow" style="min-height: 93%;">
      <div class="card-header">
        <h3 class="card-title">Purchase Orders</h3>
      </div>
      <div class="card-body py-0" style="min-height: 100%;">
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
              <i class="fas fa-th-large text-info"></i>
            </div>
            <div class="product-info">
              <a href="<?php echo $this->Url->build([ 'controller' => 'purchase-orders', 'action'=>'view']) ?>"
                class="product-title">Total</a>
              <span class="p-value">
                <?= h($totalPos) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="far fa-calendar-check text-success"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'purchase-orders', 'action'=>'view']) ?>"
                class="product-title">Completed</a>
              <span class="p-value">
                <?= h($poCompleteCount) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="far fa-clock text-danger"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'purchase-orders', 'action'=>'view']) ?>"
                class="product-title">Pending</a>
              <span class="p-value">
                <?= ($totalPos - $poCompleteCount ) ?>
              </span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-4">
    <div class="card card_box_shadow" style="min-height: 93%;">
      <div class="card-header">
        <h3 class="card-title">ASN</h3>
      </div>
      <div class="card-body py-0">
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
              <i class="fas fa-th-large text-info"></i>
            </div>
            <div class="product-info">
              <a href="#" class="product-title">Total</a>
              <span class="p-value">
                <?= h(isset($asnDashboardCount['total']) ? $asnDashboardCount['total'] : 0) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="far fa-calendar-check text-warning intransit_icon"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="<?php echo $this->Url->build([ 'controller' => 'delivery-details']) ?>"
                class="product-title">Intransit</a>
              <span class="p-value">
                <?= h(isset($asnDashboardCount['2']) ? $asnDashboardCount['2'] : 0) ?>
              </span>
            </div>
          </li>
          <li class="item">
            <div class="product-img">
              <i class="fas fa-truck text-info received_icon"></i>
            </div>
            <div class="product-info" style="font-size: smaller;">
              <a href="#" class="product-title">Received</a>
              <span class="p-value">
                <?= h(isset($asnDashboardCount['3']) ? $asnDashboardCount['3'] : 0) ?>
              </span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-6">
    <div class="card card-default card_box_shadow">
      <div class="card-header">Vendor By Order Value</div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div id="chartdiv"></div>
          </div>
          <div class="col-3">
            <select name="segment5[]" id="id_segment5" class="chosen segment" multiple="multiple" style="width: 100%;">
              <?php if (isset($segment)) : ?>
              <?php foreach ($segment as $mat) : ?>
              <option value="<?= h($mat->segment) ?>" data-select="<?= h($mat->segment) ?>">
                <?= h($mat->segment) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-3">
            <select name="type5[]" id="id_type5" class="chosen types" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendortype)) : ?>
              <?php foreach ($vendortype as $mat) : ?>
              <option value="<?= h($mat->id) ?>" data-select="<?= h($mat->name) ?>">
                <?= h($mat->code) ?> -
                <?= h($mat->name) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-5">
            <select name="vendor5[]" id="id_vendor5" class="chosen vendor" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendor)) : ?>
              <?php foreach ($vendor as $mat) : ?>
              <option value="<?= h($mat->sap_vendor_code) ?>" data-select="<?= h($mat->sap_vendor_code) ?>">
                <?= h($mat->sap_vendor_code) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1">
            <button type="button" class="btn bg-gradient-info mydash">
            <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-6">
    <div class="card card-default card_box_shadow">
      <div class="card-header">Top 5 Materials by quantity</div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div id="chartdiv2"></div>
          </div>
          <div class="col-3">
            <select name="segment6[]" id="id_segment6" class="chosen segment" multiple="multiple" style="width: 100%;">
              <?php if (isset($segment)) : ?>
              <?php foreach ($segment as $mat) : ?>
              <option value="<?= h($mat->segment) ?>" data-select="<?= h($mat->segment) ?>">
                <?= h($mat->segment) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-3">
            <select name="type6[]" id="id_type6" class="chosen types" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendortype)) : ?>
              <?php foreach ($vendortype as $mat) : ?>
              <option value="<?= h($mat->id) ?>" data-select="<?= h($mat->name) ?>">
                <?= h($mat->code) ?> -
                <?= h($mat->name) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-5">
            <select name="vendor6[]" id="id_vendor6" class="chosen vendor" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendor)) : ?>
              <?php foreach ($vendor as $mat) : ?>
              <option value="<?= h($mat->sap_vendor_code) ?>" data-select="<?= h($mat->sap_vendor_code) ?>">
                <?= h($mat->sap_vendor_code) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1">
            <button type="button" class="btn bg-gradient-info mydash">
            <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-6">
    <div class="card card-default card_box_shadow">
      <div class="card-header">PO order value by period</div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div id="chartdiv3"></div>
          </div>
          <div class="col-3">
            <select name="segment7[]" id="id_segment7" class="chosen segment" multiple="multiple" style="width: 100%;">
              <?php if (isset($segment)) : ?>
              <?php foreach ($segment as $mat) : ?>
              <option value="<?= h($mat->segment) ?>" data-select="<?= h($mat->segment) ?>">
                <?= h($mat->segment) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-3">
            <select name="type7[]" id="id_type7" class="chosen types" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendortype)) : ?>
              <?php foreach ($vendortype as $mat) : ?>
              <option value="<?= h($mat->id) ?>" data-select="<?= h($mat->name) ?>">
                <?= h($mat->code) ?> -
                <?= h($mat->name) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-5">
            <select name="vendor7[]" id="id_vendor7" class="chosen vendor" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendor)) : ?>
              <?php foreach ($vendor as $mat) : ?>
              <option value="<?= h($mat->sap_vendor_code) ?>" data-select="<?= h($mat->sap_vendor_code) ?>">
                <?= h($mat->sap_vendor_code) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1">
            <button type="button" class="btn bg-gradient-info mydash">
            <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-6 mb-5">
    <div class="card card-default card_box_shadow">
      <div class="card-header">Top Material by order value</div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div id="chartdiv4"></div>
          </div>
          <div class="col-3">
            <select name="segment8[]" id="id_segment8" class="chosen segment" multiple="multiple" style="width: 100%;">
              <?php if (isset($segment)) : ?>
              <?php foreach ($segment as $mat) : ?>
              <option value="<?= h($mat->segment) ?>" data-select="<?= h($mat->segment) ?>">
                <?= h($mat->segment) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-3">
            <select name="type8[]" id="id_type8" class="chosen types" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendortype)) : ?>
              <?php foreach ($vendortype as $mat) : ?>
              <option value="<?= h($mat->id) ?>" data-select="<?= h($mat->name) ?>">
                <?= h($mat->code) ?> -
                <?= h($mat->name) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-5">
            <select name="vendor8[]" id="id_vendor8" class="chosen vendor" multiple="multiple" style="width: 100%;">
              <?php if (isset($vendor)) : ?>
              <?php foreach ($vendor as $mat) : ?>
              <option value="<?= h($mat->sap_vendor_code) ?>" data-select="<?= h($mat->sap_vendor_code) ?>">
                <?= h($mat->sap_vendor_code) ?>
              </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="col-1">
            <button type="button" class="btn bg-gradient-info mydash">
            <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->Form->end() ?>

<script src="<?= $this->Url->build('/') ?>js/chart.js"></script>

<script>
  var dashboard_url = `<?php echo \Cake\Routing\Router::url(array('prefix' => false, 'controller' => 'buyer/dashboard', 'action' => 'index')); ?>`;
  var chartdiv_data = <?php echo json_encode($topVendors); ?>;
  var chartdiv2_data = <?php echo json_encode($topMaterials); ?>;
  var chartdiv3_data = [
    <?php foreach ($orderByPeriods as $mat) : ?>
      {"network":"<?= h($mat['network']) ?>","value":<?= h($mat['value']) ?>},
      <?php endforeach; ?>
    ];
  var chartdiv4_data = [
    <?php foreach ($topMaterialByValues as $mat) : ?>
      {"country":"<?= h($mat['country']) ?>","value":<?= h($mat['value']) ?>},
    <?php endforeach; ?>
  ];
  
</script>
<script src="<?= $this->Url->build('/') ?>js/a_vekpro/buyer/b_dashboard_index.js"></script>
<script src="<?= $this->Url->build('/') ?>js/a_vekpro/buyer/b_dashboard_topVendor.js"></script>
<script src="<?= $this->Url->build('/') ?>js/a_vekpro/buyer/b_dashboard_topMaterial.js"></script>
<script src="<?= $this->Url->build('/') ?>js/a_vekpro/buyer/b_dashboard_poorderValue.js"></script>
<script src="<?= $this->Url->build('/') ?>js/a_vekpro/buyer/b_dashboard_materialValue.js"></script>