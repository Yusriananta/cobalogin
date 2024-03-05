<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once ('asset/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Mypdf
{
	protected $ci;

	public function __construct()
	{
		$this->ci -& get_instance();
	}

	public function generate($view, $data = array(), $filename = 'Rekap Nilai', $paper = 'A4', $orientation = 'portrait')
	{
		$html = $this->ci->load->view($view, $data, TRUE);
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		// Render the HTML as PDF
		$dompdf->render();
	    ob_clean();
	    $dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
	}
}
