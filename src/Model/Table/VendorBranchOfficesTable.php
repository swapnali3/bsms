<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendorBranchOffices Model
 *
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\BelongsTo $VendorTemps
 *
 * @method \App\Model\Entity\VendorBranchOffice newEmptyEntity()
 * @method \App\Model\Entity\VendorBranchOffice newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VendorBranchOffice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorBranchOffice get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorBranchOffice findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VendorBranchOffice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorBranchOffice[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorBranchOffice|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorBranchOffice saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorBranchOffice[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorBranchOffice[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorBranchOffice[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorBranchOffice[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendorBranchOfficesTable extends Table
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

        $this->setTable('vendor_branch_offices');
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
            ->scalar('address')
            ->maxLength('address', 45)
            ->allowEmptyString('address');

        $validator
            ->scalar('address_2')
            ->maxLength('address_2', 45)
            ->allowEmptyString('address_2');

        $validator
            ->scalar('pincode')
            ->maxLength('pincode', 45)
            ->allowEmptyString('pincode');

        $validator
            ->scalar('city')
            ->maxLength('city', 45)
            ->allowEmptyString('city');

        $validator
            ->scalar('country')
            ->maxLength('country', 45)
            ->allowEmptyString('country');

        $validator
            ->scalar('state')
            ->maxLength('state', 45)
            ->allowEmptyString('state');

        $validator
            ->scalar('telephone')
            ->maxLength('telephone', 45)
            ->allowEmptyString('telephone');

        $validator
            ->scalar('registration_year')
            ->maxLength('registration_year', 4)
            ->allowEmptyString('registration_year');

        $validator
            ->scalar('registration_no')
            ->maxLength('registration_no', 15)
            ->allowEmptyString('registration_no');

        $validator
            ->scalar('registration_certificate')
            ->maxLength('registration_certificate', 250)
            ->allowEmptyString('registration_certificate');

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
