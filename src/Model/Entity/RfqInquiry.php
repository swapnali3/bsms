<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RfqInquiry Entity
 *
 * @property int $id
 * @property int $rfq_id
 * @property int $rfq_item_id
 * @property int $seller_id
 * @property string|null $qty
 * @property string|null $rate
 * @property \Cake\I18n\FrozenDate|null $delivery_date
 * @property array|null $inquiry_data
 * @property bool|null $inquiry
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\RfqItem $rfq_item
 */
class RfqInquiry extends Entity
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
        'rfq_item_id' => true,
        'seller_id' => true,
        'qty' => true,
        'rate' => true,
        'delivery_date' => true,
        'inquiry_data' => true,
        'inquiry' => true,
        'created_date' => true,
        'updated_date' => true,
        'rfq_item' => true,
    ];
}
