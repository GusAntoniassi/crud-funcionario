<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FuncionariosHobbiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FuncionariosHobbiesTable Test Case
 */
class FuncionariosHobbiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FuncionariosHobbiesTable
     */
    public $FuncionariosHobbies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.funcionarios_hobbies',
        'app.funcionarios',
        'app.analistas',
        'app.programadores',
        'app.hobbies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FuncionariosHobbies') ? [] : ['className' => FuncionariosHobbiesTable::class];
        $this->FuncionariosHobbies = TableRegistry::get('FuncionariosHobbies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FuncionariosHobbies);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
