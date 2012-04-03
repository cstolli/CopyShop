<style type="text/css">
#apDiv1 {
	position:absolute;
	width:164px;
	height:43px;
	z-index:1;
	left: 563px;
	top: 440px;
	text-align: center;
}
#apDiv2 {
	position:absolute;
	width:164px;
	height:43px;
	z-index:1;
	left: 140px;
	top: 291px;
	text-align: center;
}
#apDiv3 {	position:absolute;
	width:164px;
	height:43px;
	z-index:1;
	left: 477px;
	top: 317px;
	text-align: center;
}
#apDiv4 {
	position:absolute;
	width:164px;
	height:43px;
	z-index:1;
	left: 454px;
	top: 301px;
	text-align: center;
}
#apDiv5 {
	position:absolute;
	width:164px;
	height:43px;
	z-index:1;
	left: 325px;
	top: 205px;
	text-align: center;
}
#apDiv6 {
	position:absolute;
	width:164px;
	height:43px;
	z-index:1;
	left: 689px;
	top: 374px;
	text-align: center;
}
#apDiv7 {
	position:absolute;
	width:142px;
	height:34px;
	z-index:1;
	left: 431px;
	top: 477px;
	text-align: left;
}
#apDiv8 {
	position:absolute;
	width:164px;
	height:43px;
	z-index:1;
	left: 187px;
	top: 440px;
	text-align: center;
}
#fields{
	position:absolute;
	left:0px;
	top:0px;
	height:360px;
	width:800px;
	background:url(cs-content/sites/allenjac/themes/default/images/tank.png) -0px 0px no-repeat;
}
#fields2{position:absolute; top:-190px; left:-93px; background:none;}

.validation-passed{background:#fff; }
.validation-failed{background:#ddd; }

</style>
<? if (Q("msg") == "1") { ?>
<div style="position:absolute; height:100%; width:100%; z-index:9999;left:0; top:0" id="overlay">
<div style="position:absolute; height:100%; width:100%; z-index:0; text-align:center; background:black; opacity:.4; filter:alpha(opacity=40);"></div>
<div style="position:absolute; height:100%; width:100%; z-index:1; text-align:center;">
<em style="position:relative; left:25%; top:25%; margin-left:20px; width:400px; height:100px;font-size:20px; color:#5493C3; font-weight:bold; display:block; background:white; border:solid 2px #5493C3; border-radius:6px; padding:20px; ">Thank you for your fuel tank order. We will contact you within 1 business day to discuss your tank.
<br /><input type="button" value="Continue" onclick="document.getElementById('overlay').style.display='none';"/></em>
</div>
</div>
</div>
<? } ?>
<form onsubmit="this.submit(); return false;" action="cs-includes/sendmail_allenjac.php" enctype="multipart/form-data" id="tankorder" method="post" name="tankorder" target="_self" style="border-radius:8px; display:block; padding:1px;  background:#eee; border:solid 1px #ccc; width:758px; margin:20px auto 20px auto;overflow:visible;">
	<table  border="0" cellpadding="8" cellspacing="0" align="center" style="width: 97%;  margin:12px auto 12px auto;">
		<tbody>
        <tr>
            <td style="font-size:42px; color:#5493C3; font-weight:bold; padding-top:-10px" align="center" valign="middle">1</td>
            <td colspan="2" height="80" valign="middle">
            Please enter your contact information, including your phone number so we can confirm your order. This website does not store or share any of your information.
 </td>
            </tr>
			<tr>
			  <td width="5%" valign="top">Name: </td>
	      <td width="19%" height="40" valign="top"><input name="name" type="text" id="name"  tabindex="1" size="16" maxlength="32" style="z-index:99;" class="required"/></td>
				<td width="76%" valign="top">
					Truck Make &amp; Model or Tank Style: 
			  <input name="trucktankstyle" type="text" id="trucktankstyle" size="30" maxlength="32" class="" tabindex="5"  /></td>
			</tr>
			<tr>
			  <td valign="top">Email: </td>
	      <td height="40" valign="top"><input name="email" type="text" id="email" size="16" maxlength="32" tabindex="2" class="required validate-email" /></td>
				<td rowspan="3" valign="top">
			    Special Instructions:<br />
                    <textarea name="instructions" cols="60" rows="5" id="instructions" tabindex="6"></textarea></td>
			</tr>
			<tr>
			  <td valign="top">Phone:</td>
			  <td height="40" valign="top"><input name="phone" type="text" id="phone" tabindex="3" size="16" maxlength="32" class="required validate-phone"  /></td>
			</tr>
			<tr>
			  <td valign="top">Fax: </td>
			  <td height="39" valign="top"><input name="fax" type="text" id="fax" tabindex="4" size="16" maxlength="32" /></td>
			</tr>
			<tr>
            <td style="font-size:42px; color:#5493C3; font-weight:bold; padding-top:-10px" align="center" valign="middle">2</td>
            <td colspan="2" height="80" valign="middle">
            Please provide each measurement specified below.  All measurements are in inches, to the hundredth of an inch if necessary.
            Do not include marks like (") or ('). Example: <em>10</em> or <em>10.5</em> or <em>10.25</em>.
 </td>
            </tr>
			<tr>
				<td colspan="3" valign="top" style="height:340px; width:100%; display:block;  position:relative; ">
					<div id="fields">
                    <div id="fields2">
					<div id="apDiv6">
					  <input name="diameter" type="text" id="seamtoflange3" size="10" maxlength="32" tabindex="7" required class="required validate-number"  />
				  </div>
					<div id="apDiv7">
					  <select name="crossover" id="crossover" tabindex="12">
					    <option value="2">2&quot; Crossover</option>
					    <option value="2.25">2.25&quot; Crossover</option>
					    <option value="2.5">2.5&quot; Crossover</option>
					    <option value="2.75">2.75&quot; Crossover</option>
					    <option value="3">3&quot; Crossover</option>
					    <option value="3.25">3.25&quot; Crossover</option>
					    <option value="3.5">3.5&quot; Crossover</option>
					    <option value="3.75">3.75&quot; Crossover</option>
					    <option value="4">4&quot; Crossover</option>
				      </select>
					</div>
					<div id="apDiv8">
					  <input name="seamtodrain" type="text" id="seamtodrain" size="10" maxlength="32" tabindex="10"  required class="required validate-number" />
				  </div>
				 
					<div id="apDiv2">
					  <input name="seamtoflange" type="text" id="seamtoflange" size="10" maxlength="32" tabindex="8" required class="required validate-number" />
				  </div>
				  
				 
				  
				  <div id="apDiv4">
				    <input name="seamtoneck" type="text" id="seamtoneck" size="10" maxlength="32" tabindex="9" required class="required validate-number" />
			      </div>
				  <div id="apDiv5">
				    <input name="length" type="text" id="length" size="10" maxlength="32" tabindex="6" required class="required validate-number" />
			      </div>
				
				  <div id="apDiv1">
				    <input name="captoneck" type="text" id="captoneck" size="5" maxlength="32" tabindex="11" required class="required validate-number" />
			      </div>
				 </div>
					</div></td>
			</tr>
             <tr>
            <td style="font-size:42px; color:#5493C3; font-weight:bold; padding-top:-10px" align="center" valign="middle">3</td>
            <td colspan="2" height="80" valign="middle">
           <input type="checkbox" name="confirm" id="confirm" required class="required validate-one-required" /> Check here to confirm that your measurements and information are correct.  Click submit to send us your order.  We will contact you shortly to confirm payment information and answer questions.
 </td>
            </tr>
            <tr><td align="right" colspan="3">
<input type="submit" name="submit" id="submit" value="Submit Order" style="position:relative; left:-200px;" tabindex="13" />
				    <input type="reset" name="submit2" id="submit2" value="Reset"  style="position:relative; left:-190px;" tabindex="14"/>
                    <input type="hidden" name="to_email" value="info@allenjacfueltanks.com" /><input type="hidden" name="referrer" value="http://www.allenjacfueltanks.com/index.php?page=tanks&msg=1" />
                    <input type="hidden" name="subject" value="Order from allenjac website" />
                    <input type="hidden" name="to" value="Allen Jac Orders" />
                    </td>
                    </tr>
                    
		</tbody>
	</table>  
</form>