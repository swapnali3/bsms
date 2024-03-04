<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuyerCodeFilesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuyerCodeFilesTable Test Case
 */
class BuyerCodeFilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BuyerCodeFilesTable
     */
    protected $BuyerCodeFiles;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.BuyerCodeFiles',
        'app.Buyers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BuyerCodeFiles') ? [] : ['className' => BuyerCodeFilesTable::class];
        $this->BuyerCodeFiles = $this->getTableLocator()->get('BuyerCodeFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BuyerCodeFiles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BuyerCodeFilesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BuyerCodeFilesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
