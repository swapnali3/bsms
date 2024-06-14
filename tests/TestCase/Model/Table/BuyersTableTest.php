<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuyersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuyersTable Test Case
 */
class BuyersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BuyersTable
     */
    protected $Buyers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Buyers',
        'app.CompanyCodes',
        'app.PurchasingOrganizations',
        'app.Managers',
        'app.BuyerCodeFiles',
        'app.RfqCommunications',
        'app.Rfqs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Buyers') ? [] : ['className' => BuyersTable::class];
        $this->Buyers = $this->getTableLocator()->get('Buyers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Buyers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BuyersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BuyersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
