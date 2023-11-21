<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AsnFooters Model
 *
 * @property \App\Model\Table\PoFootersTable&\Cake\ORM\Association\BelongsTo $PoFooters
 *
 * @method \App\Model\Entity\AsnFooter newEmptyEntity()
 * @method \App\Model\Entity\AsnFooter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AsnFooter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AsnFooter get($primaryKey, $options = [])
 * @method \App\Model\Entity\AsnFooter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AsnFooter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AsnFooter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AsnFooter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AsnFooter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AsnFooter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AsnFooter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AsnFooter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AsnFooter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AsnFootersTable extends Table
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

        $this->setTable('asn_footers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AsnHeaders', [
            'foreignKey' => 'asn_header_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PoFooters', [
            'foreignKey' => 'po_footer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PoItemSchedules', [
            'foreignKey' => 'po_schedule_id',
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
            ->integer('asn_header_id')
            ->notEmptyString('asn_header_id');

        $validator
            ->integer('po_footer_id')
            ->notEmptyString('po_footer_id');

        $validator
            ->integer('po_schedule_id')
            ->requirePresence('po_schedule_id', 'create')
            ->notEmptyString('po_schedule_id');

        $validator
            ->decimal('qty')
            ->requirePresence('qty', 'create')
            ->notEmptyString('qty');

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
        $rules->add($rules->existsIn('asn_header_id', 'AsnHeaders'), ['errorField' => 'asn_header_id']);
        $rules->add($rules->existsIn('po_footer_id', 'PoFooters'), ['errorField' => 'po_footer_id']);

        return $rules;
    }
}
