<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Factories Model
 *
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\BelongsTo $VendorTemps
 *
 * @method \App\Model\Entity\Factory newEmptyEntity()
 * @method \App\Model\Entity\Factory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Factory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Factory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Factory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Factory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Factory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Factory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Factory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Factory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Factory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Factory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Factory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FactoriesTable extends Table
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

        $this->setTable('factories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('VendorTemps', [
            'foreignKey' => 'vendor_temps_id',
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
            ->integer('vendor_temps_id')
            ->allowEmptyString('vendor_temps_id');

        $validator
            ->scalar('sap_vendor_code')
            ->maxLength('sap_vendor_code', 10)
            ->allowEmptyString('sap_vendor_code');

        $validator
            ->scalar('factory_code')
            ->maxLength('factory_code', 45)
            ->requirePresence('factory_code', 'create')
            ->notEmptyString('factory_code');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address');

        $validator
            ->scalar('address_2')
            ->maxLength('address_2', 100)
            ->allowEmptyString('address_2');

        $validator
            ->scalar('pincode')
            ->maxLength('pincode', 6)
            ->allowEmptyString('pincode');

        $validator
            ->scalar('city')
            ->maxLength('city', 50)
            ->allowEmptyString('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 100)
            ->allowEmptyString('state');

        $validator
            ->scalar('country')
            ->maxLength('country', 50)
            ->allowEmptyString('country');

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
        $rules->add($rules->existsIn('vendor_temps_id', 'VendorTemps'), ['errorField' => 'vendor_temps_id']);

        return $rules;
    }
}
