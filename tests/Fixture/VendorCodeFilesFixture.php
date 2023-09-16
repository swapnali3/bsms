<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendorCodeFilesFixture
 */
class VendorCodeFilesFixture extends TestFixture
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
                'sap_vendor_code' => 'Lorem ip',
                'req_file_name' => 'Lorem ipsum dolor sit amet',
                'res_file_name' => 'Lorem ipsum dolor sit amet',
                'added_date' => '2023-09-16 15:31:45',
                'updated_date' => '2023-09-16 15:31:45',
            ],
        ];
        parent::init();
    }
}
