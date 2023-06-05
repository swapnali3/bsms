<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersPermissions Model
 *
 * @method \App\Model\Entity\UsersPermission newEmptyEntity()
 * @method \App\Model\Entity\UsersPermission newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UsersPermission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersPermission get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersPermission findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UsersPermission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersPermission[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersPermission|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersPermission saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersPermission[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsersPermission[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsersPermission[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsersPermission[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersPermissionsTable extends Table
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

        $this->setTable('users_permissions');
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
            ->scalar('permissionsName')
            ->maxLength('permissionsName', 250)
            ->requirePresence('permissionsName', 'create')
            ->notEmptyString('permissionsName')
            ->add('permissionsName', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('permissionsLevel')
            ->maxLength('permissionsLevel', 45)
            ->notEmptyString('permissionsLevel')
            ->add('permissionsLevel', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['permissionsName']), ['errorField' => 'permissionsName']);
        $rules->add($rules->isUnique(['permissionsLevel']), ['errorField' => 'permissionsLevel']);

        return $rules;
    }
}
