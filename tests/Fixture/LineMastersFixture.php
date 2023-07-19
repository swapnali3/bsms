<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LineMastersFixture
 */
class LineMastersFixture extends TestFixture
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
                'name' => 1,
                'uom' => 'L',
                'status' => 1,
                'added_date' => '2023-07-19 11:00:47',
                'updated_date' => '2023-07-19 11:00:47',
            ],
        ];
        parent::init();
    }
}
