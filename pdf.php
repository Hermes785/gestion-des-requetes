<?php require_once('dompdf/autoload.inc.php') ; 

   $dompdf = new Dompdf();
   $dompdf->loadHtml('Brouette');
   $dompdf->render();
   $dompdf->stream;
