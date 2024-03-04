<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
	xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="x-apple-disable-message-reformatting">
	<title></title>

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">


	<style>
		/* What it does: Remove spaces around the email design added by some email clients. */
		/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
		html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
			background: #f1f1f1;
		}

		/* What it does: Stops email clients resizing small text. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		/* What it does: Centers email on Android 4.4 */
		div[style*="margin: 16px 0"] {
			margin: 0 !important;
		}

		/* What it does: Stops Outlook from adding extra spacing to tables. */
		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}

		/* What it does: Fixes webkit padding issue. */
		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: fixed !important;
			margin: 0 auto !important;
		}

		/* What it does: Uses a better rendering method when resizing images in IE. */
		img {
			-ms-interpolation-mode: bicubic;
		}

		/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
		a {
			text-decoration: none;
		}

		/* What it does: A work-around for email clients meddling in triggered links. */
		*[x-apple-data-detectors],
		/* iOS */
		.unstyle-auto-detected-links *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
		.a6S {
			display: none !important;
			opacity: 0.01 !important;
		}

		/* What it does: Prevents Gmail from changing the text color in conversation threads. */
		.im {
			color: inherit !important;
		}

		/* If the above doesn't work, add a .g-img class to any image in question. */
		img.g-img+div {
			display: none !important;
		}

		/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
		/* Create one of these media queries for each additional viewport size you'd like to fix */

		/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
		@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
			u~div .email-container {
				min-width: 320px !important;
			}
		}

		/* iPhone 6, 6S, 7, 8, and X */
		@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
			u~div .email-container {
				min-width: 375px !important;
			}
		}

		/* iPhone 6+, 7+, and 8+ */
		@media only screen and (min-device-width: 414px) {
			u~div .email-container {
				min-width: 414px !important;
			}
		}

		.primary {
			background: #30e3ca;
		}

		.bg_white {
			background: #ffffff;
		}

		.bg_light {
			background: #fafafa;
		}

		.bg_black {
			background: #000000;
		}

		.bg_dark {
			background: rgba(0, 0, 0, .8);
		}

		.email-section {
			padding: 2.5em;
		}

		/*BUTTON*/
		.btn {
			padding: 10px 15px;
			display: inline-block;
		}

		.btn.btn-primary {
			border-radius: 5px;
			background: #30e3ca;
			color: #ffffff;
		}

		.btn.btn-white {
			border-radius: 5px;
			background: #ffffff;
			color: #000000;
		}

		.btn.btn-white-outline {
			border-radius: 5px;
			background: transparent;
			border: 1px solid #fff;
			color: #fff;
		}

		.btn.btn-black-outline {
			border-radius: 0px;
			background: transparent;
			border: 2px solid #000;
			color: #000;
			font-weight: 700;
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: 'Lato', sans-serif;
			color: #000000;
			margin-top: 0;
			font-weight: 400;
		}

		body {
			font-family: 'Lato', sans-serif;
			font-weight: 400;
			font-size: 15px;
			line-height: 1.8;
			color: rgba(0, 0, 0, .4);
		}

		a {
			color: #30e3ca;
		}

		table {}

		/*LOGO*/

		.logo h1 {
			margin: 0;
		}

		.logo h1 a {
			color: #30e3ca;
			font-size: 24px;
			font-weight: 700;
			font-family: 'Lato', sans-serif;
		}

		/*HERO*/
		.hero {
			position: relative;
			z-index: 0;
		}

		.hero .text {
			color: rgba(0, 0, 0, .3);
		}

		.hero .text h2 {
			color: #000;
			font-size: 40px;
			margin-bottom: 0;
			font-weight: 400;
			line-height: 1.4;
		}

		.hero .text h3 {
			font-size: 24px;
			font-weight: 300;
		}

		.hero .text h2 span {
			font-weight: 600;
			color: #30e3ca;
		}


		/*HEADING SECTION*/
		.heading-section {}

		.heading-section h2 {
			color: #000000;
			font-size: 28px;
			margin-top: 0;
			line-height: 1.4;
			font-weight: 400;
		}

		.heading-section .subheading {
			margin-bottom: 20px !important;
			display: inline-block;
			font-size: 13px;
			text-transform: uppercase;
			letter-spacing: 2px;
			color: rgba(0, 0, 0, .4);
			position: relative;
		}

		.heading-section .subheading::after {
			position: absolute;
			left: 0;
			right: 0;
			bottom: -10px;
			content: '';
			width: 100%;
			height: 2px;
			background: #30e3ca;
			margin: 0 auto;
		}

		.heading-section-white {
			color: rgba(255, 255, 255, .8);
		}

		.heading-section-white h2 {
			font-family:
				line-height: 1;
			padding-bottom: 0;
		}

		.heading-section-white h2 {
			color: #ffffff;
		}

		.heading-section-white .subheading {
			margin-bottom: 0;
			display: inline-block;
			font-size: 13px;
			text-transform: uppercase;
			letter-spacing: 2px;
			color: rgba(255, 255, 255, .4);
		}


		ul.social {
			padding: 0;
		}

		ul.social li {
			display: inline-block;
			margin-right: 10px;
		}

		/*FOOTER*/

		.footer {
			border-top: 1px solid rgba(0, 0, 0, .05);
			color: rgba(0, 0, 0, .5);
		}

		.footer .heading {
			color: #000;
			font-size: 20px;
		}

		.footer ul {
			margin: 0;
			padding: 0;
		}

		.footer ul li {
			list-style: none;
			margin-bottom: 10px;
		}

		.footer ul li a {
			color: rgba(0, 0, 0, 1);
		}


		@media screen and (max-width: 500px) {}
	</style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
	<center style="width: 100%; background-color: #f1f1f1;">
		<div
			style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
			&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
		</div>
		<div style="max-width: 600px; margin: 0 auto;" class="email-container">

			<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
				style="margin: auto;">

				<tr>
					<td valign="middle" class="hero bg_white" style="padding: 3em 0 2em 0; display: flex;justify-content: center;">
						<table style="display: flex; justify-content: center; align-items: center;">
							<tr>
								<td>
									<img src="data:image/png;base64,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"
										alt="" style="width: 180px; max-width: 400px; height: auto;display: block">
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
						<table>
							<tr>
								<td>
									<div class="text" style="padding: 0 2.5em; text-align: center;">
										<h3>
											<?= $subject ?>
										</h3>
										<h3>
											<?= $mailbody ?>
										</h3>
										<p>
											<a href="<?= $link ?>" class="btn btn-primary" style="padding: 10px 15px; display: inline-block; border-radius: 5px; background: #F7941D; color: #000;">
												<?= $linktext ?>
											</a>
										</p>
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>

			</table>
		</div>
	</center>
</body>

</html>