<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RfqCommunication Entity
 *
 * @property int $id
 * @property int $rfq_id
 * @property int|null $buyer_id
 * @property int|null $vendor_temp_id
 * @property string $message
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\Rfq $rfq
 * @property \App\Model\Entity\VendorTemp $vendor_temp
 */
class RfqCommunication extends Entity
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
        'rfq_id' => true,
        'buyer_id' => true,
        'vendor_temp_id' => true,
        'message' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'rfq' => true,
        'vendor_temp' => true,
    ];
}
