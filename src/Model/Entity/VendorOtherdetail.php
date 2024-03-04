<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendorOtherdetail Entity
 *
 * @property int $id
 * @property int $vendor_temp_id
 * @property string|null $six_sigma
 * @property string|null $six_sigma_file
 * @property string|null $iso
 * @property string|null $iso_file
 * @property string|null $halal_file
 * @property string|null $declaration_file
 * @property string|null $fully_manufactured
 * @property string|null $suppliers_name
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\VendorTemp $vendor_temp
 */
class VendorOtherdetail extends Entity
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
        'vendor_temp_id' => true,
        'six_sigma' => true,
        'six_sigma_file' => true,
        'iso' => true,
        'iso_file' => true,
        'halal_file' => true,
        'declaration_file' => true,
        'fully_manufactured' => true,
        'suppliers_name' => true,
        'added_date' => true,
        'updated_date' => true,
        'vendor_temp' => true,
    ];
}
