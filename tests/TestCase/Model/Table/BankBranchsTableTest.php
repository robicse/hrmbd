<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BankBranchsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BankBranchsTable Test Case
 */
class BankBranchsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BankBranchsTable
     */
    public $BankBranchs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bank_branchs',
        'app.banks',
        'app.users',
        'app.user_groups',
        'app.user_group_menus',
        'app.user_group_menu_items',
        'app.user_group_permissions',
        'app.user_group_controllers',
        'app.user_group_controller_actions',
        'app.appointment_details',
        'app.appointments',
        'app.cards',
        'app.divisions',
        'app.division_districts',
        'app.division_district_upazilas',
        'app.vehicles',
        'app.workshops'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BankBranchs') ? [] : ['className' => BankBranchsTable::class];
        $this->BankBranchs = TableRegistry::get('BankBranchs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BankBranchs);

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
