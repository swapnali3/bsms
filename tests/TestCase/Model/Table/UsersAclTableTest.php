<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersAclTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersAclTable Test Case
 */
class UsersAclTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersAclTable
     */
    protected $UsersAcl;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UsersAcl',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UsersAcl') ? [] : ['className' => UsersAclTable::class];
        $this->UsersAcl = $this->getTableLocator()->get('UsersAcl', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UsersAcl);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersAclTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
