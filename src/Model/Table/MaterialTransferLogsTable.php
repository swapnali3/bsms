<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MaterialTransferLogs Model
 *
 * @method \App\Model\Entity\MaterialTransferLog newEmptyEntity()
 * @method \App\Model\Entity\MaterialTransferLog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MaterialTransferLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MaterialTransferLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\MaterialTransferLog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MaterialTransferLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MaterialTransferLog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MaterialTransferLog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MaterialTransferLog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MaterialTransferLog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MaterialTransferLog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MaterialTransferLog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MaterialTransferLog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MaterialTransferLogsTable extends Table
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

        $this->setTable('material_transfer_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('sap_vendor_code')
            ->maxLength('sap_vendor_code', 10)
            ->requirePresence('sap_vendor_code', 'create')
            ->notEmptyString('sap_vendor_code');

        $validator
            ->scalar('vendor_factory_code')
            ->maxLength('vendor_factory_code', 45)
            ->requirePresence('vendor_factory_code', 'create')
            ->notEmptyString('vendor_factory_code');

        $validator
            ->scalar('from_material')
            ->maxLength('from_material', 20)
            ->requirePresence('from_material', 'create')
            ->notEmptyString('from_material');

        $validator
            ->scalar('to_material')
            ->maxLength('to_material', 20)
            ->requirePresence('to_material', 'create')
            ->notEmptyString('to_material');

        $validator
            ->decimal('transfer_qty')
            ->requirePresence('transfer_qty', 'create')
            ->notEmptyString('transfer_qty');

        $validator
            ->dateTime('added_date')
            ->notEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->notEmptyDateTime('updated_date');

        return $validator;
    }
}
