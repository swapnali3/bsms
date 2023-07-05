<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dailymonitor Entity
 *
 * @property int $id
 * @property int|null $vendor_id
 * @property int|null $productionline_id
 * @property int|null $target_production
 * @property int|null $confirm_production
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime|null $added_date
 * @property \Cake\I18n\FrozenTime|null $updated_date
 */
class Dailymonitor extends Entity
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
        'productionline_id' => true,
        'target_production' => true,
        'confirm_production' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
    ];
}
