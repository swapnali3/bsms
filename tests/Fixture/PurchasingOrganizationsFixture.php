<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PurchasingOrganizationsFixture
 */
class PurchasingOrganizationsFixture extends TestFixture
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
                'company_code_id' => 1,
                'code' => 'Lorem ipsum d',
                'name' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'added_date' => '2023-08-12 15:26:18',
                'updated_date' => '2023-08-12 15:26:18',
            ],
        ];
        parent::init();
    }
}
