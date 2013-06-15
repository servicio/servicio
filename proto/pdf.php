  <?php
  session_start();
  ?>
  <?php
  include './conexion_1.php';
  Conectarse();
  ?>
  <?php
  require('fpdf.php');
  $tut = 'Raul Caceres';
  $idalu = '1';
  $pdf = new FPDF();
  $pdf->AddPage();
  $str = iconv('UTF-8', 'windows-1252', $str);
  $pdf->SetFont('Arial','B',16);
  $pdf->Write(5,'Tutor(a): ');
  $pdf->SetFont('Arial','BU',16);
  $pdf->Write(5,''.$tut);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',16);
  $consulta = mysql_query("SELECT * FROM reporte_tutor, persona, reg_tutor, usuario WHERE reporte_tutor.id_alumno = persona.id AND usuario.usuario = reg_tutor.matricula AND usuario.idPersona = reporte_tutor.id_alumno AND usuario.idPersona ='$idalu' AND reporte_tutor.id_alumno ='$idalu'");
while ($fila = mysql_fetch_array($consulta))
{
	$pdf->MultiCell(0,7,'En torno al siguiente alumno: '.$fila[6].' '. $fila[7].' quien tiene sus tutorias los dias '.$fila[11].' de '.$fila[12].' '.$fila[3].' a su tutoria y estos son los comentarios que se generaron en base a su tutoria: '.$fila[4],0, 'L');
}
  $pdf->Output('Reporte tutor.pdf',i);
  ?>