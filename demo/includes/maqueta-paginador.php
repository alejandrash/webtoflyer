<div class="paginador">
	
	<?php
if($paginador){

	if($paginador['pagina']){?>
	<a href="?<?php echo "pagina=".($paginador['pagina']-1).$cadenaPag?>">&lt;</a>
	<?php }else {?>
	<a href="#" onClick="javascript: return false;">&lt;</a>
	<?php } ?>
	<?php 
	//$pasada = 1;
	do{	 ?>
	<?php //echo $pasada."-".$pagina; ?>
	<a <?php if($pasada == $paginador['pagina']){echo'class="selec"';}?> href="?<?php echo "pagina=$pasada".$cadenaPag ?>">
	<?php echo $pasada+1?>
	</a>
	<?php $pasada++; }while($pasada<>$paginador['paginas']) ?>
	<!-- siguiente -->
	<?php if ($paginador['paginas']-1 > $paginador['pagina']){ ?>
	<a href="?<?php echo "pagina=".($paginador['pagina']+1).$cadenaPag ?>">&gt;</a>
	<?php }else {?>
	<a href="#" onClick="javascript: return false;">&gt;</a>
	<?php }
	
}
	 ?>
</div>
