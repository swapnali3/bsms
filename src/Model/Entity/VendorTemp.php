<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendorTemp Entity
 *
 * @property int $id
 * @property int $company_code_id
 * @property int $purchasing_organization_id
 * @property int $account_group_id
 * @property int $schema_group_id
 * @property int $reconciliation_account_id
 * @property string|null $sap_vendor_code
 * @property string $title
 * @property string $name
 * @property string|null $address
 * @property string|null $address_2
 * @property string|null $city
 * @property int $state_id
 * @property string|null $pincode
 * @property string $mobile
 * @property string $email
 * @property int $country_id
 * @property int $payment_term_id
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
 * @property \App\Model\Entity\CompanyCode $company_code
 * @property \App\Model\Entity\PurchasingOrganization $purchasing_organization
 * @property \App\Model\Entity\AccountGroup $account_group
 * @property \App\Model\Entity\SchemaGroup $schema_group
 * @property \App\Model\Entity\ReconciliationAccount $reconciliation_account
 * @property \App\Model\Entity\RfqCommunication[] $rfq_communications
 * @property \App\Model\Entity\Rfq[] $rfqs
 * @property \App\Model\Entity\VendorBankDetail[] $vendor_bank_details
 * @property \App\Model\Entity\VendorBranchOffice[] $vendor_branch_offices
 * @property \App\Model\Entity\VendorCertificate[] $vendor_certificates
 * @property \App\Model\Entity\VendorCommencement[] $vendor_commencements
 * @property \App\Model\Entity\VendorFacility[] $vendor_facilities
 * @property \App\Model\Entity\VendorIncometax[] $vendor_incometaxes
 * @property \App\Model\Entity\VendorOtherdetail[] $vendor_otherdetails
 * @property \App\Model\Entity\VendorPartnerAddres[] $vendor_partner_address
 * @property \App\Model\Entity\VendorProductionHistory[] $vendor_production_histories
 * @property \App\Model\Entity\VendorQuestionnaire[] $vendor_questionnaires
 * @property \App\Model\Entity\VendorRegisteredOffice[] $vendor_registered_offices
 * @property \App\Model\Entity\VendorReputedCustomer[] $vendor_reputed_customers
 * @property \App\Model\Entity\VendorTempOtp[] $vendor_temp_otps
 * @property \App\Model\Entity\VendorTurnover[] $vendor_turnovers
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
        'company_code_id' => true,
        'purchasing_organization_id' => true,
        'account_group_id' => true,
        'schema_group_id' => true,
        'reconciliation_account_id' => true,
        'sap_vendor_code' => true,
        'title' => true,
        'name' => true,
        'address' => true,
        'address_2' => true,
        'city' => true,
        'state_id' => true,
        'pincode' => true,
        'mobile' => true,
        'email' => true,
        'country_id' => true,
        'payment_term_id' => true,
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
        'vendor_status' => true,
        'company_code' => true,
        'purchasing_organization' => true,
        'account_group' => true,
        'schema_group' => true,
        'reconciliation_account' => true,
        'rfq_communications' => true,
        'rfqs' => true,
        'vendor_bank_details' => true,
        'vendor_branch_offices' => true,
        'vendor_certificates' => true,
        'vendor_commencements' => true,
        'vendor_facilities' => true,
        'vendor_incometaxes' => true,
        'vendor_otherdetails' => true,
        'vendor_partner_address' => true,
        'vendor_production_histories' => true,
        'vendor_questionnaires' => true,
        'vendor_registered_offices' => true,
        'vendor_reputed_customers' => true,
        'vendor_temp_otps' => true,
        'vendor_turnovers' => true,
    ];
}
