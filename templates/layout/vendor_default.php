<?php $cakeDescription = 'Supplier Management'; ?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?= $cakeDescription ?>:
		<?= $this->fetch('title') ?>
	</title>
	<?= $this->Html->meta('icon') ?>
	<link
		href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap"
		rel="stylesheet" type="text/css" />
	<?= $this->Html->css(['cake', 'bootstrap', 'style', 'dark', 'font-icons', 'animate', 'magnific-popup', 'components/bs-select.css', 'custom', 'settings', 'layers', 'navigation', 'custom']) ?>
	<script>
		var baseurl = '<?= $this->Url->build('/') ?>';
	</script>
	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
	<?= $this->Html->script(['jquery']) ?>
</head>

<body class="stretched">
	<div id="wrapper" class="clearfix">
		<!-- <header id="header" class="full-header dark">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">
						<div id="logo">
							<a href="<?= $this->Url->build('/') ?>dealer/dashboard/" class="standard-logo"
								data-dark-logo="<?= $this->Url->build('/') ?>img/logo_white.png">
								<img src="<?= $this->Url->build('/') ?>img/ft_rect_logo.png" alt="ftspl" style="max-height:9vh;"></a>
							<a href="<?= $this->Url->build('/') ?>dealer/dashboard/" class="retina-logo" data-dark-logo="<?= $this->Url->build('/') ?>img/logo_white.png">
							<img src="<?= $this->Url->build('/') ?>img/ft_rect_logo.png" alt="ftspl" style="max-height:9vh;"></a>
						</div>
					</div>
				</div>
			</div>
		</header> -->

		<?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        
		<!-- Footer		============================================= -->
		<!-- <footer id="footer" class="dark">
			<div class="container">
				<div class="footer-widgets-wrap p-3">
					<div class="row col-mb-50">
						<div class="col-lg-12">
							<div class="row col-mb-50">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer> -->
	</div>
	<div id="gotoTop" class="icon-angle-up"></div>
	<?= $this->Html->script(['plugins.min', 'components/bs-select.js', 'components/selectsplitter.js', 'functions', 'jquery.themepunch.tools.min', 'jquery.themepunch.revolution.min', 'extensions/revolution.extension.video.min', 'extensions/revolution.extension.slideanims.min', 'extensions/revolution.extension.actions.min', 'extensions/revolution.extension.layeranimation.min', 'extensions/revolution.extension.kenburn.min', 'extensions/revolution.extension.navigation.min', 'extensions/revolution.extension.migration.min', 'extensions/revolution.extension.parallax.min', 'common', 'custom']) ?>
	<script>
		window.onload = function login() {
			$("#id_login").addClass('modal-on-load');
		}
		$(document).on("click", ".login", function () {
			$("#id_login").trigger("click");
		});
		$('.selectsplitter').selectsplitter();
	</script>
</body>

</html>