<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<link rel="shortcut icon" href="/images/favicon.gif" type="image/x-icon" />
<!-- CSS -->
<?php #use_stylesheet($sf_user->getAttribute('deviceClass')) #include_stylesheets() ?>
<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
<style type="text/css">
/* Navigation ----------------------------------------------- */
#menuhlng1{float:left}
ul#icon-socialmn{float:left; position:fixed; z-index:99; top:200px;}
ul#icon-socialmn li{position:relative; }
ul#icon-socialmn li a{background-image:url(http://3.bp.blogspot.com/-JWxzfuPXWDQ/ULykR51IjoI/AAAAAAAABfk/GUjrfkEH7hc/s1600/team-social-icons.png);background-repeat:no-repeat;display:block;width:43px;height:47px;text-indent:-9999px;-webkit-transition:background .2s ease-out;-moz-transition:background .2s ease-out;-o-transition:background .2s ease-out;transition:background .2s ease-out; background-color:transparent;}
ul#icon-socialmn li.social-twitter a{background-position:4px 7px; background-color:#808080;}
ul#icon-socialmn li.social-twitter a:hover{background-color:#2DAAE1;}
ul#icon-socialmn li.social-facebook a{background-position:-23px 7px; background-color:#808080;}
ul#icon-socialmn li.social-facebook a:hover{background-color:#3C5B9B;}
ul#icon-socialmn li.social-google a{background-position:-52px 7px}
ul#icon-socialmn li.social-google a:hover{background-color:#F63E28}
ul#icon-socialmn li.social-rss a{background-position:-85px 7px}
ul#icon-socialmn li.social-rss a:hover{background-color:#FA8C27}
ul#icon-socialmn li.social-linkedin a{background-position:-116px 7px}
ul#icon-socialmn li.social-linkedin a:hover{background-color:#0173B2}
ul#icon-socialmn li.social-dribbble a{background-position:-146px 7px}
ul#icon-socialmn li.social-dribbble a:hover{background-color:#F9538F}
ul#icon-socialmn li.social-pinterest a{background-position:-176px 7px}
ul#icon-socialmn li.social-pinterest a:hover{background-color:#CB2027}

.violet {
	font-family: 'Droid Serif', serif;
	font-size: 1.2em;
	padding: 0.5em 0;
	color: #777777;
	line-height: 1.5em;
	font-style: italic;
	text-align: center;
}
</style>
<!-- /CSS -->
<!-- Javascript -->
<?php #include_javascripts() #use_javascript('') ?>
<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
<script type="text/javascript" src="/filtro/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/filtro/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="/filtro/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="/filtro/js/script.js"></script>
<script src="/js/jquery.poptrox.min.js"></script>
<script src="/js/skel.min.js"></script>
<script src="/js/init.js"></script>
<noscript>
	<link rel="stylesheet" href="/css/skel-noscript.css" />
	<link rel="stylesheet" href="/css/style-skel-noscript.css" />
</noscript>
<script type="text/javascript">
/* Contact form */
jQuery(document).ready(function() {
	$('.form form').submit(function() {

        	$('.form form .nameLabel').html('Name');
       	 	$('.form form .emailLabel').html('Email');
        	$('.form form .messageLabel').html('Message');

        	var postdata = $('.form form').serialize();
        	$.ajax({
            	    type: 'POST',
            	    url: 'sendmail.php',
            	    data: postdata,
             	    dataType: 'json',
            	    success: function(json) {
                	if(json.nameMessage != '') {
                    		$('.form form .nameLabel').append(' - <span class="violet" style="font-size: 13px; font-style: italic"> ' + json.nameMessage + '</span>');
                	}
                	if(json.emailMessage != '') {
                    		$('.form form .emailLabel').append(' - <span class="violet" style="font-size: 13px; font-style: italic"> ' + json.emailMessage + '</span>');
                	}
                	if(json.messageMessage != '') {
                    		$('.form form .messageLabel').append(' - <span class="violet" style="font-size: 13px; font-style: italic"> ' + json.messageMessage + '</span>');
                	}
                	if(json.nameMessage == '' && json.emailMessage == '' && json.messageMessage == '') {
                    		$('.form form').fadeOut('fast', function() {
                        		$('.form').append('<p><span class="violet">Obrigado por entrar em contato!<br> Em breve retornaremos.</span></p>');
                    		});
                	}
            	    }
        	});
        	return false;
    	    });
	});
			
	$(function() {
		$('#da-slider').cslider({
			autoplay	: true,
			bgincrement	: 450
		});				
	});
<!-- /Javascript -->
</script>
<!---//strat-slider---->
<!-- scroll -->
<script type="text/javascript">
$(document).ready(function() {	
	var defaults = {
		containerID: 'toTop', // fading element id
		containerHoverID: 'toTopHover', // fading element hover id
		scrollSpeed: 1200,
			easingType: 'linear' 
	};
				
	$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<!-- //scroll -->
</head>
<body>

<?php if ("desktop" === $sf_user->getAttribute("deviceClass")) : ?>
<!-- Header -->
<header id="header">
	<!-- Logo -->
	<h1 id="logo"><a href="#">INOXPAR</a></h1>
	<!-- Nav -->
	<nav id="nav">
		<ul>
			<li><a href="/#intro">Home</a></li>
			<li><a href="#one">Quem somos</a></li>
			<li><a href="#two">O inox</a></li>
			<li><a href="<?php echo url_for("@homepage#work") ?>">Nossos Produtos</a></li>
                        <li><a href="#video">Video</a></li>
                        <li><a href="#localizacao">Localização</a></li>
			<li><a href="#contact">Contato</a></li>
		</ul>
	</nav>
</header>
<!-- /Header -->
<?php endif; ?>
         
<ul class="sociico" id="icon-socialmn">
    <li class="social-facebook"><a href="https://www.facebook.com/InoxPar.Ind?fref=ts" target="_blank">facebook</a></li>
    <li class="social-twitter"><a href="https://twitter.com/inoxpar" target="_blank">twitter</a></li>
    <div style="width:40px; height:45px; float:left;"><a href="indexESP.html"><img src="espanha.png" width="40" height="40"/></a></div>
    <div style="width:40px; height:40px;"><a href="indexENG.html"><img src="eua.png" width="40" height="40"/></a></div>
</ul>

<!-- Intro -->
<section id="intro" class="main style1 dark fullscreen">
	<div class="content container small">
		<header>
			<h2><img src="images/inoxlogo.png"></h2>
		</header>
		<p style="text-shadow:1px 2px 2px #242422; background-color:#000; padding:20px;border-radius:1em">Dispomos de variada linha de fixadores em aço inoxidável. Exija inox passivado. Parafusos especiais mediante desenho e amostra em aço inoxidável.</p>
		<footer>
			<a href="#one" class="button style2 down">More</a>
		</footer>
	</div>
</section>
<!-- Intro -->

<!-- One -->
<section style="padding-top:0px;" id="one" class="main style2 right dark fullscreen">
	<div class="content box style2" style="padding:1.5em 2.5em 3.5em 2.5em; height:620px;">
		<header>
			<h2>Quem somos</h2>
		</header>
		<p>Fundada no ano de 1986 em São Paulo, Capital, com o objetivo de atender o mercado consumidor de fixadores em aço inoxidável. Com o decorrer dos anos, a Inox-Par ampliou-se e desenvolveu sua linha de produtos para melhor atender seus clientes, fornecendo tanto a linha de produtos standard, bem como, itens especiais produzidos por encomenda. Com um estoque superior a 12.000 itens, a Inox-Par objetiva atender com rapidez e eficiência todos os seus clientes.</p>
                <div style="width:575px; float:left;">
                	<div style="width:427px; float:left; line-height:28px;"><h3>Missão</h3><p style="border-right:solid 1px; margin-right:15px;">
Desenvolver, produzir e comercializar com excelência elementos de fixação, construindo um relacionamento duradouro com os nossos colaboradores e clientes, prezando pela ética, respeito e sustentabilidade.</p>
			</div>
              		<div style="width:110px; float:left; line-height:24px;"><h3>Valores</h3>
				Respeito<br>Honestidade<br>Comprometimento<br>Qualidade<br>Fidelidade<br>
Persistência
                	</div>		
		</div>
	</div>
	<a href="#two" class="button style2 down anchored">Next</a>
</section>
<!-- /One -->
		
<!-- Two -->
<section id="two" class="main style2 left dark fullscreen">
	<div class="content box style2" style="width:90%">
            	<header>
			<h2>O que é inox</h2>
		</header>
		<p style="font-size:16px; line-height:20px;">O aço inoxidável é o nome dado à família de aços resistentes à corrosão e ao calor contendo no mínimo 10,5% de cromo, existindo uma grande variedade de aços inoxidáveis com níveis progressivamente maiores de resistência à corrosão e resistência mecânica. Os tipos de aço inoxidável podem ser classificados em cinco famílias básicas: ferríticos, martensíticos, austeníticos, duplex e endurecidos por precipitação.</p>
                <header>
			<h2>As aplicações de Inox</h2>
		</header>
		<p style="font-size:16px; line-height:20px;">
O inox é encontrado em pias, cozinhas industriais, talheres, equipamentos hospitalares, revestimento de elevadores e fachadas. Também está presente em locais sujeitos a variação atmosférica e ação de poluentes, como bancas de jornal, caixas d’água e na fixação dos vasos sanitários. Equipamentos náuticos submetidos à salinidade, barris de chope, forno elétrico e equipamentos de refrigeração ganham mais eficiência e durabilidade com o material, assim como ferrugens e peças para a indústria automotiva, construção civil, etc.</p>
		<header>
			<h2>Vantagens do inox</h2>
		</header>
		<p style="font-size:16px; line-height:20px;">
			- Alta resistência à corrosão;
			<br>- Resistência mecânica adequada;
			<br>- Facilidade de limpeza;
			<br>- Aparência higiênica;
			<br>- Altamente Higiênico;
			<br>- Material inerte;
			<br>- Resistência a altas temperaturas;
			<br>- Resistência às variações bruscas de temperatura;
			<br>- Acabamentos superficiais e formas variadas;
			<br>- Forte apelo visual;
			<br>- Relação Custo⁄Benefício favorável;
			<br>- Baixo custo de manutenção;
			<br>- Material reciclável;
			<br>- Seguro.    
		</p>
	</div>
        <a href="#work" class="button style2 down anchored">Next</a>
</section>
			
<!-- Work -->
<section id="work" class="main style3 primary">
	<div class="content container">
		<header>
			<h2>Nossos Produtos</h2>
		</header>
                 <p>Dispomos de toda a linha de elementos de fixação em inox!<br><Br>
Abaixo segue uma prévia de nossos produtos, em breve nossa página disponibilizará nosso catalogo completo. Solicitamos que qualquer duvida entre em contato através do numero <b>11 2488-2828</b> ou pelo e-mail <b><a href="#contact">inoxpar@inoxpar.com.br</a></b>
</p>
		<!-- Portfolio-Gallery -->
		<div class="portfolio-c4">
			<?php
			#if (strlen(trim($sf_content)))
				echo $sf_content;
			#else
			#	include_partial("staticProducts");
			?>
                       	<div class="clearfix"></div>
    		</div>
    		<!-- /Portfolio-Gallery -->
	</div>
</section>

<!-- VIDEO-->            
<script tepe="text/javascript">
document.createElement('video');
</script>
<section id="video" class="main style3 secondary" style="padding:0em 0 6em 45px; width:98%; text-align:center;">
<!--
	<video controls autoplay loop muted preload="auto" poster="polina.jpg" id="bgvid">
	<source src="polina.webm" type="video/webm">
	<source src="video/veio_aco.mp4" type="video/mp4">
-->
	<iframe width="100%" height="610" src="//www.youtube.com/embed/YfRv1VVpQS4" frameborder="0" allowfullscreen></iframe>
<!--	</video> -->
</section>          
<!-- /VIDEO -->           
            
<!-- LOCALIZAÇÃO -->        
<section id="localizacao" class="main style3 secondary" style="padding:0em 0 6em 0">
	<div class="contact-box">
		<div class="contact-map">                           
                	<iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?q=RUA+DOM+PEDRITO,+407+-+CEP+07223-060+GUARULHOS+-+S%C3%83O+PAULO+-+%2B55+11+2488-2828&hl=pt-BR&ie=UTF8&ll=-23.459861,-46.47809&spn=0.006092,0.010568&sll=-3.765704,-38.590416&sspn=0.006627,0.010568&hq=RUA+DOM+PEDRITO,+407+-+CEP+07223-060+GUARULHOS+-+S%C3%83O+PAULO+-+%2B55+11+2488-2828&radius=15000&t=m&z=17&amp;output=embed"></iframe><br><p><a href="#contact">Marque uma visita</a>.<br><b>Tel:2488 -2828</b></p>
                </div>                                         
	</div>
</section>          
<!-- FIM LOCALIZAÇÃO -->       

<!-- Contact -->
<section id="contact" class="main style3 secondary">
    <div class="content container">
	<header>
		<h2>Contato</h2>
		<p>Entre em contato conosco.<br> Tel (11) 2488-2828</p>
	</header>	
	<div class="box container small">				
		<!-- Contact Form							 
		To get this working, place a script on your server to receive the form data, then
		point the "action" attribute to it (eg. action="http://mydomain.tld/mail.php").
		More on how it all works here: http://www.1stwebdesigner.com/tutorials/custom-php-contact-forms/
		-->                                                
		<FORM ACTION="http://form.ultramail.com.br/" METHOD="POST">
                	<div class="row half">
				<div class="6u"><input type="text" name="nome" placeholder="Nome" /></div>
				<div class="6u"><input type="text" name="email" placeholder="E-mail" /></div>
			</div>
			<div class="row half">
				<div class="12u"><input type="text" name="assunto" placeholder="Assunto" /></div>
                                <div class="12u"><textarea name="mensagem" placeholder="Mensagem" rows="6"></textarea></div>
			</div>
			<div class="row">
				<div class="12u">
					<ul class="actions">
					<!-- Chave de autenticação no UltraMail para o MailBox.
					     Se a senha do MailBox for alterada esta chave deverá ser gerada novamente através do seu painel de controle.
-->
						<INPUT TYPE="hidden" NAME="key" VALUE="eJwBvwBA/5GFvwZNbEkeM8yP3GvaJEkzHI6nDHLsjlmX2/DYaTqLRm9ybVVsdHJhTWFpbFN9opH1PLG0nIhCM8AwmHTJTldtBORvKWf3E2bt0/OJfsdaLgA8Bcq+UVlzxLz1QS6rXnkfug3zYXnnHQwkLQrb0pK8mPh+cMg4/PJcsHW4CLZYQCtSHcWqF3Ey69l6BEotiuuc/UaW0BY5G43G7btexdfEitBpcE7mOmdYlhzUkAqTeOXJOPRuHtHRYSxd9BV/TPBdmw==">
                                            	<INPUT TYPE="hidden" NAME="redirect" VALUE="http://inoxpar.com.br/obrigado.shtml">

							<li><input type="submit" class="button" value="Enviar Mensagem" /></li>
					</ul>
				</div>
			</div>	
		</form>
	</div>
    </div>
</section>
			
<!-- Footer -->
<footer id="footer">
<!--
Social Icons
Use anything from here: http://fortawesome.github.io/Font-Awesome/cheatsheet/)
-->
	<ul class="actions">
		<li><a href="http://twitter.com/inoxpar" target="_blank" class="fa solo fa-twitter"><span>Twitter</span></a></li>
		<li><a href="http://facebook.com/inoxparind" target="_blank" class="fa solo fa-facebook"><span>Facebook</span></a></li>
		<!--<li><a href="#" class="fa solo fa-google-plus"><span>Google+</span></a></li>
		<li><a href="#" class="fa solo fa-dribbble"><span>Dribbble</span></a></li>
		<li><a href="#" class="fa solo fa-pinterest"><span>Pinterest</span></a></li>		
		<li><a href="#" class="fa solo fa-instagram"><span>Instagram</span></a></li>-->
	</ul>
	<!-- Menu -->
	<ul class="menu">
		<li>&copy; INOXPAR</li>
		<li>Desenvolvido: <a href="http://www.agenciafatto.com" target="_blank">Agência Fatto</a></li>
	</ul>
</footer>

</body>

<!-- JavascriptsAfterBody -->
<script type="text/javascript" src="/filtro/js/bootstrap.min.js"></script>
<script src="/filtro/js/jquery-easing-1.3.js" type="text/javascript"></script>
<script src="/filtro/js/jquery-transit-modified.js" type="text/javascript"></script>
<script src="/filtro/js/jquery.touchwipe.min.js"></script>
<script src="/filtro/js/jquery.sidr.min.js"></script>
<script src="/filtro/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="/filtro/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="/filtro/js/jquery.animate-color.js"></script>
<script type="text/javascript" src="/filtro/js/jquery.event.drag.js"></script>
<script type="text/javascript" src="/filtro/js/switchy.js"></script>
<script type="text/javascript" src="/filtro/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="/filtro/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="/filtro/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/filtro/js/jquery.quicksand.js"></script>
<script type="text/javascript" src="/filtro/js/jquery.countdown.min.js"></script>
<!-- /JavascriptsAfterBody -->
<!-- CSSAfterBody -->
<link rel="stylesheet" href="/filtro/css/bootstrap.min.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/filtro/css/bootstrap-responsive.min.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/filtro/css/jquery.sidr.dark.css">
<link rel="stylesheet" href="/filtro/css/layerslider.css" type="text/css">
<link rel="stylesheet" href="/filtro/css/flexslider.css" type="text/css">
<link rel="stylesheet" href="/filtro/css/jquery.fancybox.css" type="text/css">
<link rel="stylesheet" href="/filtro/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="/filtro/css/owl.theme.css" type="text/css">
<link rel="stylesheet" href="/css/style.css" type="text/css" />
<link rel="stylesheet" href="/filtro/css/font-awesome.min.css">
<!-- /CSSAfterBody -->

</html>
