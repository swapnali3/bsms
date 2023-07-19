<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\LineMaster> $lineMasters
 */
?>
<?= $this->Html->css('v_index.css') ?>
<?= $this->Html->css('custom_table') ?>
<?= $this->Html->css('v_linemasters_index') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header lineMasters">
                <?= $this->Html->link(__('New Line Master'), ['action' => 'add'], ['class' => 'btn btn-gradient-true float-right']) ?>
                <h3>
                    <?= __('Line Masters') ?>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Capacity</th>
                                <th>UOM</th>
                                <th>Status</th>
                                <th class="actions">
                                    <?= __('Actions') ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lineMasters as $lineMaster): ?>
                            <tr>
                                <td>
                                    <?= $this->Number->format($lineMaster->name) ?>
                                </td>
                                <td>
                                    <?= $this->Number->format($lineMaster->capacity) ?>
                                </td>
                                <td>
                                    <?= h($lineMaster->uom) ?>
                                </td>
                                <td>
                                    <?= $this->Number->format($lineMaster->status) ?>
                                </td>
                                <td class="actions">
                                    <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $lineMaster->id]) ?> -->
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lineMaster->id], ['class'=>'btn btn-gradient-true',]) ?>
                                    <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lineMaster->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lineMaster->id)]) ?> -->
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('v_linemasters_index') ?>