<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StockuploadFixture
 */
class StockuploadFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'stockupload';
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
                'opening_stock' => 1,
                'vendor_material_id' => 1,
                'vendor_id' => 1,
                'added_date' => '2023-07-04 17:28:37',
                'updated_date' => '2023-07-04 17:28:37',
            ],
        ];
        parent::init();
    }
}
