<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DutySchedule Entity
 *
 * @property int $id
 * @property string $title
 * @property string $start_time
 * @property string $late_time
 * @property string $end_time
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class DutySchedule extends Entity{

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
        'start_time' => true,
        'late_time' => true,
        'end_time' => true,
        'status' => true,
        'created' => true,
        'modified' => true
    ];
}
