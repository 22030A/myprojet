<?php 
// Load the database configuration file 
include_once 'dbConfig.php'; 
 
// Get status message  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Import Excel File Data with PHP</title>




<script>
function formToggle(Matricule){
    var element = document.getElementById(Matricule);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>
</head>
<body>

<!-- Display status message -->
<!-- <?php //if(!empty($statusMsg)){ ?> -->
<!-- <div class="col-xs-12 p-3">
    <div class="alert <?php //echo $statusType; ?>"><?php //echo $statusMsg; ?></div>
</div> -->
<!-- <?php //} ?> -->

<div class="row p-3">
    <div class="col-md-12 head">
        <div class="float-end">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import Excel</a>
        </div>
    </div>
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form class="row g-3" action="importData.php" method="post" enctype="multipart/form-data">
            <div class="col-auto">
                <label for="fileInput" class="visually-hidden">File</label>
                <input type="file" class="form-control" name="file" id="fileInput" />
            </div>
            <div class="col-auto">
                <input type="submit" class="btn btn-primary mb-3" name="importSubmit" value="Import">
            </div>
        </form>
    </div>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <td>Matricule</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Moyenne</td>
            </tr>
        </thead>
        <tbody>
        <?php 
        $result = $db->query("SELECT * FROM resultat  ORDER BY Moyenne DESC"); 
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){ 
        ?>
            <tr>
                <td> <?php echo $row["Matricule"]; ?> </td>
                <td> <?php echo $row["Nom"]; ?> </td>
                <td> <?php echo $row["Prenom"]; ?> </td>
                <td> <?php echo $row["Moyenne"]; ?> </td>
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="7">No member(s) found...</td></tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<style>
    td{
        border: 1px solid #4CAF50;
        border-radius: 5px;
    }
</style>
</body>

</html>
