<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeTypeDesignationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeTypeDesignationsTable Test Case
 */
class EmployeTypeDesignationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeTypeDesignationsTable
     */
    public $EmployeTypeDesignations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employe_type_designations',
        'app.employee_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EmployeTypeDesignations') ? [] : ['className' => EmployeTypeDesignationsTable::class];
        $this->EmployeTypeDesignations = TableRegistry::get('EmployeTypeDesignations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmployeTypeDesignations);

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
