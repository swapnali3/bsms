<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendorTurnovers Model
 *
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\BelongsTo $VendorTemps
 *
 * @method \App\Model\Entity\VendorTurnover newEmptyEntity()
 * @method \App\Model\Entity\VendorTurnover newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VendorTurnover[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorTurnover get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorTurnover findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VendorTurnover patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorTurnover[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorTurnover|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorTurnover saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorTurnover[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorTurnover[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorTurnover[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorTurnover[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendorTurnoversTable extends Table
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

        $this->setTable('vendor_turnovers');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');

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
            ->integer('vendor_temp_id')
            ->allowEmptyString('vendor_temp_id');

        $validator
            ->scalar('first_year')
            ->maxLength('first_year', 45)
            ->allowEmptyString('first_year');

        $validator
            ->integer('first_year_turnonver')
            ->allowEmptyString('first_year_turnonver');

        $validator
            ->scalar('second_year')
            ->maxLength('second_year', 45)
            ->allowEmptyString('second_year');

        $validator
            ->integer('second_year_turnonver')
            ->allowEmptyString('second_year_turnonver');

        $validator
            ->scalar('third_year')
            ->maxLength('third_year', 45)
            ->allowEmptyString('third_year');

        $validator
            ->integer('third_year_turnonver')
            ->allowEmptyString('third_year_turnonver');

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
        $rules->add($rules->existsIn('vendor_temp_id', 'VendorTemps'), ['errorField' => 'vendor_temp_id']);

        return $rules;
    }
}
