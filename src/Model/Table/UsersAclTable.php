<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersAcl Model
 *
 * @method \App\Model\Entity\UsersAcl newEmptyEntity()
 * @method \App\Model\Entity\UsersAcl newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UsersAcl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersAcl get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersAcl findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UsersAcl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersAcl[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersAcl|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersAcl saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersAcl[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsersAcl[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsersAcl[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsersAcl[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersAclTable extends Table
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

        $this->setTable('users_acl');
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
            ->integer('permission')
            ->requirePresence('permission', 'create')
            ->notEmptyString('permission');

        $validator
            ->integer('users')
            ->requirePresence('users', 'create')
            ->notEmptyString('users');

        $validator
            ->scalar('controller')
            ->maxLength('controller', 250)
            ->requirePresence('controller', 'create')
            ->notEmptyString('controller');

        $validator
            ->scalar('action')
            ->maxLength('action', 250)
            ->requirePresence('action', 'create')
            ->notEmptyString('action');

        return $validator;
    }
}
