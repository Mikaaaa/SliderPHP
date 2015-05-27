<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<center>
<div class="form-group">
    <h2>Ajouter une photo a la diapositive</h2>
    <form method="post" enctype="multipart/form-data" action="test_upload.php">
    <div class="form-group">
    <label for="exampleInputFile">image a insérer</label>
    <input type="file" name="fichier" size="30">
    <p class="help-block">Pensez a préfixer les images par 'diapo_' sinon elle ne seront pas ajoutés a la diapositive</p>
  </div>
        <input type="submit" name="upload" value="Uploader">   
</form>

<?php

/*
    prévoir une photo de secours si jamais toute les photos sont supprimées, 
    masquer la photo secours de la liste du slide upload
    ajouter une condition dans le while de slide: si plus de photo ajouter celle de secours
*/
function getlesComptes()
{
    $dirname = './themes/Yasmin/slider/images/'; 
    $dir = opendir($dirname); 
    $lesComptes =array();
    $cpt_diapo = 0;
    $cpt_pasdiapo = 0;
    $cpt_total = 0;
    while($file = readdir($dir)) { 
    if($file != '.' && $file != '..' && !is_dir($dirname.$file)) 
    { 
        if (substr($file, 0, 6) == "diapo_") {
            $cpt_diapo++;
        }
        else {
            $cpt_pasdiapo++;
        }
        $cpt_total++;
    } 
    } 

    closedir($dir);
    array_push($lesComptes, $cpt_diapo, $cpt_pasdiapo, $cpt_total);
    return $lesComptes;
}
if( isset($_POST['upload']) ) // si formulaire soumis
{
    $content_dir = './themes/Yasmin/slider/images/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];


    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
    {
        exit("Le fichier n'est pas une image");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];
    if (file_exists($content_dir.$_FILES['fichier']['name'])) {
        $_FILES['fichier']['name']= date('Ymd').'_'.$_FILES['fichier']['name'];
    }
    if( !move_uploaded_file($_FILES['fichier']['tmp_name'], $content_dir.$_FILES['fichier']['name']) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }

    echo "Le fichier a bien été uploadé";
}

?>
</div>
</center>
<style type="text/css">
    .modif {
        display: none;
    }
</style>
<script type="text/javascript">
function modifier (num) {
    if (document.getElementById("modifier-"+num).className== "") {
        document.getElementById("modifier-"+num).className= "modif";
        document.getElementById("acnom-"+num).className= "";
    }
    else {
        document.getElementById("modifier-"+num).className= "";
        document.getElementById("acnom-"+num).className= "modif";
    }

    
    
}
    $("#btnRenommer").click(function(){
        $("#modifier").removeclass('modif');
        $('#acnom').addclass('modif');
    });
    
</script>
<div class="row" style="border-line 1px">
<div class="col-sm-10 col-sm-offset-1">
    <table class="table table-condensed table-hover">
    <tr>
        <td>Aperçu</td><td>Nom</td><td></td><td></td>
    </tr>
<?php 
function context($file)
{
    $context="";
    if (substr($file, 0, 6) == "diapo_") {
        $context = "";
    }
    if (substr($file, 0, 6) != "diapo_") {
        $context = "warning";

    }
    if (substr($file, 0, 4) == date('Y')) {
        $context = "danger";        
    }
    return $context;
}
function context_comm($file)
{
    $context_comm ="";
    if (substr($file, 0, 6) == "diapo_") {
        $context_comm = "La photo est bien intégré a la diapositive.";
    }
    if (substr($file, 0, 6) != "diapo_") {
        $context_comm = "La photo n'est pas intégré a la diapositive.";
    }
    if (substr($file, 0, 4) == date('Y')) {
        $context_comm = "Le nom du fichier doit être changé.";
    }
    return $context_comm;
}
$lesComptes = getlesComptes();
echo "<p class='help-block'>La diapo est composé de ".$lesComptes[0]." photos, ".$lesComptes[1]." photos ne font pas partie de la diapo, pour un total de ".$lesComptes[2]." photos</p>";
if (isset($_REQUEST['suppr'])) {
    for ($i=0; $i < 1; $i++) { 
        unlink('./themes/Yasmin/slider/images/'.$_REQUEST['suppr']);
    }
    
}
if (isset($_REQUEST['mod'])) {
    if ($_REQUEST['nvnom']== "" ) {
        $_REQUEST['nvnom'] = $_REQUEST['mod'];      

    }
    if (file_exists('./themes/Yasmin/slider/images/'.$_REQUEST['nvnom'].'.jpg')) {
        $message = "le nom ".$_REQUEST['nvnom'].".jpg existe déjà.";
        $_REQUEST['nvnom'] = $_REQUEST['mod'];
    }
    $char = substr($_REQUEST['nvnom'], strlen($_REQUEST['nvnom'])-4 , strlen($_REQUEST['nvnom']) );
    $accent = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','×','Ø','Ú','Û','Ü','Ý','Þ','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ð','ñ','ò','ó','ô','õ','ö','÷','ø','ù','ú','û','ü','ý','þ','ÿ',' ',"'",'"');
    $replace= array('A','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','x','O','U','U','U','Y','P','B','a','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','n','o','o','o','o','o','_','o','u','u','u','u','y','p','y','-', '', '');
    if (!preg_match('#.jpg|.jpeg|.bmp#i', $char )) {
        $_REQUEST['nvnom']= $_REQUEST['nvnom'].'.jpg';
        $_REQUEST['nvnom']= str_replace($accent, $replace,$_REQUEST['nvnom']) ;

    }
    for ($i=0; $i < 1; $i++) { 
        rename('./themes/Yasmin/slider/images/'.$_REQUEST['mod'], './themes/Yasmin/slider/images/'.$_REQUEST['nvnom']);
    }
    
}
    
$dirname = './themes/Yasmin/slider/images/'; 
$dir = opendir($dirname); 
$context_comm ="";
$context = "";
$cpt = 0;
while($file = readdir($dir)) { 
if($file != '.' && $file != '..' && !is_dir($dirname.$file)) 
{ 
    if (!isset($message)) {
       $message = "";
    }
    if (context($file) != "danger") {
        $message ="";
    }
    echo '<tr class="'.context($file).'">';
    echo '<td><img src="'.$dirname.$file.'" width="100" height="50"/></td>';
    echo '<td><div id="acnom-'.$cpt.'" class="">'.$file.'<br /><p class="help-block">'.context_comm($file).' '.$message.'</p></div><div id="modifier-'.$cpt.'" class="modif"><form method="post" action="test_upload.php?mod='.$file.'"><input type="text" class="form-control" id="nvnom" name="nvnom" placeholder="'.$file.'"></input><input type="submit" value="Valider"></input></form></div></td>';
    echo "<td><form method='post' action='test_upload.php?suppr=".$file."'><input type='submit' value='Supprimer'></input></form></td>";
    echo "<td><button id='btnRenommer' onclick='modifier(".$cpt.")'>Renommer</button></td>";
    echo '</tr>';
    copy($dirname.$file, $dirname.'save_images/sav_'.$file);
    $cpt=$cpt+1;
} 
} 

closedir($dir); 
?> 
</table>
</div>
</div>
