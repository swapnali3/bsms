<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendorOtherdetails Model
 *
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\BelongsTo $VendorTemps
 *
 * @method \App\Model\Entity\VendorOtherdetail newEmptyEntity()
 * @method \App\Model\Entity\VendorOtherdetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VendorOtherdetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorOtherdetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorOtherdetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VendorOtherdetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorOtherdetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorOtherdetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorOtherdetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorOtherdetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorOtherdetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorOtherdetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorOtherdetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendorOtherdetailsTable extends Table
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

        $this->setTable('vendor_otherdetails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->integer('vendor_temp_id')
            ->notEmptyString('vendor_temp_id');

        $validator
            ->scalar('six_sigma')
            ->maxLength('six_sigma', 250)
            ->requirePresence('six_sigma', 'create')
            ->notEmptyString('six_sigma');

        $validator
            ->boolean('six_sigma_file')
            ->requirePresence('six_sigma_file', 'create')
            ->notEmptyFile('six_sigma_file');

        $validator
            ->scalar('iso')
            ->maxLength('iso', 250)
            ->requirePresence('iso', 'create')
            ->notEmptyString('iso');

        $validator
            ->scalar('iso_file')
            ->maxLength('iso_file', 250)
            ->allowEmptyFile('iso_file');

        $validator
            ->scalar('halal_file')
            ->maxLength('halal_file', 250)
            ->allowEmptyFile('halal_file');

        $validator
            ->scalar('declaration_file')
            ->maxLength('declaration_file', 250)
            ->allowEmptyFile('declaration_file');

        $validator
            ->scalar('fully_manufactured')
            ->maxLength('fully_manufactured', 250)
            ->allowEmptyString('fully_manufactured');

        $validator
            ->scalar('suppliers_name')
            ->maxLength('suppliers_name', 250)
            ->allowEmptyString('suppliers_name');

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

        return $rules;
    }
}
