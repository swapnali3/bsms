<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendorTurnoversFixture
 */
class VendorTurnoversFixture extends TestFixture
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
                'ID' => 1,
                'vendor_temp_id' => 1,
                'first_year' => 'Lorem ipsum dolor sit amet',
                'first_year_turnover' => 1,
                'second_year' => 'Lorem ipsum dolor sit amet',
                'second_year_turnover' => 1,
                'third_year' => 'Lorem ipsum dolor sit amet',
                'third_year_turnover' => 1,
                'added_date' => '2023-09-14 14:21:11',
                'updated_date' => '2023-09-14 14:21:11',
            ],
        ];
        parent::init();
    }
}
