<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stockupload Model
 *
 * @method \App\Model\Entity\Stockupload newEmptyEntity()
 * @method \App\Model\Entity\Stockupload newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Stockupload[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stockupload get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stockupload findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Stockupload patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stockupload[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stockupload|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stockupload saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stockupload[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Stockupload[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Stockupload[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Stockupload[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StockuploadTable extends Table
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

        $this->setTable('stockupload');
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
            ->integer('opening_stock')
            ->requirePresence('opening_stock', 'create')
            ->notEmptyString('opening_stock');

        $validator
            ->integer('vendor_material_id')
            ->requirePresence('vendor_material_id', 'create')
            ->notEmptyString('vendor_material_id');

        $validator
            ->integer('vendor_id')
            ->requirePresence('vendor_id', 'create')
            ->notEmptyString('vendor_id');

        $validator
            ->dateTime('added_date')
            ->allowEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->allowEmptyDateTime('updated_date');

        return $validator;
    }
}
