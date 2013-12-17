<!--Main Content -->
		<div class="body_content">
			<div id="left_content_area">
				<h2><?php echo $nav; ?></h2>
				<div class="main_content">
					<ul><!-- this will be a for each with a db search result -->
					
						<?php
						// Generate List Items and Links							
							$count_1 = count($db_results);	
							$i = 0;
							while ($i < $count_1) {	
								echo '<li><a href="' . $comic_link . '/' . $db_results[$i]['comic_name'].'/00.jpg' . '">' . $db_results[$i]['comic_name'] . '</a></li>';
								$i++;
							}
						 ?>
						 
					</ul>
				</div>				
				<div class="ad_space"><img src="<?php echo base_url('content/ads/ad1.jpg'); ?>" alt="ad" /></div>
			</div>
			<div id="right_content_area">
				<div id="search" >
					<FORM id="search_form" action="<?php echo $nav_link . '/cz_main_controller/result_page/' ?>" method="post">
						<div id="search_cont">
				    		<input id="search_field" type="search" name="search" placeholder="Search">
       					</div>
       					<input type="submit" value="GO" class="css3button"/>
					</FORM>
				</div>
				<div class="update">
					<div class="title_section">
						<h2>Update:</h2>
						<h3>05 / 29 / 13</h3>
					</div>
					<div class="clearfix"></div>
					<p>ComicZone.com is now live and looking for individuals who are interested in hosting their comics on the web.</p>
					<a class="more_link" href="<?php echo $nav_link . '/more' ?>">More</a>
					<div class="clearfix"></div>
				</div>				
			</div>				
		</div>				