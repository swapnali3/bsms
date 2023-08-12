<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompanyCodesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompanyCodesTable Test Case
 */
class CompanyCodesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompanyCodesTable
     */
    protected $CompanyCodes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CompanyCodes',
        'app.PurchasingOrganizations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CompanyCodes') ? [] : ['className' => CompanyCodesTable::class];
        $this->CompanyCodes = $this->getTableLocator()->get('CompanyCodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CompanyCodes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CompanyCodesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
