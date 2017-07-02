<?php Header("Cache-Control: no-transform");?>

<!DOCTYPE html>
<head>

<meta charset="UTF-8">
<link rel="alternate" hreflang="fr" href="https://voiretmanger.fr" />
<meta name="apple-mobile-web-app-title" content="Voir et manger" />
<meta name="viewport" content="initial-scale=1">
<meta property="fb:pages" content="384298108368" />

<link href='https://voiretmanger.fr/wp-content/themes/voiretmanger/css/font.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" media="all" href="https://voiretmanger.fr/wp-content/themes/voiretmanger/style.css" />

<link rel="pingback" href="https://voiretmanger.fr/xmlrpc.php" />
<link rel="shortcut icon" href="https://voiretmanger.fr/wp-content/favicon.ico" />

<?php if (is_single() ) { ?>
	<?php $featuredImage = wp_get_attachment_image_src(get_post_thumbnail_id(), "full", true); ?>
	<link rel="preload" href="<?php echo $featuredImage[0]; ?>" as="image">
	<link rel="preload" href="https://voiretmanger.fr/wp-content/themes/voiretmanger/css/playfair-display-v10-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="https://voiretmanger.fr/wp-content/themes/voiretmanger/css/playfair-display-v10-latin-700italic.woff2" as="font" type="font/woff2" crossorigin>


<?php } else { ?>
	<link rel="preload" href="https://voiretmanger.fr/wp-content/themes/voiretmanger/css/portico_layer-webfont.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="https://voiretmanger.fr/wp-content/themes/voiretmanger/css/portico_vintage-webfont.woff2" as="font" type="font/woff2" crossorigin>

<?php } ?>

<?php if (current_user_can( 'manage_options' )) { ?>
	<style>header .overlay .logo{margin-top: 3em;}</style>
<?php } ?>


<?php wp_head(); ?>
</head>

<body>



<?php
	if ( ! is_single() ) { ?>
		<header class="header-site">
			<div class="logo">
				<a href="https://voiretmanger.fr/" title="À voir et à manger" rel="home"><img src="https://voiretmanger.fr/wp-content/themes/voiretmanger/logo.svg" alt="" width="100px" scale="0"></a></div>
			<h1 class="site-title"><a href="https://voiretmanger.fr/a-voir/" title="Index des films">VOIR</a><br /><a href="https://voiretmanger.fr/a-manger/" title="Index des restaurants" >MANGER</a>
			<div class="site-menu"><a href="https://voiretmanger.fr/a-lire/" title="Index des livres">LIRE</a>  <a href="https://voiretmanger.fr/a-ecouter/" title="Index de la musique" >ÉCOUTER</a></div>
			</h1>

	<?php } else { ?>
		<header class="header-post">
			<div class="logo">
				<a href="https://voiretmanger.fr/" title="Retour à la page d'accueil" rel="home"><img src="https://voiretmanger.fr/wp-content/themes/voiretmanger/logo.svg" alt="" width="100px" scale="0"></a></div>
	<?php } ?>

	<div class="recherche" id="recherche" onclick="document.getElementById('search').focus();">
		<input type="checkbox" id="op"></input>
	<div class="lower">
		<label id="rechercher" for="op"><span class="dashicons dashicons-search"></span></label>
	</div>

	<div class="overlay overlay-hugeinc">
		<div class="logo">
			<a href="#" onclick="$('#op').prop('checked', false); document.getElementById('search').blur();"><img src="https://voiretmanger.fr/wp-content/themes/voiretmanger/logo.svg" alt="" width="100px" scale="0"></a></div>
			
			<?php get_search_form( "true" ); ?>
	</div>

 			</header><!-- #header -->

	<main <?php body_class(); ?> >