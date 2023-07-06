<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MsgchatFooters Model
 *
 * @method \App\Model\Entity\MsgchatHeader newEmptyEntity()
 * @method \App\Model\Entity\MsgchatHeader newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MsgchatHeader[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MsgchatHeader get($primaryKey, $options = [])
 * @method \App\Model\Entity\MsgchatHeader findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MsgchatHeader patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MsgchatHeader[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MsgchatHeader|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MsgchatHeader saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MsgchatHeader[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MsgchatHeader[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MsgchatHeader[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MsgchatHeader[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MsgchatFootersTable extends Table
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

        $this->setTable('msgchat_footers');
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
            ->scalar('msgchat_header_id')
            ->requirePresence('msgchat_header_id', 'create')
            ->notEmptyString('msgchat_header_id');

        $validator
            ->integer('group_id')
            ->requirePresence('group_id', 'create')
            ->notEmptyString('group_id');

        $validator
            ->scalar('sender_id')
            ->requirePresence('sender_id', 'create')
            ->notEmptyString('sender_id');

        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->notEmptyString('message');

        $validator
            ->scalar('seen')
            ->requirePresence('seen', 'create')
            ->notEmptyString('seen');

        $validator
            ->dateTime('addeddate')
            ->allowEmptyDateTime('addeddate');

        $validator
            ->dateTime('updateddate')
            ->allowEmptyDateTime('updateddate');

        return $validator;
    }
}
