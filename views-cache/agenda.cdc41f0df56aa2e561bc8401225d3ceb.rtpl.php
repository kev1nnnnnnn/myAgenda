<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="row mt-4">
	<div class="col-12 col-md-6">

	<table class="table bg-dark text-white table-striped">
	  <thead>
		<tr>
		  <th>#</th>
		  <th>Mensagem</th>				  					
		</tr>
	  </thead>
	  <tbody>
		<?php $counter1=-1;  if( isset($msg) && ( is_array($msg) || $msg instanceof Traversable ) && sizeof($msg) ) foreach( $msg as $key1 => $value1 ){ $counter1++; ?>
		<tr>
			<td><?php echo htmlspecialchars( $value1["idtexto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		  	<td><?php echo htmlspecialchars( $value1["destexto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		</tr>
		<?php } ?>
	  	</tbody>
	</table>

	</div>

	<div class="col-12 col-md-6">
		
	</div>	
</div>