<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Factory Entity
 *
 * @property int $id
 * @property int|null $vendor_temps_id
 * @property string|null $sap_vendor_code
 * @property string $factory_code
 * @property string|null $address
 * @property string|null $address_2
 * @property string|null $pincode
 * @property string|null $city
 * @property string|null $state
 * @property string|null $country
 * @property \Cake\I18n\FrozenTime|null $added_date
 * @property \Cake\I18n\FrozenTime|null $updated_date
 *
 * @property \App\Model\Entity\VendorTemp $vendor_temp
 */
class Factory extends Entity
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
        'vendor_temps_id' => true,
        'sap_vendor_code' => true,
        'factory_code' => true,
        'address' => true,
        'address_2' => true,
        'pincode' => true,
        'city' => true,
        'state' => true,
        'country' => true,
        'added_date' => true,
        'updated_date' => true,
        'vendor_temp' => true,
    ];
}
