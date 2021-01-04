<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			  
			  <div class="box-header mb-4">
				<a href="/create" class="btn btn-dark">Cadastrar Contato</a>
			  </div>
  
			  <div class="box-body no-padding">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#</th>
					  <th>Nome</th>
					  <th>Telefone</th>
					  <th>E-mail</th>					  					
					</tr>
				  </thead>
				  <tbody>
					<?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
					<tr>
					  <td><?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					  <td><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					  <td><?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>		
					  <td><?php echo htmlspecialchars( $value1["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>	
					   
					  <td>
						<a href="/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
						<a href="/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
					  </td>
					</tr>
					<?php } ?>
				  </tbody>
				</table>
			  </div>
			  <!-- /.box-body -->
			</div>
		</div>
	</div>
</div>
	
