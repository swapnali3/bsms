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
    <h2>Product List</h2>
    <?php foreach($rfqDetails as $key => $val) :
        
        ?>
        <div class="rfqDetails view content" style="top-margin:10px;">
            <?php $attrParams = json_decode($val->attribute_data, true); ?>
            <div style="float:right; width:100px;"><img src="<?= $this->Url->build('/') . $val['image']?>"></div>
            <h3>RFQ No. :  <?=$val['id']?></h3>
            <P><b>Details:</b></P>
            <div style="left-padding:10px;">Category : <?=$val['product']->name?></div>
            <div style="left-padding:10px;">Sub Category : <?=$val['product_sub_category']->name?></div>
            <div style="left-padding:10px;">Part Name : <?=$val['part_name']?></div>
            <div style="left-padding:10px;">Make : <?=$val['make']?></div>
            <div style="left-padding:10px;">UOM : <?=$val['uom']->description?></div>
            <div style="left-padding:10px;">remarks : <?=$val['remarks']?></div>


            <div style=""><a href="<?= $this->Url->build('/') ?>dealer/view/<?=$val['id']?>"><Button>View</Button></a></div>
        </div>
    <?php endforeach;?>
    </div>
</div>
