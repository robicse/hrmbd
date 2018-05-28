<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartmentSectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartmentSectionsTable Test Case
 */
class DepartmentSectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartmentSectionsTable
     */
    public $DepartmentSections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.department_sections',
        'app.departments',
        'app.salarys',
        'app.weekends'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DepartmentSections') ? [] : ['className' => DepartmentSectionsTable::class];
        $this->DepartmentSections = TableRegistry::get('DepartmentSections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DepartmentSections);

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
