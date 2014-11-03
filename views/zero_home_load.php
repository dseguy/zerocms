<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014
?>



<div class="main">
<div class="clear">
	</div>
		<div class="content_btm">
				<div class="content_btm_grid" align="center">
				<h2>Hello Everyone,</h2>
				<h2>Welcome To <?php echo $site_name;?></h2>
				
			</div>
		
		</div>
		
<?php
require 'includes/db.kate.php';
$dbx = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) 
	or die('Fuck!, Unable to connect.');
	
mysql_select_db(MYSQL_DB, $dbx) or die(mysql_error($dbx));

$sql = 'SELECT
		article_id
	FROM
		zero_articles
	WHERE
		is_published = TRUE
	ORDER BY
		publish_date DESC';
$result = mysql_query($sql, $dbx);

echo '<div class="content_bottom">';
echo '<div class="grid_1_of_2 box">';
echo '<br>';
echo '<div class="span_1_of_3_text2">';

if(mysql_num_rows($result) == 0){
	echo '<p><strong>No Articles.</strong></p>';
} else {
		while ($row = mysql_fetch_array($result)) {
		output_story($dbx, $row['article_id'], TRUE);
	}
}
mysql_free_result($result);

echo '</div>';
echo '</div>';
echo '</div>';
?>
		
		<div class="span_1_of_4">
		<div class="span_1_of_4_grid">
				<div class="grid_left1">
					<div class="quote">
						<i class="quote-icon"> </i>
					</div>
				</div>
				<div class="span_1_of_4_text">
					<h3>
					"Lorem Ipsum is simply dummy text of the printing and typesetting industry.
					Lorem Ipsum has been the industry's standard dummy text ever since the 1500 "
					</h3>
				</div>

		</div>
	</div>
</div>
<div class="sap_tabs">	
			<div id="horizontalTab">
			  <ul class="resp-tabs-list">
			  	  <li><span>About</span></li>
				  <li><span>Team</span></li>
				  <li><span>privacy</span></li>
				  <li><span>Contact</span></li>			  
				  <div class="clear"></div>
			  </ul>				  	 
				<div class="resp-tabs-container">
					<div class="tab-1">
						    <div class="facts">
							<h3>About us</h3>
				           <p>Resurgent economies, set of complex and intriguing challenges to businesses operating in this environment. Along with the impending outlook towards business expansion and growth, it is critical for companies to also have a strategic outlook towards resources (man, machine, material and money) utilization across functions and geographies.Sage Software operates in over 140 countries with more than 4.5 million registered users. Sage is the 4th largest ERP vendor in the world. VSG has offices in USA and India.</p>				              
				           </div>
				        </div>	
					 <div class="tab-2">
					 	 <div class="facts">
						<h5 class="tab_style tab_left">
							<div class="tab_img tab_left">
								<img src="static/images/tab_pic1.jpg" alt="">
							</div>
							<div class="tab_txt">
								<h3>Anne Hathaway</h3>
								<h4>CEO/ Founder</h4>
							</div>
							<div class="clear"></div>
							<p>Along with the impending outlook towards business expansion and growth, it is critical for companies .</p>
							<a class="mail" href="">@annehathway</a>						
						</h5>
						<h6 class="tab_style tab_right">
							<div class="tab_img tab_left">
								<img src="static/images/tab_pic2.jpg" alt="">
							</div>
							<div class="tab_txt">
								<h3>kate Upton</h3>
								<h4>CO-Founder</h4>
							</div>
							<div class="clear"></div>
							<p>Along with the impending outlook towards business expansion and growth, it is critical for companies .</p>
							<a class="mail" href="">@kateupton</a>
						</h6>
						<div class="clear"></div>
						</div>
					</div>				        					 
				    <div class="tab-3">
				     	<div class="facts">
						<h3>Our Privacy</h3>
				           <p>Resurgent economies, set of complex and intriguing challenges to businesses operating in this environment. 
						   Along with the impending outlook towards business expansion and growth, it is critical for companies to also 
						   have a strategic outlook towards resources (man, machine, material and money) utilization across functions and 
						   geographies.Sage Software operates in over 140 countries with more than 4.5 million registered users. 
						   Sage is the 4th largest ERP vendor in the world. VSG has offices in USA and India.</p>				              
				           </div>	           	      
				        </div>	
				      <div class="tab-4">
				      	 <div class="facts">
							<div class="searh_form">
					          <form method="post" action="views/zero_contact.php">
						    	<div>
						    	<input class="active" name="userName" type="text" placeholder="Name"  class="textbox">
							    </div>
							    <div>
							    	<input class="active" name="userEmail" type="text" placeholder="E-mail" class="textbox">
							    </div>
							    <div>
							    	<textarea name="userMsg" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" > </textarea>
							    </div>
							   <div>
							   		<span><input type="submit" value="Send Us"></span>
							  </div>
					    </form>

				    </div>
						
				         </div> 			              				             
				      </div>	
		        </div>
	        </div>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>	
      		  </div>

<?php
//end
?>