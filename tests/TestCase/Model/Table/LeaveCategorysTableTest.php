<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeaveCategorysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeaveCategorysTable Test Case
 */
class LeaveCategorysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LeaveCategorysTable
     */
    public $LeaveCategorys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.leave_categorys',
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
        $config = TableRegistry::exists('LeaveCategorys') ? [] : ['className' => LeaveCategorysTable::class];
        $this->LeaveCategorys = TableRegistry::get('LeaveCategorys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LeaveCategorys);

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
