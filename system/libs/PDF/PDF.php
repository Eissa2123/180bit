<?php
    class PDF extends FPDF {

        function __construct(){
            parent::__construct('P', 'mm', 'A4');
        }

        function Table($header, $data) {
            // Couleurs, épaisseur du trait et police grasse
            $this->SetFillColor(0,0,0);
            $this->SetTextColor(255);
            $this->SetDrawColor(0,0,0);
            $this->SetLineWidth(.3);
            $this->SetFont('','B');

            // En-tête
            $w = array(40, 35, 60, 55);
            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
            $this->Ln();

            // Restauration des couleurs et de la police
            $this->SetFillColor(217,217,217);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Données
            $fill = false;
            foreach($data as $row)
            {
                $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
                $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
                $this->Cell($w[2],6,number_format($row[2],0,',',' '),'LR',0,'R',$fill);
                $this->Cell($w[3],6,number_format($row[3],0,',',' '),'LR',0,'R',$fill);
                $this->Ln();
                $fill = !$fill;
            }
            // Trait de terminaison
            $this->Cell(array_sum($w),0,'','T');
        }

        function Data($cells) {
            //R($cells);
            
            // Couleurs, épaisseur du trait et police grasse
            $this->SetFillColor(0,0,0);
            $this->SetTextColor(255);
            $this->SetDrawColor(0,0,0);
            $this->SetLineWidth(.3);
            $this->SetFont('','B');

            // En-tête
            $w = array(20, 60, 10, 60);

            // Restauration des couleurs et de la police
            $this->SetFillColor(217,217,217);
            $this->SetTextColor(0);
            $this->SetFont('');
            

            // Données
            $fill = false;
            foreach($cells as $kcell => $vcell)
            {
                if(is_array($vcell)){
                    continue;
                }

                $this->Cell($w[0], 6, '', 0, 0, 'L', $fill);
                $this->Cell($w[1], 6, $kcell, 0, 0, 'L', $fill);
                $this->Cell($w[2], 6, ':', 0, 0, 'L', $fill);
                $this->Cell($w[3], 6, $vcell, 0, 0, 'L', $fill);
                
                $this->Ln();
            }

            // Trait de terminaison
            //$this->Cell(array_sum($w),0,'','T');
        }
        function Header() {
            // Logo
            $this->Image('http://127.0.0.1/public/gshop/public/uploads/pictures/2021/11/D92C680E1A204BA3A75F4F2EE3B3E9B2.PNG', 90, 10, 30);
            // Police Arial gras 15
            $this->SetFont('Arial', 'B', 15);
            // Décalage à droite
            $this->Ln(10);
            $this->Cell(60);
            // Titre
            //$this->Cell(70, 10,'Titre', 0, 0, 'C');
            // Saut de ligne
            $this->Ln(30);
        }
        
        // Pied de page
        function Footer(){
            // Positionnement à 1,5 cm du bas
            //$this->SetY(-15);
            // Police Arial italique 8
            //$this->SetFont('Arial','I',8);
            // Numéro de page
            //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }
    
?>