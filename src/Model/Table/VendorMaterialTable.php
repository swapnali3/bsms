<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendorMaterial Model
 *
 * @method \App\Model\Entity\VendorMaterial newEmptyEntity()
 * @method \App\Model\Entity\VendorMaterial newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VendorMaterial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorMaterial get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorMaterial findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VendorMaterial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorMaterial[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorMaterial|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorMaterial saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorMaterial[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorMaterial[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorMaterial[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorMaterial[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendorMaterialTable extends Table
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

        $this->setTable('vendor_material');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Stockupload', [
            'foreignKey' => 'vendor_material_id',
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
            ->integer('vendor_id')
            ->requirePresence('vendor_id', 'create')
            ->notEmptyString('vendor_id');

        $validator
            ->requirePresence('vendor_material_code', 'create')
            ->notEmptyString('vendor_material_code');

        $validator
            ->scalar('description')
            ->maxLength('description', 200)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->allowEmptyString('buyer_material_code');

        $validator
            ->integer('minimum_stock')
            ->allowEmptyString('minimum_stock');

        $validator
            ->scalar('uom')
            ->maxLength('uom', 50)
            ->allowEmptyString('uom');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        $validator
            ->dateTime('added_date')
            ->notEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->notEmptyDateTime('updated_date');

        return $validator;
    }
}
