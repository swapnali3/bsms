<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RfqCommunications Model
 *
 * @property \App\Model\Table\RfqsTable&\Cake\ORM\Association\BelongsTo $Rfqs
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\BelongsTo $VendorTemps
 *
 * @method \App\Model\Entity\RfqCommunication newEmptyEntity()
 * @method \App\Model\Entity\RfqCommunication newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RfqCommunication[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RfqCommunication get($primaryKey, $options = [])
 * @method \App\Model\Entity\RfqCommunication findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RfqCommunication patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RfqCommunication[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RfqCommunication|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfqCommunication saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfqCommunication[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqCommunication[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqCommunication[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqCommunication[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RfqCommunicationsTable extends Table
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

        $this->setTable('rfq_communications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Rfqs', [
            'foreignKey' => 'rfq_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('VendorTemps', [
            'foreignKey' => 'vendor_temp_id',
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
            ->integer('buyer_id')
            ->allowEmptyString('buyer_id');

        $validator
            ->integer('vendor_temp_id')
            ->allowEmptyString('vendor_temp_id');

        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->notEmptyString('message');

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
        $rules->add($rules->existsIn('vendor_temp_id', 'VendorTemps'), ['errorField' => 'vendor_temp_id']);

        return $rules;
    }
}
