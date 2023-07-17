<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RfqDetail[]|\Cake\Collection\CollectionInterface $rfqDetails
 */
?>


<?= $this->Html->css('cstyle.css') ?>
<style>
    .table td, .table th{
        padding:0rem;
        font-size:small
    }
    .card-body{
        padding:0.5rem
    }
    .btn
    {
        padding:0.1rem;
        font-size:0.7rem;
        border:1px;
        border-color:black;
        display:inline
    }

    </style>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('b_index.css') ?>
<div class="rfqDetails index content card">

    <div class="card-header">
            <?= $this->Html->link(__('New RFQ'), ['action' => 'add'], ['class' => 'button float-right py-2 px-3','style'=>'font-size:small;']) ?>
        </h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-hover" id="example1">
                <thead>
                    <tr style="background-color: #d3d3d36e;">

                        <th>RFQ No.</th>
                        <th>Product</th>
                        <th>Part Name</th>
                        <th>Qty</th>
                        <th>UOM</th>
                        <th>Remarks</th>
                        <th>Make</th>
                        <th>Status</th>
                        <th>Added Date</th>
                        <!-- <th class="actions">
                            <?= __('Actions') ?>
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rfqDetails as $rfqDetail): 
                    $rfqDetail->status = ($rfqDetail->status) ?  $rfqDetail->status : 0;
                    ?>
                    <tr>


                        <td>
                            <?= str_pad($this->Number->format($rfqDetail->rfq_no), 5, 0, STR_PAD_LEFT) ?>
                        </td>
                        <td>
                            <?= $rfqDetail->has('product') ? $rfqDetail->product->name : '' ?>
                        </td>

                        <td>
                            <?= h($rfqDetail->part_name) ?>
                        </td>
                        <td>
                            <?= $this->Number->format($rfqDetail->qty) ?>
                        </td>
                        <td>
                            <?= $rfqDetail->has('uom') ?  $rfqDetail->uom->description : '' ?>
                        </td>
                        <td>
                            <?= h($rfqDetail->remarks) ?>
                        </td>
                        <td>
                            <?= h($rfqDetail->make) ?>
                        </td>
                        <td>
                            <?= h(ucfirst($statusCode[$rfqDetail->status])) ?>
                        </td>
                        <td>
                            <?= h($rfqDetail->added_date) ?>
                        </td>

                        <!-- <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $rfqDetail->id], ['class'=>'btn btn-default mb-0']) ?>
                                <?php if($rfqDetail->status == 1) : ?>
                                    <?= $this->Html->link(__('Reject'), ['action' => 'apprej', $rfqDetail->id, 'rej'],['class'=>'btn btn-default mb-0']) ?>
                                    <?php else : ?>
                                    <?= $this->Html->link(__('Approve'), ['action' => 'apprej', $rfqDetail->id, 'app'],['class'=>'btn btn-default']) ?>
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
    $(document).ready(function () {
        var table = $("#example1").DataTable({
            "paging": true,
            "responsive": false, "lengthChange": false, "autoWidth": false, "searching": true,
        });
    });

</script>