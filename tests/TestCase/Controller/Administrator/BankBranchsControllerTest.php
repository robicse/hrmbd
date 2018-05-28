<?php
namespace App\Test\TestCase\Controller\Administrator;

use App\Controller\Administrator\BankBranchsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Administrator\BankBranchsController Test Case
 */
class BankBranchsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
