<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Holiday Entity
 *
 * @property int $id
 * @property string $title
 * @property string $year
 * @property string $month
 * @property string $date_time
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Holiday extends Entity{

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
        'year' => true,
        'month' => true,
        'date' => true,
        'status' => true,
        'created' => true,
        'modified' => true
    ];
}
