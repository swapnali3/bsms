<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AsnHeadersFixture
 */
class AsnHeadersFixture extends TestFixture
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
                'asn_no' => 'Lorem ipsum d',
                'po_header_id' => 1,
                'invoice_path' => '',
                'invoice_no' => 'Lorem ipsum d',
                'invoice_date' => '2023-06-28',
                'invoice_value' => 1.5,
                'vehicle_no' => 'Lorem ipsu',
                'driver_name' => 'Lorem ipsum d',
                'driver_contact' => 'Lorem ipsum d',
                'gateout_date' => '2023-06-28 15:26:41',
                'status' => 1,
                'added_date' => '2023-06-28 15:26:41',
                'updated_date' => '2023-06-28 15:26:41',
            ],
        ];
        parent::init();
    }
}
