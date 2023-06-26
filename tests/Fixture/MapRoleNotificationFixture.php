<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MapRoleNotificationFixture
 */
class MapRoleNotificationFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'map_role_notification';
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
                'user_group' => 1,
                'notification_type' => 1,
            ],
        ];
        parent::init();
    }
}
