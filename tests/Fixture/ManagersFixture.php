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
<<<<<<< Updated upstream
                'added_date' => '2024-06-14 11:42:47',
                'updated_date' => '2024-06-14 11:42:47',
=======
                'added_date' => '2024-05-28 17:31:18',
                'updated_date' => '2024-05-28 17:31:18',
>>>>>>> Stashed changes
            ],
        ];
        parent::init();
    }
}
