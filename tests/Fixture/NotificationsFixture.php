<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NotificationsFixture
 */
class NotificationsFixture extends TestFixture
{
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
                'user_id' => 1,
                'message_count' => 1,
                'notification_type' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2023-06-02 12:17:24',
            ],
        ];
        parent::init();
    }
}
