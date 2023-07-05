<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendorTemp Entity
 *
 * @property int $id
 * @property int $purchasing_organization_id
 * @property int $account_group_id
 * @property int $schema_group_id
 * @property string|null $sap_vendor_code
 * @property string|null $tittle
 * @property string $name
 * @property string|null $address
 * @property string|null $address_2
 * @property string|null $city
 * @property string|null $state
 * @property string|null $pincode
 * @property string|null $mobile
 * @property string|null $email
 * @property string|null $country
 * @property string $payment_term
 * @property string $order_currency
 * @property string|null $gst_no
 * @property string|null $pan_no
 * @property string|null $contact_person
 * @property string|null $contact_email
 * @property string|null $contact_mobile
 * @property string|null $contact_department
 * @property string|null $contact_designation
 * @property string|null $cin_no
 * @property string|null $tan_no
 * @property string|null $gst_file
 * @property string|null $pan_file
 * @property string|null $bank_file
 * @property int $status
 * @property \Cake\I18n\FrozenTime $valid_date
 * @property string|null $remark
 * @property int $buyer_id
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 * @property int|null $update_flag
 *
 * @property \App\Model\Entity\PurchasingOrganization $purchasing_organization
 * @property \App\Model\Entity\AccountGroup $account_group
 * @property \App\Model\Entity\SchemaGroup $schema_group
 * @property \App\Model\Entity\RfqCommunication[] $rfq_communications
 * @property \App\Model\Entity\Rfq[] $rfqs
 * @property \App\Model\Entity\VendorTempOtp[] $vendor_temp_otps
 */
class VendorTemp extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'purchasing_organization_id' => true,
        'account_group_id' => true,
        'schema_group_id' => true,
        'sap_vendor_code' => true,
        'tittle' => true,
        'name' => true,
        'address' => true,
        'address_2' => true,
        'city' => true,
        'state' => true,
        'pincode' => true,
        'mobile' => true,
        'email' => true,
        'country' => true,
        'payment_term' => true,
        'order_currency' => true,
        'gst_no' => true,
        'pan_no' => true,
        'contact_person' => true,
        'contact_email' => true,
        'contact_mobile' => true,
        'contact_department' => true,
        'contact_designation' => true,
        'cin_no' => true,
        'tan_no' => true,
        'gst_file' => true,
        'pan_file' => true,
        'bank_file' => true,
        'status' => true,
        'valid_date' => true,
        'remark' => true,
        'buyer_id' => true,
        'added_date' => true,
        'updated_date' => true,
        'update_flag' => true,
        'purchasing_organization' => true,
        'account_group' => true,
        'schema_group' => true,
        'rfq_communications' => true,
        'rfqs' => true,
        'vendor_temp_otps' => true,
    ];
}
