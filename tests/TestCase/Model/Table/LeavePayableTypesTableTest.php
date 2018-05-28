<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeavePayableTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeavePayableTypesTable Test Case
 */
class LeavePayableTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LeavePayableTypesTable
     */
    public $LeavePayableTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.leave_payable_types',
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
        $config = TableRegistry::exists('LeavePayableTypes') ? [] : ['className' => LeavePayableTypesTable::class];
        $this->LeavePayableTypes = TableRegistry::get('LeavePayableTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LeavePayableTypes);

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
