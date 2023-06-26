<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotificationsTypeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotificationsTypeTable Test Case
 */
class NotificationsTypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NotificationsTypeTable
     */
    protected $NotificationsType;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.NotificationsType',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('NotificationsType') ? [] : ['className' => NotificationsTypeTable::class];
        $this->NotificationsType = $this->getTableLocator()->get('NotificationsType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->NotificationsType);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NotificationsTypeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
