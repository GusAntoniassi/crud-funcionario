<?php
use Cake\Utility\Inflector;

   $extras = [];
?>
<section class="content-header">
  <h1>
    <?= $singularHumanName ?>

    <small><CakePHPBakeOpenTag= __('<?= Inflector::humanize($action) ?>') CakePHPBakeCloseTag></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <CakePHPBakeOpenTag= $this->Html->link('<i class="fa fa-angle-left"></i> '.__('Voltar'), ['action' => 'index'], ['escape' => false]) CakePHPBakeCloseTag>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><CakePHPBakeOpenTag= __('Formulário') CakePHPBakeCloseTag></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <CakePHPBakeOpenTag= $this->Form->create($<?= $singularVar ?>, array('role' => 'form')) CakePHPBakeCloseTag>
          <div class="box-body">
          <CakePHPBakeOpenTagphp
<?php
    foreach ($fields as $field) {
      if (in_array($field, $primaryKey)) {
        continue;
      }
      if (isset($keyFields[$field])) {
        $fieldData = $schema->column($field);
        if (!empty($fieldData['null'])) {
?>
            echo $this->Form->input('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>, 'empty' => true]);
<?php
        } else {
?>
            echo $this->Form->input('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>]);
<?php
        }
        continue;
      }
      if (!in_array($field, ['created', 'modified', 'updated'])) {
        $fieldData = $schema->column($field);
        if (($fieldData['type'] === 'date')) {
            $extras[] = 'datepicker';
?>
            echo $this->Form->input('<?= $field ?>', ['empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);
<?php
        } else {
?>
            echo $this->Form->input('<?= $field ?>');
<?php
        }
      }
    }
    if (!empty($associations['BelongsToMany'])) {
      foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
?>
            echo $this->Form->input('<?= $assocData['property'] ?>._ids', ['options' => $<?= $assocData['variable'] ?>]);
<?php
      }
    }
?>
          CakePHPBakeCloseTag>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <CakePHPBakeOpenTag= $this->Form->button(__('Salvar')) CakePHPBakeCloseTag>
          </div>
        <CakePHPBakeOpenTag= $this->Form->end() CakePHPBakeCloseTag>
      </div>
    </div>
  </div>
</section>

<?php
    if (!empty($extras)) {
        foreach($extras as $element) {
        ?>
        <?php echo $this->element($element); ?>
        <?php
        }
    }
?>
