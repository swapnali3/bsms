<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendorCodeFilesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendorCodeFilesTable Test Case
 */
class VendorCodeFilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendorCodeFilesTable
     */
    protected $VendorCodeFiles;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.VendorCodeFiles',
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
        $config = $this->getTableLocator()->exists('VendorCodeFiles') ? [] : ['className' => VendorCodeFilesTable::class];
        $this->VendorCodeFiles = $this->getTableLocator()->get('VendorCodeFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VendorCodeFiles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VendorCodeFilesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\VendorCodeFilesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
