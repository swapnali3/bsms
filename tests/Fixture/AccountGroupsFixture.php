<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccountGroupsFixture
 */
class AccountGroupsFixture extends TestFixture
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
                'code' => 'Lorem ipsum d',
                'name' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'added_date' => '2023-08-11 19:11:20',
                'updated_date' => '2023-08-11 19:11:20',
            ],
        ];
        parent::init();
    }
}
