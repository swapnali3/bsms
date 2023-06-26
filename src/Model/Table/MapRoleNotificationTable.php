<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MapRoleNotification Model
 *
 * @method \App\Model\Entity\MapRoleNotification newEmptyEntity()
 * @method \App\Model\Entity\MapRoleNotification newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MapRoleNotification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MapRoleNotification get($primaryKey, $options = [])
 * @method \App\Model\Entity\MapRoleNotification findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MapRoleNotification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MapRoleNotification[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MapRoleNotification|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MapRoleNotification saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MapRoleNotification[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MapRoleNotification[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MapRoleNotification[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MapRoleNotification[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MapRoleNotificationTable extends Table
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

        $this->setTable('map_role_notification');
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
            ->integer('user_group')
            ->allowEmptyString('user_group');

        $validator
            ->integer('notification_type')
            ->allowEmptyString('notification_type');

        return $validator;
    }
}
