<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BuyerCodeFiles Model
 *
 * @property \App\Model\Table\BuyersTable&\Cake\ORM\Association\BelongsTo $Buyers
 *
 * @method \App\Model\Entity\BuyerCodeFile newEmptyEntity()
 * @method \App\Model\Entity\BuyerCodeFile newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BuyerCodeFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BuyerCodeFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\BuyerCodeFile findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BuyerCodeFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BuyerCodeFile[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BuyerCodeFile|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BuyerCodeFile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BuyerCodeFile[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BuyerCodeFile[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BuyerCodeFile[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BuyerCodeFile[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BuyerCodeFilesTable extends Table
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

        $this->setTable('buyer_code_files');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Buyers', [
            'foreignKey' => 'buyer_id',
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
            ->integer('buyer_id')
            ->allowEmptyString('buyer_id');

        $validator
            ->scalar('sap_user')
            ->maxLength('sap_user', 20)
            ->allowEmptyString('sap_user');

        $validator
            ->integer('req_file_name')
            ->allowEmptyFile('req_file_name');

        $validator
            ->integer('res_file_name')
            ->allowEmptyFile('res_file_name');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->dateTime('added_date')
            ->notEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->notEmptyDateTime('updated_date');

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
        $rules->add($rules->existsIn('buyer_id', 'Buyers'), ['errorField' => 'buyer_id']);

        return $rules;
    }
}
