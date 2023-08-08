<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PaymentTerms Model
 *
 * @method \App\Model\Entity\PaymentTerm newEmptyEntity()
 * @method \App\Model\Entity\PaymentTerm newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PaymentTerm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PaymentTerm get($primaryKey, $options = [])
 * @method \App\Model\Entity\PaymentTerm findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PaymentTerm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PaymentTerm[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PaymentTerm|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PaymentTerm saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PaymentTerm[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PaymentTerm[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PaymentTerm[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PaymentTerm[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PaymentTermsTable extends Table
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

        $this->setTable('payment_terms');
        $this->setDisplayField('code');
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
            ->maxLength('code', 5)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('description')
            ->maxLength('description', 250)
            ->allowEmptyString('description');

        $validator
            ->boolean('status')
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
