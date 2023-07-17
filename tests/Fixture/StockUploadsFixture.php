<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StockUploadsFixture
 */
class StockUploadsFixture extends TestFixture
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
                'opening_stock' => 1.5,
                'material_id' => 1,
                'sap_vendor_code' => 'Lorem ip',
                'added_date' => '2023-07-15 21:33:53',
                'updated_date' => '2023-07-15 21:33:53',
            ],
        ];
        parent::init();
    }
}
