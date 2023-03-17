<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rfq Entity
 *
 * @property int $id
 * @property int $rfq_no
 * @property int $buyer_id
 * @property int $vendor_temp_id
 * @property int $pr_header_id
 * @property string $sub_total
 * @property string $freight_value
 * @property string $tax_value
 * @property string $total_value
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\VendorTemp $vendor_temp
 * @property \App\Model\Entity\PrHeader $pr_header
 * @property \App\Model\Entity\RfqCommunication[] $rfq_communications
 * @property \App\Model\Entity\RfqItem[] $rfq_items
 */
class Rfq extends Entity
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
        'rfq_no' => true,
        'buyer_id' => true,
        'vendor_temp_id' => true,
        'pr_header_id' => true,
        'sub_total' => true,
        'freight_value' => true,
        'tax_value' => true,
        'total_value' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'vendor_temp' => true,
        'pr_header' => true,
        'rfq_communications' => true,
        'rfq_items' => true,
    ];
}
