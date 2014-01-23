<div data-role="page" id="go-movie" data-role="go-movie">
    <div data-role="header">
      <a href="<?php echo base_url();?>movie/movies_now_playing" data-role="button" data-icon="back" data-theme="b">Back</a>
      <h1>Movie Show</h1>
      <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    </div><!-- /header -->

  	<div data-role="content"> 
  		<div id="movie_info" style="min-height: 150px;">
  			<span style="float: left;"><img src="<?php echo base_url();?>images/m_thumb/jism-2.jpg" height="140px" width="140px"/> </span>
  		 	<span style="float: right; padding-top: 13px;">
  		 		<p><a href="index.html">JISM-2</a></p>
				<p><a href="index.html">Discount Upto 20%</a></p>
				<p><a href="index.html">View Trailer</a></p>
			</span>
  		</div>
  		<div id="movie_show_timing">
  			<fieldset data-role="controlgroup">
				<legend>Show Timing:</legend>
			     	<input type="radio" name="radio-choice" id="radio-choice-1" value="choice-1" checked="checked"/>
			     	<label for="radio-choice-1">9:00 AM</label>
			     	<input type="radio" name="radio-choice" id="radio-choice-2" value="choice-2"/>
			     	<label for="radio-choice-2">12:00 AM</label>

			     	<input type="radio" name="radio-choice" id="radio-choice-3" value="choice-3"/>
			     	<label for="radio-choice-3">3:00 AM</label>

			     	<input type="radio" name="radio-choice" id="radio-choice-4" value="choice-4"/>
			     	<label for="radio-choice-4">6:00 AM</label>

			</fieldset>
  		</div>

  		<div data-role="fieldcontain">
			<label for="defslide">Select Date</label>
			<input name="mydate" id="mydate" type="date" data-role="datebox" data-options='{"mode": "slidebox"}'>
		</div>
		<a href="<?php echo base_url();?>movie/book_my_show" data-role="button" data-transition="fade" >Book My Show</a>
  	</div>
 </div>