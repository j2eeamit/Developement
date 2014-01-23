
<!-- <div data-role="page" class="page-map" id="roast_map" style="width:100%; height:100%;">

    <div data-role="header" data-position="fixed">
    	<h2> Hello <?php if ($this->session->userdata('is_logged_in')){
						echo $this->session->userdata('USER_NAME');
					}?>
			 , welcome to discount radius !
		</h2>
     	<a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
	</div>
 -->
	<!-- <div data-role="content" style="width:100%; height:100%; padding:0;">
		<!-- <label for="search-mini">Search Input:</label>
		<input type="search" name="search-mini" id="search-mini" value="" data-mini="true" /> -->
		<!-- <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="a">
			<li data-role="list-divider">Places</li>
			<li><a href="#roast-list" data-transition="slide">List places</a></li>
			<li class="goMap"><a href="<?php echo base_url();?>home/showmap" data-transition="slide">View on map</a></li>
			<li class="addMap"><a href="#add_map" data-transition="slide">Add Review</a></li>
		</ul>
	</div> -->

    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/gmap3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-autocomplete.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery-autocomplete.css"/></link>

    <style>
      .gmap3{
        margin: 20px auto;
        border: 1px dashed #C0C0C0;
        width: 400px;
        height: 200px;
      }
      .ui-menu .ui-menu-item{
        text-align: left;  
        font-weight: normal;
      }
      .ui-menu .ui-menu-item a.ui-state-hover{
        border: 1px solid red; 
        background: #FFBFBF; 
        color: black;
        font-weight:bold;
      }
    </style>
    
    <script type="text/javascript">
      $(document).ready(function(){
          
          //$('#test').gmap3();

          var panorama = {
              p: null,
              marker: null,
              infowindow: null,
              map: null,
              
              unset: function(){
                if (this.p){
                  this.p.unbind("position");
                  this.p.setVisible(false);
                }
                this.p = null;
                this.marker = null;
              },
              setMap: function(map){
                this.map = map;
              },
              setMarker: function(marker){
                this.marker = marker;
              },
              setInfowindow: function(infowindow){
                this.infowindow = infowindow;
              },
              open: function(){
                this.infowindow.open(this.map, this.marker);
              },
              run: function(id){
                if (!this.marker) return;
                this.p = new google.maps.StreetViewPanorama(document.getElementById(id), {
                  navigationControl: true,
                  navigationControlOptions: {style: google.maps.NavigationControlStyle.ANDROID},
                  enableCloseButton: false,
                  addressControl: false,
                  linksControl: false
                });
                this.p.bindTo("position", this.marker);
                this.p.setVisible(true);
              }
            };
                
            var center = [19.113611,72.871389];

            $('#test').gmap3({ action:'init',
              options:{
                  zoom: 15,
                  mapTypeId: google.maps.MapTypeId.ROADMAP,
                  streetViewControl: false,
                  center: center
                },
                callback: function(map){
                  panorama.setMap(map);
                }
              },
              { action: 'addMarker',
                latLng: center,
                marker:{
                  options:{
                    title: 'Click me !',
                    draggable: true
                  },
                  callback: function(marker){
                    panorama.setMarker(marker);
                  },
                  events:{
                    click: function(){
                      panorama.open();
                    }
                  }
                },
                infowindow:{
                  options:{
                    //content: '<div id="content" style="width:300px;height:250px;"></div>'
                  },
                  callback: function(infowindow){
                    panorama.setInfowindow(infowindow);
                  },
                  events:{
                    domready: function(){
                      panorama.run('content');
                    },
                    closeclick: function(){
                      panorama.unset();
                    }
                  }
                }
              }
            );

          //Address Finder
          $('#address').autocomplete({
            source: function() {
              $("#test").gmap3({
                action:'getAddress',
                address: $(this).val(),
                callback:function(results){
                  if (!results) return;
                  $('#address').autocomplete(
                    'display', 
                    results,
                    false
                  );
                }
              });
            },
            cb:{
              cast: function(item){
                return item.formatted_address;
              },
              select: function(item) {
                $("#test").gmap3(
                  {action:'clear', name:'marker'},
                  {action:'addMarker',
                    latLng:item.geometry.location,
                    map:{center:false}
                  }
                );
              }
            }
          })
          .focus();
          
      });
    </script>
 
	<div data-role="page" id="map" data-role="map">
	    <div data-role="header">
	      <!-- <a href="<?php echo base_url();?>home" data-role="button" data-icon="back" data-theme="b">Back</a> -->
	      <h2> Hello <?php if ($this->session->userdata('is_logged_in')){
	            echo $this->session->userdata('USER_NAME');
	          }?>
	          , welcome to discount radius !
	      </h2>
	      <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
	    </div><!-- /header -->

	  	<div data-role="content"> 
	    	<label>Enter your location:</label>
	      	<input type="text" id="address" size="60">
	     	<div id="test" class="gmap3"></div><!-- Google map will land here -->
  
	     	Select by:
			<ul data-role="controlgroup" data-type="horizontal" class="localnav">
				<li><a href="<?php echo base_url();?>movie" data-role="button" data-transition="slide" >Go Movie</a></li>
				<li><a href="#" data-role="button" data-transition="slide">Eat Out</a></li>
        <li><a href="<?php echo base_url();?>home/other_product" data-role="button" data-transition="slide">Other Product</a></li>
			</ul>

	  		<!-- <div class="ui-grid-b">
				<div class="ui-block-a">
					<a href="<?php echo base_url();?>movie" data-role="button" data-ajax="false" data-theme="b">Go Movie</a>
				</div>
				<div class="ui-block-b">
					<a href="<?php echo base_url();?>eatout" data-role="button" data-ajax="false" data-theme="b">Eat Out</a>
				</div>
			</div> --><!-- /grid-b -->

	  	</div>