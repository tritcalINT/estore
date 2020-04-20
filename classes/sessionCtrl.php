<?php

class sessionCtrl{

    private $sessionid;
    private $itemid;
    private $qty;
    private $hqty;
    private $sqty;
    private $dttm;
    private $usrky;
    
    public function getSessionid(){
		return $this->sessionid;
	}

	public function setSessionid($sessionid){
		$this->sessionid = $sessionid;
	}

	public function getItemid(){
		return $this->itemid;
	}

	public function setItemid($itemid){
		$this->itemid = $itemid;
	}

	public function getQty(){
		return $this->qty;
	}

	public function setQty($qty){
		$this->qty = $qty;
	}

	public function getHqty(){
		return $this->hqty;
	}

	public function setHqty($hqty){
		$this->hqty = $hqty;
	}

        public function getSqty(){
		return $this->sqty;
	}

	public function setSqty($sqty){
		$this->sqty = $sqty;
	}
        
	public function getDttm(){
		return $this->dttm;
	}

	public function setDttm($dttm){
		$this->dttm = $dttm;
	}

	public function getUsrky(){
		return $this->usrky;
	}

	public function setUsrky($usrky){
		$this->usrky = $usrky;
	}

}

?>