<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastAnfitriao.css">
    <title>Cadastro anfitrião</title>
</head>

<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <img class="logo" src="../imagens/logo.png">
                <div class="nav-list">
                    <ul>
                        <li class="nav-item"><a href="#" class="nav-link">Esporte</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Cultura</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Tecnologia</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Gastronomia</a></li>
                    </ul>
                </div>
            </div>

            <div class="icon-barra-de-pesquisa">
                <input type="search" class="icon-barra-de-pesquisa" placeholder="busque aqui">
                <button class="lupa"><img src="../imagens/lupa_icon.png"></button>
            </div>

            <div class="login-button">
                <button><a href="#"><img src="../imagens/user_icon.png"></a></button>
            </div>

            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="../imagens/icon_menu.png"></button>
            </div>
        </nav>

        <div class="mobile-menu">
            <ul>
                <li class="nav-item"><a href="#" class="nav-link">Esporte</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Cultura</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Tecnologia</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Gastronomia</a></li>
            </ul>

            <div class="login-button">
                <button><a href="#">Entrar</a></button>
            </div>
        </div>
    </header>
    <script src="../acao.js"></script>

<div class="posicao-formulario">  
    <div class="formulario-geral">
        <h2 class="titulo">Cadastro anfitrião</h2>
        <form action="insertAnfitriao.php" method="POST" enctype="multipart/form-data">
            <div class="campo">
                <label>Nome</label>
                <input name="nome" type="text" placeholder="Nome"  class="edit-inputs">
            </div>
            <br>
            <div class="campo">
                <label>Telefone</label>
                <input name="telefone" type="text" placeholder="Telefone" class="edit-inputs">
            </div>
                <br>
            <div class="campo">
                <label>CNPJ</label>
                <input name="cnpj" type="text" placeholder="CPF"  class="edit-inputs">
            </div>
                <br>
            <div class="campo">
                <label>E-mail</label>
                <input name="email" type="email"placeholder="E-mail"  class="edit-inputs">
            </div>
                <br>
            <div class="campo">
                <label>Senha</label>
                <input type="senha" placeholder="senha"  class="edit-inputs" name="senha">
            </div>
                <br>
            <div class="campo">
                <label>Imagem</label>
                <input type="file" name="imagemAnfitriao" id=" " placeholder="Ex: ">
            </div>
            <br>
            <div>
                <button type="submit" class="cadast-button">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

<footer>
	<p>&copy; 2024 - Todos os direitos reservados</p>
	<nav>
		<ul>
			<li><a href="#">Sobre nós</a></li>
		</ul>
	</nav>
</footer>
</body>
</html>