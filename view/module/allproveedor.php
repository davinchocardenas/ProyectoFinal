<?php
        require_once "../../controller/proveedor.controller.php";
        require_once "../../model/dao/proveedor.dao.php";
        require_once "../../model/dto/proveedor.dto.php";
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
             $this -> pdf->Cell(30,10,'Reporte Proveedor',0,0,'C');
             // Salto de línea
             $this -> pdf ->Ln(20);

             $this->pdf->cell(30,10,'Id_proveedor',1,0,'C',0);
             $this->pdf->cell(30,10,'Nombre' ,1,0,'C',0);
             $this->pdf->cell(40,10,'Direccion',1,0,'C',0);
             $this->pdf->cell(40,10,'Agente',1,0,'C',0);
             $this->pdf->cell(50,10,'Telefono',1,0,'C',0);


            }//fin del encabezado
            
            public function viewALL(){

            $this -> pdf->SetFont('Arial','B',9);

            try {
                $objDtoProveedor = new Proveedor();
                $objDaoProveedor = new ProveedorModel($objDtoProveedor);
                $respon = $objDaoProveedor->mldSearchProveedor()->fetchAll();
            } catch (PDOException $e) {
                echo "Error on the creation of the 
                    controller of show all " . $e->getMessage();
            }
            $this -> pdf ->ln(10); 
            foreach($respon as $key => $value){
                
                $this -> pdf->Cell(30,10,$value['Id_proveedor'],1,0,'C',0);
                $this -> pdf->Cell(30,10,$value['Nombre'],1,0,'C',0);
                $this -> pdf->Cell(40,10,$value['Direccion'],1,0,'C',0);
                $this -> pdf->Cell(40,10,$value['Agente'],1,0,'C',0);
                $this -> pdf->Cell(50,10,$value['Telefono'],1,0,'C',0);
                $this -> pdf ->ln(10); 
            }
            
            
        }
        public function footReport(){
             // Posición: a 1,5 cm del final
            $this->pdf->SetY(266);
            // Arial italic 8
             $this->pdf->SetFont('Arial','I',8);
             // Número de página
            $this->pdf->Cell(0,10,'Page '.$this->pdf->PageNo().' Reporte proveedor',0,0,'C');
            $this -> pdf ->Output(); 
        }
       
        }//FIN CLASE
        
    
        $objeview = new Reporte();
        $objeview -> headReport();
        $objeview -> viewALL();
        $objeview -> footReport();
    
        ?>