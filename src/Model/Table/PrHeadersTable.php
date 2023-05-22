<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrHeaders Model
 *
 * @property \App\Model\Table\PrFootersTable&\Cake\ORM\Association\HasMany $PrFooters
 *
 * @method \App\Model\Entity\PrHeader newEmptyEntity()
 * @method \App\Model\Entity\PrHeader newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PrHeader[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrHeader get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrHeader findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PrHeader patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrHeader[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrHeader|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrHeader saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrHeader[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PrHeader[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PrHeader[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PrHeader[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PrHeadersTable extends Table
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

        $this->setTable('pr_headers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('PrFooters', [
            'foreignKey' => 'pr_header_id',
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
            ->scalar('pr_no')
            ->maxLength('pr_no', 10)
            ->requirePresence('pr_no', 'create')
            ->notEmptyString('pr_no')
            ->add('pr_no', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('description')
            ->maxLength('description', 50)
            ->allowEmptyString('description');

        $validator
            ->scalar('pr_type')
            ->maxLength('pr_type', 4)
            ->requirePresence('pr_type', 'create')
            ->notEmptyString('pr_type');

        $validator
            ->scalar('purchase_group')
            ->maxLength('purchase_group', 10)
            ->requirePresence('purchase_group', 'create')
            ->notEmptyString('purchase_group');

        $validator
            ->boolean('status')
            ->notEmptyString('status');

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
        $rules->add($rules->isUnique(['pr_no']), ['errorField' => 'pr_no']);

        return $rules;
    }
}
