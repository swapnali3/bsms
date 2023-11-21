<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LoginTokenFixture
 */
class LoginTokenFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'login_token';
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
                'user_id' => 1,
                'session' => 'Lorem ipsum dolor sit amet',
                'login_token' => 'Lorem ipsum dolor sit amet',
                'added_date' => '2023-11-13 16:12:38',
                'updated_date' => '2023-11-13 16:12:38',
            ],
        ];
        parent::init();
    }
}
