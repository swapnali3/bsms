<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TitlesFixture
 */
class TitlesFixture extends TestFixture
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
                'name' => 'Lorem ipsum d',
                'added_date' => '2023-08-12 15:09:40',
                'updated_date' => '2023-08-12 15:09:40',
            ],
        ];
        parent::init();
    }
}
