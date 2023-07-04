<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Productionline Entity
 *
 * @property int $id
 * @property int $vendor_id
 * @property int $vendormaterial_id
 * @property string $prdline_description
 * @property int $prdline_capacity
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime|null $added_date
 * @property \Cake\I18n\FrozenTime|null $updated_date
 *
 * @property \App\Model\Entity\Dailymonitor[] $dailymonitor
 */
class Productionline extends Entity
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
        'vendormaterial_id' => true,
        'prdline_description' => true,
        'prdline_capacity' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'dailymonitor' => true,
    ];
}
