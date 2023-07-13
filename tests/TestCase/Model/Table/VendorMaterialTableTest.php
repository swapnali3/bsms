<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendorMaterialTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendorMaterialTable Test Case
 */
class VendorMaterialTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendorMaterialTable
     */
    protected $VendorMaterial;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.VendorMaterial',
        'app.Stockupload',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('VendorMaterial') ? [] : ['className' => VendorMaterialTable::class];
        $this->VendorMaterial = $this->getTableLocator()->get('VendorMaterial', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VendorMaterial);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VendorMaterialTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
