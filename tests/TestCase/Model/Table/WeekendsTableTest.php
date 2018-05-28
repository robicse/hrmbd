<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WeekendsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WeekendsTable Test Case
 */
class WeekendsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WeekendsTable
     */
    public $Weekends;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.weekends',
        'app.departments',
        'app.department_sections',
        'app.salarys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Weekends') ? [] : ['className' => WeekendsTable::class];
        $this->Weekends = TableRegistry::get('Weekends', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Weekends);

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
