<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PrFooter Entity
 *
 * @property int $id
 * @property int $pr_header_id
 * @property string $item
 * @property string $material
 * @property string $short_text
 * @property string $qty
 * @property string $unit
 * @property string|null $delivery_date
 * @property string|null $material_group
 * @property string $plant
 * @property string|null $storage_location
 * @property string|null $purchase_group
 * @property string|null $requisitioner
 * @property string|null $total_value
 * @property string $price
 * @property int|null $purchase_organization
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\PrHeader $pr_header
 */
class PrFooter extends Entity
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
        'pr_header_id' => true,
        'item' => true,
        'material' => true,
        'short_text' => true,
        'qty' => true,
        'unit' => true,
        'delivery_date' => true,
        'material_group' => true,
        'plant' => true,
        'storage_location' => true,
        'purchase_group' => true,
        'requisitioner' => true,
        'total_value' => true,
        'price' => true,
        'purchase_organization' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'pr_header' => true,
    ];
}
