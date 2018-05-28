<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DutySchedulesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DutySchedulesTable Test Case
 */
class DutySchedulesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DutySchedulesTable
     */
    public $DutySchedules;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.duty_schedules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DutySchedules') ? [] : ['className' => DutySchedulesTable::class];
        $this->DutySchedules = TableRegistry::get('DutySchedules', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DutySchedules);

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
