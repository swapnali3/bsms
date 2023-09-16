<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendorTempsFixture
 */
class VendorTempsFixture extends TestFixture
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
                'account_group_id' => 1,
                'schema_group_id' => 1,
                'reconciliation_account_id' => 1,
                'sap_vendor_code' => 'Lorem ip',
                'title' => 'Lorem ipsum d',
                'name' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'state_id' => 1,
                'pincode' => 'Lore',
                'mobile' => 'Lorem ipsu',
                'email' => 'Lorem ipsum dolor sit amet',
                'country_id' => 1,
                'payment_term_id' => 1,
                'order_currency' => 'Lorem ip',
                'gst_no' => 'Lorem ipsum dolor ',
                'pan_no' => 'Lorem ipsum dolor ',
                'contact_person' => 'Lorem ipsum dolor sit amet',
                'contact_email' => 'Lorem ipsum dolor sit amet',
                'contact_mobile' => 'Lorem ipsu',
                'contact_department' => 'Lorem ipsum dolor sit amet',
                'contact_designation' => 'Lorem ipsum dolor sit amet',
                'cin_no' => 'Lorem ipsum dolor sit a',
                'tan_no' => 'Lorem ipsum dolor sit a',
                'gst_file' => 'Lorem ipsum dolor sit amet',
                'pan_file' => 'Lorem ipsum dolor sit amet',
                'bank_file' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'valid_date' => '2023-09-16 11:47:19',
                'remark' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'from_sap' => 1,
                'added_date' => '2023-09-16 11:47:19',
                'updated_date' => '2023-09-16 11:47:19',
                'update_flag' => 1,
                'business_type' => 'Lorem ipsum dolor sit amet',
                'telephone' => 'Lorem ipsum d',
                'faxno' => 'Lorem ipsum d',
                'bank_name' => 'Lorem ipsum dolor sit amet',
                'bank_branch' => 'Lorem ipsum dolor sit amet',
                'bank_number' => 'Lorem ipsum dolor sit amet',
                'bank_ifsc' => 'Lorem ipsum dolor sit amet',
                'bank_key' => 'Lorem ipsum dolor sit amet',
                'bank_country' => 'Lorem ipsum dolor sit amet',
                'bank_city' => 'Lorem ipsum dolor sit amet',
                'bank_swift' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
