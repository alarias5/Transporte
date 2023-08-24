<?php
require('fpdf/fpdf.php');
require("class/paciente.php");
require("class/consulta.php");


class PDF extends FPDF
{
	var $widths;
	var $aligns;

	function SetWidths($w)
	{

		$this->widths=$w;
	}

	function SetAligns($a)
	{

		$this->aligns=$a;
	}

	function Row($data)
	{

		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=8*$nb;

		$this->CheckPageBreak($h);

		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

			$x=$this->GetX();
			$y=$this->GetY();


			$this->Rect($x,$y,$w,$h);

			$this->MultiCell($w,8,$data[$i],0,$a,'true');

			$this->SetXY($x+$w,$y);
		}

		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{

		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{

		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}

	function Header()
	{
		$this->SetFont('Arial','B',12);
		$this->Text(60,14,'Expediente del funcionario CTP Pital',1,1);
		$this->Ln(11);
	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','B',12);
		$this->Cell(100,10,'Expediente funcionario',0,0,'R');

	}

}
// Obtenemos el id del paciente
$paciente_id= $_GET['id'];
// Creamos nuestro objeto paciente
$objpaciente = new Paciente();
// obtenemos los datos del paciente por el id
$paciente = $objpaciente->paciente_id($paciente_id);




// Creamos nuestro objeto pdf
//$pdf=new Pdf('L','mm','A4');//cambio de orientación de página
$pdf=new Pdf();
// Agregamos una pagina al archivo
$pdf->AddPage();

$pdf->Image('logo.jpg' , 150 ,10, 30 , 30,'JPG', 'http://www.desarrolloweb.com');
// Personalizamos los amrgenes
$pdf->SetMargins(10,20,20);
// Creamos un espacio
$pdf->Ln(0);
// Definimos la fuente y tamaño
$pdf->SetFont('Arial','B',10);


$pdf->SetFillColor(212,204,202);
$pdf->SetTextColor(1);
// Creamos una celda para mostrar la información
//$pdf->Cell(70,6,utf8_decode('IDENTIFICACIÓN: '),0,0);
//$pdf->SetFont('Arial','',10);
//$pdf->Cell(0,6,$paciente['id'],0,1);
//$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('IDENTIFICACIÓN: '),0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,6,$paciente['cedula'],0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('NOMBRE: '),0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,6,utf8_decode($paciente['nombre' ]),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'APELLIDOS: ',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,6,utf8_decode($paciente['apellido']),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'FECHA DE NACIMIENTO: ',0,0);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,$paciente['fecha_nacimiento'],0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('NACIONALIDAD: '),0,0);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,$paciente['nacionalidad'],0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('TELÉFONO: '),0,0);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,utf8_decode($paciente['telefono' ]),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('CORREO ELECTRÓNICO: '),0,0);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,utf8_decode($paciente['correo']),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('AÑOS DE SERVICIO '),0,00);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,$paciente['anos_servicio'],0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('CATEGORIA'),0,0);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,utf8_decode($paciente['categoria' ]),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'NIVEL DE ESTUDIO',0,0);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,utf8_decode($paciente['nivel_estudio']),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('CONDICIÓN '),0,0); 
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,$paciente['condicion'],0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'AFILIADO(A):',0,0);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,utf8_decode($paciente['sindicato']),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'ESTUDIA: ',0,0);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,utf8_decode($paciente['estudia']),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'UNIVERSIDAD:',0,0); 
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,utf8_decode($paciente['universidad']),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'CARRERA:',0,0); 
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,utf8_decode($paciente['carrera']),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('POSEE EQUIPO DE CÓMPUTO: '),0,0);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,utf8_decode($paciente['posee_equipo' ]),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('POSEE CONEXIÓN A INTERNET:'),0,0);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(0,6,utf8_decode($paciente['posee_internet']),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'PROVEEDOR:',0,0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,6,$paciente['proveedor'],0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('TRABAJA EN OTRAS INSTITUCIONES: '),0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,6,$paciente['trabaja_otras'],0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(80,6,utf8_decode('NOMBRE DE LAS INSTITUCIONES:'),0,10);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,6,utf8_decode($paciente['nombre_instituciones' ]),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('INFORMACIÓN POR WHATSAPP: '),0,0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,6,$paciente['recibe_informacion'],0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,utf8_decode('DIRECCIÓN EN EL CURSO LECTIVO:'),0,10);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(190,6,utf8_decode($paciente['direccion_lectivo']),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,utf8_decode('DIRECCIÓN EN VACACIONES: '),0,10);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(190,6,utf8_decode($paciente['direccion_vacaciones' ]),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,utf8_decode('POSEE ALGUNA CONDICIÓN DE SALUD QUE LE IMPIDA DAR CLASES PRESENCIALES'),0,10); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,6,$paciente['condicion_enfermedad'],0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,utf8_decode('COPIA: '),0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,6,$paciente['copia'],0,1);
$pdf->SetFont('Arial','B',8);
$pdf->MultiCell(190,6,utf8_decode('DECLARO BAJO JURAMENTO QUE TODA LA INFORMACIÓN CONTENIDA EN ESTE FORMULARIO ES VERAZ Y QUE CUALQUIER FALSEDAD ME HARÁ ACREEDOR(A) A LA PÉRDIDA DEL TRÁMITE SOLICITADO, LO ANTERIOR SIN PERJUICIO DE LAS RESPONSABILIDADES LEGALES QUE PROCEDAN POR EL DELITO DE FALSO TESTIMONIO.'),0,10); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,6,$paciente['juramento'],0,1);
//** */ Usamos la funcio imagen, para obtenr la ruta de la imagen usamos nuestra funcion ruta de conexion
/*$pdf->Image(Conexion::ruta().'upload/pacientes/'.$paciente['foto'],155,20,30,30);

$pdf->Ln(10);

$pdf->SetWidths(array(10, 20, 50, 50, 40));
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(29,29,29);
$pdf->SetTextColor(255);
// usamos nuestra funcion creada para listar celdas con varias lineas
$pdf->Row( array('#',utf8_decode('Cédula'), 'Nombre', 'Apellidos', 'Fecha Nacimiento'));
// Creamos nuestra funcion consulta
$objconsulta = new Consulta();
$consultas = $objconsulta->consultasPaciente($paciente_id);

$i = 0;
// listamos las consultas
$n=0;
foreach ($consultas as $consulta) {$n++;
	$pdf->SetFont('Arial','',9);

	if($i%2 == 1){
		$pdf->SetFillColor(181,175,173);
		$pdf->SetTextColor(0);
		$pdf->Row(array($n,$consulta['id'], utf8_decode($consulta ['nombre']), $consulta['apellido'], $consulta['fecha_nacimiento']));
		$i++;
	}else{
		$pdf->SetFillColor(212,204,202);
		$pdf->SetTextColor(0);
		$pdf->Row(array($n,$consulta['id'], utf8_decode($consulta['nombre']), $consulta['apellido'], $consulta['fecha_nacimiento']));
		$i++;
	}
}*/
// Salida del archivo y nombre
$pdf->Output('reporte.pdf','I');
?>