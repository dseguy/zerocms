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
<!-- start calender  ---->
		
                      <div class="cal1"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">November 2013</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day past adjacent-month last-month calendar-day-2013-10-27"><div class="day-contents">27</div></td><td class="day past adjacent-month last-month calendar-day-2013-10-28"><div class="day-contents">28</div></td><td class="day past adjacent-month last-month calendar-day-2013-10-29"><div class="day-contents">29</div></td><td class="day past adjacent-month last-month calendar-day-2013-10-30"><div class="day-contents">30</div></td><td class="day past adjacent-month last-month calendar-day-2013-10-31"><div class="day-contents">31</div></td><td class="day past calendar-day-2013-11-01"><div class="day-contents">1</div></td><td class="day past calendar-day-2013-11-02"><div class="day-contents">2</div></td></tr><tr><td class="day past calendar-day-2013-11-03"><div class="day-contents">3</div></td><td class="day past calendar-day-2013-11-04"><div class="day-contents">4</div></td><td class="day past calendar-day-2013-11-05"><div class="day-contents">5</div></td><td class="day past calendar-day-2013-11-06"><div class="day-contents">6</div></td><td class="day past calendar-day-2013-11-07"><div class="day-contents">7</div></td><td class="day past calendar-day-2013-11-08"><div class="day-contents">8</div></td><td class="day past calendar-day-2013-11-09"><div class="day-contents">9</div></td></tr><tr><td class="day past event calendar-day-2013-11-10"><div class="day-contents">10</div></td><td class="day past event calendar-day-2013-11-11"><div class="day-contents">11</div></td><td class="day past event calendar-day-2013-11-12"><div class="day-contents">12</div></td><td class="day past event calendar-day-2013-11-13"><div class="day-contents">13</div></td><td class="day past event calendar-day-2013-11-14"><div class="day-contents">14</div></td><td class="day past calendar-day-2013-11-15"><div class="day-contents">15</div></td><td class="day past calendar-day-2013-11-16"><div class="day-contents">16</div></td></tr><tr><td class="day past calendar-day-2013-11-17"><div class="day-contents">17</div></td><td class="day past calendar-day-2013-11-18"><div class="day-contents">18</div></td><td class="day past calendar-day-2013-11-19"><div class="day-contents">19</div></td><td class="day past calendar-day-2013-11-20"><div class="day-contents">20</div></td><td class="day past event calendar-day-2013-11-21"><div class="day-contents">21</div></td><td class="day past event calendar-day-2013-11-22"><div class="day-contents">22</div></td><td class="day today event calendar-day-2013-11-23"><div class="day-contents">23</div></td></tr><tr><td class="day calendar-day-2013-11-24"><div class="day-contents">24</div></td><td class="day calendar-day-2013-11-25"><div class="day-contents">25</div></td><td class="day calendar-day-2013-11-26"><div class="day-contents">26</div></td><td class="day calendar-day-2013-11-27"><div class="day-contents">27</div></td><td class="day calendar-day-2013-11-28"><div class="day-contents">28</div></td><td class="day calendar-day-2013-11-29"><div class="day-contents">29</div></td><td class="day calendar-day-2013-11-30"><div class="day-contents">30</div></td></tr></tbody></table></div></div>
				 
			<!-- end calender  ---->
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