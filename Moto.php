<?php
class Moto{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $incrementoAnual;
    private $activa;//es un valor booleano

    public function __construct($codigo,$precio,$anioFabricacion,$descripcion,$incrementoAnual,$activa){
        $this->codigo=$codigo;
        $this->costo=$precio;
        $this->anioFabricacion=$anioFabricacion;
        $this->descripcion=$descripcion;
        $this->incrementoAnual=$incrementoAnual;
        $this->activa=$activa;
    }

    //observadores
    public function getCodigo(){
     return $this->codigo;   
    }

    public function getCosto(){
        return $this->costo;   
    }
       
    public function getAnioFabricacion(){
        return $this->anioFabricacion;   
    }

    public function getDescripcion(){
        return $this->descripcion;   
    }

    public function getIncrementoAnual(){
        return $this->incrementoAnual;   
    }

    public function getActiva(){
        return $this->activa;   
    }

    //modificadores
    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }

    public function setCosto($costo){
        $this->costo=$costo;
    }

    public function setAnioFabricacion($anioFabricacion){
        $this->anioFabricacion=$anioFabricacion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
    }

    public function setIncrementoAnual($incrementoAnual){
        $this->incrementoAnual=$incrementoAnual;
    }

    public function setActiva($activa){
        $this->activa=$activa;
    }

    //propias del tipo
    public function __toString(){
        return "\ncodigo: ".$this->getCodigo()."\ncosto: ".$this->getCosto().
        "\nanio de fabricacion: ".$this->getAnioFabricacion().
        "\ndescripcion: \n".$this->getDescripcion()."\nincremento anual: ".$this->getIncrementoAnual()."%".
        "\ndisponible para la venta? ".$this->__toStringDisponible();
    }

    public function __toStringDisponible(){
        $activo="no";
        if($this->getActiva()){
            $activo="si";
        }
        return $activo;
    }

    /**
     * Calcula el valor por el cual puede ser vendida una moto
     */
    public function darPrecioVenta(){
        $venta=-1;
        if($this->getActiva()){
            $porcentaje=$this->getIncrementoAnual()/100;
            $venta=$this->getCosto()+$this->getCosto()*($this->getAnioFabricacion()*$porcentaje);
        }
        return $venta;
    }
}
?>