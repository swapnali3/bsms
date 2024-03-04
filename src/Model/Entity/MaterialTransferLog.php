<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MaterialTransferLog Entity
 *
 * @property int $id
 * @property string $sap_vendor_code
 * @property string $vendor_factory_code
 * @property string $from_material
 * @property string $to_material
 * @property string $transfer_qty
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 */
class MaterialTransferLog extends Entity
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
        'sap_vendor_code' => true,
        'vendor_factory_code' => true,
        'from_material' => true,
        'to_material' => true,
        'transfer_qty' => true,
        'added_date' => true,
        'updated_date' => true,
    ];
}
