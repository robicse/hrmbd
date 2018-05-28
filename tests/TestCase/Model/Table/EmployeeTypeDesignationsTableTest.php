<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeeTypeDesignationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeeTypeDesignationsTable Test Case
 */
class EmployeeTypeDesignationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeeTypeDesignationsTable
     */
    public $EmployeeTypeDesignations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employee_type_designations',
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
        $config = TableRegistry::exists('EmployeeTypeDesignations') ? [] : ['className' => EmployeeTypeDesignationsTable::class];
        $this->EmployeeTypeDesignations = TableRegistry::get('EmployeeTypeDesignations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmployeeTypeDesignations);

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
