<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductionLinesFixture
 */
class ProductionLinesFixture extends TestFixture
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
                'material_id' => 1,
                'line_master_id' => 1,
                'capacity' => 1.5,
                'status' => 1,
                'added_date' => '2023-07-19 19:58:52',
                'updated_date' => '2023-07-19 19:58:52',
            ],
        ];
        parent::init();
    }
}
