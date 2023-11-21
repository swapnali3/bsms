<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendorTypesFixture
 */
class VendorTypesFixture extends TestFixture
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
                'code' => 'Lor',
                'name' => 'Lorem ipsum dolor ',
                'status' => 1,
                'added_date' => '2023-11-17 10:14:53',
                'updated_date' => '2023-11-17 10:14:53',
            ],
        ];
        parent::init();
    }
}
