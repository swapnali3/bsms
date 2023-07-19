<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LineMaster Entity
 *
 * @property int $id
 * @property string $sap_vendor_code
 * @property int $name
 * @property string $capacity
 * @property string $uom
 * @property int $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 */
class LineMaster extends Entity
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
        'name' => true,
        'capacity' => true,
        'uom' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
    ];
}
