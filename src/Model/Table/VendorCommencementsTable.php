<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendorCommencements Model
 *
 * @property \App\Model\Table\VendorFactoriesTable&\Cake\ORM\Association\BelongsTo $VendorFactories
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\BelongsTo $VendorTemps
 *
 * @method \App\Model\Entity\VendorCommencement newEmptyEntity()
 * @method \App\Model\Entity\VendorCommencement newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VendorCommencement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorCommencement get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorCommencement findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VendorCommencement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorCommencement[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorCommencement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorCommencement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorCommencement[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorCommencement[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorCommencement[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorCommencement[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendorCommencementsTable extends Table
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

        $this->setTable('vendor_commencements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('VendorFactories', [
            'foreignKey' => 'vendor_factory_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('VendorTemps', [
            'foreignKey' => 'vendor_temp_id',
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
            ->integer('vendor_factory_id')
            ->notEmptyString('vendor_factory_id');

        $validator
            ->integer('vendor_temp_id')
            ->notEmptyString('vendor_temp_id');

        $validator
            ->scalar('commencement_year')
            ->maxLength('commencement_year', 45)
            ->allowEmptyString('commencement_year');

        $validator
            ->scalar('commencement_material')
            ->maxLength('commencement_material', 45)
            ->allowEmptyString('commencement_material');

        $validator
            ->scalar('first_year')
            ->maxLength('first_year', 45)
            ->allowEmptyString('first_year');

        $validator
            ->scalar('first_year_qty')
            ->maxLength('first_year_qty', 45)
            ->allowEmptyString('first_year_qty');

        $validator
            ->scalar('second_year')
            ->maxLength('second_year', 45)
            ->allowEmptyString('second_year');

        $validator
            ->scalar('second_year_qty')
            ->maxLength('second_year_qty', 45)
            ->allowEmptyString('second_year_qty');

        $validator
            ->scalar('third_year')
            ->maxLength('third_year', 45)
            ->allowEmptyString('third_year');

        $validator
            ->scalar('third_year_qty')
            ->maxLength('third_year_qty', 45)
            ->allowEmptyString('third_year_qty');

        $validator
            ->dateTime('added_date')
            ->allowEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->allowEmptyDateTime('updated_date');

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
        $rules->add($rules->existsIn('vendor_factory_id', 'VendorFactories'), ['errorField' => 'vendor_factory_id']);
        $rules->add($rules->existsIn('vendor_temp_id', 'VendorTemps'), ['errorField' => 'vendor_temp_id']);

        return $rules;
    }
}
