<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MaterialsFixture
 */
class MaterialsFixture extends TestFixture
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
                'sap_vendor_code' => 'Lorem ip',
                'code' => 'Lorem ipsum dolor ',
                'description' => 'Lorem ipsum dolor sit amet',
                'minimum_stock' => 1.5,
                'uom' => 'L',
                'status' => 1,
                'added_date' => '2023-07-19 17:53:12',
                'updated_date' => '2023-07-19 17:53:12',
            ],
        ];
        parent::init();
    }
}
