<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentTermsFixture
 */
class PaymentTermsFixture extends TestFixture
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
                'description' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'added_date' => '2023-08-11 19:38:33',
                'updated_date' => '2023-08-11 19:38:33',
            ],
        ];
        parent::init();
    }
}
