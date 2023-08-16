<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendorOtherdetailsFixture
 */
class VendorOtherdetailsFixture extends TestFixture
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
                'vendor_temp_id' => 1,
                'six_sigma' => 'Lorem ipsum dolor sit amet',
                'six_sigma_file' => 1,
                'iso' => 'Lorem ipsum dolor sit amet',
                'iso_file' => 'Lorem ipsum dolor sit amet',
                'halal_file' => 'Lorem ipsum dolor sit amet',
                'declaration_file' => 'Lorem ipsum dolor sit amet',
                'fully_manufactured' => 'Lorem ipsum dolor sit amet',
                'suppliers_name' => 'Lorem ipsum dolor sit amet',
                'added_date' => '2023-08-10 14:49:46',
                'updated_date' => '2023-08-10 14:49:46',
            ],
        ];
        parent::init();
    }
}
