<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BuyersFixture
 */
class BuyersFixture extends TestFixture
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
                'purchasing_organization_id' => 1,
                'sap_user' => 'Lorem ipsum dolor ',
                'first_name' => 'Lorem ipsum dolor ',
                'last_name' => 'Lorem ipsum dolor ',
                'mobile' => 'Lorem ipsu',
                'email' => 'Lorem ipsum dolor sit amet',
                'remark' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'status' => 1,
                'added_date' => '2023-11-21 12:51:17',
                'updated_date' => '2023-11-21 12:51:17',
            ],
        ];
        parent::init();
    }
}
