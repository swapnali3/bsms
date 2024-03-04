<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MaterialHistory Entity
 *
 * @property int $id
 * @property string $sap_vendor_code
 * @property string $code
 * @property string $description
 * @property string|null $minimum_stock
 * @property string|null $uom
 * @property bool|null $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 */
class MaterialHistory extends Entity
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
        'code' => true,
        'description' => true,
        'minimum_stock' => true,
        'uom' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
    ];
}
