<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;

class UsersTable extends Table{

    public function initialize(array $config){
        parent::initialize($config);

        $this->table('users');
        $this->displayField('name_and_phone'); #This is virtual field for Dropdown List [Created from Entity]
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AppointmentDetails', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Appointments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Cards', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Divisions', [
            'foreignKey' => 'division_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('DivisionDistricts', [
            'foreignKey' => 'division_district_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('DivisionDistrictUpazilas', [
            'foreignKey' => 'division_district_upazila_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('Vehicles', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Workshops', [
            'foreignKey' => 'user_id'
        ]);
    }

    public function validationDefault(Validator $validator){
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('full_name')
            ->requirePresence('full_name', 'create')
            ->notEmpty('full_name','FullName must not Empty')
            ->notBlank('full_name','FullName must not Blank')
            ->add('full_name', [
                'minLength' => [
                    'rule' => ['minLength', 2],
                    'last' => true,
                    'message' => 'Minimum 2 character is required!'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 64],
                    'message' => 'Maximum 64 character is allowed!'
                ]
            ]);

        $validator
            ->scalar('photo')
            ->allowEmpty('photo');

        $validator
            ->integer('phone','Invalid phone number')
            ->requirePresence('phone', 'create')
            ->notEmpty('phone','Phone must not Empty')
            ->notBlank('phone','Phone must not Blank')
            ->add('phone', [
                'minLength' => [
                    'rule' => ['minLength', 7],
                    'last' => true,
                    'message' => 'Minimum 7 digits required!'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 11],
                    'message' => 'Maximum 11 digits required!'
                ]
            ])
            ->add('phone', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' =>'This phone is already registered!'
            ]);

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password','Password must not Empty')
            ->notBlank('password','Password must not Blank')
            ->add('password', [
                'minLength' => [
                    'rule' => ['minLength', 4],
                    'last' => true,
                    'message' => 'Minimum 4 digits required!'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 16],
                    'message' => 'Maximum 16 digits required!'
                ]
            ]);

        $validator->add('retype_password', 'no-misspelling', [
                'rule' => ['compareWith', 'password'],
                'message' => 'Passwords are not equal',
            ]);

        $validator
            ->email('email')
            ->allowEmpty('email')
            ->add('email', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' =>'This email is already registered!'
            ]);

        /*$validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');*/

        return $validator;
    }

    public function findAuth(Query $query, array $options){
       return $query->where(
           [
               'OR' => [
                   $this->aliasField('email') => $options['username'],
                   $this->aliasField('phone') => $options['username'],
               ]
           ],
           [],
           true
       );
   }

    public function buildRules(RulesChecker $rules){
        #$rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['phone']));
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));

        return $rules;
    }

    public function beforeSave(Event $event){
        $data = $event->getData();
        if (isset($data['entity']->password)) {
            $password = $data['entity']->password;
            $DPH = new DefaultPasswordHasher();
            if ($DPH->needsRehash($password)) {
                $data['entity']->password = $DPH->hash($password);
            }
            return $data;
        }
        return $data;
    }
}
