<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CompanyCode Entity
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\AccountGroup[] $account_groups
 * @property \App\Model\Entity\PaymentTerm[] $payment_terms
 * @property \App\Model\Entity\PurchasingOrganization[] $purchasing_organizations
 * @property \App\Model\Entity\ReconciliationAccount[] $reconciliation_accounts
 * @property \App\Model\Entity\SchemaGroup[] $schema_groups
 */
class CompanyCode extends Entity
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
        'code' => true,
        'name' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'account_groups' => true,
        'payment_terms' => true,
        'purchasing_organizations' => true,
        'reconciliation_accounts' => true,
        'schema_groups' => true,
    ];
}
