<?php
include 'Cliente.php';
include 'Moto.php';
include 'Venta.php';
include 'Empresa.php';

$objCliente1= new Cliente("Arturo","Hernandez","dado de baja","DNI",34678312);
$objCliente2= new Cliente("Lautaro","Montesino","no esta dado de baja","DNI",44323057);
$colClientes=[$objCliente1,$objCliente2];

$objMoto1=new Moto(11,2230000,2022,"Benelli Imperiale 400",85,true);
$objMoto2=new Moto(12,584000,2021,"Zanella Zr 150 Ohc",70,true);
$objMoto3=new Moto(13,999900,2023,"Zanella Patagonian Eagle 250",55,false);
$colMotos=[$objMoto1,$objMoto2,$objMoto3];

$colVentas=array();

$objEmpresa=new Empresa("Alta Gama","Av Argenetina 123",$colClientes,$colMotos,$colVentas);

//$desicion="si";
do{
    echo "que opcion quiere ver"."\n";
    echo "Ingrese 5, 6, 7, 8, 9 o 10\n";
    $opcion=trim(fgets(STDIN));
    switch($opcion){
        case 5: echo $objEmpresa->registrarVenta([11,12,13],$objCliente2);break;
        case 6: echo $objEmpresa->registrarVenta([0],$objCliente2);break;
        case 7: echo $objEmpresa->registrarVenta([2],$objCliente2);break;
        case 8: $arrVentas=$objEmpresa->retornarVentasXCliente("DNI",34678312);
                if($arrVentas==null){
                    echo "nada";
                }else{
                    foreach($arrVentas as $auxVenta){
                        echo $auxVenta->__toString()."\n";
                    }
                };break;
        case 9: 
            $objEmpresa->registrarVenta([11,12,13],$objCliente2);
            $arrVentas=$objEmpresa->retornarVentasXCliente("DNI",44323057);
                foreach($arrVentas as $auxVenta){
                    echo $auxVenta->__toString()."\n";
                };break;
        case 10: 
            echo "Coleccion de motos\n";
            $arrMotos= $objEmpresa->getColMotos();
            foreach($arrMotos as $auxMoto){
                echo $auxMoto->__toString()."\n";
            };break;
    }
    echo "\ndesea continuar si/no\n";
    $desicion=trim(fgets(STDIN));
}while(strcmp($desicion,"si")==0);
?>