<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeeTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeeTypesTable Test Case
 */
class EmployeeTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeeTypesTable
     */
    public $EmployeeTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employee_types',
        'app.employe_type_designations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EmployeeTypes') ? [] : ['className' => EmployeeTypesTable::class];
        $this->EmployeeTypes = TableRegistry::get('EmployeeTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmployeeTypes);

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
