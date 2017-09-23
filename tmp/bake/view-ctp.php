<?php
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$groupedFields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    })
    ->groupBy(function($field) use ($schema, $associationFields) {
        $type = $schema->columnType($field);
        if (isset($associationFields[$field])) {
            return 'string';
        }
        if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
            return 'number';
        }
        if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
            return 'date';
        }
        return in_array($type, ['text', 'boolean']) ? $type : 'string';
    })
    ->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
?>
<section class="content-header">
  <h1>
    <CakePHPBakeOpenTagphp echo __('<?= $singularHumanName ?>'); CakePHPBakeCloseTag>
  </h1>
  <ol class="breadcrumb">
    <li>
    <CakePHPBakeOpenTag= $this->Html->link('<i class="fa fa-angle-left"></i> ' . __('Voltar'), ['action' => 'index'], ['escape' => false])CakePHPBakeCloseTag>
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
                <h3 class="box-title"><CakePHPBakeOpenTagphp echo __('Visualização'); CakePHPBakeCloseTag></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                    <?php if ($groupedFields['string']) : ?>
                        <?php foreach ($groupedFields['string'] as $field) : ?>
                            <?php if (isset($associationFields[$field])) :
                                $details = $associationFields[$field];
                                ?>
                                <dt><CakePHPBakeOpenTag= __('<?= Inflector::humanize($details['property']) ?>') CakePHPBakeCloseTag></dt>
                                <dd>
                                    <CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?> : '' CakePHPBakeCloseTag>
                                </dd>
                            <?php else :
                                    if ($field != 'password') :?>
                                        <dt><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></dt>
                                        <dd>
                                            <CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag>
                                        </dd>
                                    <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                        
                    <?php if ($associations['HasOne']) : ?>
                        <?php foreach ($associations['HasOne'] as $alias => $details) : ?>
                            <dt><CakePHPBakeOpenTag= __('<?= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) ?>') CakePHPBakeCloseTag></dt>
                            <dd>
                                <CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag>
                            </dd>
                        <?php endforeach; ?>
                    <?php endif; ?>
                        
                    <?php if ($groupedFields['number']) : ?>
                        <?php foreach ($groupedFields['number'] as $field) : ?>
                            <?php if ($field != $primaryKey[0]) :?>
                                <dt><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></dt>
                                <dd>
                                    <CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag>
                                </dd>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                        
                    <?php if ($groupedFields['date']) : ?>
                        <?php foreach ($groupedFields['date'] as $field) : ?>
                            <?php if (!in_array($field, ['created', 'modified', 'updated'])) : ?>
                                <dt><?= "<?= __('" . Inflector::humanize($field) . "') ?>" ?></dt>
                                <dd>
                                    <CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag>
                                </dd>
                                <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                        
                    <?php if ($groupedFields['boolean']) : ?>
                        <?php foreach ($groupedFields['boolean'] as $field) : ?>
                            <dt><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></dt>
                            <dd>
                            <CakePHPBakeOpenTag= $<?= $singularVar ?>-><?= $field ?> ? __('Yes') : __('No'); CakePHPBakeCloseTag>
                            </dd>
                        <?php endforeach; ?>
                    <?php endif; ?>
                        
                    <?php if ($groupedFields['text']) : ?>
                        <?php foreach ($groupedFields['text'] as $field) : ?>
                            <dt><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></dt>
                            <dd>
                            <CakePHPBakeOpenTag= $this->Text->autoParagraph(h($<?= $singularVar ?>-><?= $field ?>)); CakePHPBakeCloseTag>
                            </dd>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
