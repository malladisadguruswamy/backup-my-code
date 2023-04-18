
<?php  // codeingiter pdf creation
$html = $this->create_invoice_data($sale_id,$seller_id,2);
$this->load->library('Pdf');
$this->dompdf->loadHtml($html);
$this->dompdf->setPaper('A4', 'Landscape');
$this->dompdf->render();
$this->dompdf->stream("invoice-".$sno.".pdf");
//redirect(current_url());