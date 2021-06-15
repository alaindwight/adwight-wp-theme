<?php get_header(); ?>

	<div class="bg-ajk-dark">	
		<div class="container content-main">
			<div class="row row-bio">						
				<div class="col-xs-12 col-md-6 d-flex bio_pic_col justify-content-center justify-content-lg-end">
					<img class="display_pic" alt="Photo of Alain" src="<?php echo get_template_directory_uri(); ?>/images/display_pic_cropped.jpg" width="250" height="250">
				</div>
				<div class="col-xs-12 col-md-6 d-flex flex-column justify-content-center">
					<p class="text-center text-md-left">
						Hello! My name is Alain.
						<br>
						I am a Toronto based web developer.
					</p>
				</div>
			</div>
			<div class="row row-bio-2">
				<div class="col text-justify text-md-left">
					<p>I'm self taught on a broad range of topics and gravitate towards technology, art, health, and social systems.</p>
				</div>
			</div>
		</div>

	
		<div class="container topics">
			<ul class="row row-topics justify-content-center">
				<li class="col-12 col-md-6 d-flex justify-content-center flex-wrap">
					<a href="https://registry.jsonresume.org/akassabian" class="topics-container">						
						<img alt="Image for Web Resume" src="<?php echo get_template_directory_uri(); ?>/images/web-resume.svg">						
						<div class="topics-overlay text-center d-flex flex-column justify-content-center">
							<span>View Resume</span>
						</div>
					</a>
					<p>Web</p>
				</li>
				<li class="col-12 col-md-6 d-flex justify-content-center flex-wrap">
					<a href="category/technology/" class="topics-container">						
						<img alt="Image for Tech Blog" src="<?php echo get_template_directory_uri(); ?>/images/tech.svg">						
						<div class="topics-overlay text-center d-flex flex-column justify-content-center">
							<span>View Blog</span>
						</div>
					</a>
					<p>Technology</p>
				</li>
				<li class="col-12 col-md-6 d-flex justify-content-center flex-wrap">
					<a href="category/health/" class="topics-container">						
						<img alt="Image for Health Blog" src="<?php echo get_template_directory_uri(); ?>/images/health.svg">						
						<div class="topics-overlay text-center d-flex flex-column justify-content-center">
							<span>View Blog</span>
						</div>
					</a>
					<p>Health</p>
				</li>
			</ul>
		</div>
	</div>

	<div class="bg-ajk-primary">
		<div class="container">
			<div class="row row-cta">
				<div class="col text-center">
					<h2>Need help on a project?</h2><a href="mailto:alainkassabian@gmail.com" class="ajk-button">Free Consultation</a>
				</div>
			</div>
		</div>
	</div>


		


	<?php get_footer();