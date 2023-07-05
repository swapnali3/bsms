<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendorMaterial Entity
 *
 * @property int $id
 * @property int $vendor_id
 * @property int $vendor_material_code
 * @property string $description
 * @property int|null $buyer_material_code
 * @property int|null $minimum_stock
 * @property string|null $uom
 * @property bool|null $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 */
class VendorMaterial extends Entity
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
        'vendor_id' => true,
        'vendor_material_code' => true,
        'description' => true,
        'buyer_material_code' => true,
        'minimum_stock' => true,
        'uom' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
    ];
}
