<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UomsFixture
 */
class UomsFixture extends TestFixture
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
                'code' => 'L',
                'description' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created_date' => '2023-09-16 12:23:16',
                'updated_date' => '2023-09-16 12:23:16',
            ],
        ];
        parent::init();
    }
}
