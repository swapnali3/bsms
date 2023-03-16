<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader[]|\Cake\Collection\CollectionInterface $poHeaders
 */



?>
<style>
    .table td, .table th{
        padding:0.2rem
    }
    .table thead th{
        padding:0.2rem
    }
    body{font-family:"Source Sans Pro"
    }
    
    </style>
<div class="poHeaders index content card">
    <div class="card-header">
        <h5 style="color:black">
            <b>
                PURCHASE REQUISITION LIST
            </b>
        </h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover" id="example1">
                <thead style="
    BACKGROUND-COLOR: GAINSBORO;">
                    <tr>
                        
                        <th>
                            <?= h('PR No.') ?>
                        </th>
                        
                        <th>
                            <?= h('Added Date') ?>
                        </th>
                        <th>
                            <?= h('Updated Date') ?>
                        </th>
                        <th class="actions">
                            <?= __('Actions') ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prHeaders as $poHeader): ?>
                    <tr>
                        
                        <td>
                            <?= h($poHeader->pr_no) ?>
                        </td>
                        
                        <td>
                            <?= h($poHeader->added_date) ?>
                        </td>
                        <td>
                            <?= h($poHeader->updated_date) ?>
                        </td>
                        <td 
                        class="actions">
                        <a type="button" class="btn btn-sm btn-default mb-0" href="<?= $this->Url->build('/') ?>buyer/purchase-requisitions/create-rfq/<?= h($poHeader->id) ?>">Create RFQ</a>
                            <a type="button" class="btn btn-sm btn-default mb-0" href="<?= $this->Url->build('/') ?>buyer/purchase-requisitions/view/<?= h($poHeader->id) ?>">View</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>


<script>
    
    $(document).ready(function () {
        $("#example1").DataTable({
            "responsive": {"details": {"type": none}},
            "paging": true,
            "responsive": true, "lengthChange": false, "autoWidth": false, "searching": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>