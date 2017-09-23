<section class="content-header">
    <h1>
        <?php echo __('Programador'); ?>
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
                            <?= $programador->has('funcionario') ? $programador->funcionario->nome : '' ?>
                        </dd>
                        <dt><?= __('Sexo') ?></dt>
                        <dd>
                            <?= $programador->has('funcionario') ? $programador->funcionario->sexo : '' ?>
                        </dd>
                        <dt><?= __('Idade') ?></dt>
                        <dd>
                            <?= $programador->has('funcionario') ? $programador->funcionario->idade : '' ?>
                        </dd>
                        <dt><?= __('Ling. de Programação') ?></dt>
                        <dd>
                            <?= h($programador->linguagem) ?>
                        </dd>
                        <dt><?= __('Perfil no Github') ?></dt>
                        <dd>
                            <?php if ($github) { ?>
                                <a href="<?= $github['url']; ?>" target="_blank" class="github-wrapper small">
                                    <img src="<?= $github['avatar']; ?>" />
                                    <span>&nbsp;<?= $github['login']; ?></span>
                                </a>
                            <?php } ?>
                        </dd>
                        <dt><?= __('Hobbies'); ?></dt>
                        <dd>
                            <?php
                                echo implode(', ', array_map(function($hobby) {
                                    return $hobby['nome'];
                                }, $programador->funcionario->hobbies));
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
