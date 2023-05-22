<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AsnFooter Entity
 *
 * @property int $id
 * @property int $asn_header_id
 * @property int $po_footer_id
 * @property int $po_schedule_id
 * @property string $qty
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\PoFooter $po_footer
 */
class AsnFooter extends Entity
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
        'asn_header_id' => true,
        'po_footer_id' => true,
        'po_schedule_id' => true,
        'qty' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'po_footer' => true,
    ];
}
