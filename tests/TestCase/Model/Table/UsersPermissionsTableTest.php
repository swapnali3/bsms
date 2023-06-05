<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersPermissionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersPermissionsTable Test Case
 */
class UsersPermissionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersPermissionsTable
     */
    protected $UsersPermissions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UsersPermissions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UsersPermissions') ? [] : ['className' => UsersPermissionsTable::class];
        $this->UsersPermissions = $this->getTableLocator()->get('UsersPermissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UsersPermissions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersPermissionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsersPermissionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
