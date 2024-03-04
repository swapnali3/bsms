<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productionline Model
 *
 * @property \App\Model\Table\DailymonitorTable&\Cake\ORM\Association\HasMany $Dailymonitor
 *
 * @method \App\Model\Entity\Productionline newEmptyEntity()
 * @method \App\Model\Entity\Productionline newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Productionline[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Productionline get($primaryKey, $options = [])
 * @method \App\Model\Entity\Productionline findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Productionline patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Productionline[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Productionline|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Productionline saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Productionline[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Productionline[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Productionline[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Productionline[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductionlineTable extends Table
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

        $this->setTable('productionline');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Dailymonitor', [
            'foreignKey' => 'productionline_id',
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
            ->integer('vendormaterial_id')
            ->requirePresence('vendormaterial_id', 'create')
            ->notEmptyString('vendormaterial_id');

        $validator
            ->scalar('prdline_description')
            ->maxLength('prdline_description', 250)
            ->requirePresence('prdline_description', 'create')
            ->notEmptyString('prdline_description');

        $validator
            ->integer('prdline_capacity')
            ->requirePresence('prdline_capacity', 'create')
            ->notEmptyString('prdline_capacity');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->dateTime('added_date')
            ->allowEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->allowEmptyDateTime('updated_date');

        return $validator;
    }
}
