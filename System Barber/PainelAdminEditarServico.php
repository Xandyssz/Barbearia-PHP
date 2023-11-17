<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <title>Tela de administrador</title>
</head>
<body>

	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div style="position: relative;" class="container-fluid">
		  <h1 class="h2" class="navbar-brand" href="./index.html" style="color: rgb(255, 208, 0);padding-left: 10px;" >System Barber</h1>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" class="">
				<a style="padding-left: 100px;" class="nav-link" href="index.html" role="button" aria-expanded="false" >
				  Menu
				</a>
				<a style="padding-left: 50px;" class="nav-link" href="cadastrarUsuarioADM.html" role="button" aria-expanded="false" >
					Cadastrar-U
				  </a>
				  <a style="padding-left: 50px;" class="nav-link" href="removerUsuarioADM.html" role="button" aria-expanded="false" >
					Remover-U
				  </a>
				  <a style="padding-left: 50px;" class="nav-link" href="cadastrarServicoADM.html" role="button" aria-expanded="false" >
					Cadastrar-S
				  </a>
				  <a style="padding-left: 50px;" class="nav-link" href="removerServicoADM.html" role="button" aria-expanded="false" >
					Remover-S
				  </a>
				  <a style="padding-left: 50px;" class="nav-link" href="cadastrarBarbeiroADM.html" role="button" aria-expanded="false" >
					Cadastrar-B
				  </a>
				  <a style="padding-left: 50px;" class="nav-link" href="removerBarbeiroADM.html" role="button" aria-expanded="false" >
					Remover-B
				  </a>
			</ul>
			<form class="d-flex" role="search">
			  <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" style="border-color: rgb(255, 208, 0);;">
			  <button class="btn btn-outline-success" type="submit" style="color: rgb(255, 208, 0); background-color: transparent; border-color: rgb(255, 208, 0);;">Pesquisar</button>
			</form>
		  </div>
		</div>
	  </nav>
    <div class="container">
        <!-- Tela de Cadastro -->
        <div class="form-container">
            <h2>Remover Serviço</h2>
            <form>
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" placeholder="Digite o nome do serviço">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" id="cpf" placeholder="Digite o preço">
                </div>
                <button class="btn btn-outline-warning"><a class="btn-outline-success" href="index.html">Remover</a></button>
            </form>
        </div>
    </div>
</body>
</html>
