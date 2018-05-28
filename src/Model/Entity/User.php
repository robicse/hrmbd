<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity{

    protected $_accessible = [
        'user_group_id' => true,
        'full_name' => true,
        'photo' => true,
        'phone' => true,
        'phone_uid'=>true,
        'email' => true,
        'password' => true,
        'card_uniqueid' => true,
        'card_number' => true,
        'join_date' => true,
        'confirmation_date' => true,
        'personal_email' => true,
        'present_address' => true,
        'permanent_address' => true,
        'date_of_birth' => true,
        'gender' => true,
        'marital_status' => true,
        'nationalid' => true,
        'blood' => true,
        'emergency_number' => true,
        'emergency_number_relation' => true,
        'notice_period' => true,
        'provident_fund' => true,
        'salary_bank_payment_mode' => true,
        'bank_id' => true,
        'bank_branch_id' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'user_group' => true
    ];

    protected $_hidden = [
        'user_group_id',
        'password',
        'phone_uid',
        #'created',
        'modified'
    ];

    protected function _getNameAndPhone(){
        return $this->_properties['full_name'] .' - '. $this->_properties['phone'];
    }

    /*protected function _getPhoto(){
        return 'full_path_to_photo/' . $this->_properties['photo'];
    }*/
}
