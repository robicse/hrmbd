<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeaveQuartersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeaveQuartersTable Test Case
 */
class LeaveQuartersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LeaveQuartersTable
     */
    public $LeaveQuarters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.leave_quarters',
        'app.user_leaves'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LeaveQuarters') ? [] : ['className' => LeaveQuartersTable::class];
        $this->LeaveQuarters = TableRegistry::get('LeaveQuarters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LeaveQuarters);

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
}
