<?php
class Cliente{
    private $nombre;
    private $apellido;
    private $estadoCliente;
    private $tipo;
    private $documento;

    public function __construct($nom,$ape,$estado,$tipo,$doc){
        $this->nombre=$nom;
        $this->apellido=$ape;
        $this->estadoCliente=$estado;
        $this->tipo=$tipo;
        $this->documento=$doc;
    }

    //observadores
    public function getNombre(){
     return $this->nombre;   
    }

    public function getApellido(){
        return $this->apellido;   
    }
       
    public function getEstadoCliente(){
        return $this->estadoCliente;   
    }

    public function getTipo(){
        return $this->tipo;   
    }

    public function getDocumento(){
        return $this->documento;   
    }

    //modificadores
    public function setNombre($nom){
        $this->nombre=$nom;
    }

    public function setApellido($ape){
        $this->apellido=$ape;
    }

    public function setEstadoCliente($estado){
        $this->estadoCliente=$estado;
    }

    public function setTipo($tipo){
        $this->tipo=$tipo;
    }

    public function setDocumento($doc){
        $this->documento=$doc;
    }

    //propias del tipo
    public function __toString(){
        return "\nnombre: ".$this->getNombre()." apellido: ".$this->getApellido().
        "\nesta dado de baja: ".$this->getEstadoCliente().
        "\ntipo de documento: ".$this->getTipo()."\nnro de documento: ".$this->getDocumento();
    }

    /**
     * Devuelve un valor booleano si el cliente esta dado de baja o no
     * @return boolean
     */
    public function dadoDeBajaCliente(){
        $cumple=false;
        if(strcmp($this->getEstadoCliente(),"dado de baja")==0){
            $cumple=true;
        }
        return $cumple;
    }
    
}
?>