<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MapRoleNotificationTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapRoleNotificationTable Test Case
 */
class MapRoleNotificationTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MapRoleNotificationTable
     */
    protected $MapRoleNotification;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MapRoleNotification',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MapRoleNotification') ? [] : ['className' => MapRoleNotificationTable::class];
        $this->MapRoleNotification = $this->getTableLocator()->get('MapRoleNotification', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MapRoleNotification);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MapRoleNotificationTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
