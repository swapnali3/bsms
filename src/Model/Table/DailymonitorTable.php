<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dailymonitor Model
 *
 * @method \App\Model\Entity\Dailymonitor newEmptyEntity()
 * @method \App\Model\Entity\Dailymonitor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Dailymonitor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dailymonitor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dailymonitor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Dailymonitor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dailymonitor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dailymonitor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dailymonitor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dailymonitor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Dailymonitor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Dailymonitor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Dailymonitor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DailymonitorTable extends Table
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

        $this->setTable('dailymonitor');
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
            ->integer('vendor_id')
            ->allowEmptyString('vendor_id');

        $validator
            ->integer('productionline_id')
            ->allowEmptyString('productionline_id');

        $validator
            ->integer('target_production')
            ->allowEmptyString('target_production');

        $validator
            ->integer('confirm_production')
            ->allowEmptyString('confirm_production');

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
