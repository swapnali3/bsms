<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StatesFixture
 */
class StatesFixture extends TestFixture
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
                'region_code' => 'Lorem ip',
                'name' => 'Lorem ipsum dolor sit amet',
                'country_code' => 'Lorem ip',
                'added_date' => '2023-08-11 20:14:01',
                'updated_date' => '2023-08-11 20:14:01',
            ],
        ];
        parent::init();
    }
}
