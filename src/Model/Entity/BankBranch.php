<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BankBranch Entity
 *
 * @property int $id
 * @property int $bank_id
 * @property string $title
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Bank $bank
 * @property \App\Model\Entity\User[] $users
 */
class BankBranch extends Entity{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'bank_id' => true,
        'title' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'bank' => true,
        'users' => true
    ];
}
