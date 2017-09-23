<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FuncionariosHobbiesFixture
 *
 */
class FuncionariosHobbiesFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'funcionarios_hobbies';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'funcionario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'hobby_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_funcionarios_hobbies_hobbies1_idx' => ['type' => 'index', 'columns' => ['hobby_id'], 'length' => []],
            'fk_funcionarios_hobbies_funcionarios1_idx' => ['type' => 'index', 'columns' => ['funcionario_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_funcionarios_hobbies_funcionarios1' => ['type' => 'foreign', 'columns' => ['funcionario_id'], 'references' => ['funcionarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_funcionarios_hobbies_hobbies1' => ['type' => 'foreign', 'columns' => ['hobby_id'], 'references' => ['hobbies', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'funcionario_id' => 1,
            'hobby_id' => 1
        ],
    ];
}
