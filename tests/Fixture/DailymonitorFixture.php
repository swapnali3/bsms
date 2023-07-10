<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DailymonitorFixture
 */
class DailymonitorFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'dailymonitor';
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
                'vendor_id' => 1,
                'productionline_id' => 1,
                'target_production' => 1,
                'confirm_production' => 1,
                'status' => 1,
                'added_date' => '2023-07-09 13:15:27',
                'updated_date' => '2023-07-09 13:15:27',
            ],
        ];
        parent::init();
    }
}
