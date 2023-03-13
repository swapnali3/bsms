<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrFooters Model
 *
 * @property \App\Model\Table\PrHeadersTable&\Cake\ORM\Association\BelongsTo $PrHeaders
 *
 * @method \App\Model\Entity\PrFooter newEmptyEntity()
 * @method \App\Model\Entity\PrFooter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PrFooter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrFooter get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrFooter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PrFooter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrFooter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrFooter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrFooter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrFooter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PrFooter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PrFooter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PrFooter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PrFootersTable extends Table
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

        $this->setTable('pr_footers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('PrHeaders', [
            'foreignKey' => 'pr_header_id',
            'joinType' => 'INNER',
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
            ->integer('pr_header_id')
            ->notEmptyString('pr_header_id');

        $validator
            ->scalar('item')
            ->maxLength('item', 5)
            ->requirePresence('item', 'create')
            ->notEmptyString('item');

        $validator
            ->scalar('material')
            ->maxLength('material', 20)
            ->requirePresence('material', 'create')
            ->notEmptyString('material');

        $validator
            ->scalar('short_text')
            ->maxLength('short_text', 50)
            ->requirePresence('short_text', 'create')
            ->notEmptyString('short_text');

        $validator
            ->decimal('qty')
            ->requirePresence('qty', 'create')
            ->notEmptyString('qty');

        $validator
            ->scalar('unit')
            ->maxLength('unit', 5)
            ->requirePresence('unit', 'create')
            ->notEmptyString('unit');

        $validator
            ->scalar('delivery_date')
            ->maxLength('delivery_date', 15)
            ->allowEmptyString('delivery_date');

        $validator
            ->scalar('material_group')
            ->maxLength('material_group', 10)
            ->allowEmptyString('material_group');

        $validator
            ->scalar('plant')
            ->maxLength('plant', 10)
            ->requirePresence('plant', 'create')
            ->notEmptyString('plant');

        $validator
            ->scalar('storage_location')
            ->maxLength('storage_location', 10)
            ->allowEmptyString('storage_location');

        $validator
            ->scalar('purchase_group')
            ->maxLength('purchase_group', 10)
            ->allowEmptyString('purchase_group');

        $validator
            ->scalar('requisitioner')
            ->maxLength('requisitioner', 10)
            ->allowEmptyString('requisitioner');

        $validator
            ->decimal('total_value')
            ->allowEmptyString('total_value');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->integer('purchase_organization')
            ->allowEmptyString('purchase_organization');

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
        $rules->add($rules->existsIn('pr_header_id', 'PrHeaders'), ['errorField' => 'pr_header_id']);

        return $rules;
    }
}
