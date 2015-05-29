<style type="text/css">
	.slideshow {
   width: 960px;
   height: 500px;
   overflow: hidden;
   border: 3px solid #F2F2F2;
}
.slideshow ul {
    /* 4 images donc 4 x 100% */
   width: 400%;
   height: 425px;
   padding:0; margin:0;
   list-style: none;
}
.slideshow li {
   float: left;
}
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
   
<script type="text/javascript">
   $(function(){
      setInterval(function(){
         $(".slideshow ul").animate({marginLeft:-960},800,function(){
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
         })
      }, 5000);
   });
</script>
<div class="slideshow container">
	<ul>
<?php 
$dirname = './wp-content/themes/Yasmin/slider/images/'; 
$dir = opendir($dirname); 
$cpt = 0;
echo $_SERVER["SERVER_NAME"];
while($file = readdir($dir)) { 
if($file != '.' && $file != '..' && !is_dir($dirname.$file) && substr($file, 0,5) == "diapo") 
{ 
	echo '<li><img src="'.$dirname.$file.'" /></li>';
   $cpt++;
} 
} 
closedir($dir);
if ($cpt <=2) {
   echo '<li><img src="'.$dirname.'src_main.jpg" /></li>';
   echo '<li><img src="'.$dirname.'src_ville.jpg" /></li>';
}
?> 
</ul>
</div>
