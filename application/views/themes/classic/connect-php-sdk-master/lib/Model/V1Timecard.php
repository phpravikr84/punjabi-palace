<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace SquareConnect\Model;

use \ArrayAccess;
/**
 * V1Timecard Class Doc Comment
 *
 * @category Class
 * @package  SquareConnect
 * @author   Square Inc.
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://squareup.com/developers
 */
class V1Timecard implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'id' => 'string',
        'employee_no' => 'string',
        'deleted' => 'bool',
        'clockin_time' => 'string',
        'clockout_time' => 'string',
        'clockin_location_id' => 'string',
        'clockout_location_id' => 'string',
        'created_at' => 'string',
        'updated_at' => 'string',
        'regular_seconds_worked' => 'float',
        'overtime_seconds_worked' => 'float',
        'doubletime_seconds_worked' => 'float'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'id' => 'id',
        'employee_no' => 'employee_no',
        'deleted' => 'deleted',
        'clockin_time' => 'clockin_time',
        'clockout_time' => 'clockout_time',
        'clockin_location_id' => 'clockin_location_id',
        'clockout_location_id' => 'clockout_location_id',
        'created_at' => 'created_at',
        'updated_at' => 'updated_at',
        'regular_seconds_worked' => 'regular_seconds_worked',
        'overtime_seconds_worked' => 'overtime_seconds_worked',
        'doubletime_seconds_worked' => 'doubletime_seconds_worked'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'id' => 'setId',
        'employee_no' => 'setEmployeeId',
        'deleted' => 'setDeleted',
        'clockin_time' => 'setClockinTime',
        'clockout_time' => 'setClockoutTime',
        'clockin_location_id' => 'setClockinLocationId',
        'clockout_location_id' => 'setClockoutLocationId',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt',
        'regular_seconds_worked' => 'setRegularSecondsWorked',
        'overtime_seconds_worked' => 'setOvertimeSecondsWorked',
        'doubletime_seconds_worked' => 'setDoubletimeSecondsWorked'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'id' => 'getId',
        'employee_no' => 'getEmployeeId',
        'deleted' => 'getDeleted',
        'clockin_time' => 'getClockinTime',
        'clockout_time' => 'getClockoutTime',
        'clockin_location_id' => 'getClockinLocationId',
        'clockout_location_id' => 'getClockoutLocationId',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt',
        'regular_seconds_worked' => 'getRegularSecondsWorked',
        'overtime_seconds_worked' => 'getOvertimeSecondsWorked',
        'doubletime_seconds_worked' => 'getDoubletimeSecondsWorked'
    );
  
    /**
      * $id The timecard's unique ID.
      * @var string
      */
    protected $id;
    /**
      * $employee_no The ID of the employee the timecard is associated with.
      * @var string
      */
    protected $employee_no;
    /**
      * $deleted If true, the timecard was deleted by the merchant, and it is no longer valid.
      * @var bool
      */
    protected $deleted;
    /**
      * $clockin_time The clock-in time for the timecard, in ISO 8601 format.
      * @var string
      */
    protected $clockin_time;
    /**
      * $clockout_time The clock-out time for the timecard, in ISO 8601 format. Provide this value only if importing timecard information from another system.
      * @var string
      */
    protected $clockout_time;
    /**
      * $clockin_location_id The ID of the location the employee clocked in from. We strongly reccomend providing a clockin_location_id. Square uses the clockin_location_id to determine a timecard���s timezone and overtime rules.
      * @var string
      */
    protected $clockin_location_id;
    /**
      * $clockout_location_id The ID of the location the employee clocked out from. Provide this value only if importing timecard information from another system.
      * @var string
      */
    protected $clockout_location_id;
    /**
      * $created_at The time when the timecard was created, in ISO 8601 format.
      * @var string
      */
    protected $created_at;
    /**
      * $updated_at The time when the timecard was most recently updated, in ISO 8601 format.
      * @var string
      */
    protected $updated_at;
    /**
      * $regular_seconds_worked The total number of regular (non-overtime) seconds worked in the timecard.
      * @var float
      */
    protected $regular_seconds_worked;
    /**
      * $overtime_seconds_worked The total number of overtime seconds worked in the timecard.
      * @var float
      */
    protected $overtime_seconds_worked;
    /**
      * $doubletime_seconds_worked The total number of doubletime seconds worked in the timecard.
      * @var float
      */
    protected $doubletime_seconds_worked;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initializing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            if (isset($data["id"])) {
              $this->id = $data["id"];
            } else {
              $this->id = null;
            }
            if (isset($data["employee_no"])) {
              $this->employee_no = $data["employee_no"];
            } else {
              $this->employee_no = null;
            }
            if (isset($data["deleted"])) {
              $this->deleted = $data["deleted"];
            } else {
              $this->deleted = null;
            }
            if (isset($data["clockin_time"])) {
              $this->clockin_time = $data["clockin_time"];
            } else {
              $this->clockin_time = null;
            }
            if (isset($data["clockout_time"])) {
              $this->clockout_time = $data["clockout_time"];
            } else {
              $this->clockout_time = null;
            }
            if (isset($data["clockin_location_id"])) {
              $this->clockin_location_id = $data["clockin_location_id"];
            } else {
              $this->clockin_location_id = null;
            }
            if (isset($data["clockout_location_id"])) {
              $this->clockout_location_id = $data["clockout_location_id"];
            } else {
              $this->clockout_location_id = null;
            }
            if (isset($data["created_at"])) {
              $this->created_at = $data["created_at"];
            } else {
              $this->created_at = null;
            }
            if (isset($data["updated_at"])) {
              $this->updated_at = $data["updated_at"];
            } else {
              $this->updated_at = null;
            }
            if (isset($data["regular_seconds_worked"])) {
              $this->regular_seconds_worked = $data["regular_seconds_worked"];
            } else {
              $this->regular_seconds_worked = null;
            }
            if (isset($data["overtime_seconds_worked"])) {
              $this->overtime_seconds_worked = $data["overtime_seconds_worked"];
            } else {
              $this->overtime_seconds_worked = null;
            }
            if (isset($data["doubletime_seconds_worked"])) {
              $this->doubletime_seconds_worked = $data["doubletime_seconds_worked"];
            } else {
              $this->doubletime_seconds_worked = null;
            }
        }
    }
    /**
     * Gets id
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
  
    /**
     * Sets id
     * @param string $id The timecard's unique ID.
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Gets employee_no
     * @return string
     */
    public function getEmployeeId()
    {
        return $this->employee_no;
    }
  
    /**
     * Sets employee_no
     * @param string $employee_no The ID of the employee the timecard is associated with.
     * @return $this
     */
    public function setEmployeeId($employee_no)
    {
        $this->employee_no = $employee_no;
        return $this;
    }
    /**
     * Gets deleted
     * @return bool
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
  
    /**
     * Sets deleted
     * @param bool $deleted If true, the timecard was deleted by the merchant, and it is no longer valid.
     * @return $this
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }
    /**
     * Gets clockin_time
     * @return string
     */
    public function getClockinTime()
    {
        return $this->clockin_time;
    }
  
    /**
     * Sets clockin_time
     * @param string $clockin_time The clock-in time for the timecard, in ISO 8601 format.
     * @return $this
     */
    public function setClockinTime($clockin_time)
    {
        $this->clockin_time = $clockin_time;
        return $this;
    }
    /**
     * Gets clockout_time
     * @return string
     */
    public function getClockoutTime()
    {
        return $this->clockout_time;
    }
  
    /**
     * Sets clockout_time
     * @param string $clockout_time The clock-out time for the timecard, in ISO 8601 format. Provide this value only if importing timecard information from another system.
     * @return $this
     */
    public function setClockoutTime($clockout_time)
    {
        $this->clockout_time = $clockout_time;
        return $this;
    }
    /**
     * Gets clockin_location_id
     * @return string
     */
    public function getClockinLocationId()
    {
        return $this->clockin_location_id;
    }
  
    /**
     * Sets clockin_location_id
     * @param string $clockin_location_id The ID of the location the employee clocked in from. We strongly reccomend providing a clockin_location_id. Square uses the clockin_location_id to determine a timecard���s timezone and overtime rules.
     * @return $this
     */
    public function setClockinLocationId($clockin_location_id)
    {
        $this->clockin_location_id = $clockin_location_id;
        return $this;
    }
    /**
     * Gets clockout_location_id
     * @return string
     */
    public function getClockoutLocationId()
    {
        return $this->clockout_location_id;
    }
  
    /**
     * Sets clockout_location_id
     * @param string $clockout_location_id The ID of the location the employee clocked out from. Provide this value only if importing timecard information from another system.
     * @return $this
     */
    public function setClockoutLocationId($clockout_location_id)
    {
        $this->clockout_location_id = $clockout_location_id;
        return $this;
    }
    /**
     * Gets created_at
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
  
    /**
     * Sets created_at
     * @param string $created_at The time when the timecard was created, in ISO 8601 format.
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }
    /**
     * Gets updated_at
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
  
    /**
     * Sets updated_at
     * @param string $updated_at The time when the timecard was most recently updated, in ISO 8601 format.
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }
    /**
     * Gets regular_seconds_worked
     * @return float
     */
    public function getRegularSecondsWorked()
    {
        return $this->regular_seconds_worked;
    }
  
    /**
     * Sets regular_seconds_worked
     * @param float $regular_seconds_worked The total number of regular (non-overtime) seconds worked in the timecard.
     * @return $this
     */
    public function setRegularSecondsWorked($regular_seconds_worked)
    {
        $this->regular_seconds_worked = $regular_seconds_worked;
        return $this;
    }
    /**
     * Gets overtime_seconds_worked
     * @return float
     */
    public function getOvertimeSecondsWorked()
    {
        return $this->overtime_seconds_worked;
    }
  
    /**
     * Sets overtime_seconds_worked
     * @param float $overtime_seconds_worked The total number of overtime seconds worked in the timecard.
     * @return $this
     */
    public function setOvertimeSecondsWorked($overtime_seconds_worked)
    {
        $this->overtime_seconds_worked = $overtime_seconds_worked;
        return $this;
    }
    /**
     * Gets doubletime_seconds_worked
     * @return float
     */
    public function getDoubletimeSecondsWorked()
    {
        return $this->doubletime_seconds_worked;
    }
  
    /**
     * Sets doubletime_seconds_worked
     * @param float $doubletime_seconds_worked The total number of doubletime seconds worked in the timecard.
     * @return $this
     */
    public function setDoubletimeSecondsWorked($doubletime_seconds_worked)
    {
        $this->doubletime_seconds_worked = $doubletime_seconds_worked;
        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset 
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }
  
    /**
     * Gets offset.
     * @param  integer $offset Offset 
     * @return mixed 
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }
  
    /**
     * Sets value based on offset.
     * @param  integer $offset Offset 
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }
  
    /**
     * Unsets offset.
     * @param  integer $offset Offset 
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
  
    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        } else {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this));
        }
    }
}
