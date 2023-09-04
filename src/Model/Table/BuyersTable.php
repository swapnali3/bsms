<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buyers Model
 *
 * @property \App\Model\Table\CompanyCodesTable&\Cake\ORM\Association\BelongsTo $CompanyCodes
 * @property \App\Model\Table\PurchasingOrganizationsTable&\Cake\ORM\Association\BelongsTo $PurchasingOrganizations
 * @property \App\Model\Table\RfqCommunicationsTable&\Cake\ORM\Association\HasMany $RfqCommunications
 * @property \App\Model\Table\RfqsTable&\Cake\ORM\Association\HasMany $Rfqs
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\HasMany $VendorTemps
 *
 * @method \App\Model\Entity\Buyer newEmptyEntity()
 * @method \App\Model\Entity\Buyer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Buyer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Buyer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Buyer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Buyer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Buyer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Buyer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buyer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buyer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Buyer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Buyer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Buyer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BuyersTable extends Table
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

        $this->setTable('buyers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('CompanyCodes', [
            'foreignKey' => 'company_code_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PurchasingOrganizations', [
            'foreignKey' => 'purchasing_organization_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('RfqCommunications', [
            'foreignKey' => 'buyer_id',
        ]);
        $this->hasMany('Rfqs', [
            'foreignKey' => 'buyer_id',
        ]);
        $this->hasMany('VendorTemps', [
            'foreignKey' => 'buyer_id',
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
            ->integer('company_code_id')
            ->notEmptyString('company_code_id');

        $validator
            ->integer('purchasing_organization_id')
            ->notEmptyString('purchasing_organization_id');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 20)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 20)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 12)
            ->requirePresence('mobile', 'create')
            ->notEmptyString('mobile');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('remark')
            ->allowEmptyString('remark');

        $validator
            ->dateTime('added_date')
            ->notEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->notEmptyDateTime('updated_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->existsIn('company_code_id', 'CompanyCodes'), ['errorField' => 'company_code_id']);
        $rules->add($rules->existsIn('purchasing_organization_id', 'PurchasingOrganizations'), ['errorField' => 'purchasing_organization_id']);

        return $rules;
    }
}
