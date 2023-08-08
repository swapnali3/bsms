<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AccountGroups Model
 *
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\HasMany $VendorTemps
 *
 * @method \App\Model\Entity\AccountGroup newEmptyEntity()
 * @method \App\Model\Entity\AccountGroup newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AccountGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AccountGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\AccountGroup findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AccountGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AccountGroup[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AccountGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AccountGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AccountGroup[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AccountGroup[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AccountGroup[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AccountGroup[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AccountGroupsTable extends Table
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

        $this->setTable('account_groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('CompanyCodes', [
            'foreignKey' => 'company_code_id',
        ]);
        $this->hasMany('VendorTemps', [
            'foreignKey' => 'account_group_id',
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
            ->maxLength('code', 15)
            ->allowEmptyString('code');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->notEmptyString('status');

        $validator
            ->dateTime('added_date')
            ->notEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->notEmptyDateTime('updated_date');

        $validator
            ->integer('company_code_id')
            ->allowEmptyString('company_code_id');

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
        $rules->add($rules->existsIn('company_code_id', 'CompanyCodes'), ['errorField' => 'company_code_id']);

        return $rules;
    }
}
