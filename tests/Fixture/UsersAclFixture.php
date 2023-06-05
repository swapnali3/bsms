<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersAclFixture
 */
class UsersAclFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'users_acl';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'permission' => 1,
                'users' => 1,
                'controller' => 'Lorem ipsum dolor sit amet',
                'action' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
