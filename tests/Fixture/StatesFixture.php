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
                'country_code' => 'Lorem ip',
                'region_code' => 'Lorem ip',
                'name' => 'Lorem ipsum dolor sit amet',
                'added_date' => '2023-08-31 16:37:35',
                'updated_date' => '2023-08-31 16:37:35',
            ],
        ];
        parent::init();
    }
}
