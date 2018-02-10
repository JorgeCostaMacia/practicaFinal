<?php

class Services {
    private $DBlimitado;
    private $DBcliente;
    private $DBgestor;
    private $session;
    private $includes;
    private $sessionIni;
    private $page;

    public function getDBlimitado() {
        if (!$this->DBlimitado) {
            $this->DBlimitado = new DBlimitado();
            return $this->DBlimitado;
        }
        else { return $this->DBlimitado; }
    }

    public function getDBcliente() {
        if (!$this->DBcliente) {
            $this->DBcliente = new DBcliente();
            return $this->DBcliente;
        }
        else { return $this->DBcliente; }
    }

    public function getDBgestor() {
        if (!$this->DBgestor) {
            $this->DBgestor = new DBgestor();
            return $this->DBgestor;
        }
        else { return $this->DBgestor; }
    }

    public function getSession() {
        if (!$this->session) {
            $this->session = new Session();
            return $this->session;
        }
        else { return $this->session; }
    }

    public function getIncludes() {
        if (!$this->includes) {
            $this->includes = new Includes();
            return $this->includes;
        }
        else { return $this->includes; }
    }

    public function getSessionIni() {
        if (!$this->sessionIni) {
            $this->sessionIni = new SessionIni();
            return $this->sessionIni;
        }
        else { return $this->sessionIni; }
    }

    public function getPage() {
        if (!$this->page) {
            $this->page = new Page();
            return $this->page;
        }
        else { return $this->page; }
    }
}