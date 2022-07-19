        <?php
        require_once "../../controller/usuario.controller.php";
        require_once "../../model/dao/usuario.dao.php";
        require_once "../../model/dto/usuario.dto.php";
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
            $this -> pdf->Cell(30,10,'Reporte Usuario',0,0,'C');
            // Salto de línea
            $this -> pdf ->Ln(20);

            $this->pdf->cell(33,10,'CC',1,0,'C',0);
            $this->pdf->cell(20,10,'Nombre' ,1,0,'C',0);
            $this->pdf->cell(25,10,'Apellido',1,0,'C',0);
            $this->pdf->cell(29,10,'Direccion',1,0,'C',0);
            $this->pdf->cell(35,10,'Telefono',1,0,'C',0);
            $this->pdf->cell(20,10,'Edad',1,0,'C',0);
            $this->pdf->cell(30,10,'Rol',1,0,'C',0);
            }
            
            public function viewALL(){

        
            $this -> pdf->SetFont('Arial','B',9);


                try {
                    $objDtoUser = new User();
                    $objDaoUser = new UserModel($objDtoUser);
                    $respon = $objDaoUser -> mldSearchAllUsuario() -> fetchAll();
                } catch (PDOExeption $e) {
                    print "there was a mistake on the creation of the display controller ". $e ->getMesagge();
                }
            $this -> pdf ->ln(10); 
            foreach($respon as $key => $value){

                $this -> pdf->Cell(33,10,$value['CC'],1,0,'C',0);
                $this -> pdf->Cell(20,10,$value['Nombre'],1,0,'C',0);
                $this -> pdf->Cell(25,10,$value['Apellido'],1,0,'C',0);
                $this -> pdf->Cell(29,10,$value['Direccion'],1,0,'C',0);
                $this -> pdf->Cell(35,10,$value['Telefono'],1,0,'C',0);
                $this -> pdf->Cell(20,10,$value['Edad'],1,0,'C',0);
                $this -> pdf->Cell(30,10,$value['Rol'],1,0,'C',0);
                $this -> pdf ->ln(10); 

            }
            
        }
        public function footReport(){
             // Posición: a 1,5 cm del final
            $this->pdf->SetY(266);
            // Arial italic 8
             $this->pdf->SetFont('Arial','I',8);
             // Número de página
            $this->pdf->Cell(0,10,'Page '.$this->pdf->PageNo().' Reporte usuario',0,0,'C');
            $this -> pdf ->Output(); 
        }
       
        }
        
    
        $objeview = new Reporte ;
        $objeview -> headReport();
        $objeview -> viewALL();
        $objeview -> footReport();
    
        ?>