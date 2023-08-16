<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReconciliationAccountsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReconciliationAccountsTable Test Case
 */
class ReconciliationAccountsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReconciliationAccountsTable
     */
    protected $ReconciliationAccounts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ReconciliationAccounts',
        'app.CompanyCodes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ReconciliationAccounts') ? [] : ['className' => ReconciliationAccountsTable::class];
        $this->ReconciliationAccounts = $this->getTableLocator()->get('ReconciliationAccounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ReconciliationAccounts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ReconciliationAccountsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ReconciliationAccountsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
