
<?php  // codeingiter
$this->load->library('Pdf');
$html = '<h1>Helllo world</h1>';
$this->dompdf->loadHtml($html);
$this->dompdf->setPaper('A4', 'landscape');
$this->dompdf->render();
$this->dompdf->stream("welcome.pdf");