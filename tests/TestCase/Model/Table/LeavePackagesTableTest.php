<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeavePackagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeavePackagesTable Test Case
 */
class LeavePackagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LeavePackagesTable
     */
    public $LeavePackages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.leave_packages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LeavePackages') ? [] : ['className' => LeavePackagesTable::class];
        $this->LeavePackages = TableRegistry::get('LeavePackages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LeavePackages);

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
