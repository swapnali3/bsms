<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BuyerCodeFilesFixture
 */
class BuyerCodeFilesFixture extends TestFixture
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
                'buyer_id' => 1,
                'sap_user' => 'Lorem ipsum dolor ',
                'req_file_name' => 1,
                'res_file_name' => 1,
                'status' => 1,
                'added_date' => '2023-09-18 17:15:01',
                'updated_date' => '2023-09-18 17:15:01',
            ],
        ];
        parent::init();
    }
}
