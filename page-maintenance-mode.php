<?php
/**
 * The header for our theme.
 *
 * Displays all of the head section and everything up till page content
 *
 * @package pasific
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ) ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<?php wp_head(); ?>
		<?php
		// Background
		$bg = '';
		$bg_type = rella_helper()->get_option( 'page-maintenance-background-type', 'raw', '', 'options' );
		if( 'solid' === $bg_type && $color = rella_helper()->get_option( 'page-maintenance-bar-solid', 'raw', '', 'options' ) ) {
			$bg = 'background-color: ' . $color;
		}
		elseif( 'gradient' === $bg_type && $gradient = rella_helper()->get_option( 'page-maintenance-bar-gradient', 'raw', '', 'options' ) ) {
			$gradient = explode( '|', $gradient );
			$gradient[0] = 'background-image:' . $gradient[0];
			$bg = join( ';', $gradient );
		}
		elseif( 'image' === $bg_type && $bg = rella_helper()->get_option( 'page-maintenance-bar-bg', 'raw', '', 'options' ) ) {
			$bg = 'background-image: url('.$bg['url'].');background-size: cover;';
		}
		?>
		<style>
		body {
			<?php echo $bg ?>
		}
		a:hover {
			color: #e5432a;
		}

		.btn {
			border-color: #d5d5d5;
			font-family: 'karla';
			color: #000;
		}
		.btn:hover {
			border-color: #000;
			background-color: #000;
			color: #fff;
		}
		</style>
	</head>
	<body <?php body_class('maintenance-mode'); ?>>

		<?php rella_action( 'before' ) ?>

		<main <?php rella_helper()->attr( 'content' ); ?>>

			<div class="page-maintenance">

				<div class="top-sec">

					<div class="container">

						<div class="row">

							<div class="col-md-6  text-sm-center">

								<?php

								$header_logo = rella_helper()->get_option( 'header-logo' );
								$logo_src = '';
								if( ! empty( $header_logo['url'] ) && isset( $header_logo['url'] ) ) {
									$logo_src = $header_logo['url'];
								}

								if( $logo_src ) : ?>
								<img src="<?php echo esc_url( $logo_src ) ?>" alt="<?php bloginfo( 'title' ) ?>">
							<?php endif; ?>

						</div><!-- /.col-md-6 -->

						<?php if( $social = rella_helper()->get_option( 'page-maintenance-identities', 'raw', '', 'options' ) ) : ?>
							<div class="col-md-6 text-right text-sm-center">

								<ul class="social-icon text-uppercase">
									<?php foreach( $social['redux_repeater_data'] as $index => $item ): ?>
										<li><a href="<?php echo esc_url( $social['url'][$index] ) ?>"><?php echo esc_html( $social['title'][$index] ) ?></a></li>
									<?php endforeach; ?>
								</ul><!-- /.social-icon -->

							</div><!-- /.col-md-6 text-right -->
						<?php endif; ?>

					</div><!-- /.row -->

					</div><!-- /.container -->

				</div><!-- /.top-sec -->

				<div class="bottom-sec">

					<div class="container">

						<div class="row">

							<div class="col-md-8 col-md-offset-2">

								<div class="maintenance-contents">

									<div class="maintenance-icon">

										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
											<defs>
												<linearGradient id="maintenance-gradient" x1="95.14" y1="100.59" x2="16.37" y2="21.82" gradientUnits="userSpaceOnUse">
													<stop offset="0" stop-opacity="1" stop-color="#DD2450">
														<animate attributeName="stop-color" values="#DD2450;#651ABB;#E71CF4;#DD2450;#F4441C;#EA751A;#F4441C;#DD2450;#E71CF4;#651ABB;#DD2450" dur="18s" repeatCount="indefinite" />
													</stop>
													<stop offset="1" stop-opacity="1" stop-color="#FF512F">
														<animate attributeName="stop-color" values="#FF512F;#CA24DD;#E81F5E;#FF512F;#E8731F;#FFB021;#E8731F;#FF512F;#E81F5E;#CA24DD;#FF512F" dur="17s" repeatCount="indefinite" />
													</stop>
												</linearGradient>
											</defs>
											<path fill-rule="evenodd" fill="url(#maintenance-gradient)"	d="M103.19,61.21A47.47,47.47,0,0,1,55.74,108.6v-4.85a.63.63,0,0,0-1-.52l-13.09,9a.63.63,0,0,0,0,1l13.09,9a.63.63,0,0,0,1-.52V116.9A55.77,55.77,0,0,0,111.5,61.21ZM55.76,13.82v4.85a.63.63,0,0,0,1,.52l13.09-9a.65.65,0,0,0,0-1.07L56.76.12a.63.63,0,0,0-1,.52V5.49A55.81,55.81,0,0,0,0,61.21H8.31A47.47,47.47,0,0,1,55.76,13.82Zm-5.46,80a2.29,2.29,0,0,0,2.3,2.3h6.28a2.3,2.3,0,0,0,2.3-2.3V88.55a27.92,27.92,0,0,0,10.09-4.17l3.7,3.7a2.3,2.3,0,0,0,3.25,0l4.43-4.42a2.29,2.29,0,0,0,0-3.25L79,76.7a27.84,27.84,0,0,0,4.18-10.07H88.4a2.29,2.29,0,0,0,2.3-2.3V58.06a2.29,2.29,0,0,0-2.3-2.3H83.17A27.84,27.84,0,0,0,79,45.68l3.7-3.7a2.29,2.29,0,0,0,0-3.25l-4.43-4.42a2.3,2.3,0,0,0-3.25,0L71.28,38a27.92,27.92,0,0,0-10.09-4.17V28.61a2.3,2.3,0,0,0-2.3-2.3H52.61a2.29,2.29,0,0,0-2.3,2.3v5.22A27.92,27.92,0,0,0,40.22,38l-3.7-3.7a2.3,2.3,0,0,0-3.25,0l-4.43,4.42a2.29,2.29,0,0,0,0,3.25l3.7,3.7a27.84,27.84,0,0,0-4.18,10.07H23.13a2.3,2.3,0,0,0-2.3,2.3v6.27a2.29,2.29,0,0,0,2.3,2.3h5.23A27.84,27.84,0,0,0,32.54,76.7l-3.7,3.7a2.34,2.34,0,0,0,0,3.25l4.43,4.42a2.3,2.3,0,0,0,3.25,0l3.7-3.7a27.92,27.92,0,0,0,10.09,4.17ZM43.15,61.21A12.61,12.61,0,1,1,55.76,73.8,12.62,12.62,0,0,1,43.15,61.21Z"/>
										</svg>

									</div><!-- /.maintenance-icon -->

									<h1>
										<?php rella_helper()->get_option_echo( 'page-maintenance-title', 'html', '', 'options' ) ?>
									</h1>

									<?php echo apply_filters( 'the_content', rella_helper()->get_option( 'page-maintenance-content', 'post', '', 'options' ) ) ?>

								</div><!-- /.maintenance-contents -->

							</div><!-- /.col-md-8 col-md-offset-2 -->

						</div><!-- /.row -->

					</div><!-- /.container -->

				</div><!-- /.bottom-sec -->


			</div><!-- /.page-maintenance -->

		</main>

		<?php rella_action( 'after' ) ?>

<?php wp_footer(); ?>
</body>
</html>
