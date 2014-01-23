<div data-role="page" id="go-movie" data-role="go-movie">
	    <div data-role="header">
	      <a href="<?php echo base_url();?>home" data-role="button" data-icon="back" data-theme="b">Back</a>
	      <h1>Let's Go Movie</h1>
	      <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
	    </div><!-- /header -->

	  	<div data-role="content"> 
	  	Select by:
		<ul data-role="controlgroup" data-type="horizontal" class="localnav">
			<li><a href="<?php echo base_url();?>movie" data-role="button" data-transition="fade" class="ui-btn-active">Cinema</a></li>
			<li><a href="<?php echo base_url();?>movie/movies_now_playing" data-role="button" data-transition="fade" class="ui-btn-active" >Movies</a></li>
		</ul>



	    	<!-- <div class="ui-grid-b">
				<div class="ui-block-a">
					<a href="<?php echo base_url();?>movie" data-role="button" data-ajax="false" data-theme="b">Movies</a>
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" data-ajax="false" data-theme="b">Cinema</a>
				</div>
			 </div>-->
			<!-- /grid-b -->

			<h2>Find your nearest cinema hall</h2>
			<!-- <ul data-role="listview" data-filter="true" data-inset="true">
				<li data-role="list-divider">A</li>
				<li><a href="index.html">Adam Kinkaid</a></li>
				<li><a href="index.html">Alex Wickerham</a></li>
				<li><a href="index.html">Avery Johnson</a></li>
				<li data-role="list-divider">B</li>
				<li><a href="index.html">Bob Cabot</a></li>
				<li data-role="list-divider">C</li>
				<li><a href="index.html">Caleb Booth</a></li>
				<li><a href="index.html">Christopher Adams</a></li>
			</ul> -->

			<ul data-role="listview" data-filter="true" data-inset="true">
				<li>
					<a href="#">
						<img src="images/album-bb.jpg" />
						<h3>24 Karat</h3>
						<p>SV Road Jogeshwari Jogeshwari Mumbai Tel:-022-25647442</p>
					</a>
					<a href="<?php echo base_url();?>movie/cinema_dialog" data-rel="dialog" data-transition="pop">View More..</a>
				</li>
				<li>
					<a href="#">
						<img src="images/album-bb.jpg" />
						<h3>Aakash</h3>
						<p>CST Marg, Kurla, Mumbai 400071 Kurla Mumbai Tel: 26501856 650631</p>
					</a>
					<a href="<?php echo base_url();?>movie/cinema_dialog" data-rel="dialog" data-transition="pop">View More..</a>
				</li>
				<li>
					<a href="#">
						<img src="images/album-bb.jpg" />
						<h3>Ajanta</h3>
						<p>M G Rd, Borivili (West), Mumbai 400092 Borivili Mumbai Tel: 28010253</p>
					</a>
					<a href="<?php echo base_url();?>movie/cinema_dialog" data-rel="dialog" data-transition="pop">View More..</a>
				</li>
				<li>
					<a href="#">
						<img src="images/album-bb.jpg" />
						<h3>Amar</h3>
						<p>Vaman Tukaram Marg,Chembur,Mumbai 400071 Chembur Mumbai Tel: 25583145</p>
					</a>
					<a href="<?php echo base_url();?>movie/cinema_dialog" data-rel="dialog" data-transition="pop">View More..</a>
				</li>
				<li>
					<a href="#">
						<img src="images/album-bb.jpg" />
						<h3>Alankar</h3>
						<p>S. V. Road Prathana SamajMumbai 400004 Grant Road Mumbai Tel: 23822655</p>
					</a>
					<a href="<?php echo base_url();?>movie/cinema_dialog" data-rel="dialog" data-transition="pop">View More..</a>
				</li>
				<li>
					<a href="#">
						<img src="images/album-bb.jpg" />
						<h3>Alankar</h3>
						<p>S. V. Road Prathana SamajMumbai 400004 Grant Road Mumbai Tel: 23822655</p>
					</a>
					<a href="<?php echo base_url();?>movie/cinema_dialog" data-rel="dialog" data-transition="pop">View More..</a>
				</li>
				<li>
					<a href="#">
						<img src="images/album-bb.jpg" />
						<h3>Alankar</h3>
						<p>S. V. Road Prathana SamajMumbai 400004 Grant Road Mumbai Tel: 23822655</p>
					</a>
					<a href="<?php echo base_url();?>movie/cinema_dialog" data-rel="dialog" data-transition="pop">View More..</a>
				</li>
				<li>
					<a href="#">
						<img src="images/album-bb.jpg" />
						<h3>Alankar</h3>
						<p>S. V. Road Prathana SamajMumbai 400004 Grant Road Mumbai Tel: 23822655</p>
					</a>
					<a href="<?php echo base_url();?>movie/cinema_dialog" data-rel="dialog" data-transition="pop">View More..</a>
				</li>
				<li>
					<a href="#">
						<img src="images/album-bb.jpg" />
						<h3>Alankar</h3>
						<p>S. V. Road Prathana SamajMumbai 400004 Grant Road Mumbai Tel: 23822655</p>
					</a>
					<a href="<?php echo base_url();?>movie/cinema_dialog" data-rel="dialog" data-transition="pop">View More..</a>
				</li>
				<li>
					<a href="#">
						<img src="images/album-bb.jpg" />
						<h3>Anupam</h3>
						<p>Jaiprakash Nagar, Goregaon (West),Mumbai 400063 Goregoan Mumbai Tel: 28732044</p>
					</a>
					<a href="<?php echo base_url();?>movie/cinema_dialog" data-rel="dialog" data-transition="pop">View More..</a>
				</li>
				<li>
					<a href="#">
						<img src="images/album-bb.jpg" />
						<h3>Aurora</h3>
						<p>King Circle,Matunga,Mumbai 400019 Matunga Mumbai Tel: 24096666</p>
					</a>
					<a href="<?php echo base_url();?>movie/cinema_dialog" data-rel="dialog" data-transition="pop">View More..</a>
				</li>
			</ul>

	  	</div>