<?php 
include_once 'dbConfig.php';
require_once 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
if(isset($_POST['importSubmit'])){
    ?>
    <style>
        a{
            display: none;
        }
    </style>
    <?php
     
    // Allowed mime types
    $excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    // Validate whether selected file is a Excel file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $excelMimes)){

        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){

            // Delete all previous records from the "resultat" table
            $db->query("DELETE FROM resultat");

            $reader = new Xlsx();
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $worksheet = $spreadsheet->getActiveSheet();
            $worksheet_arr = $worksheet->toArray();

            // Remove header row
            unset($worksheet_arr[0]);
            foreach($worksheet_arr as $row){
                $Matricule = $row[0];
                $Nom = $row[1];
                $Prenom = $row[2];
                $Moyenne = $row[3];
                $db->query("INSERT INTO resultat (Matricule, Nom, Prenom, Moyenne) VALUES ('".$Matricule."', '".$Nom."', '".$Prenom."', '".$Moyenne."')");
            }
        }
    }
}
header("Location: index.php");
?>
