<header>
  <nav class="nav-bar">
    <div class="logo">
      <img class="logo" src="/assets/imagens/logo.png" />
    </div>

    <div class="nav-list">
      <ul>
        <li class="nav-item"><a href="#" class="nav-link">Esporte</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Cultura</a></li>
        <li class="nav-item">
          <a href="#" class="nav-link">Tecnologia</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Gastronomia</a>
        </li>
      </ul>
    </div>

    <div class="icon-barra-de-pesquisa">
      <input
        type="search"
        class="icon-barra-de-pesquisa"
        placeholder="busque aqui" />
      <button class="lupa"><img src="/assets/imagens/lupa_icon.png" /></button>
    </div>

    <?php if($_SESSION['tipo'] == 'anfitrioes'): ?>
    <a href="/eventos/cadastro" style="color: darkred;">Cadastrar evento</a>
    <?php endif ?>

    <div class="login-button">
      <button>
        <a href=<?=$_SESSION[$_SESSION['tipo']] ? "/perfil" : "/usuarios/login"?>><img src="/assets/imagens/user_icon.png" /></a>
      </button>
    </div>

    <div class="mobile-menu-icon">
      <button onclick="menuShow()">
        <img class="icon" src="/assets/imagens/icon_menu.png" />
      </button>
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