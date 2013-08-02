<!DOCTYPE html>
    <!--//[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--//[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--//[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--//[if gt IE 8]><!--//> <html class="no-js"> <!--//<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="EVE Online Fleet Commander tool fot create consistently formated Jabber pings and MotD messages.">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="components/normalize.css/normalize.css">
        <link rel="stylesheet" href="components/html5-boilerplate/css/main.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="css/application.css">

        <script src="components/modernizr/modernizr.js"></script>

		<title>CFC Broadcast Maker</title>

        <!--// if IE 8 or below styles-->
        <!--//[if lt IE 9]><link rel="stylesheet" href="ie_fix.css"><![endif]-->
    </head>
	<body>
		<form id="bcastm">
			<div class="form_part_1">
					<h3 class="important">Requirted Inforamtion:</h3>
					<label>Fleet Name</label>
					<input type="text" name="fleet_name" class="fleet_name" value="" />

					<label>FC</label>
					<input type="text" name="fc_name" value="" />

					<label>Rally Location</label>
					<input type="text" name="form_up" value="" />

					<label>Fleet Comp</label>
					<select name="fleet_comp">
						<option value="TBA" selected>TBA</option>
						<option value="Kitchen Sink (Armor)">Kitchen Sink (Armor)</option>
						<option value="Kitchen Sink (Shield)">Kitchen Sink (Shield)</option>
						<option value="Siege Fleet">Siege</option>
						<option value="Caracal Fleet">Caracal</option>
						<option value="Baltec Fleet">Baltec</option>
						<option value="Alph Fleeta">Alpha</option>
						<option value="TFI Fleet">TFI</option>
						<option value="Dread Fleet">Dread</option>
						<option value="Das Boot Fleet">Das Boot</option>
						<option value="POS Rep Fleet">POS Rep Carriers</option>
						<option value="Supers Fleet">Supers</option>
					</select>

					<?php //TODO MAke this a DBO.TB data pull ?>
					<label>Comms (Mumble)</label>
					<select name="comms_channel">
						<option value="0" selected disabled>TBA</option>
						<option value="0" disabled>Strat Op</option>
						<option value="1">Op 1</option>
						<option value="2">Op 2</option>
						<option value="3">Op 3</option>
						<option value="4">Op 4</option>
						<option value="5">Op 5</option>
						<option value="6">Op 6</option>
						<option value="7">Op 7</option>
						<option value="8">Op 8</option>
						<option value="9">Op 9</option>
						<option value="10">Op 10</option>
						<option disabled>Skirmish</option>
						<option value="11">Op 11</option>
						<option value="12">Op 12</option>
						<option value="13">Op 13</option>
						<option value="14">Op 14</option>
					</select>

					<?php //TODO MAke this a DBO.TB data pull ?>
					<label>Reimbursable</label>
					<select name="reimb_rate">
						<option value="NA" selected>NA</option>
						<option value="gsf_peacetime">GSF Peacetime</option>
						<option value="gsf_stratop">GSF Strat Op</option>
						<option value="fcon_roam">FCON Roam</option>
						<option value="fcon_stratop">FCON StratOp</option>
						<option value="Other">Other</option>
					</select>
			</div>

			<div class="form_part_2">
				<h3 class="important">Optional Information:</h3>
				<label>DPS Anchor</label>
				<input type="input" name="dps_anchor" value=""/>

				<label>Backup Anchor</label>
				<input type="input" name="backup_anchor" value=""/>

				<label>Logi-channel</label>
				<input type="input" name="logi_channel" value=""/>

				<label>PAP Link</label>
				<input type="input" name="pap_link" value=""/>

				<label>Departing</label>
				<input type="input" name="depart_time" value=""/>

				<div class="maker_div">
					<button type="button" id="create_output">Make!</button>
					<button type="reset" id="clear_bttn">Clear</button>
				</div>
			</div>


			<div class="form_part_3">
				<h3 class="important">Results:</h3>
				<label>Your broadcast</label>
				<textarea rows="4" cols="50" class="your_braodcast_output"></textarea>

				<label>People to ping</label>
				<textarea rows="4" cols="50" class="ping_people_output"></textarea>

				<label>Fleet MotD</label>
				<textarea rows="4" cols="50" class="fleet_motd_output"></textarea>
			</div>
		</form>
		<div class="clear"></div>

		<!--// message bar -->
		<div id="msg_bar"></div>



        <!--// Framework (jQ/UI) includes -->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		
		<!--// and includes when the remote access calls fail -->
		<script>window.jQuery || document.write('<script type="text/javascript" src="components/jquery/jquery.min.js"><\/script>')</script>
		<script>window.jQuery || document.write('<script type="text/javascript" src="vendor/kraksoft/jquery-ui/jquery-ui.custom.min.js"><\/script>')</script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-ui.custom.min.js"><\/script>')</script>\>
        
        <!--// Custom scripts -->
        <script type="text/javascript">//<![CDATA[
        	//Always select the text when clicking on a textbox
			$("textarea").mouseup(function(e){
				e.preventDefault();
				$(this).focus().select();
			});



	        $("form#bcastm").on('click', '#create_output', function(){
	        	console.log("BCast maker button presses.");
	        	// TODO error checking. Add jquery validation plugin here



	        	var bcast_string = "";
	        	var motd_string = "";
				var form_data = $(this).parent().parent().parent().serialize();
	        	


	        	// Split string by & character
	        	form_data = form_data.split("&");
				
				// Now loop the array, break the values to k=>v pairs, and concatinate onto bcast_string
				$(form_data).each(function(key, value){

	        		// Iterate over that array creating the broadcast string
	        		value = value.split("=");

	        		// Convert field kery and value to human readable 
	        		value[0] = value[0].replace("_", " ");
	        		value[1] = value[1].replace("_", " ");
	        		value[1] = value[1].replace("+", " "); // damn you jQuery, not using %20 for spaces

	        		// Uppercase first letter for keys only. Values are up to the user to do.
					value[0] = value[0][0].toUpperCase() + value[0].substring(1);

	        		bcast_string += value[0]+": "+value[1] +" || ";
	        		motd_string  += value[0].toUpperCase()+": "+ value[1]+"\n";
				});

				bcast_string = bcast_string.substr(0,bcast_string.length-4);



				//Populate the broadcast textbox
				$("textarea.your_braodcast_output").val(bcast_string);

				//Populate the 'People to ping' textbox
				$("textarea.ping_people_output").val("thisperson: thatperson: thirdperson");

				//Populate fleet MotD textbox
				$("textarea.fleet_motd_output").val(motd_string);

				$("textarea.your_braodcast_output").focus().select()

				$("#msg_bar").text("Ping / MotD created!");



				return true;
	        });
		//]]></script>
	</body>
</html>