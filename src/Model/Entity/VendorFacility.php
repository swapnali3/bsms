<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendorFacility Entity
 *
 * @property int $id
 * @property string|null $vendor_temp_id
 * @property string|null $lab_facility
 * @property string|null $lab_facility_file
 * @property string|null $isi_registration
 * @property string|null $isi_registration_file
 * @property string|null $test_facility
 * @property string|null $test_facility_file
 * @property string|null $sales_services
 * @property string|null $sales_services_file
 * @property string|null $quality_control
 * @property string|null $quality_control_file
 * @property \Cake\I18n\FrozenTime|null $added_date
 * @property \Cake\I18n\FrozenTime|null $updated_date
 *
 * @property \App\Model\Entity\VendorTemp $vendor_temp
 */
class VendorFacility extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'vendor_temp_id' => true,
        'lab_facility' => true,
        'lab_facility_file' => true,
        'isi_registration' => true,
        'isi_registration_file' => true,
        'test_facility' => true,
        'test_facility_file' => true,
        'sales_services' => true,
        'sales_services_file' => true,
        'quality_control' => true,
        'quality_control_file' => true,
        'added_date' => true,
        'updated_date' => true,
        'vendor_temp' => true,
    ];
}
