
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/gmap3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-autocomplete.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery-autocomplete.css"/></link>

    <style>
      .gmap3{
        margin: 20px auto;
        border: 1px dashed #C0C0C0;
        width: 1000px;
        height: 500px;
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
          
          $('#test').gmap3();

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
                    map:{center:true}
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
      <a href="<?php echo base_url();?>home" data-role="button" data-icon="back" data-theme="b">Back</a>
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
      <div id="test" class="gmap3"></div>
  </div>
  