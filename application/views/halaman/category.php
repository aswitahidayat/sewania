<?php include('search.php'); ?>
    <div class="category container row">
        <?php include('category-sidebar.php'); ?>
        <?php include('category-content.php'); ?>
        
    </div>
  <!-- /.main-container -->
  
  <!-- Modal Change City -->

<div class="modal fade" id="selectRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
        
            <p>Popular cities in <strong>New York</strong>
            </p>

<div style="clear:both"></div>            
            <div class="col-sm-6 no-padding">
            <select  class="form-control selecter  " id="region-state" name="region-state">
		<option value="">All States/Provinces</option>
		<option value="Alabama">Alabama</option>
		<option value="Alaska">Alaska</option>
		<option value="Arizona">Arizona</option>
		<option value="Arkansas">Arkansas</option>
		<option value="California">California</option>
		<option value="Colorado">Colorado</option>
		<option value="Connecticut">Connecticut</option>
		<option value="Delaware">Delaware</option>
		<option value="District of Columbia">District of Columbia</option>
		<option value="Florida">Florida</option>
		<option value="Georgia">Georgia</option>
		<option value="Hawaii">Hawaii</option>
		<option value="Idaho">Idaho</option>
		<option value="Illinois">Illinois</option>
		<option value="Indiana">Indiana</option>
		<option value="Iowa">Iowa</option>
		<option value="Kansas">Kansas</option>
		<option value="Kentucky">Kentucky</option>
		<option value="Louisiana">Louisiana</option>
		<option value="Maine">Maine</option>
		<option value="Maryland">Maryland</option>
		<option value="Massachusetts">Massachusetts</option>
		<option value="Michigan">Michigan</option>
		<option value="Minnesota">Minnesota</option>
		<option value="Mississippi">Mississippi</option>
		<option value="Missouri">Missouri</option>
		<option value="Montana">Montana</option>
		<option value="Nebraska">Nebraska</option>
		<option value="Nevada">Nevada</option>
		<option value="New Hampshire">New Hampshire</option>
		<option value="New Jersey">New Jersey</option>
		<option value="New Mexico">New Mexico</option>
		<option selected value="New York">New York</option>
		<option value="North Carolina">North Carolina</option>
		<option value="North Dakota">North Dakota</option>
		<option value="Ohio">Ohio</option>
		<option value="Oklahoma">Oklahoma</option>
		<option value="Oregon">Oregon</option>
		<option value="Pennsylvania">Pennsylvania</option>
		<option value="Rhode Island">Rhode Island</option>
		<option value="South Carolina">South Carolina</option>
		<option value="South Dakota">South Dakota</option>
		<option value="Tennessee">Tennessee</option>
		<option value="Texas">Texas</option>
		<option value="Utah">Utah</option>
		<option value="Vermont">Vermont</option>
		<option value="Virgin Islands">Virgin Islands</option>
		<option value="Virginia">Virginia</option>
		<option value="Washington">Washington</option>
		<option value="West Virginia">West Virginia</option>
		<option value="Wisconsin">Wisconsin</option>
		<option value="Wyoming">Wyoming</option>
	</select>
            </div>
           <div style="clear:both"></div>            

            <hr class="hr-thin">
          </div>
          <div class="col-md-4">
            <ul  class="list-link list-unstyled">
              <li> <a  href="#" title="">All Cities</a> </li>
		 <li> <a  href="#" title="Albany">Albany</a> </li>
		 <li> <a  href="#" title="Altamont">Altamont</a> </li>
		 <li> <a  href="#" title="Amagansett">Amagansett</a> </li>
		 <li> <a  href="#" title="Amawalk">Amawalk</a> </li>
		 <li> <a  href="#" title="Bellport">Bellport</a> </li>
		 <li> <a  href="#" title="Centereach">Centereach</a> </li>
		 <li> <a  href="#" title="Chappaqua">Chappaqua</a> </li>
         <li> <a  href="#" title="East Elmhurst">East Elmhurst</a> </li>
		 <li> <a  href="#" title="East Greenbush">East Greenbush</a> </li>
		 <li> <a  href="#" title="East Meadow">East Meadow</a> </li>
	
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-link list-unstyled">
              <li> <a  href="#" title="Elmont">Elmont</a> </li>
		 <li> <a  href="#" title="Elmsford">Elmsford</a> </li>
		 <li> <a  href="#" title="Farmingville">Farmingville</a> </li>
		 <li> <a  href="#" title="Floral Park">Floral Park</a> </li>
		 <li> <a  href="#" title="Flushing">Flushing</a> </li>
		 <li> <a  href="#" title="Fonda">Fonda</a> </li>
		 <li> <a  href="#" title="Freeport">Freeport</a> </li>
		 <li> <a  href="#" title="Fresh Meadows">Fresh Meadows</a> </li>
		 <li> <a  href="#" title="Fultonville">Fultonville</a> </li>
		 <li> <a  href="#" title="Gansevoort">Gansevoort</a> </li>
		 <li> <a  href="#" title="Garden City">Garden City</a> </li>

	
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-link list-unstyled">
               <li> <a  href="#" title="Oceanside">Oceanside</a> </li>
		 <li> <a  href="#" title="Orangeburg">Orangeburg</a> </li>
		 <li> <a  href="#" title="Orient">Orient</a> </li>
         <li> <a  href="#" title="Ozone Park">Ozone Park</a> </li>
		 <li> <a  href="#" title="Palatine Bridge">Palatine Bridge</a> </li>
		 <li> <a  href="#" title="Patterson">Patterson</a> </li>
		 <li> <a  href="#" title="Pearl River">Pearl River</a> </li>
		 <li> <a  href="#" title="Peekskill">Peekskill</a> </li>
		 <li> <a  href="#" title="Pelham">Pelham</a> </li>
		 <li> <a  href="#" title="Penn Yan">Penn Yan</a> </li>
		 <li> <a  href="#" title="Peru">Peru</a> </li>
	
            </ul>
          </div>
        </div>
      </div>
</div>

<!-- /.modal --> 