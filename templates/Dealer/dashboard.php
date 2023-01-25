<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>
<section id="content">
    <div class="row p-2">
        <div class="col-3 p-0">
            <div class="row">
                <img src="<?= $this->Url->build('/') ?>img/side.png" style="float: right; padding-left: 2vw;">
                <div class="col-12" style="text-align: center;">
                    <a href="<?= $this->Url->build('/') ?>dealer/addproduct/buyer">
                        <img class="login" src="<?= $this->Url->build('/') ?>img/button/1.png" style="width: 15vw;"></a>
                    <a href="<?= $this->Url->build('/') ?>dealer/addproduct/seller">
                        <img class="login" src="<?= $this->Url->build('/') ?>img/button/5.png" style="width: 15vw;"></a>
                        <a class="menu-link" href="<?= $this->Url->build('/') ?>dealer/search/">
                            <div><i class="icon-wpforms"></i>Search Suppliers</div></a>
                            <a class="menu-link" href="<?= $this->Url->build('/') ?>dealer/regionalsearch/">
                            <div><i class="icon-wpforms"></i>Regional Suppliers</div></a>
                </div>
            </div>
        </div>
        <div class="col-9 p-0">
            <div class="card">
                <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    
                    <th><?= h('Rfq No.') ?></th>
                    <th><?= h('Category') ?></th>
                    <th><?= h('Date Raised') ?></th>
                    <th><?= h('Supplier Reached') ?></th>
                    <th><?= h('Suppliers Responded') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rfqDetails as $rfqDetail):?>
                <tr>
                    
                    <td><?= str_pad($rfqDetail->rfq_no, 5, 0, STR_PAD_LEFT) ?></td>
                    <td><?= $rfqDetail->has('product') ? h($rfqDetail->product->name) : '' ?></td>
                    <td><?= h($rfqDetail->added_date) ?></td>
                    <td><?= $rfqDetail->RfqInquiries['reach'] ? h($rfqDetail->RfqInquiries['reach']) : 0 ?></td>
                    <td><?= $rfqDetail->RfqInquiries['respond'] ? h($rfqDetail->RfqInquiries['respond']) : 0 ?></td>
                    
                    
                    
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rfqDetail->id]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
                    <br>
                    <?php if (count($rfqsummary) > 0) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>RFQ No.</th>
                                <th>Seller</th>
                                <th>Min. Rate</th>
                                <th>Respond Date</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rfqsummary as $rfq): ?>
                            <tr>
                                <td>
                                    <?= h($rfq['rfq_id']) ?>
                                </td>
                                <td>
                                    <?= h($rfq['company_name']) ?>
                                </td>
                                <td>
                                    <?= h($rfq['rate']) ?>
                                </td>
                                <td>
                                    <?= h($rfq['created_date']) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <!-- <div class="col-9 p-0">
            <img src="<?= $this->Url->build('/') ?>img/base.png" style="float: right;width: 84%;">
        </div> -->
    </div>
</section>