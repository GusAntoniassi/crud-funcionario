<section class="content-header">
    <h1>
        <?php echo __('Analista'); ?>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?= $this->Html->link('<i class="fa fa-angle-left"></i> ' . __('Voltar'), ['action' => 'index'], ['escape' => false]) ?>
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <h3 class="box-title"><?php echo __('Visualização'); ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?= __('Nome') ?></dt>
                        <dd>
                            <?= $analista->has('funcionario') ? $analista->funcionario->nome : '' ?>
                        </dd>
                        <dt><?= __('Sexo') ?></dt>
                        <dd>
                            <?= $analista->has('funcionario') ? $analista->funcionario->sexo : '' ?>
                        </dd>
                        <dt><?= __('Idade') ?></dt>
                        <dd>
                            <?= $analista->has('funcionario') ? $analista->funcionario->idade : '' ?>
                        </dd>
                        <dt><?= __('Projeto') ?></dt>
                        <dd>
                            <?= h($analista->projeto) ?>
                        </dd>
                        <dt><?= __('Hobbies'); ?></dt>
                        <dd>
                            <?php
                            echo implode(', ', array_map(function($hobby) {
                                return $hobby['nome'];
                            }, $analista->funcionario->hobbies));
                            ?>
                        </dd>
                    </dl>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- ./col -->
    </div>
    <!-- div -->
</section>
