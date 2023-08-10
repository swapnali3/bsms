<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendorOtherdetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendorOtherdetailsTable Test Case
 */
class VendorOtherdetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendorOtherdetailsTable
     */
    protected $VendorOtherdetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.VendorOtherdetails',
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
        $config = $this->getTableLocator()->exists('VendorOtherdetails') ? [] : ['className' => VendorOtherdetailsTable::class];
        $this->VendorOtherdetails = $this->getTableLocator()->get('VendorOtherdetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VendorOtherdetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VendorOtherdetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\VendorOtherdetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
