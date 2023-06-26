<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NotificationsType Model
 *
 * @method \App\Model\Entity\NotificationsType newEmptyEntity()
 * @method \App\Model\Entity\NotificationsType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\NotificationsType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NotificationsType get($primaryKey, $options = [])
 * @method \App\Model\Entity\NotificationsType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\NotificationsType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NotificationsType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\NotificationsType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NotificationsType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NotificationsType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\NotificationsType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\NotificationsType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\NotificationsType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class NotificationsTypeTable extends Table
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

        $this->setTable('notifications_type');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 250)
            ->allowEmptyString('name');

        return $validator;
    }
}
