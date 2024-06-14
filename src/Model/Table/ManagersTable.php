<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Managers Model
 *
<<<<<<< Updated upstream
 * @property \App\Model\Table\BuyersTable&\Cake\ORM\Association\HasMany $Buyers
 *
=======
>>>>>>> Stashed changes
 * @method \App\Model\Entity\Manager newEmptyEntity()
 * @method \App\Model\Entity\Manager newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Manager[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Manager get($primaryKey, $options = [])
 * @method \App\Model\Entity\Manager findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Manager patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Manager[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Manager|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Manager saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Manager[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Manager[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Manager[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Manager[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ManagersTable extends Table
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

        $this->setTable('managers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
<<<<<<< Updated upstream

        $this->hasMany('Buyers', [
            'foreignKey' => 'manager_id',
        ]);
=======
>>>>>>> Stashed changes
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
            ->scalar('first_name')
            ->maxLength('first_name', 20)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 20)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 12)
            ->requirePresence('mobile', 'create')
            ->notEmptyString('mobile');

        $validator
            ->boolean('status')
            ->notEmptyString('status');

        $validator
            ->dateTime('added_date')
            ->notEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->notEmptyDateTime('updated_date');

        return $validator;
    }
}
