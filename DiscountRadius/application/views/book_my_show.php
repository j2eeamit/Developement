<div data-role="page" id="go-movie" data-role="go-movie">
    <div data-role="header">
      <a href="<?php echo base_url();?>movie/movie_show_detail" data-role="button" data-icon="back" data-theme="b">Back</a>
      <h1>Book My Show</h1>
      <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    </div><!-- /header -->
  	<div data-role="content"> 
	    <h2>Jism-2</h2>
        <ul data-role="listview" data-theme="d" data-divider-theme="d">
          <li data-role="list-divider">Friday, October 8, 2010 <span class="ui-li-count">1</span></li>
          <li>
            <h4>EX-24-XXXX</h4>
            <h4>24 Karat<BR>Wonder Mall, Kapur Bawdi Naka, Chitalsar Manpada, Ghodbunder Road, Thane (West) 
              <p class="ui-li-aside">
                <strong>9:00</strong>AM
              </p>
            </h4>
          </li>
        </ul>
        
        <div>
            <span style="float:left"><h3>TOTAL VALUE</h3></span>
            <span style="float:right"><h3>250:00</h3></span>
        </div>
        <BR><BR>
        <a href="<?php echo base_url();?>movie/book_my_show" data-role="button" data-transition="fade" >Proced for Payment</a>
     </div>
