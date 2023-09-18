<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BuyerCodeFile Entity
 *
 * @property int $id
 * @property int|null $buyer_id
 * @property string|null $sap_user
 * @property int|null $req_file_name
 * @property int|null $res_file_name
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\Buyer $buyer
 */
class BuyerCodeFile extends Entity
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
        'buyer_id' => true,
        'sap_user' => true,
        'req_file_name' => true,
        'res_file_name' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'buyer' => true,
    ];
}
