<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReconciliationAccounts Model
 *
 * @property \App\Model\Table\CompanyCodesTable&\Cake\ORM\Association\BelongsTo $CompanyCodes
 *
 * @method \App\Model\Entity\ReconciliationAccount newEmptyEntity()
 * @method \App\Model\Entity\ReconciliationAccount newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ReconciliationAccount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReconciliationAccount get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReconciliationAccount findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ReconciliationAccount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReconciliationAccount[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReconciliationAccount|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReconciliationAccount saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReconciliationAccount[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ReconciliationAccount[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ReconciliationAccount[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ReconciliationAccount[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ReconciliationAccountsTable extends Table
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

        $this->setTable('reconciliation_accounts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('CompanyCodes', [
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
