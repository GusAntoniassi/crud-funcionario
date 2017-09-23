<section class="content-header">
  <h1>
    Analista
    <small><?= __('Add') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-angle-left"></i> '.__('Voltar'), ['action' => 'index'], ['escape' => false]) ?>
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
          <h3 class="box-title"><?= __('Formulário') ?></h3>
        </div>

          <?= $this->Html->script('select2config'); ?>
          <script type="text/javascript">
              $(function() {
                  $('#funcionario-hobbies-ids').select2();
              });
          </script>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($analista, array('role' => 'form')) ?>
          <div class="box-body">
              <div class="row">
              <?php echo $this->Form->input('funcionario_id', ['type' => 'hidden']); ?>
              <div class="col-sm-8">
                  <?php echo $this->Form->input('funcionario.nome'); ?>
              </div>
              <div class="col-sm-1">
                  <?php echo $this->Form->input('funcionario.sexo'); ?>
              </div>
              <div class="col-sm-3">
                  <?php echo $this->Form->input('funcionario.idade'); ?>
              </div>
              <div class="col-sm-6">
                  <?php echo $this->Form->input('projeto'); ?>
              </div>
              <div class="col-sm-6">
                  <?php echo $this->Form->input('funcionario.hobbies._ids', [
                      'type' => 'select',
                      'multiple' => true,
                      'options' => $hobbies,
                  ]); ?>
              </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Salvar')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

