<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendorCommencement Entity
 *
 * @property int $id
 * @property int $vendor_factory_id
 * @property int $vendor_temp_id
 * @property string|null $commencement_year
 * @property string|null $commencement_material
 * @property int|null $first_year
 * @property string|null $first_year_qty
 * @property int|null $second_year
 * @property string|null $second_year_qty
 * @property int|null $third_year
 * @property string|null $third_year_qty
 * @property \Cake\I18n\FrozenTime|null $added_date
 * @property \Cake\I18n\FrozenTime|null $updated_date
 *
 * @property \App\Model\Entity\VendorFactory $vendor_factory
 * @property \App\Model\Entity\VendorTemp $vendor_temp
 */
class VendorCommencement extends Entity
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
        'vendor_factory_id' => true,
        'vendor_temp_id' => true,
        'commencement_year' => true,
        'commencement_material' => true,
        'first_year' => true,
        'first_year_qty' => true,
        'second_year' => true,
        'second_year_qty' => true,
        'third_year' => true,
        'third_year_qty' => true,
        'added_date' => true,
        'updated_date' => true,
        'vendor_factory' => true,
        'vendor_temp' => true,
    ];
}
