<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_test extends My_Controller
{

    function __construct()
    {
        parent::Controller();
    }

    function tcpdf()
    {
        error_reporting(0);
        $this->load->library('pdf');

        // set document information
        $this->pdf->SetSubject('TCPDF Tutorial');
        $this->pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set font
        $this->pdf->SetFont('times', 'BI', 16);


        // print a line using Cell()
        $html = '<br /><br /><br /><br /><br /><strong>Test</strong>';
        $this->pdf->writeHTML($html, true, false, true, false, '');

        //Close and output PDF document
        $this->pdf->Output('example_001.pdf', 'I');
    }
}