<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductionlineFixture
 */
class ProductionlineFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'productionline';
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
                'vendor_id' => 1,
                'vendormaterial_id' => 1,
                'prdline_description' => 'Lorem ipsum dolor sit amet',
                'prdline_capacity' => 1,
                'status' => 1,
                'added_date' => '2023-07-04 17:30:54',
                'updated_date' => '2023-07-04 17:30:54',
            ],
        ];
        parent::init();
    }
}
