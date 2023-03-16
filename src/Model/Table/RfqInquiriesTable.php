<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RfqInquiries Model
 *
 * @property \App\Model\Table\RfqsTable&\Cake\ORM\Association\BelongsTo $Rfqs
 * @property \App\Model\Table\RfqItemsTable&\Cake\ORM\Association\BelongsTo $RfqItems
 *
 * @method \App\Model\Entity\RfqInquiry newEmptyEntity()
 * @method \App\Model\Entity\RfqInquiry newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RfqInquiry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RfqInquiry get($primaryKey, $options = [])
 * @method \App\Model\Entity\RfqInquiry findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RfqInquiry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RfqInquiry[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RfqInquiry|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfqInquiry saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfqInquiry[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqInquiry[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqInquiry[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqInquiry[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RfqInquiriesTable extends Table
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

        $this->setTable('rfq_inquiries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Rfqs', [
            'foreignKey' => 'rfq_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RfqItems', [
            'foreignKey' => 'rfq_item_id',
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
            ->integer('rfq_id')
            ->notEmptyString('rfq_id');

        $validator
            ->integer('rfq_item_id')
            ->notEmptyString('rfq_item_id');

        $validator
            ->integer('seller_id')
            ->requirePresence('seller_id', 'create')
            ->notEmptyString('seller_id');

        $validator
            ->decimal('qty')
            ->allowEmptyString('qty');

        $validator
            ->decimal('rate')
            ->allowEmptyString('rate');

        $validator
            ->decimal('discount')
            ->notEmptyString('discount');

        $validator
            ->decimal('sub_total')
            ->notEmptyString('sub_total');

        $validator
            ->date('delivery_date')
            ->allowEmptyDate('delivery_date');

        $validator
            ->allowEmptyString('inquiry_data');

        $validator
            ->boolean('inquiry')
            ->allowEmptyString('inquiry');

        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

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
        $rules->add($rules->existsIn('rfq_item_id', 'RfqItems'), ['errorField' => 'rfq_item_id']);
        $rules->add($rules->existsIn('rfq_id', 'Rfqs'), ['errorField' => 'rfq_id']);

        return $rules;
    }
}
