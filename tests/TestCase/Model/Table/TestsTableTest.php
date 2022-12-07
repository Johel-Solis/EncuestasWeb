<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestsTable Test Case
 */
class TestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TestsTable
     */
    protected $Tests;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Tests',
        'app.Questions',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tests') ? [] : ['className' => TestsTable::class];
        $this->Tests = TableRegistry::getTableLocator()->get('Tests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tests);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
