<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendorMaterialFixture
 */
class VendorMaterialFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'vendor_material';
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
                'vendor_material_code' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'buyer_material_code' => 1,
                'minimum_stock' => 1,
                'uom' => 1,
                'status' => 1,
                'added_date' => '2023-07-11 16:58:46',
                'updated_date' => '2023-07-11 16:58:46',
            ],
        ];
        parent::init();
    }
}
