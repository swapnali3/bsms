<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CurrenciesFixture
 */
class CurrenciesFixture extends TestFixture
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
                'code' => 'Lorem ip',
                'name' => 'Lorem ipsum dolor ',
                'added_date' => '2023-08-16 11:32:14',
                'updated_date' => '2023-08-16 11:32:14',
            ],
        ];
        parent::init();
    }
}
