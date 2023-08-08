<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompanyCodes Model
 *
 * @property \App\Model\Table\AccountGroupsTable&\Cake\ORM\Association\HasMany $AccountGroups
 * @property \App\Model\Table\PaymentTermsTable&\Cake\ORM\Association\HasMany $PaymentTerms
 * @property \App\Model\Table\PurchasingOrganizationsTable&\Cake\ORM\Association\HasMany $PurchasingOrganizations
 * @property \App\Model\Table\ReconciliationAccountsTable&\Cake\ORM\Association\HasMany $ReconciliationAccounts
 * @property \App\Model\Table\SchemaGroupsTable&\Cake\ORM\Association\HasMany $SchemaGroups
 *
 * @method \App\Model\Entity\CompanyCode newEmptyEntity()
 * @method \App\Model\Entity\CompanyCode newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CompanyCode[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompanyCode get($primaryKey, $options = [])
 * @method \App\Model\Entity\CompanyCode findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CompanyCode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CompanyCode[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompanyCode|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompanyCode saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompanyCode[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CompanyCode[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CompanyCode[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CompanyCode[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CompanyCodesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('company_codes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('AccountGroups', [
            'foreignKey' => 'company_code_id',
        ]);
        $this->hasMany('PaymentTerms', [
            'foreignKey' => 'company_code_id',
        ]);
        $this->hasMany('PurchasingOrganizations', [
            'foreignKey' => 'company_code_id',
        ]);
        $this->hasMany('ReconciliationAccounts', [
            'foreignKey' => 'company_code_id',
        ]);
        $this->hasMany('SchemaGroups', [
            'foreignKey' => 'company_code_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('code')
            ->maxLength('code', 45)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('added_date')
            ->notEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->notEmptyDateTime('updated_date');

        return $validator;
    }
}
