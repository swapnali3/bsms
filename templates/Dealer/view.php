<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
        <?php echo $this->element('left_menu'); ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rfqDetails view content">
            <table>
            <tr>
                    <th><?= __('RFQ No.') ?></th>
                    <td><?= h($rfqDetails->id) ?></td>
                </tr>

                <tr>
                    <th><?= __('Product Category') ?></th>
                    <td><?= $rfqDetails->has('product') ? $rfqDetails->product->name : '' ?></td>
                </tr>

                <tr>
                    <th><?= __('Sub Category') ?></th>
                    <td><?= $rfqDetails->has('product_sub_category') ? $rfqDetails->product_sub_category->name : '' ?></td>
                </tr>

                <tr>
                    <th><?= __('Make') ?></th>
                    <td><?= $rfqDetails->make?></td>
                </tr>
                
                <tr>
                    <th><?= __('Part Name') ?></th>
                    <td><?= $rfqDetails->part_name?></td>
                </tr>

                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $rfqDetails->qty?></td>
                </tr>

                <tr>
                    <th><?= __('UOM') ?></th>
                    <td><?= $rfqDetails->has('uom') ? $rfqDetails->uom->description : '' ?></td>
                </tr>

                    <tr>
                        <td>
                            <img src="<?= $this->Url->build('/').$attrParams[0] ?>" style="width:100px;">
                        </td>
                        <?php if($userType == 'seller') : ?>
                            <td  style="border: 1px black solid; padding:10px;">
                        &nbsp;
                        
                            <?= $this->Form->create(null, ['url' => ['controller' => 'dealer','action' => 'inquiry',$rfqDetails->id]]); ?>
                            <table>
                                <tr><td>Quantity : </td><td>
                                  
                                    <input type="text" name="qty" required/></td></tr>
                                <tr><td>Rate : </td><td><input type="text" name="rate" required /></td></tr>
                                <tr><td>Delivery date : </td><td><input type="date" name="delivery_date" required/></td></tr>
                                <!-- <a href="<?= $this->Url->build('/') ?>dealer/inquiry/<?=$rfqDetails->id?>"><Button>Inquiry</Button></a> -->
                                </td></tr>
                            </table>
                            <?= $this->Form->button(__('Save')); ?>
                            <?= $this->Form->end() ?>
                            </td>
                            <?php endif; ?>
                        
                    </tr>
                </table>
        </div>

        <?php if($userType == 'buyer') : ?>
        <div class="rfqDetails seller content">
            <table>
                <tr><th>Company</th><th>Quantity</th><th>Rate</th><th>Delivery Date</th><th>respond Date</th></tr>
                <?php foreach($results as $key => $val) :
                    //print_r($val); exit;
                    ?>
                    <tr>
                        <td><?=$val['buyer_seller_user']->company_name ?></td>
                        <td><?=$val['qty'] ?></td>
                        <td><?=$val['rate'] ?></td>
                        <td><?=$val['delivery_date'] ?></td>
                        <td><?=$val['created_date'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
