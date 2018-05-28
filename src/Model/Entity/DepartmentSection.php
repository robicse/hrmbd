<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DepartmentSection Entity
 *
 * @property int $id
 * @property int $department_id
 * @property string $title
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Weekend[] $weekends
 */
class DepartmentSection extends Entity{

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
        'department_id' => true,
        'title' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'department' => true,
        'weekends' => true
    ];
}
