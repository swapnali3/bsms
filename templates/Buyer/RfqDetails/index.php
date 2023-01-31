<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RfqDetail[]|\Cake\Collection\CollectionInterface $rfqDetails
 */
?>
<div class="rfqDetails index content card">
     
<div class="card-header">
        <h3>RFQ List<?= $this->Html->link(__('New RFQ'), ['action' => 'add'], ['class' => 'button float-right py-2 px-3','style'=>'font-size:x-large;']) ?></h3>
    </div>

    <div class="card-body">
    <div class="table-responsive">
        
        <table class="table table-hover" id="example1">
            <thead>
                <tr>
                    
                    <th>RFQ No.</th>
                    <th>Product</th>
                    <th>Part Name</th>
                    <th>Qty</th>
                    <th>UOM</th>
                    <th>Remarks</th>
                    <th>Make</th>
                    <th>Status</th>
                    <th>Added Date</th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rfqDetails as $rfqDetail): 
                    $rfqDetail->status = ($rfqDetail->status) ?  $rfqDetail->status : 0;
                    ?>
                <tr>
                    
                    
                    <td><?= str_pad($this->Number->format($rfqDetail->rfq_no), 5, 0, STR_PAD_LEFT) ?></td>
                    <td><?= $rfqDetail->has('product') ? $rfqDetail->product->name : '' ?></td>
                    
                    <td><?= h($rfqDetail->part_name) ?></td>
                    <td><?= $this->Number->format($rfqDetail->qty) ?></td>
                    <td><?= $rfqDetail->has('uom') ?  $rfqDetail->uom->description : '' ?></td>
                    <td><?= h($rfqDetail->remarks) ?></td>
                    <td><?= h($rfqDetail->make) ?></td>
                    <td><?= h(ucfirst($statusCode[$rfqDetail->status])) ?></td>
                    <td><?= h($rfqDetail->added_date) ?></td>
                    
                    <td class="actions">
                    <div class="btn-group">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rfqDetail->id], ['class'=>'btn btn-default']) ?>
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                    <?php if($rfqDetail->status == 1) : ?>
                            <?= $this->Html->link(__('Reject'), ['action' => 'apprej', $rfqDetail->id, 'rej'],['class'=>'dropdown-item']) ?>
                        <?php else : ?>
                            <?= $this->Html->link(__('Approve'), ['action' => 'apprej', $rfqDetail->id, 'app'],['class'=>'dropdown-item']) ?>
                        <?php endif; ?>
                    </div>
                  </div>

                        

                        
                        <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rfqDetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rfqDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfqDetail->id)]) ?> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>

<script>
    $(document).ready(function() { 
        var table = $("#example1").DataTable({
            "paging": true,
            "responsive": false, "lengthChange": false, "autoWidth": false, "searching" :true,
        });
    });
    
</script>
