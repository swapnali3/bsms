<?php ?>
<section id="content">
    <div class="container clearfix">
        <div class="row my-3">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                            <table class="table">
                            <tr>
                                <th>
                                    <?= __('RFQ No.') ?>
                                </th>
                                <td>
                                    <?= h($rfqDetails->rfq_no) ?>
                                    <span style="margin-left:20px;">
                                    <span>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <?= __('Product Category') ?>
                                </th>
                                <td>
                                    <?= $rfqDetails->has('product') ? $rfqDetails->product->name : '' ?>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <?= __('Make') ?>
                                </th>
                                <td>
                                    <?= $rfqDetails->make?>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <?= __('Part Name') ?>
                                </th>
                                <td>
                                    <?= $rfqDetails->part_name?>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <?= __('Quantity') ?>
                                </th>
                                <td>
                                    <?= $rfqDetails->qty?>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <?= __('UOM') ?>
                                </th>
                                <td>
                                    <?= $rfqDetails->has('uom') ? $rfqDetails->uom->description : '' ?>
                                </td>
                            </tr>
                        </table>
                            </div>

                            <?php if($userType == 'seller') : ?>
                                <div class="row">
                                    <div class="row">
                                        <div class="col-6">
                                            <?= $this->Form->create(null, ['url' => ['controller' => 'rfq-inquiries','action' => 'inquiry',$rfqDetails->id]]); ?>
                                            <div class="row">
                                                <div class="col-6">
                                                    <?php echo $this->Form->control('qty', array( 'type' => 'number', 'class' => 'form-control rounded-0','div' => 'form-group', 'required' => 'required')); ?>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo $this->Form->control('rate', array('maxlength' => '3','type' => 'number', 'class' => 'form-control rounded-0','div' => 'form-group', 'required' => 'required')); ?>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo $this->Form->control('delivery_date', array('type' => 'date', 'class' => 'form-control rounded-0','div' => 'form-group', 'required' => 'required')); ?>
                                                </div>
                                            </div>
                                            <?= $this->Form->button(__('Save'), [
                                            'label' => 'Save',
                                            'class' => 'mt-3 btn btn-danger w-100',
                                        ]); ?>
                                            <?= $this->Form->end() ?>
                                        </div>
                                    </div>
                                    </div>
                            <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>