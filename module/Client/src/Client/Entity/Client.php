<?php
namespace Client\Entity;
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/** 
* @ORM\Entity 
* @Annotation\Name("Client")
* @Annotation\Hydrator({"type":"Zend\Stdlib\Hydrator\ClassMethods", "options": {"underscoreSeparatedKeys": false}})
*/
class Client {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    * @Annotation\Attributes({"type":"hidden"})
    * @Annotation\Options({"label":"Id:"})
    */
    protected $clientId;

    /** 
    * @ORM\Column(type="string")
    * @Annotation\Attributes({"type":"text"})
    * @Annotation\Options({"label":"First Name:"})
	*/
    protected $firstName;

    /** 
    * @ORM\Column(type="string") 
    * @Annotation\Attributes({"type":"text"})
    * @Annotation\Options({"label":"Last Name:"})
    */
    protected $lastName;

    /** 
    * @ORM\Column(type="string", unique=true, length=10) 
    * @Annotation\Attributes({"type":"text"})
    * @Annotation\Options({"label":"State Id:"})
    */
    protected $stateId;

    /** 
    * @ORM\Column(type="string", nullable=true) 
    * @Annotation\Attributes({"type":"text"})
    * @Annotation\Options({"label":"Status:"})
    */
    protected $status;

    /** 
    * @ORM\Column(type="string", nullable=true, length=10) 
    * @Annotation\Attributes({"type":"text"})
    * @Annotation\Options({"label":"House Phone #:"})
    */
    protected $phoneHome;

    /** 
    * @ORM\Column(type="string", nullable=true, length=10) 
    * @Annotation\Attributes({"type":"text"})
    * @Annotation\Options({"label":"Work Phone #:"})
    */
    protected $phoneWork;

    /** 
    * @ORM\Column(type="string", nullable=true, length=10) 
    * @Annotation\Attributes({"type":"text"})
    * @Annotation\Options({"label":"Reference Phone #:"})
    */
    protected $phoneReference;

    /** 
    * @ORM\Column(type="string", nullable=true, length=10) 
    * @Annotation\Attributes({"type":"text"})
    * @Annotation\Options({"label":"Cell Phone #:"})
    */
    protected $phoneCell;

    /** 
    * @ORM\Column(type="string", nullable=true) 
    * @Annotation\Attributes({"type":"text"})
    * @Annotation\Options({"label":"Home Address:"})
    */
    protected $addressHome;

    /** 
    * @ORM\Column(type="string", nullable=true) 
    * @Annotation\Attributes({"type":"text"})
    * @Annotation\Options({"label":"Work Address:"})
    */
    protected $addressWork;

    /** 
    * @ORM\Column(type="datetime") 
    * @Annotation\Attributes({"type":"hidden"})
    * @Annotation\Exclude()
    */
    protected $timeStamp;

	// public function __get($property) {
	// 	return (isset($this->{$property}) ? $this->{$property} : null);
	// }

    //Getters
    public function getClientId() {
    	return $this->clientId;
    }
    public function getFirstName() {
    	return $this->firstName;
    }
    public function getLastName() {
    	return $this->lastName;
    }
    public function getStateId() {
    	return $this->stateId;
    }
    public function getStatus() {
    	return $this->status;
    }
    public function getPhoneHome() {
    	return $this->phoneHome;
    }
    public function getPhoneWork() {
    	return $this->phoneWork;
    }
    public function getPhoneReference() {
    	return $this->phoneReference;
    }
    public function getPhoneCell() {
    	return $this->phoneCell;
    }
    public function getAddressHome() {
    	return $this->addressHome;
    }
    public function getAddressWork() {
    	return $this->addressWork;
    }
    public function getTimeStamp() {
    	return $this->timeStamp;
    }

    //Setters
    public function setFirstName($fn) {
    	$this->firstName = $fn;
    }
    public function setLastName($ln) {
    	$this->lastName = $ln;
    }
   	public function setStateId($sId) {
   		$this->stateId = $sId;
   	}
   	public function setStatus($s) {
   		$this->status = $s;
   	}
   	public function setPhoneHome($ph) {
   		$this->phoneHome = $ph;
   	}
   	public function setPhoneReference($pr) {
   		$this->phoneReference = $pr;
   	}
   	public function setPhoneCell($pc) {
   		$this->phoneCell = $pc;
   	}
   	public function setAddressHome($ah) {
   		$this->addressHome = $ah;
   	}
   	public function setAddressWork($aw) {
   		$this->addressWork = $aw;
   	}
   	public function setTimeStamp($ts) {
   		$this->timeStamp = $ts;
   	}

}