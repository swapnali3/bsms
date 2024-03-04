<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MaterialTransferLogsFixture
 */
class MaterialTransferLogsFixture extends TestFixture
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
                'vendor_factory_code' => 'Lorem ipsum dolor sit amet',
                'from_material' => 'Lorem ipsum dolor ',
                'to_material' => 'Lorem ipsum dolor ',
                'transfer_qty' => 1.5,
                'added_date' => '2024-02-19 17:54:30',
                'updated_date' => '2024-02-19 17:54:30',
            ],
        ];
        parent::init();
    }
}
