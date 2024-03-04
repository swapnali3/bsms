<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendorFacilities Model
 *
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\BelongsTo $VendorTemps
 *
 * @method \App\Model\Entity\VendorFacility newEmptyEntity()
 * @method \App\Model\Entity\VendorFacility newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VendorFacility[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorFacility get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorFacility findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VendorFacility patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorFacility[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorFacility|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorFacility saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorFacility[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorFacility[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorFacility[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorFacility[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendorFacilitiesTable extends Table
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

        $this->setTable('vendor_facilities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->scalar('vendor_temp_id')
            ->maxLength('vendor_temp_id', 45)
            ->allowEmptyString('vendor_temp_id');

        $validator
            ->scalar('lab_facility')
            ->maxLength('lab_facility', 45)
            ->allowEmptyString('lab_facility');

        $validator
            ->scalar('lab_facility_file')
            ->maxLength('lab_facility_file', 250)
            ->allowEmptyFile('lab_facility_file');

        $validator
            ->scalar('isi_registration')
            ->maxLength('isi_registration', 45)
            ->allowEmptyString('isi_registration');

        $validator
            ->scalar('isi_registration_file')
            ->maxLength('isi_registration_file', 250)
            ->allowEmptyFile('isi_registration_file');

        $validator
            ->scalar('test_facility')
            ->maxLength('test_facility', 45)
            ->allowEmptyString('test_facility');

        $validator
            ->scalar('test_facility_file')
            ->maxLength('test_facility_file', 250)
            ->allowEmptyFile('test_facility_file');

        $validator
            ->scalar('sales_services')
            ->maxLength('sales_services', 45)
            ->allowEmptyString('sales_services');

        $validator
            ->scalar('sales_services_file')
            ->maxLength('sales_services_file', 250)
            ->allowEmptyFile('sales_services_file');

        $validator
            ->scalar('quality_control')
            ->maxLength('quality_control', 45)
            ->allowEmptyString('quality_control');

        $validator
            ->scalar('quality_control_file')
            ->maxLength('quality_control_file', 250)
            ->allowEmptyFile('quality_control_file');

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
