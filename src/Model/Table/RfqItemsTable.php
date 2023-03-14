<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RfqItems Model
 *
 * @property \App\Model\Table\RfqsTable&\Cake\ORM\Association\BelongsTo $Rfqs
 * @property \App\Model\Table\PrFootersTable&\Cake\ORM\Association\BelongsTo $PrFooters
 *
 * @method \App\Model\Entity\RfqItem newEmptyEntity()
 * @method \App\Model\Entity\RfqItem newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RfqItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RfqItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\RfqItem findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RfqItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RfqItem[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RfqItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfqItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfqItem[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqItem[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqItem[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqItem[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RfqItemsTable extends Table
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

        $this->setTable('rfq_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Rfqs', [
            'foreignKey' => 'rfq_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PrFooters', [
            'foreignKey' => 'pr_footer_id',
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
            ->integer('pr_footer_id')
            ->notEmptyString('pr_footer_id');

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
        $rules->add($rules->existsIn('rfq_id', 'Rfqs'), ['errorField' => 'rfq_id']);
        $rules->add($rules->existsIn('pr_footer_id', 'PrFooters'), ['errorField' => 'pr_footer_id']);

        return $rules;
    }
}
