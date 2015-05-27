<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!--   ##################################################################################################################################

									CSS									CSS										CSS

	#########################################################################################################################################	-->
	<style type="text/css">
    .modif {
        display: none;
    }
    ul.rig 	{
    	list-style: none;
    	font-size: 0px;
    }
    ul.rig li {
		display: inline-block;
		padding: 10px;
		background: #fff;
		
		font-size: 16px;
		font-size: 1rem;
		vertical-align: top;
		
    }
    ul.rig li:hover {
    	display: inline-block;
		padding: 10px;
		background: #fff;		
		font-size: 16px;
		font-size: 1rem;
		vertical-align: top;
    	border: 1px solid #ddd; 
    	box-shadow: 0 0 5px #ddd;
		box-sizing: border-box;
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
    }
    ul.rig li img {
    	max-width: 100%;
    	height: auto;
    	margin: 0 0 1px;
    }
    ul.rig li p {
    	font-size: .9em;
    	line-height: 1.5em;
    	color: #999;
    }
    ul.rig.columns-2 li {
		width: 47.5%; /* this value + 2.5 should = 50% */
	}
	ul.rig.columns-3 li {
		width: 30.83%; /* this value + 2.5 should = 33% */
	}
	ul.rig.columns-4 li {
		width: 22.5%; /* this value + 2.5 should = 25% */
	}
    ul.rig.columns-5 li {
		width: 17.5%; /* this value + 2.5 should = 25% */
	}
	@media(max-width: 480px) {
		ul.grid-nav li {
			display: block;
			margin: 0 0 5px;
		}
		ul.grid-nav li a {
			display: block;
		}
		ul.rig {
			margin-left: :0;
		}
		ul.rig li {
			width: 100% !important;
			margin: 0 0 20px;
		}
	}
	.gauche_haut {
		float: left;
		width: 50%;
		height: 50%;
		margin-top: 15px;
	}
	.gauche_bas {
		float: left;
		width: 85%;
		height: 100%;
		border: 1px dotted #ddd;
		position: relative;
		margin-left: 10%;
		margin-top: 5px;
	}
	.droite {
		float: right;
		clear: right;
		width: 50%;
		height: 100%;
		overflow: auto;
	}
	.nomPhoto {
		margin-left: 10%;
		margin-right: 5%;
	}
	.frame {
		/*cursor: move;*/
	}
	/*[draggable] {
		-moz-user-select:none;
		-khtml-user-select : none;
		-webkit-use-select : none;
		user-select:none;
	}
	@-webkit-keyframes wobble {
		0% {-webkit-transform: rotate(0deg);}
		20% {-webkit-transform: rotate(8deg);}
		50% {-webkit-transform: rotate(-8deg);}
		100% {-webkit-transform: rotate(0deg);}
	}
	.wobble {-webkit-animation: wobble 5s infinite;}*/
	</style>
	<!--   ##################################################################################################################################

								javascript									javascript									javascript

	#########################################################################################################################################	-->
	<script type="text/javascript">
	function chargementPhoto(url, nom) {
		document.getElementById('imgAff').setAttribute('src', url);
		$('.nomPhoto h2').text(nom);
		document.getElementById('btnSuppr').setAttribute('onclick', "suppr()");
		document.getElementById('btnMod').setAttribute('onclick', "renommer()");
		document.getElementById('nvnom').setAttribute('placeholder', nom);
	}
	function suppr() {
		document.getElementById('frm').setAttribute('action', "SlideUpload_v2.php?suppr="+ $('.nomPhoto h2').text());
		document.getElementById('btnSuppr').value = "Valider";
		document.getElementById('btnSuppr').type = "submit";
	}
	function ValidRenommer() {
		document.getElementById('btnMod').value = "Valider";
		document.getElementById('btnMod').type = "submit";
	}
	
	function renommer() {
		document.getElementById('frm').setAttribute('action', "SlideUpload_v2.php?mod="+ $('.nomPhoto h2').text());
		if (document.getElementById("nvnom").className== "") {
	        document.getElementById("nvnom").className= "modif";
	        $('.nomPhoto h2').css('display', 'initial');

	    }
	    else {
	        document.getElementById("nvnom").className= "";
	        $('.nomPhoto h2').css('display', 'none');

	    }
		
	}
	// ##################################################################

				//partie drag and drop

	// ##################################################################
	/*function handleDragStart(e) {
		//source ser l'élément qui sera déposé
		this.classList.add('wobble');
		source = this;
		e.dataTransfer.effectAllowed = 'move';
		e.dataTransfer.setData('text',this.innerHTML);
	}
	function handleDrop(e) {
		if (e.preventDefault) {
			e.preventDefault();
		};
		source.innerHTML = this.innerHTML;
		this.innerHTML  = e.dataTransfer.getData('text');

		
	}
	function handleDragOver(e) {
	   	if (e.preventDefault) {
	   		e.preventDefault();// obligatoire. permet de déposer l'élément.
	   	};
	   	this.classList.add('over');
	   	return false;
	} 
   function handleDragLeave(e) {
     	this.classList.remove;('over');//this est l'élément précédent
     	var fas = document.querySelectorAll('frame');
    } 
    function handleDragEnd(e) {
    	this.classList.remove('wobble');
    }

    var fas = document.querySelectorAll('frame');
	[].forEach.call(fras, function(fra) {
		fra.addEventListener('dragstart', 'handleDragStart', false);
		fra.addEventListener('dragover', 'handleDragOver', false);
		fra.addEventListener('drop', 'handleDrop', false);
		fra.addEventListener('dragleave', 'handleDragLeave', false);
		fra.addEventListener('dragend', 'handleDragEnd', false);
	});*/
	    

</script>
</head>
<body>
	<div class="gauche_haut">
		<center>
		<div class="form-group">
		    <h2>Ajouter une photo à la diapositive</h2>
		    <form method="post" enctype="multipart/form-data" action="SlideUpload_v2.php">
		    <div class="form-group">
		    <label for="exampleInputFile">image a insérer</label>
		    <input type="file" name="fichier" size="30">
		    <p class="help-block">Pensez a préfixer les images par 'diapo_' pour quelles soit ajoutés a la diapositive</p>
		  </div>
        <input type="submit" class="btn btn-default" name="upload" value="Envoyer">   
</form>

<?php

/*
    prévoir une photo de secours si jamais toute les photos sont supprimées, 
    masquer la photo secours de la liste du slide upload
    ajouter une condition dans le while de slide: si plus de photo ajouter celle de secours
*/
    $transfert;
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
        echo "Le fichier est introuvable";
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];


    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
    {
        echo "Le fichier n'est pas une image";
        $transfert = false;
    }
    else {
    	$transfert = true;
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];
    if (file_exists($content_dir.$_FILES['fichier']['name'])) {
        $_FILES['fichier']['name']= date('Ymd').'_'.$_FILES['fichier']['name'];
    }
    if ($transfert == true) {
    	if( !move_uploaded_file($_FILES['fichier']['tmp_name'], $content_dir.$_FILES['fichier']['name']))
	    {
	        echo "Impossible de copier le fichier dans $content_dir";
	    }
	    else {
	    	echo "Le fichier a bien été uploadé"; //faire un popup en php
	    }
    }
    

    
}

?>
</div>
</center>
<!---               ##########################################################################################################################

															PARTIE AFFICHAGE PHOTO


	                ##########################################################################################################################"    -->
<div class="gauche_bas" ondragenter="return handleDragenter(event)" ondrop="return handleDrop(event)" ondragover="handledragOver(event)">
	<center><img id="imgAff" src="" width="100%" height="100%"/></center>
</div>
<div class="nomPhoto form-group">
	<form id="frm" method='post' action=''>
	<h2 class="">choisissez une photo</h2>
	<input type="text" class="form-control modif" id="nvnom" name="nvnom" placeholder="" onclick="ValidRenommer()" size="50"></input>
<!-- transformer ce text en textbox après le clic du boutton "Renommer"-->
<input type='button' class="btn btn-default" id="btnSuppr" style="float: left" value='Supprimer'></input><input id="btnMod" style="float: right" class="btn btn-default" type="button" onclick='' value="Renommer"></input></form>
</div>
</div>

<!---               ##########################################################################################################################

															PARTIE LISTE PHOTO


	                ##########################################################################################################################"    -->
	
<div class="droite">
	<ul class="rig columns-4" >
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
			if($file != '.' && $file != '..' && !is_dir($dirname.$file) && substr($file, 0,3) != "src") 
			{ 
			    if (!isset($message)) {
			       $message = "";
			    }
			    if (context($file) != "danger") {
			        $message ="";
			    }
			    $url = $dirname.$file;
			    $param = "'".$url."'";
			    $paramNom = "'".$file."'";
			    echo '<li class="frame">';
			    echo '<img src="'.$url.'" title="'.$file.'"  onclick="chargementPhoto('.$param.','.$paramNom.')"/>';
			    echo '</li>';
			    copy($dirname.$file, $dirname.'save_images/sav_'.$file);
			    $cpt=$cpt+1;
			} 
			} 

			closedir($dir); 
		?> 

	</ul>
	<center><label>choix d'affichage des photos 3, 4,5,6 colonnes </label></center>
</div>

</body>
</html>
