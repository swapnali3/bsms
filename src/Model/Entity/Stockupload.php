<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stockupload Entity
 *
 * @property int $id
 * @property int $opening_stock
 * @property int $vendor_material_id
 * @property int $vendor_id
 * @property \Cake\I18n\FrozenTime|null $added_date
 * @property \Cake\I18n\FrozenTime|null $updated_date
 */
class Stockupload extends Entity
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
        'opening_stock' => true,
        'vendor_material_id' => true,
        'vendor_id' => true,
        'added_date' => true,
        'updated_date' => true,
    ];
}
