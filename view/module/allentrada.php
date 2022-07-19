<?php
        require_once "../../controller/entrada.controller.php";
        require_once "../../model/dao/entrada.dao.php";
        require_once "../../model/dto/entrada.dto.php";
        require_once "../../model/dto/conexion.php";
        class Reporte{

            private $pdf;
            private $objeView;
            public function __construct(){
        
                include 'vendor/fpdf.php';
                $this -> pdf = new FPDF();
                $this -> pdf->AddPage();
            }
            public function headReport(){
             // Logo
             //$this -> pdf->Image('../img/logo.png',10,8,33);
             // Arial bold 15
             $this -> pdf->SetFont('Arial','B',12);
             // Movernos a la derecha
             $this -> pdf->Cell(80);
             // Título
             $this -> pdf->Cell(30,10,'Reporte Entrada',0,0,'C');
             // Salto de línea
             $this -> pdf ->Ln(20);

             $this->pdf->cell(25,10,'Id_Registro',1,0,'C',0);
             $this->pdf->cell(30,10,'Id_Producto' ,1,0,'C',0);
             $this->pdf->cell(30,10,'Id_Proveedor',1,0,'C',0);
             $this->pdf->cell(29,10,'Id_Bodega',1,0,'C',0);
             $this->pdf->cell(35,10,'Id_Categoria',1,0,'C',0);
             $this->pdf->cell(20,10,'Fecha',1,0,'C',0);
             $this->pdf->cell(20,10,'Cantidad',1,0,'C',0);


            }//fin del encabezado
            
            public function viewALL(){

            $this -> pdf->SetFont('Arial','B',9);

            try {
                $objDtoEntrada = new Entrada();
                $objDaoEntrada = new EntradaModel($objDtoEntrada);
                $respon = $objDaoEntrada -> mldSearchAllEntrada() -> fetchAll();
            } catch (exeption $e) {
                print "there was a mistake on the creation of the display controller ". $e ->getMesagge();
            }
            $this -> pdf ->ln(10); 
            foreach($respon as $key => $value){

                $this -> pdf->Cell(25,10,$value['Id_Registro'],1,0,'C',0);
                $this -> pdf->Cell(30,10,$value['PRODUCTO'],1,0,'C',0);
                $this -> pdf->Cell(30,10,$value['PROVEEDOR'],1,0,'C',0);
                $this -> pdf->Cell(29,10,$value['BODEGA'],1,0,'C',0);
                $this -> pdf->Cell(35,10,$value['CATEGORIA'],1,0,'C',0);
                $this -> pdf->Cell(20,10,$value['Fecha'],1,0,'C',0);
                $this -> pdf->Cell(20,10,$value['Cantidad'],1,0,'C',0);
                $this -> pdf ->ln(10);

            }
            
        }
        public function footReport(){
             // Posición: a 1,5 cm del final
            $this->pdf->SetY(266);
            // Arial italic 8
             $this->pdf->SetFont('Arial','I',8);
             // Número de página
            $this->pdf->Cell(0,10,'Page '.$this->pdf->PageNo().' Reporte entrada',0,0,'C');
            $this -> pdf ->Output(); 
        }
       
        }//FIN CLASE
        
    
        $objeview = new Reporte();
        $objeview -> headReport();
        $objeview -> viewALL();
        $objeview -> footReport();
    
        ?>