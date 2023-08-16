<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchasingOrganization Entity
 *
 * @property int $id
 * @property int $company_code_id
 * @property string $code
 * @property string $name
 * @property int $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\CompanyCode $company_code
 * @property \App\Model\Entity\VendorTemp[] $vendor_temps
 */
class PurchasingOrganization extends Entity
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
        'code' => true,
        'name' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'company_code' => true,
        'vendor_temps' => true,
    ];
}
