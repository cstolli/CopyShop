<? if (Q("msg") == "2"){ ?>
<em style="color:brown;">Thank you for your inquiry!  We will get back to you shortly. To send another catering inquiry, please <a style="color:tan;" href="?page=catering#inquire">click here.</a></em>
<? } else { ?>
<style>
.validation-passed{background:white !important;}
.validation-failed{background:pink !important;}
</style>

<form style="display:block; visibility:visible;" action="cs-includes/sendmail_zin.php" enctype="multipart/form-data" id="inquiry" method="post" name="inquiry" target="_self">
						<h5 class="p1">
							CONTACT</h5>

						<p class="p1">
							How did you hear about us?<br />
							<textarea cols="50" name="referral" rows="4"></textarea></p>
						<p class="p1">
							Name: *<input class="required" maxlength="32" name="cust_name" size="20" type="text" /></p>
						<p class="p1">
							Organization:<input maxlength="32" name="organization" size="20" type="text" /></p>

						<p class="p1">
							Phone:<input maxlength="32" name="phone" class="validate-phone" size="20" type="text" /></p>
						<p class="p1">
							Email: *<input class="required validate-email" maxlength="256" name="email" size="32" type="text" /></p>
						<p class="p1">
							Mailing Address:<input maxlength="256" name="address" size="32" type="text" /><br />
							</p>

						<h5 class="p1">
							EVENT</h5>
						<p class="p1">
							Date: *<input class="required" maxlength="10" name="date" size="10" type="text" /></p>
						<p class="p1">
							Occasion: *<input class="required" maxlength="32" name="occasion" size="20" type="text" /></p>
						<p class="p1">

							Time: *<input class="required" maxlength="10" name="time" size="10" type="text" /></p>
						<p class="p1">
							Location Address: *<input class="required" maxlength="32" name="location" size="32" type="text" /></p>
						<p class="p1">
							Guest Count: *<input class="required" maxlength="4" name="count" size="2" type="text" /></p>
						<p class="p1">
							Venue:<input maxlength="32" name="venue" size="20" type="text" /></p>

						<p class="p1">
							Style: <select name="style" size="1"><option value="formal-indoor">formal/indoor</option><option value="formal-outdoor">formal/outdoor</option><option value="casual-indoor">casual/indoor</option><option value="casual-outdoor">casual/outdoor</option></select></p>
						<p class="p1">
							Event Format: <select name="format" size="1"><option value="buffet">buffet</option><option value="plated">plated</option><option value="sit-down">sit-down</option>
                            <option value="stations">stations</option><option value="reception">reception</option><option value="other">other</option>
                            </select><br />
							</p>

						<p class="p2">
							</p>
						<h5 class="p2">
							SPECIAL NEEDS/PREFERENCES</h5>
						<p class="p1">
							Specify preferences or dietary restrictions:<br />
							<textarea cols="50" name="restrictions" rows="5"></textarea><br />

							<br />
                            <?php /*?><input name="to" type="hidden" value="catering@zinrestaurant.com"><?php */?>
                            <input name="to" type="hidden" value="Zin Catering">
                            <input name="to_email" type="hidden" value="catering@zinrestaurant.com">
                            <input name="from" type="hidden" value="Zin Website">
                            <input name="subject" type="hidden" value="Catering inquiry from Zin website">
                            <input name="referrer" type="hidden" value="http://www.zinrestaurant.com/?page=catering&msg=2" />
							<input name="submit" type="submit" value="Send Inquiry" /></p>
					</form>
<? } ?>