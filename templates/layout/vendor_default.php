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
		var baseUrl = '<?= $this->Url->build('/') ?>';
	</script>
	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
	<?= $this->Html->script(['jquery']) ?>
</head>

<body class="stretched">
	<div id="wrapper" class="clearfix">
		<header id="header" class="full-header dark">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<div id="logo">
							<a href="<?= $this->Url->build('/') ?>dealer/dashboard/" class="standard-logo"
								data-dark-logo="<?= $this->Url->build('/') ?>img/logo_white.png"><img
									src="<?= $this->Url->build('/') ?>img/logo.png" alt="ftspl"
									style="max-height:9vh;"></a>
							<a href="<?= $this->Url->build('/') ?>dealer/dashboard/" class="retina-logo" data-dark-logo="<?= $this->Url->build('/') ?>img/logo_white.png"><img
									src="<?= $this->Url->build('/') ?>img/logo.png" alt="ftspl"
									style="max-height:9vh;"></a>
						</div>


						<nav class="primary-menu">
							<ul class="menu-container">

								<?php if(isset($logged_in)) : ?>
								<?php echo $this->element('left_menu'); ?>
								<?php else : ?>
								<li class="menu-item"><a class="menu-link" href="<?= $this->Url->build('/') ?>">
										<div>Home</div>
									</a>
								</li>
								<li class="menu-item"><a class="menu-link" id="id_login" href="#myModal1"
										data-target="#myModal1" data-lightbox="inline">
										<div>Login</div>
									</a>
								</li>
								<?php endif ?>
							</ul>
						</nav>

					</div>
				</div>
			</div>
		</header>

		<!-- Login -->
		<div class="modal1 mfp-hide" id="myModal1">
			<div class="block mx-auto" style="background-color: #FFF; max-width: 500px; padding: 25px;">
				<?= $this->Flash->render('auth') ?>
				<?= $this->Form->create(null, ['url' => ['controller' => 'dealer','action' => 'login']]) ?>
				<h2 class="m-0 p-0">Login</h2>
				<div class="card">
					<div class="card-body">
						<div class="row">
							
							<div class="col-12">
								<?= $this->Form->control('email', [
														'label' => 'EMAIL',
														'type' => 'text',
														'class' => 'form-control',
													]) ?>
							</div>

							<div class="col-6 mt-3">
								<button label="Login"
									class="button button-rounded button-reveal button-large button-yellow button-light text-end w-100"
									type="submit"><i class="icon-line-arrow-right"></i><span>send OTP</span></button>
							</div>
						</div>
					</div>
				</div>
				<?= $this->Form->end() ?>
			</div>
		</div>

		<?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        
		<!-- Footer		============================================= -->
		<footer id="footer" class="dark">
			<div class="container">
				<div class="footer-widgets-wrap p-3">
					<div class="row col-mb-50">
						<div class="col-lg-12">
							<div class="row col-mb-50">
								<div class="col-md-4">
									<h5 class="mb-1">KNOWLEDGE BASE</h5>
									<div class="widget widget_links clearfix mt-2">
										<ul>
											<li>&nbsp;How Test Quality </li>
											<li>&nbsp;How To Produce Quality </li>
											<li>&nbsp;Today's Rate</li>
											<li>&nbsp;Month Wise Rates</li>
										</ul>
									</div>
								</div>
								<div class="col-md-4">
									<h5 class="mb-1">&nbsp;</h5>
									<div class="widget widget_links clearfix mt-2">
										<ul>
											<li>&nbsp; Home</li>
											<li>&nbsp; About Us</li>
											<li>&nbsp; Contact Us</li>
											<li>&nbsp; Enquiry</li>
										</ul>
									</div>
								</div>
								<div class="col-md-4">
									<h5 class="mb-1">&nbsp;</h5>
									<div class="widget widget_links clearfix mt-2">
										<ul>
											<li>&nbsp; Regional Buyers</li>
											<li>&nbsp; <a href="<?= $this->Url->build('/') ?>dealer/regionalsearch" class="login">Regional Sellers</a></li>
											<li>&nbsp; Dealers</li>
											<li>&nbsp; Booming Products</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Copyrights			============================================= -->
			<div id="copyrights p-3">
				<div class="container">
					<div class="row col-mb-30">
						<div class="col-md-6 text-center text-md-start">
							Copyrights &copy; 2020 All Rights Reserved by ftspl Inc.<br>
							<div class="copyright-links"><a href="https://www.fts-pl.com/privacy-policy/">Terms of
									Use</a> / <a href="https://www.fts-pl.com/privacy-policy/">Privacy Policy</a>
							</div>
						</div>
						<div class="col-md-6 text-center text-md-end">
							<div class="d-flex justify-content-center justify-content-md-end">
								<a href="#" class="social-icon si-small si-borderless si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon si-small si-borderless si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon si-small si-borderless si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>
								<a href="#" class="social-icon si-small si-borderless si-pinterest">
									<i class="icon-pinterest"></i>
									<i class="icon-pinterest"></i>
								</a>
								<a href="#" class="social-icon si-small si-borderless si-vimeo">
									<i class="icon-vimeo"></i>
									<i class="icon-vimeo"></i>
								</a>
								<a href="#" class="social-icon si-small si-borderless si-github">
									<i class="icon-github"></i>
									<i class="icon-github"></i>
								</a>
								<a href="#" class="social-icon si-small si-borderless si-yahoo">
									<i class="icon-yahoo"></i>
									<i class="icon-yahoo"></i>
								</a>
								<a href="#" class="social-icon si-small si-borderless si-linkedin">
									<i class="icon-linkedin"></i>
									<i class="icon-linkedin"></i>
								</a>
							</div>
							<div class="clear"></div>
							<i class="icon-envelope2"></i> support@fts-pl.com <span class="middot">&middot;</span>
							<i class="icon-headphones"></i> +91 9876543210 <span class="middot">&middot;</span> <i
								class="icon-skype2"></i> ftsplOnSkype
						</div>
					</div>
				</div>
			</div>
		</footer>
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