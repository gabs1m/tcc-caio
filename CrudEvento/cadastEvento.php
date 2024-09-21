<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastEvento.css">
    <title>Adicionar novo evento</title>
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
        <h2 class="titulo">Adicionar evento</h2>
        <form action="insertEvento.php" method="POST" enctype="multipart/form-data">
            <div class="campo">
                <label>Nome do evento</label>
                <input type="text" name="nome" placeholder="Nome do evento"  class="edit-inputs">
            </div>
            <br>
            <div class="campo">
                <label>Descrição do evento</label>
                <input name="descricao" type="tex-box" placeholder="Telefone" class="edit-inputs">
            </div>
                <br>
            <div class="campo"  class="edit-inputs">
                <label>Data</label>
                <input  name="data"type="date" class="edit-date">
            </div>
                <br>
            <div class="campo-categoria">
                <label id="genero">Categoria:</label>
                <input type="radio" name="categoria" value="Esportes">Esportes <div class="campo"></div><br>
                <input type="radio" name="categoria" value="Tecnologia">Tecnologia<br>
                <input type="radio" name="categoria" value="Cultura">Cultura<br>
                <input type="radio" name="categoria" value="Gastronomia">Gastronomia<br>
            </div>
                <br>
            <div class="campo">
                <label>Local</label>
                <input type="text" name="local" placeholder="Local"  class="edit-inputs">
            </div>
                <br>
            <div class="campo">
                <label>Rua</label>
                <input type="text" name="rua" placeholder="Rua"  class="edit-inputs">
            </div>
                <br>
            <div class="campo">
                <label>Bairro</label>
                <input type="text" name="bairro" placeholder="Bairro"  class="edit-inputs">
            </div>
                <br>
            <div class="campo">
                <label>Imagem</label>
                <input type="file" name="imagemEvento" id=" " placeholder="Ex: "  >
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