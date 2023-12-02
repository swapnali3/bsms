<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PoHeader Entity
 *
 * @property int $id
 * @property string $sap_vendor_code
 * @property string $po_no
 * @property string $document_type
 * @property \Cake\I18n\FrozenTime $created_on
 * @property string $created_user
 * @property string $created_by
 * @property string $pay_terms
 * @property string $currency
 * @property string $exchange_rate
 * @property string $release_status
 * @property int $acknowledge
 * @property string|null $acknowledge_no
 * @property \Cake\I18n\FrozenTime|null $acknowledge_date
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\PoFooter[] $po_footers
 */
class PoHeader extends Entity
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
        'sap_vendor_code' => true,
        'po_no' => true,
        'document_type' => true,
        'created_on' => true,
        'created_user' => true,
        'created_by' => true,
        'pay_terms' => true,
        'currency' => true,
        'exchange_rate' => true,
        'release_status' => true,
        'acknowledge' => true,
        'acknowledge_no' => true,
        'acknowledge_date' => true,
        'added_date' => true,
        'updated_date' => true,
        'po_footers' => true,
    ];
}
