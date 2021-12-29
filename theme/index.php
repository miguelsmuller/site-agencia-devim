<?php get_header(); ?>

<!-- Our Services -->
<section id="section-our-services" class="section-content">
<div class="section-content-inner">
<div class="container">
	<h2 class="title-theme title-theme-center">O que nós fazemos?</h2>

	<div class="columns">
		<p>A <strong>DEVIM</strong> oferece a você soluções digitais. <span class="text-red"><strong>Pensamos, planejamos e desenvolvemos</strong></span> o potencial da sua empresa na internet, para que você possa focar na administração física do seu negócio.</p>

		<p>Utilizando as mais modernas ferramentas web, em sintonia com a necessidade da sua empresa, construímos uma imagem digital de forma inteligente e eficiente. Colocamos a ideia que você traz do empreendimento em prática, construindo um produto de verdadeira personalidade.</p>

		<p>Somos uma agência digital com portfólio variado: atuamos em ações específicas e também oferecemos assessoria digital. Queremos te ajudar a conseguir resultados. Você cria coisas incríveis quando escolhe uma equipe completa!</p>
	</div>

	<div class="columns">
		<ul class="list-our-services">
			<a href="<?php echo get_permalink( get_page_by_path( 'servicos' ) ); ?>#section-management"><li class="blue-dark">Consultoria e Planejamento Estratégico</li></a>
			<a href="<?php echo get_permalink( get_page_by_path( 'servicos' ) ); ?>#section-site-developer"><li class="red">Criação de Sites, Lojas Virtuais e Apps Mobile</li></a>
			<a href="<?php echo get_permalink( get_page_by_path( 'servicos' ) ); ?>#section-seo"><li class="blue-light">Facebook Ads, Google Adwords e E-mail marketing</li></a>
			<a href="<?php echo get_permalink( get_page_by_path( 'servicos' ) ); ?>#section-smm"><li class="black">SEO - Otimização para motores de busca</li></a>
		</ul>
	</div>
</div>
</div>
</section>

<!-- Ever Forward -->
<section id="section-ever-forward" class="section-content">
<div class="section-content-inner">
<div class="container">
	<h2 class="title-theme title-theme-center ">Sempre na frente</h2>

	<div class="columns columns-resume">
		<h3>Estamos <span class="text-red">preparados</span> para te ajudar!</h3>

		<p>O mercado online está em constante mudança. É uma preocupação da <strong>DEVIM</strong> o treinamento de todos os nossos colaboradores para poder oferecer a você o melhor da web.</p>

		<p>Participamos de congressos, cursos e eventos que nos capacitam sobre o mercado e suas tecnologias. Incentivamos nossos profissionais a participarem de projetos open-source e se dedicarem a atividades e projetos pessoais.</p>
	</div>

	<div class="columns columns-list">
		<div class="list-item">
			<?php $img_metodologia = get_stylesheet_directory() .'/assets/images/icon-ever-forward-tecnologia.svg'; include($img_metodologia); ?>
			<span>Tecnologia de ponta</span>
		</div>

		<div class="list-item">
			<?php $img_metodologia = get_stylesheet_directory() .'/assets/images/icon-ever-forward-laboratorio.svg'; include($img_metodologia); ?>
			<span>Laboratório de ideias</span>
		</div>
	</div>

	<div class="columns columns-list">
		<div class="list-item">
			<?php $img_metodologia = get_stylesheet_directory() .'/assets/images/icon-ever-forward-experiencia.svg'; include($img_metodologia); ?>
			<span>Foco na experiência do usuário</span>
		</div>

		<div class="list-item">
			<?php $img_metodologia = get_stylesheet_directory() .'/assets/images/icon-ever-forward-capacitacao.svg'; include($img_metodologia); ?>
			<span>Capacitação e inovação constante</span>
		</div>
	</div>
</div>
</div>
</section>

<!-- Requeste -->
<section id="section-request" class="section-content">
<div class="section-content-inner">
<div class="container">
	<div class="column-icon">
		<svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 68.7 68.7" enable-background="new 0 0 68.7 68.7" xml:space="preserve">
			<path fill="#F1F1F1" d="M34.4,68.7C15.4,68.7,0,53.3,0,34.4S15.4,0,34.4,0s34.4,15.4,34.4,34.4S53.3,68.7,34.4,68.7z M34.4,6C18.7,6,6,18.7,6,34.4s12.7,28.4,28.4,28.4S62.7,50,62.7,34.4S50,6,34.4,6z"/>
			<path fill="#F1F1F1" d="M37.6,42.3c0,0,15.7-11.3,13.9-24.2c0-0.3-0.1-0.5-0.2-0.6c-0.1-0.1-0.3-0.2-0.6-0.3C38.1,15.5,27,31.5,27,31.5c-9.6-1.1-8.9,0.8-13.2,11.3c-0.8,2,0.5,2.7,2,2.1c1.5-0.6,4.8-1.8,4.8-1.8l5.7,5.9c0,0-1.2,3.4-1.8,4.9c-0.5,1.5,0.1,2.9,2.1,2.1C36.9,51.4,38.7,52.1,37.6,42.3L37.6,42.3z M39.9,29.2c-1.3-1.4-1.3-3.6,0-4.9c1.3-1.4,3.5-1.4,4.8,0c1.3,1.4,1.3,3.6,0,4.9C43.3,30.6,41.2,30.6,39.9,29.2L39.9,29.2z"/>
		</svg>
	</div>

	<div class="column-text">
		<h2>Conheça um pouco mais do nosso trabalho ?</h2>
		<h3>Planejamos e criamos soluções para serem o diferencial competitivo do seu negócio</h3>
	</div>

	<div class="column-button">
		<a href="<?php echo get_permalink( get_page_by_path( 'fale-conosco' ) ); ?>" class="btn btn-red" onclick="ga('send', 'event', 'CTA', 'Click', 'Botão de orçamento da index');">Solicite um orçamento</a>
	</div>
</div>
</div>
</section>

<!-- Requeste -->
<section id="section-method" class="section-content">
<div class="section-content-inner">
<div class="container">
	<h2 class="title-theme title-theme-center">Metodologia</h2>

	<div class="flex-container">
		<div class="columns columns-idea">
			<h2>01</h2>
			<h3>Idealizar</h3>
			<div class="columns-content">
				<p>Você identifica uma necessidade na sua empresa e logo muitas ideias surgem? Novos planos e metas pipocam na sua cabeça? Idealizar aonde você quer chegar é o pontapé inicial de todo o processo de desenvolvimento.</p>

				<p>A <strong>DEVIM</strong> oferece o suporte necessário nesse momento. Definimos metas e, a partir dos nossos serviços, você pode obter melhores resultados para o seu negócio online.</p>
			</div>
		</div>

		<div class="columns columns-planning">
			<h2>02</h2>
			<h3>Planejar</h3>
			<div class="columns-content">
				<p>Uma boa estratégia é a chave para o sucesso do negócio. Conhecer a estrutura da empresa, planejar ações coerentes e definir metas realísticas permite colher bons resultados ao final do processo.</p>

				<p>Nessa fase são feitos estudos minuciosos sobre as necessidades e objetivos do seu projeto sempre buscando o retorno esperado e a satisfação do público alvo.</p>
			</div>
		</div>

		<div class="columns columns-creation">
			<h2>03</h2>
			<h3>Criar</h3>
			<div class="columns-content">
				<p>É preocupação constante da <strong>DEVIM</strong> gerar um produto final com a alma do seu negócio. Encaramos a criação de um site como a pintura de um quadro: são únicos e personalizados.</p>

				<p>É aqui que o negócio toma a forma do mundo digital. É a hora de traduzir todo o planejamento anterior e os dados obtidos em um sistema elegante e de alta performance.</p>
			</div>
		</div>

		<div class="columns columns-monitoring">
			<h2>04</h2>
			<h3>Acompanhar</h3>
			<div class="columns-content">
				<p>Um acompanhamento posterior é um diferencial oferecido pela <strong>DEVIM</strong>. Avaliar o produto final nos permite compreender as métricas e fazer uma análise dos resultados reais, gerando estratégias ainda mais satisfatórias.</p>

				<p>Podem aparecer novas ideias, possibilidades e necessidades. A <strong>DEVIM</strong> te acompanha e preza por dar continuidade ao ciclo de melhoria do seu projeto, com excelência e comprometimento.</p>
			</div>
		</div>
	</div>
</div>
</div>
</section>

<!-- Portfolio -->
<?php
$portfolio = new WP_Query(array(
	'post_type'      => 'portfolio',
	'orderby'        => 'date',
	'order'          => 'DESC',
	'posts_per_page' => '4',
	'no_found_rows'  => true,
	'meta_key'       => 'thumbnail',
	'meta_value'     => ' ',
	'meta_compare'   => '!='
));
?>

<?php if ( $portfolio->have_posts() ) : ?>
<section id="section-portfolio" class="section-content">
<div class="section-content-inner">
	<div class="container">
		<h2 class="title-theme title-theme-center">Cases de sucesso</h2>
		<div class="title-theme-info">
			<p>Além da experiência e intimidade com o mundo digital, temos envolvimento e cuidado em cada projeto trabalhado. As demandas dos clientes <strong>DEVIM</strong> são únicas, por isso trabalhamos de forma individual desde a análise das prioridades até o desenvolvimento das estratégias e implementação das ferramentas.</p>

			<p>Os trabalhos já desenvolvidos e implementados são nosso maior orgulho! Se liga nos jobs:</p>
		</div>
	</div>

	<div class="grid-portfolio">
		<?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>

		<?php
		$thumbnail        = get_field('thumbnail');
		$new_url          = wp_get_attachment_image_src($thumbnail['id'], 'full');
		$thumbnail['url'] = $new_url[0];
		?>

		<figure>
			<img src="<?php echo $thumbnail['url']; ?>" alt="<?php the_title(); ?>">
			<figcaption>
				<div class="caption-content">
					<a href="#" class="single_image">
						<p><?php the_title(); ?></p>
					</a>
				</div>
			</figcaption>
		</figure>

		<?php endwhile;?>
	</div>
</div>
</section>
<?php endif; ?>

<!-- News -->
<section id="section-news" class="section-content">
<div class="section-content-inner">
<div class="container">
	<h2 class="title-theme title-theme-center">Tá Sabendo? - #BLOG</h2>
</div>

<div class="news-card-container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article class="news-card-item news-card-item-expanded">
		<span class="card-date">
			<?php echo date_i18n( get_option('date_format'), get_the_time('U') ); ?>
		</span>
		<div class="card-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</div>
		<?php
		//<div class="card-excerpt">
			//echo wp_trim_words(get_the_excerpt(),20);
		//</div>
		?>
		<div class="card-footer">
			<a href="<?php the_permalink(); ?>" class="btn btn-invert">Leia mais</a>
		</div>
	</article>
	<?php endwhile; else : endif;?>
</div>

</div>
</section>
<?php get_footer(); ?>
