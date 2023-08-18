<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendorIncometaxes Model
 *
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\BelongsTo $VendorTemps
 *
 * @method \App\Model\Entity\VendorIncometax newEmptyEntity()
 * @method \App\Model\Entity\VendorIncometax newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VendorIncometax[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorIncometax get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorIncometax findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VendorIncometax patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorIncometax[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorIncometax|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorIncometax saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorIncometax[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorIncometax[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorIncometax[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorIncometax[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendorIncometaxesTable extends Table
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

        $this->setTable('vendor_incometaxes');
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
            ->integer('vendor_temp_id')
            ->allowEmptyString('vendor_temp_id');

        $validator
            ->scalar('certificate_no')
            ->maxLength('certificate_no', 45)
            ->allowEmptyString('certificate_no');

        $validator
            ->date('certificate_date')
            ->allowEmptyDate('certificate_date');

        $validator
            ->scalar('certificate_file')
            ->maxLength('certificate_file', 250)
            ->allowEmptyFile('certificate_file');

        $validator
            ->scalar('balance_sheet_file')
            ->maxLength('balance_sheet_file', 250)
            ->allowEmptyFile('balance_sheet_file');

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
