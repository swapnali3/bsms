<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendorPartnerAddress Model
 *
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\BelongsTo $VendorTemps
 *
 * @method \App\Model\Entity\VendorPartnerAddres newEmptyEntity()
 * @method \App\Model\Entity\VendorPartnerAddres newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VendorPartnerAddres[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorPartnerAddres get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorPartnerAddres findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VendorPartnerAddres patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorPartnerAddres[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorPartnerAddres|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorPartnerAddres saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorPartnerAddres[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorPartnerAddres[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorPartnerAddres[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorPartnerAddres[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendorPartnerAddressTable extends Table
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

        $this->setTable('vendor_partner_address');
        $this->setDisplayField('name');
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
            ->scalar('type')
            ->maxLength('type', 45)
            ->allowEmptyString('type');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmptyString('name');

        $validator
            ->scalar('address')
            ->maxLength('address', 250)
            ->allowEmptyString('address');

        $validator
            ->scalar('address_2')
            ->maxLength('address_2', 250)
            ->allowEmptyString('address_2');

        $validator
            ->scalar('pincode')
            ->maxLength('pincode', 250)
            ->allowEmptyString('pincode');

        $validator
            ->scalar('city')
            ->maxLength('city', 250)
            ->allowEmptyString('city');

        $validator
            ->scalar('country')
            ->maxLength('country', 250)
            ->allowEmptyString('country');

        $validator
            ->scalar('state')
            ->maxLength('state', 250)
            ->allowEmptyString('state');

        $validator
            ->scalar('telephone')
            ->maxLength('telephone', 50)
            ->allowEmptyString('telephone');

        $validator
            ->scalar('fax_no')
            ->maxLength('fax_no', 50)
            ->allowEmptyString('fax_no');

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
