<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ManagersFixture
 */
class ManagersFixture extends TestFixture
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
                'first_name' => 'Lorem ipsum dolor ',
                'last_name' => 'Lorem ipsum dolor ',
                'email' => 'Lorem ipsum dolor sit amet',
                'mobile' => 'Lorem ipsu',
                'status' => 1,
                'added_date' => '2024-06-14 14:52:44',
                'updated_date' => '2024-06-14 14:52:44',
            ],
        ];
        parent::init();
    }
}
