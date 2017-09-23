<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProgramadoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProgramadoresTable Test Case
 */
class ProgramadoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProgramadoresTable
     */
    public $Programadores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.programadores',
        'app.funcionarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Programadores') ? [] : ['className' => ProgramadoresTable::class];
        $this->Programadores = TableRegistry::get('Programadores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Programadores);

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
