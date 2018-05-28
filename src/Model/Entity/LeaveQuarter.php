<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LeaveQuarter Entity
 *
 * @property int $id
 * @property string $title
 * @property string $start_date
 * @property string $end_date
 * @property string $casual_duration
 * @property string $sick_duration
 * @property string $earned_duration
 * @property string $total_duration
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UserLeave[] $user_leaves
 */
class LeaveQuarter extends Entity{

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
        'title' => true,
        'start_date' => true,
        'end_date' => true,
        'casual_duration' => true,
        'sick_duration' => true,
        'earned_duration' => true,
        'total_duration' => true,
        'created' => true,
        'modified' => true,
        'user_leaves' => true
    ];
}
