<?php
$row=mysql_fetch_array(mysql_query("select * from produk where id_produk = '$_SESSION[id_produk]'"));
$kt=mysql_fetch_array(mysql_query("select * from kota where id_kota = '$row[kabupaten]'"));
$lok=mysql_fetch_array(mysql_query("select * from lokasi where id_lokasi = '$kt[id_lokasi]'"));
$member=mysql_fetch_array(mysql_query("select * from member where token_id = '$row[id_member]'"));
$ex=explode('$$@',$row['foto']);
?>
<div class="main-container" style="width:80%; margin-right:auto; margin-left:auto;">
    <div class="container">
      <ol class="breadcrumb pull-left">
        <li><a href="#"><i class="icon-home fa"></i></a></li>
        <li><a href="category.html">All Ads</a></li>
        <li><a href="sub-category-sub-location.html">Electronics</a></li>
        <li class="active">Mobile Phones</li>
      </ol>
      <div class="pull-right backtolist"><a href="sub-category-sub-location.html"> <i class="fa fa-angle-double-left"></i> Back to Results</a></div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 page-content col-thin-right">
          <div class="inner inner-box ads-details-wrapper">
            <h2> <!--Xperia� C3 Dual available--><?php echo $row[1]; ?> <!--<small class="label label-default adlistingtype">Company ad</small>--> </h2>
            <span class="info-row"> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">Electronics </span>- <span class="item-location"><i class="fa fa-map-marker"></i> New York </span> </span>
            <div class="ads-image">
              <h1 class="pricetag"> $25</h1>
              <ul class="bxslider">
              <?php
			  $a=0;
			  foreach($ex as $val){
          if($val==""){
            continue;
          }
			  ?>
                <li><img src="<?php echo base_url('assets/img/upload/product/'.$ex[$a]); ?>" alt="img" /></li>
                <?php
				$a++;
				}
				?>
                <!--
                <li><img src="<?php echo base_url('assets/img/item/tp-big/Image00015.jpg'); ?>" alt="img" /></li>
                <li><img src="<?php echo base_url('assets/img/item/tp-big/Image00013.jpg'); ?>" alt="img" /></li>-->
              </ul>
              <div id="bx-pager"> 
              <?php
			  $a=0;
			  foreach($ex as $val){
          if($val==""){
            continue;
          }
			  ?>
              <a class="thumb-item-link" data-slide-index="<?php echo $a; ?>" href=""><img src="<?php echo base_url('assets/img/upload/product/thumb/small_'.$ex[$a]); ?>" alt="img" /></a> 
              <?php
			  $a++;
			  }
			  ?>
              <!--
              <a class="thumb-item-link"  data-slide-index="1" href=""><img src="<?php //echo base_url('ivory_src/source/images/item/tp/Image00015.jpg'); ?>" alt="img" /></a> <a class="thumb-item-link"  data-slide-index="2" href=""><img src="<?php //echo base_url('ivory_src/source/images/item/tp/Image00013.jpg'); ?>" alt="img" /></a> --></div>
            </div>
            <!--ads-image-->
            
            <div class="Ads-Details">
              <h5 class="list-title"><strong>Ads Details</strong></h5>
              <div class="row">
                <div class="ads-details-info col-md-8">
                  <p><?php echo ucwords(strtolower($row[1])); ?></p>
                  <h4>Camera and video</h4>
                  <ul class="list-circle">
                    <li>5 MP Front-facing camera (720p)</li>
                    <li>Front flash LED</li>
                    <li>Wide view front camera</li>
                    <li>8 MP camera with auto focus</li>
                    <li>HD video recording 1080 p</li>
                    <li>Sony Exmor RS for mobile image sensor</li>
                    <li>HDR (High Dynamic Range) for photos and videos</li>
                    <li>Pulsed LED flash</li>
                    <li>16x digital zoom</li>
                    <li>Superior Auto � automatic scene selection</li>
                    <li>Geotagging � add location info to your photos</li>
                    <li>Object tracking � lock focus on a specific object</li>
                    <li>Red-eye reduction</li>
                    <li>Image capture, supported file format: JPEG</li>
                    <li>Image playback, supported file formats: BMP, GIF, JPEG, PNG; WebP</li>
                    <li>Video capture, supported file formats: 3GPP, MP4</li>
                    <li>Video playback, supported file formats: 3GPP, MP4, M4V, AvI, XVID, WEBM</li>
                  </ul>
                  <h4>Networks</h4>
                  <ul>
                    <li>GSM GPRS/EDGE (2G)</li>
                    <li>UMTS HSPA (3G)</li>
                    <li>LTE (4G)</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <aside class="panel panel-body panel-details">
                    <ul>
                      <li>
                        <p class=" no-margin "><strong>Price:</strong> Rp. <?php echo format_rupiah($row['harga']); ?> , -</p>
                      </li>
                      <li>
                        <p class="no-margin"><strong>Type:</strong> Mobile Mobiles,For sale</p>
                      </li>
                      <li>
                        <p class="no-margin"><strong>Location:</strong> <?php echo $lok[1]; ?> , <?php echo $kt[2]; ?> </p>
                      </li>
                      <li>
                        <p class=" no-margin "><strong>Condition:</strong> New</p>
                      </li>
                      <li>
                        <p class="no-margin"><strong>Brand:</strong> Sony</p>
                      </li>
                    </ul>
                  </aside>
                  <div class="ads-action">
                    <ul class="list-border">
                      <li><a  href="#" > <i class=" fa fa-user"></i> More ads by User </a> </li>
                      <li><a  href="#" > <i class=" fa fa-heart"></i> Save ad </a> </li>
                      <li><a  href="#" > <i class="fa fa-share-alt"></i> Share ad </a> </li>
                      <li><a   href="#reportAdvertiser" data-toggle="modal"> <i class="fa icon-info-circled-alt"></i> Report abuse </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="content-footer text-left"> <a class="btn  btn-default" data-toggle="modal" href="#contactAdvertiser"><i class=" icon-mail-2"></i> Send a message </a> <a class="btn  btn-info" ><i class=" icon-phone-1"></i> 01680 531 352 </a> </div>
            </div>
          </div>
          <!--/.ads-details-wrapper--> 
          
        </div>
        <!--/.page-content-->
        
        <div class="col-sm-3  page-sidebar-right">
          <aside>
            <div class="panel sidebar-panel panel-contact-seller">
              <div class="panel-heading">Contact Seller</div>
              <div class="panel-content user-info">
                <div class="panel-body text-center">
                  <div class="seller-info">
                    <h3 class="no-margin"><span id="t_customer_name_<?php echo $member[token_id]; ?>" class="t_customer_name"><?php echo $member[1]." ".$member[2]; ?></span></h3>
                    <p>Location: <strong>New York</strong></p>
                    <p> Joined: <strong><!--12 Mar 2009--><?php echo $member['tgl_daftar']; ?></strong></p>
                  </div>
                  <div class="user-ads-action"> <a href="#contactAdvertiser" data-toggle="modal" class="btn   btn-default btn-block"><i class=" icon-mail-2"></i> Send a message </a> <a class="btn  btn-info btn-block"><i class=" icon-phone-1"></i> <?php echo $member['phone']; ?> </a> </div>
                </div>
              </div>
            </div>
            <div class="panel sidebar-panel">
              <div class="panel-heading">Safety Tips for Buyers</div>
              <div class="panel-content">
                <div class="panel-body text-left">
                  <ul class="list-check">
                    <li> Meet seller at a public place </li>
                    <li> Check the item before you buy</li>
                    <li> Pay only after collecting the item</li>
                  </ul>
                  <p><a class="pull-right" href="#"> Know more <i class="fa fa-angle-double-right"></i> </a></p>
                </div>
              </div>
            </div>
            <!--/.categories-list--> 
          </aside>
        </div>
        <!--/.page-side-bar--> 
      </div>
    </div>
  </div>
  <!-- /.main-container -->

<div class="modal fade" id="reportAdvertiser" tabindex="-1" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" ><i class="fa icon-info-circled-alt"></i> There's something wrong with this  ads? </h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <label for="report-reason" class="control-label">Reason:</label>
            <select name="report-reason" id="report-reason" class="form-control">
              <option value="">Select a reason</option>
              <option value="soldUnavailable">Item unavailable</option>
              <option value="fraud">Fraud</option>
              <option value="duplicate">Duplicate</option>
              <option value="spam">Spam</option>
              <option value="wrongCategory">Wrong category</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-email" class="control-label">Your E-mail:</label>
            <input type="text"  name="email" maxlength="60" class="form-control" id="recipient-email">
          </div>
          <div class="form-group">
            <label for="message-text2" class="control-label">Message <span class="text-count">(300) </span>:</label>
            <textarea class="form-control" id="message-text2"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Send Report</button>
      </div>
    </div>
  </div>
</div>

<!-- /.modal --> 

<!-- Modal contactAdvertiser -->

<div class="modal fade" id="contactAdvertiser" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><i class=" icon-mail-2"></i> Contact advertiser </h4>
      </div>
      <div class="modal-body" >
      <span style="display:none;" id="sp_loading_koment"><img src="<?php echo base_url('assets/img/loading.gif'); ?>" /> &nbsp; &nbsp;Inserting data ... Please Wait .. <p></p></span>
        <form role="form">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input class="form-control required" id="recipient-name" placeholder="Your name" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text">
          </div>
          <div class="form-group">
            <label for="sender-email" class="control-label">E-mail:</label>
            <input id="sender-email" type="text" data-content="Must be a valid e-mail address (user@gmail.com)" data-trigger="manual" data-placement="top" placeholder="email@you.com" class="form-control email">
          </div>
          <div class="form-group">
            <label for="recipient-Phone-Number"  class="control-label">Phone Number:</label>
            <input type="text"  maxlength="60" class="form-control" id="recipient-Phone-Number">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message <span class="text-count">(300) </span>:</label>
            <textarea class="form-control" id="message-text"  placeholder="Your message here.." data-placement="top" data-trigger="manual"></textarea>
          </div>
          <div class="form-group">
            <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success pull-right" id="btn_submit_message">Send message!</button>
      </div>
    </div>
  </div>
</div>
