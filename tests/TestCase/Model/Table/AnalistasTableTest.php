<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnalistasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnalistasTable Test Case
 */
class AnalistasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnalistasTable
     */
    public $Analistas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.analistas',
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
        $config = TableRegistry::exists('Analistas') ? [] : ['className' => AnalistasTable::class];
        $this->Analistas = TableRegistry::get('Analistas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Analistas);

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
