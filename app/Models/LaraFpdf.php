<?php

namespace App\Pdf;

use TJGazel\LaraFpdf\LaraFpdf;

class MyPdf extends LaraFpdf
{


    public function __construct()
    {
     
        parent::__construct('P', 'mm', 'A4');
        $this->SetA4();
        $this->SetTitle('My pdf title', true);
        $this->SetAuthor('TJGazel', true);
        $this->AddPage('L');
        $this->Body();
    }

    public function Header()
    {
        // fixed all pages
    }

    public function Body()
    {
        $this->SetFont('Arial', 'B', '24');
        $this->Cell(50, 25, 'rer');

        $this->SetFont('Arial', '', '14');
        $this->Cell(50, 25, 'derer');
    }

    public function Footer()
    {
        // fixed all pages
    }
}