<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendorTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendorTypesTable Test Case
 */
class VendorTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendorTypesTable
     */
    protected $VendorTypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.VendorTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('VendorTypes') ? [] : ['className' => VendorTypesTable::class];
        $this->VendorTypes = $this->getTableLocator()->get('VendorTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VendorTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VendorTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
