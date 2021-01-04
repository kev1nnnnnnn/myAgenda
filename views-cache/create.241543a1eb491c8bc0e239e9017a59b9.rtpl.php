<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<form role="form" action="/create" method="POST">
		<div class="form-group">
			  <label for="nome">Nome</label>
			  <input type="text" class="form-control" aria-describedby="emailHelp" name="desperson" placeholder="digite seu nome">		  
        </div>

        <div class="form-group">
            <label for="deslogin">Login</label>
            <input type="text" class="form-control" placeholder="Digite seu Login" name="deslogin">
      </div>
        
        <div class="form-group">
			<label for="desphone">Telefone</label>
			<input type="text" class="form-control" placeholder="Digite seu telefone" name="nrphone">
        </div>
  
		<div class="form-group">
			  <label for="desemail">Email</label>
			  <input type="email" class="form-control" placeholder="Digite seu email" name="desemail">
		</div>
        
        <div class="form-group">
			<label for="despassword">Senha</label>
			<input type="text" class="form-control" placeholder="Digite sua senha" name="despassword">
        </div>
        
        <div class="form-group">
            <label>
              <input type="checkbox" name="inadmin" value="1"> Acesso de Administrador
            </label>
          </div>

		<div class="form-group">
			<input type="submit" class="btn btn-dark outline form-control col-md-2">
		</div>
	


   
   </form>
</div>
