<?php
class Venta{
    private $numero;
    private $fecha;
    private $objCliente;
    private $colMotos;
    private $precioFinal;

    public function __construct($numero,$fecha,$unCliente,$colMotos,$precioFinal){
        $this->numero=$numero;
        $this->fecha=$fecha;
        $this->objCliente=$unCliente;
        $this->colMotos=$colMotos;
        $this->precioFinal=$precioFinal;
    }

    //observadores
    public function getNumero(){
     return $this->numero;   
    }

    public function getFecha(){
        return $this->fecha;   
    }
       
    public function getObjCliente(){
        return $this->objCliente;   
    }

    public function getColMotos(){
        return $this->colMotos;   
    }

    public function getPrecioFinal(){
        return $this->precioFinal;   
    }

    //modificadores
    public function setNumero($numero){
        $this->numero=$numero;
    }

    public function setFecha($fecha){
        $this->fecha=$fecha;
    }

    public function setObjCliente($objCliente){
        $this->objCliente=$objCliente;
    }

    public function setColMoto($colMotos){
        $this->colMotos=$colMotos;
    }

    public function setPrecioFinal($precioFinal){
        $this->precioFinal=$precioFinal;
    }

    //propias del tipo
    public function __toString(){
        $motos=implode(";",$this->getColMotos());
        return "numero: ".$this->getNumero()."\nfecha: ".$this->getFecha().
        "\ndatos del cliente: \n".$this->getObjCliente().
        "\nmotos que se vendieron: \n".$motos."\nsu precio final: $".$this->getPrecioFinal();
    }

    /**
     * Guarda en la coleccion, la nueva moto que compra el cliente y actualiza el 
     * precio final
     * @param Moto
     */
    public function incorporarMoto($objMoto){
        $precioNuevaMoto = $objMoto->darPrecioVenta();
        if ($precioNuevaMoto != -1 & !$this->getObjCliente()->dadoDeBajaCliente()) {
            $nuevoPrecioFinal = $this->getPrecioFinal() + $precioNuevaMoto;
            $this->setPrecioFinal($nuevoPrecioFinal);
            $auxColMoto = $this->getColMotos();
            $auxColMoto[count($this->getColMotos()) + 1] = $objMoto;
            $this->setColMoto($auxColMoto);
        }
    }


    /**
     * Metodo que determina si es el cliente o no de la venta
     * @return boolean
     */
    public function buscarCliente($tipo,$numDoc){
        $cumple=false;
        $auxCliente=$this->getObjCliente();
        if(strcmp($auxCliente->getTipo(),$tipo)==0 & $auxCliente->getDocumento()==$numDoc){
            $cumple=true;
        }
        return $cumple;
    }
    
}
?>