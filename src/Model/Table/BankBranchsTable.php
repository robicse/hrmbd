<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BankBranchs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Banks
 * @property \Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\BankBranch get($primaryKey, $options = [])
 * @method \App\Model\Entity\BankBranch newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BankBranch[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BankBranch|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankBranch patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BankBranch[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BankBranch findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BankBranchsTable extends Table{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('bank_branchs');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Banks', [
            'foreignKey' => 'bank_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'bank_branch_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id');

        $validator
            ->scalar('title')
            #->maxLength('title')
            ->requirePresence('title')
            ->notEmpty('title');

        $validator
            ->scalar('status')
            ->requirePresence('status')
            ->notEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['bank_id'], 'Banks'));

        return $rules;
    }
}
