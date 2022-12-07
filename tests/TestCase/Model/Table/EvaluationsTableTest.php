<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvaluationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvaluationsTable Test Case
 */
class EvaluationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EvaluationsTable
     */
    protected $Evaluations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Evaluations',
        'app.UsersTests',
        'app.Answers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Evaluations') ? [] : ['className' => EvaluationsTable::class];
        $this->Evaluations = TableRegistry::getTableLocator()->get('Evaluations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Evaluations);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
