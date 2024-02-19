<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaterialTransferLogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaterialTransferLogsTable Test Case
 */
class MaterialTransferLogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MaterialTransferLogsTable
     */
    protected $MaterialTransferLogs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MaterialTransferLogs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MaterialTransferLogs') ? [] : ['className' => MaterialTransferLogsTable::class];
        $this->MaterialTransferLogs = $this->getTableLocator()->get('MaterialTransferLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MaterialTransferLogs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MaterialTransferLogsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
