<?php 

$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Laporan PJPK');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $i=0;
           $html='<table>';
            foreach ($profil as $rowp)
                {
                    $i++;
                    if($rowp->status == 1){
                            $html .= '<tr><td>Status</td><td>:</td><td><img src="assets/dashboard/images/legend/treatment.png"> Drafted</td></tr>';  
                    }else if($rowp->status == 2){
                            $html .= '<tr><td>Status</td><td>:</td><td><img src="assets/dashboard/images/legend/submit.png">Incomplete</td></tr>';
                    }else if($rowp->status == 3){
                            $html .= '<tr><td>Status</td><td>:</td><td><img src="assets/dashboard/images/legend/verified.png">Complete</td></tr>';
                    }else if($rowp->status == 4){
                            $html .= '<tr><td>Status</td><td>:</td><td><img src="assets/dashboard/images/legend/executed_2.png">Pending Finished</td></tr>';
                    }else if($rowp->status == 5){
                             $html .= '<tr><td>Status</td><td>:</td><td><img src="assets/dashboard/images/legend/executed.png">Finished</td></tr>';
                          }

                    $html .='<tr><td>Nama Penanggung Jawab Proyek</td><td>:</td><td>'.$rowp->nama_pj.'</td></tr>';
                    $html .='<tr><td>Kategori Penanggung Jawab Proyek</td><td>:</td><td>'.$rowp->nama_kategori.'</td></tr>';
                    $html .='<tr><td>Sektor Infrastruktur</td><td>:</td><td>'.$rowp->nama_sektor.'</td></tr>';
                    $html .='<tr><td>Nama Proyek</td><td>:</td><td>'.$rowp->nama_projek.'</td></tr>';
                    $html .='<tr><td>lokasi</td><td>:</td><td>'.$rowp->lokasi.'</td></tr>';
                    $html .='<tr><td>Estimasi</td><td>:</td><td>'.$rowp->estimasi.'</td></tr>';     
                
                }
            $html.='</table>';
            $html .= '<table>';
                    foreach ($g1 as $r1) {
                        if($r1->pilihan == "Y"){
                            $r1->pilihan= "Ya";
                        }else if($r1->pilihan == "N"){
                          $r1->pilihan = "Tidak";
                        }
                     }

                    
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('pjpk.pdf', 'I');

            
?>
