<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BanksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BanksTable Test Case
 */
class BanksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BanksTable
     */
    public $Banks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.banks',
        'app.bank_branchs',
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
        $config = TableRegistry::exists('Banks') ? [] : ['className' => BanksTable::class];
        $this->Banks = TableRegistry::get('Banks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Banks);

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
