<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SchemaGroup $schemaGroup
 */
?>
<?php
$this->assign('title', __('Edit Schema Group'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Schema Groups', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $schemaGroup->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($schemaGroup) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('name');
      echo $this->Form->control('status');
      echo $this->Form->control('added_date');
      echo $this->Form->control('updated_date');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $schemaGroup->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $schemaGroup->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

