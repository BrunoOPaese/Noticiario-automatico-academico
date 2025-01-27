<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="{{ route('index') }}">Notícias de Qualidade</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="nvb">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.index') }}">Categorias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">Usuários</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">Sair</a>
      </li>
    </ul>
  </div>
</nav>