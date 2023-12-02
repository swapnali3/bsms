<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PoHeadersFixture
 */
class PoHeadersFixture extends TestFixture
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
                'po_no' => 'Lorem ip',
                'document_type' => 'Lorem ipsum dolor sit amet',
                'created_on' => '2023-12-02 17:52:11',
                'created_user' => 'Lorem ipsum dolor ',
                'created_by' => 'Lorem ipsum dolor sit amet',
                'pay_terms' => 'Lorem ipsum dolor sit amet',
                'currency' => 'L',
                'exchange_rate' => 1.5,
                'release_status' => 'Lorem ip',
                'acknowledge' => 1,
                'acknowledge_no' => 'Lorem ipsum d',
                'acknowledge_date' => '2023-12-02 17:52:11',
                'added_date' => '2023-12-02 17:52:11',
                'updated_date' => '2023-12-02 17:52:11',
            ],
        ];
        parent::init();
    }
}
