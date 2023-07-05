<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MsgchatHeadersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MsgchatHeadersTable Test Case
 */
class MsgchatHeadersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MsgchatHeadersTable
     */
    protected $MsgchatHeaders;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MsgchatHeaders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MsgchatHeaders') ? [] : ['className' => MsgchatHeadersTable::class];
        $this->MsgchatHeaders = $this->getTableLocator()->get('MsgchatHeaders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MsgchatHeaders);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MsgchatHeadersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
