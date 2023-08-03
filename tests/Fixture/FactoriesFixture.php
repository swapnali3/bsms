<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FactoriesFixture
 */
class FactoriesFixture extends TestFixture
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
                'vendor_temps_id' => 1,
                'sap_vendor_code' => 'Lorem ip',
                'factory_code' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'pincode' => 'Lore',
                'city' => 'Lorem ipsum dolor sit amet',
                'state' => 'Lorem ipsum dolor sit amet',
                'country' => 'Lorem ipsum dolor sit amet',
                'added_date' => '2023-08-03 18:41:32',
                'updated_date' => '2023-08-03 18:41:32',
            ],
        ];
        parent::init();
    }
}
