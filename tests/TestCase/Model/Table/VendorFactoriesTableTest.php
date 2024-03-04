<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendorFactoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendorFactoriesTable Test Case
 */
class VendorFactoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendorFactoriesTable
     */
    protected $VendorFactories;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.VendorFactories',
        'app.VendorTemps',
        'app.VendorCommencements',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('VendorFactories') ? [] : ['className' => VendorFactoriesTable::class];
        $this->VendorFactories = $this->getTableLocator()->get('VendorFactories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VendorFactories);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VendorFactoriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\VendorFactoriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
