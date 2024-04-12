<?php
class Empresa{
    private $denominacion;
    private $direccion;
    private $colCliente;
    private $colMotos;
    private $colVentas;

    public function __construct($denominacion,$direccion,$colCliente,$colMotos,$colVentas){
        $this->denominacion=$denominacion;
        $this->direccion=$direccion;
        $this->colCliente=$colCliente;
        $this->colMotos=$colMotos;
        $this->colVentas=$colVentas;
    }

    //observadores
    public function getDenominacion(){
        return $this->denominacion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getColCliente(){
        return $this->colCliente;
    }

    public function getColMotos(){
        return $this->colMotos;
    }

    public function getColVentas(){
        return $this->colVentas;
    }

    //modificadores
    public function setDenominacion($denominacion){
        $this->denominacion=$denominacion;
    }

    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }

    public function setColCliente($colCliente){
        $this->colCliente=$colCliente;
    }

    public function setColMotos($colMotos){
        $this->colMotos=$colMotos;
    }

    public function setColVentas($colVentas){
        $this->colVentas=$colVentas;
    }

    //propias del tipo
    public function __toString(){
        $clientes=implode(";", $this->getColCliente());
        $motos=implode(";",$this->getColMotos());
        $ventas=implode(";",$this->getColVentas());
        
        return "denominacion: ".$this->getDenominacion()."\ndireccion: ".$this->getDireccion().
        "\ncoleccion de clientes: \n".$clientes."\n\nmotos a la venta: \n".$motos.
        "\nventas realizadas: \n".$ventas;
    }

    /**
     * Busca la moto cuyo codigo coincide con el recibido por parametro
     * @param int
     * @return Moto
     */
    public function retornarMoto($codigoMoto){
        $encontrado=false;
        $i=0;
        $posMoto=-1;
        $cantMotos=count($this->getColMotos());
        while(!$encontrado & $i<$cantMotos){
            $motoAux=$this->getColMotos()[$i];
            if($motoAux->getCodigo()==$codigoMoto){
                $encontrado=true;
                $posMoto=$i;
            }else{
                $i++;
            }
        }
        return $posMoto;
    }

    /**
     * Por cada codigo que encuentra incorporara esa moto a la coleccion que esta en ventas
     * creando una nueva instancia venta
     * @param array
     * @param Cliente
     * @return int
     */
    public function registrarVenta($colCodigosMoto,$objCliente){
        $i=0;
        $arrMotos=array();
        $nuevaVenta= new Venta(0,"12/04/2024",$objCliente,$arrMotos,0);
        foreach($colCodigosMoto as $unCodigoMoto){
            $motoEncontrada=$this->retornarMoto($unCodigoMoto);
            if($motoEncontrada!=-1 & !$objCliente->dadoDeBajaCliente()){
                $unaMoto=$this->getColMotos()[$motoEncontrada];
                $i++;
                $nuevaVenta->incorporarMoto($unaMoto);
            }
        }
        $importeFinal=$nuevaVenta->getPrecioFinal();
        $nuevaVenta->setNumero($i);//lo hago para que la venta tenga diferentes numero 
        $aux=$this->getColVentas();
        array_push($aux,$nuevaVenta);
        $this->setColVentas($aux);
        return $importeFinal;
    }

    /** 
     * Retorna una coleccion con las ventas realizadas al cliente
     * @param String
     * @param int
     * @return Venta
    */
    public function retornarVentasXCliente($tipo,$numDoc){
        $i=0;
        $colVentaCliente=array();
        foreach($this->getColVentas() as $auxVenta){
            if($auxVenta->buscarCliente($tipo,$numDoc)){
                $colVentaCliente[$i]=$auxVenta;
                $i++;
            }
        }
        return $colVentaCliente;
    }

}
?>