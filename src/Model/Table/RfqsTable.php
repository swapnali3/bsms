<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rfqs Model
 *
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\BelongsTo $VendorTemps
 * @property \App\Model\Table\PrHeadersTable&\Cake\ORM\Association\BelongsTo $PrHeaders
 * @property \App\Model\Table\RfqItemsTable&\Cake\ORM\Association\HasMany $RfqItems
 *
 * @method \App\Model\Entity\Rfq newEmptyEntity()
 * @method \App\Model\Entity\Rfq newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Rfq[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rfq get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rfq findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Rfq patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rfq[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rfq|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rfq saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rfq[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rfq[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rfq[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rfq[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RfqsTable extends Table
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

        $this->setTable('rfqs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('VendorTemps', [
            'foreignKey' => 'vendor_temp_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PrHeaders', [
            'foreignKey' => 'pr_header_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('RfqCommunications', [
            'foreignKey' => 'rfq_id',
        ]);
        $this->hasMany('RfqItems', [
            'foreignKey' => 'rfq_id',
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
            ->requirePresence('rfq_no', 'create')
            ->notEmptyString('rfq_no');

        $validator
            ->integer('buyer_id')
            ->requirePresence('buyer_id', 'create')
            ->notEmptyString('buyer_id');

        $validator
            ->integer('vendor_temp_id')
            ->notEmptyString('vendor_temp_id');

        $validator
            ->integer('pr_header_id')
            ->notEmptyString('pr_header_id');

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
        $rules->add($rules->existsIn('vendor_temp_id', 'VendorTemps'), ['errorField' => 'vendor_temp_id']);
        $rules->add($rules->existsIn('pr_header_id', 'PrHeaders'), ['errorField' => 'pr_header_id']);

        return $rules;
    }
}
