<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductionlineTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductionlineTable Test Case
 */
class ProductionlineTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductionlineTable
     */
    protected $Productionline;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Productionline',
        'app.Dailymonitor',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Productionline') ? [] : ['className' => ProductionlineTable::class];
        $this->Productionline = $this->getTableLocator()->get('Productionline', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Productionline);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProductionlineTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
