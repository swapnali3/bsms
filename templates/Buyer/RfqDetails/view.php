<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RfqDetail $rfqDetail
 */
?>
<?= $this->Html->css('cstyle.css') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('b_index.css') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>RFQ NO. :
                    <?= str_pad($rfqDetail->rfq_no, 5, 0, STR_PAD_LEFT) ?>
                </h3>
            </div>
            <div class="card-body rfqDetails view content">
                <table>
                    <tr>
                        <th>
                            <?= __('Product') ?>
                        </th>
                        <td>
                            <?= $rfqDetail->has('product') ? $rfqDetail->product->name : '' ?>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <?= __('Part Name') ?>
                        </th>
                        <td>
                            <?= h($rfqDetail->part_name) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?= __('Uom') ?>
                        </th>
                        <td>
                            <?= $rfqDetail->has('uom') ? $rfqDetail->uom->description : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?= __('Remarks') ?>
                        </th>
                        <td>
                            <?= h($rfqDetail->remarks) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?= __('Make') ?>
                        </th>
                        <td>
                            <?= h($rfqDetail->make) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?= __('Uploaded Files') ?>
                        </th>
                        <td>
                            <?= h($rfqDetail->uploaded_files) ?>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <?= __('Qty') ?>
                        </th>
                        <td>
                            <?= $this->Number->format($rfqDetail->qty) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?= __('Added Date') ?>
                        </th>
                        <td>
                            <?= h($rfqDetail->added_date) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?= __('Updated Date') ?>
                        </th>
                        <td>
                            <?= h($rfqDetail->updated_date) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?= __('Status') ?>
                        </th>
                        <td>
                            <?= $rfqDetail->status ? __('Approved') : __('New'); ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="example1">
            <tr>
                <th>Company</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Delivery Date</th>
                <th>respond Date</th>
            </tr>
            <?php foreach($results as $key => $val) : ?>
            <tr>
                <td>
                    <?=$val['company_name'] ?>
                </td>
                <td>
                    <?=$val['qty'] ?>
                </td>
                <td>
                    <?=$val['rate'] ?>
                </td>
                <td>
                    <?=$val['delivery_date'] ?>
                </td>
                <td>
                    <?=$val['created_date'] ?>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        var table = $("#example1").DataTable();
    });

</script>