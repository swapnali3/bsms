<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader $poHeader
 * @var \App\Model\Entity\PoHeader $poHeader
 */
?>
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('custom_table.css') ?>
<?= $this->Html->css('b_purchase_order_view.css') ?>

<?= $this->Html->css('bootstrap-multiselect') ?>
<?= $this->Html->script('bootstrap-multiselect') ?>
<?= $this->Html->css('dropdown-filter') ?>
<?= $this->Html->css('select2.min.css') ?>
<?= $this->Html->script('select2.js') ?>
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<div class="row purchase-order">
  <div class="col-12">
    <div class="poHeaders view content card card_box_shadow" id="">
      <div class="p-2" id="purViewId">
        <div class="search_fileupload col-lg-12 d-flex justify-content-between align-items-center">
          <div class="col-sm-4 col-lg-3 search-bar mb-3 mt-2">
            <input type="search" placeholder="Search all orders, materials" class="form-control search-box">
          </div>
          <div class="po-file-submit col-sm-6 col-lg-6 pr-0">
            <?= $this->Form->create(null, ['id' => 'formUpload', 'url' => ['controller' => '/purchase-orders', 'action' => 'upload']]) ?>
            <div class="row justify-content-end align-items-center">
              <div class="download_template mr-1" data-toggle="tooltip" data-original-title="Download Template"
                data-placement="left">
                <a href="<?= $this->Url->build('/') ?>webroot/templates/schedule_upload.xlsx" download>
                  <i class="fa fa-solid fa-file-download template_format_po"></i>
                </a>
              </div>
              <div class="pl-1">
                <?= $this->Form->control('upload_file', [
                'type' => 'file', 'label' => false, 'class' => 'pt-1 rounded-0', 'style' => 'visibility: hidden; position: absolute;', 'div' => 'form-group', 'id' => 'bulk_file']); ?>
                <?= $this->Form->button('Choose File', ['id' => 'OpenImgUpload','type' => 'button','class' => 'd-block btn bg-gradient-button btn-block mb-0 file-upld-btn' ]); ?>
                <span id="filessnames"></span>
              </div>
              <div class="pl-2 pr-2">
                <button class="btn bg-gradient-submit" id="id_import" type="button">
                  Submit
                </button>
              </div>
            </div>
            <?= $this->Form->end() ?>
          </div>
        </div>
        <div class="po-list">
          <div class="d-flex" id="poItemss"></div>
        </div>
        <div class="card non-schdule-list p-2 mb-0">
          <div class="align-items-center">
          <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
            <div class="row">
              <div class="col-sm-12 col-md-2 col-lg-2" style="align-self: center;">
                <h6><strong>Non-Schedule PO Items</strong></h6>
              </div>
              <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="searchy">
                  <label for="id_sap_vendor_code" style="width: 100%;">Vendor Code</label>
                  <select name="sap_vendor_code[]" style="width: 100%;" class="form-control chosen" multiple="multiple"  id="id_sap_vendor_code" ></select>
                </div>
              </div>
              <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="searchy">
                  <label for="id_material" style="width: 100%;">Material</label>
                  <select name="material[]" style="width: 100%;" class="form-control chosen" multiple="multiple" id="id_material" ></select>
                </div>
              </div>
              <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="searchy">
                  <label for="id_po_no" style="width: 100%;">PO No</label>
                  <select name="po_no[]" style="width: 100%;" class="form-control chosen" multiple="multiple" id="id_po_no" ></select>
                </div>
              </div>
              <div class="col-sm-12 col-md-1 col-lg-1" style="align-self: center;">
                <button class="btn bg-gradient-submit float-right" id="expandButton" style="width: 100px;">Expand</button>
              </div>
            </div>
          </div>
          <!-- <hr> -->
          <div class="card-body table-responsive" id="expanded_tbl">
            <table id="expandedTable" class="table table-bordered table-hover table-striped mt-5 pt-5" style="width: 100%;">
              <thead>
                <tr>
                  <th>Vendor</th>
                  <th>PO No</th>
                  <th>Item</th>
                  <th>Material</th>
                  <th>Description</th>
                  <th>PO Qty</th>
                  <th>Net Value</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="related card card_box_shadow">
      <div class="card-header">
        <span id="res_message"></span>
        <button type="button" disabled class="btn bg-gradient-button" id="action_schedule" onclick="prepare()"
          data-toggle="modal" data-backdrop="static" data-keyboard="false"
          data-target="#scheduleModal">Schedule</button>
        <button type="button" class="btn bg-gradient-button schexp" onclick="tableToExcel()">Export</button>
        <div id="expme">
          <table id="meme">
            <thead>
              <tr>
                <th>Vendor</th>
                <th>PO</th>
                <th>Item</th>
                <th>Material</th>
                <th>schedule_qty</th>
                <th>delivery_date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody id="meexp">
            </tbody>
          </table>
        </div>
      </div>
      <div class="table-responsive card-body" id="id_potableresp" style="display:none;"></div>
    </div>
  </div>
</div>

<div class="modal fade" id="upload_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b>Uploaded Schedule Detail :</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table" id="uploadInfoTable">
          <thead>
            <tr>
              <th>
                <?= __('Vendor Code') ?>
              </th>
              <th>
                <?= __('PO No.') ?>
              </th>
              <th>
                <?= __('Item No.') ?>
              </th>
              <th>
                <?= __('Material') ?>
              </th>
              <th>
                <?= __('Schedule Qty.') ?>
              </th>
              <th>
                <?= __('Delivery Date') ?>
              </th>
              <th class="actions">
                <?= __('Status') ?>
              </th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal stock -->
<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?= $this->Form->create(null, ['id' => 'scheduleForm', 'class' => 'mb-0',  'url' => ['controller' => 'po-footers', 'action' => 'create-schedule']]) ?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert-body text-center d-none">
          <h6>Are you sure you want to create schedule ?</h6>
        </div>
        <div class="a-data">
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>PO</th>
                <th>Item</th>
                <th>Actual Qty</th>
                <th>Delivery Date</th>
              </tr>
            </thead>
            <tbody id="id_scheduletbl"></tbody>
          </table>
        </div>
        <div id="error_msg" class="text-danger"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary dismiss-btn" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-secondary d-none" id="btnClose">Close</button>
        <button type="button" class="btn btn-custom btnSub">Submit</button>
        <button type="submit" class="btn btn-success btn-sm d-none">Ok</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal update schedule -->
<div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= $this->Form->create(null, ['id' => 'scheduleUpdate']) ?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="u-data">
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>PO</th>
                <th>Item</th>
                <th>Actual Qty</th>
                <th>Delivery Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td id="schedule_po"></td>
                <td id="schedule_item"></td>
                <td id="schedule_actual_qty"></td>
                <td><input type="date" class="form-control" name="delivery_date" id="delivery_dates"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="error_msg_update" class="text-danger"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-custom schedule_button">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal stock -->
<div class="modal fade" id="notifyModal" tabindex="-1" role="dialog" aria-labelledby="notifyModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="overlay">
        <i class="fas fa-2x fa-sync fa-spin"></i>
      </div>

      <?= $this->Form->create(null, ['id' => 'notifyForm',  'url' => ['controller' => 'purchase-orders', 'action' => 'save-schedule-remarks']]) ?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Communication</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div id="past_messages"></div>
        <?php
        echo $this->Form->control('schedule_id', ['type' => 'hidden', 'id' => 'schedule_id']);
        echo $this->Form->control('message', ['type' => 'textarea', 'class' => 'form-control rounded-0']);
        //echo $this->Form->control('message', [ 'type' => 'textarea','class' => 'summernote form-control rounded-0','div' => 'form-group', 'required', 'data-msg'=>"Please write something"]);
        ?>
      </div>
      <div id="error_msg"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="padding: 9px 15px;">Close</button>
        <button type="submit" class="btn btn-custom-2">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- modal cancel  -->
<div class="modal fade" id="modal-cancel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <h6>Are you sure you want to cancel schedule ?</h6>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancel_btn" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success schedule_cancel_ok btn-sm">Ok</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container" style="display:none;">
  <table cellpadding="0" cellspacing="0" border="0" class="dataTable table table-bordered table-hover table-striped"
    id="example2">
    <thead>
      <tr>
        <th>L3Type</th>
        <th>L3Variation</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>A</td>
        <td>5</td>
      </tr>
      <tr>
        <td>B</td>
        <td>4</td>
      </tr>
    </tbody>
  </table>
</div>

<script>
  var get_po_Footers = "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'get-po-Footers')); ?>/";
  var create_schedule = "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'create-schedule')); ?>";
  var get_schedules = "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'get-schedulelist')); ?>/";
  var get_schedule_messages = "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'get-schedule-messages')); ?> /";
  var create_schedule_update = "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'create-schedule-update')); ?>/";
  var create_schedule_cancel = "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'update')); ?>/";
  var po_api = "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'po-api')); ?>";
  var save_schedule_remarks = "<?php echo \Cake\Routing\Router::url(array('controller' => 'purchase-orders', 'action' => 'save-schedule-remarks')); ?>";
  var po_upload_url = "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'upload')); ?>"
  var po_schedule_export = "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'getScheduleexport')); ?>/"
  var non_schedule_po_export = "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'nonschedulepoitems')); ?>/"
</script>
<?= $this->Html->script('a_vekpro/buyer/b_purchaseorder_view') ?>