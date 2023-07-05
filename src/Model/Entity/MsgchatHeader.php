<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MsgchatHeader Entity
 *
 * @property int $id
 * @property string $table_name
 * @property int $table_pk
 * @property string $subject
 * @property \Cake\I18n\FrozenTime|null $addeddate
 * @property \Cake\I18n\FrozenTime|null $updateddate
 */
class MsgchatHeader extends Entity
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
        'table_name' => true,
        'table_pk' => true,
        'subject' => true,
        'addeddate' => true,
        'updateddate' => true,
    ];
}
