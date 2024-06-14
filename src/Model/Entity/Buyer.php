<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Buyer Entity
 *
 * @property int $id
 * @property int $company_code_id
 * @property int $purchasing_organization_id
 * @property string $sap_user
 * @property string $first_name
 * @property string $last_name
 * @property string $mobile
 * @property string $email
 * @property int|null $manager_id
 * @property string|null $remark
 * @property int $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\CompanyCode $company_code
 * @property \App\Model\Entity\PurchasingOrganization $purchasing_organization
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\BuyerCodeFile[] $buyer_code_files
 * @property \App\Model\Entity\RfqCommunication[] $rfq_communications
 * @property \App\Model\Entity\Rfq[] $rfqs
 */
class Buyer extends Entity
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
        'sap_user' => true,
        'first_name' => true,
        'last_name' => true,
        'mobile' => true,
        'email' => true,
        'manager_id' => true,
        'remark' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'company_code' => true,
        'purchasing_organization' => true,
        'manager' => true,
        'buyer_code_files' => true,
        'rfq_communications' => true,
        'rfqs' => true,
    ];
}
