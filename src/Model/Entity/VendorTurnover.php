<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendorTurnover Entity
 *
 * @property int $ID
 * @property int|null $vendor_temp_id
 * @property string|null $first_year
 * @property int|null $first_year_turnover
 * @property string|null $second_year
 * @property int|null $second_year_turnover
 * @property string|null $third_year
 * @property int|null $third_year_turnover
 * @property \Cake\I18n\FrozenTime|null $added_date
 * @property \Cake\I18n\FrozenTime|null $updated_date
 *
 * @property \App\Model\Entity\VendorTemp $vendor_temp
 */
class VendorTurnover extends Entity
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
        'first_year' => true,
        'first_year_turnover' => true,
        'second_year' => true,
        'second_year_turnover' => true,
        'third_year' => true,
        'third_year_turnover' => true,
        'added_date' => true,
        'updated_date' => true,
        'vendor_temp' => true,
    ];
}
