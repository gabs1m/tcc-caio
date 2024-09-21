<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastUsuario.css">
    <title>Edite Cadastro</title>
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
            
        <?php
            require"../conexaoBD.php";
            $id = $_GET["id"];
            //Select do anfitriao
            $XUsuario = "SELECT * FROM Usuario WHERE idUsuario = '$id'";
            $resulUsuario = mysqli_query($conexao, $XUsuario);
            $usuario = mysqli_fetch_assoc($resulUsuario);
        ?>

<div class="posicao-formulario">  
    <div class="formulario-geral">
        <h2 class="titulo">Cadastro Usuário</h2>
        <form action="UpdateUsuario.php" method="POST" enctype="multipart/form-data">
            <div class="campo">
                <label>Nome</label>
                <input type="text" placeholder="Nome"  value="<?=$usuario['Nome']?>" class="edit-inputs" name="nome">
            </div>
            <br>
            <div class="campo">
                <label>Telefone</label>
                <input type="text" placeholder="Telefone" value="<?=$usuario['Telefone']?>" class="edit-inputs" name="telefone">
            </div>
                <br>
            <div class="campo">
                <label>CPF</label>
                <input type="text" placeholder="CPF" value="<?=$usuario['Cpf']?>" class="edit-inputs" name="cpf">
            </div>
                <br>
            <div class="campo">
                <label>E-mail</label>
                <input type="email"placeholder="E-mail" value="<?=$usuario['Email']?>" class="edit-inputs" name="email">
            </div>
                <br>
            <div class="campo">
                <label>Senha</label>
                <input type="senha" placeholder="senha" value="<?=$usuario['Senha']?>"class="edit-inputs" name="senha">
            </div>
                <br>
            <div class="campo"  class="edit-inputs">
                <label>Data de nascimento</label>
                <input type="date" class="edit-date" value="<?=$usuario['Data_nascimento']?>" name="data">
            </div>
                <br>
            <div class="campo-genero">
            <label id="genero">Genêro:</label>
            <input type="radio" name="genero" value="Masculino"  <?php if ($usuario["Genero"]=="Masculino") echo "checked" ?>>Masculino<br>
            <input type="radio" name="genero" value="Femenino"  <?php if ($usuario["Genero"]=="Femenino") echo "checked" ?>>Femenino<br>
            <input type="radio" name="genero" value="Outro"  <?php if ($usuario["Genero"]=="Outro") echo "checked" ?>>Outro<br>
            </div>
            <br>
            <div class="campo">
                <label>Imagem</label>
                <input type="file" name="ImagemUsario" <?=$usuario['Imagem']?> >
            </div>
            <br>
            <div>
                <input type="hidden" name="id" value="<?=$usuario['idUsuario']?>">
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