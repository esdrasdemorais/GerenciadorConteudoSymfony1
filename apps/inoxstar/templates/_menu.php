<div class="menu">
<?php #echo is_object($menu) ? $menu->render() : ''  ?>
<?php if ($sf_user->isAuthenticated()): ?>
<ul>
 <li><a href="/category/index">Categoria</a></li>
 <li><a href="/tag/index">Tag</a></li>
 <li><a href="/product/index">Produto</a></li>
 <li><a href="/usr/alterCurrentUser">Usu&aacute;rio</a></li>
<?php # <li><a href="/usr/index">Novo Usu&aacute;rio</a></li> ?>
 <li><a href="/usr/logout">Sair</a></li>
</ul>
<?php endif; ?>
</div>
