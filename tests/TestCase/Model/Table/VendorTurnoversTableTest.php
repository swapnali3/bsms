<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendorTurnoversTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendorTurnoversTable Test Case
 */
class VendorTurnoversTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendorTurnoversTable
     */
    protected $VendorTurnovers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.VendorTurnovers',
        'app.VendorTemps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('VendorTurnovers') ? [] : ['className' => VendorTurnoversTable::class];
        $this->VendorTurnovers = $this->getTableLocator()->get('VendorTurnovers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VendorTurnovers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VendorTurnoversTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\VendorTurnoversTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
