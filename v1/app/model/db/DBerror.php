<?php

class DBerror {
    public $errMessage;
    public $errCodeException;
    public $errMessageException;

    public function __construct($_errmessage, $_errcodeexception = "", $_errmessageexception = "") {
        $this->errMessage = $_errmessage;
        $this->errCodeException = $_errcodeexception;
        $this->errMessageException = $_errmessageexception;
    }

    public function getErrMessage() { return $this->errMessage; }
    public function setErrMessage($_errmessage) { $this->errMessage = $_errmessage; }

    public function getErrCodeException() { return $this->errCodeException; }
    public function setErrCodeException($_errcodeexception) { $this->errCodeException = $_errcodeexception; }

    public function getErrMessageException() { return $this->errMessageException; }
    public function setErrMessageException($_errmessageexception) { $this->errMessageException = $_errmessageexception; }
}