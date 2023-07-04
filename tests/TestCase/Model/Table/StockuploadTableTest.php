<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StockuploadTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StockuploadTable Test Case
 */
class StockuploadTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StockuploadTable
     */
    protected $Stockupload;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Stockupload') ? [] : ['className' => StockuploadTable::class];
        $this->Stockupload = $this->getTableLocator()->get('Stockupload', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Stockupload);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StockuploadTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
