<!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="components/normalize.css/normalize.css">
        <link rel="stylesheet" href="components/html5-boilerplate/css/main.css">
        <script src="components/modernizr/modernizr.js"></script>

		<title>CFC Broadcast Maker</title>

		<link rel="stylesheet" type="text/css" href="css/application.css">

        <!-- if IE 8 or below styles-->
        <!--[if lt IE 9]><link rel="stylesheet" href="ie_fix.css"><![endif]-->
    </head>
	<body>
		<form id="bcastm">
			<div class="form_part_1">
					<h3 class="important">Requirted Inforamtion:</h3>
					<label>Fleet Name</label>
					<input type="text" class="fleet_name" value="" />

					<label>FC</label>
					<input type="text" value="" />

					<label>Form up location</label>
					<input type="text" value="" />

					<label>Fleet Comp</label>
					<select>
						<option value="0" selected>TBA</option>
						<option value="1">Kitchen Sink (Armor)</option>
						<option value="2">Kitchen Sink (Shield)</option>
						<option value="3">Siege</option>
						<option value="4">Caracal</option>
						<option value="5">Baltec</option>
						<option value="6">Alpha</option>
						<option value="6">TFI</option>
						<option value="6">Dread</option>
						<option value="6">Das Boot</option>
						<option value="6">POS Rep Carriers</option>
						<option value="6">Supers</option>
					</select >

					<?php //TODO MAke this a DBO.TB data pull ?>
					<label>Comms</label>
					<select >
						<option value="0" selected>Skirmish</option>
						<option value="11">Op 11</option>
						<option value="12">Op 12</option>
						<option value="13">Op 13</option>
						<option value="14">Op 14</option>
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
					</select >

					<?php //TODO MAke this a DBO.TB data pull ?>
					<label>Reimbursable</label>
					<select>
						
						<option value="0" selected>N/A</option>
						<option value="gsf_peacetime">GSF Peacetime</option>
						<option value="gsf_stratop">GSF Strat Op</option>
						<option value="fcon_roam">FCON Roam</option>
						<option value="fcon_stratop">FCON StratOp</option>
						<option value="Other">Other</option>
					</select>
			</div>

			<div class="form_part_2">
				<h3 class="important">Optional Inforamtion:</h3>
				<label>DPS anchor</label>
				<input type="input" name="logi_channel" value=""/>

				<label>Backup anchor</label>
				<input type="input" name="logi_channel" value=""/>

				<label>Logi channel</label>
				<input type="input" name="logi_channel" value=""/>

				<label>PAP Link</label>
				<input type="input" name="departure_time" value=""/>

				<label>Departure time</label>
				<input type="input" name="departure_time" value=""/>

				<div class="maker_div">
					<button type="button" id="create_output">Make Broadcast / Motd</button>
				</div>
			</div>


			<div class="form_part_3">
				<h3 class="important">Results:</h3>
				<label>Your broadcast</label>
				<textarea  rows="4" cols="50" name="fleet_comp"></textarea>

				<label>People to ping</label>
				<textarea rows="4" cols="50" name="ping_people"></textarea>

				<label>Fleet MotD</label>
				<textarea rows="4" cols="50" name="fleet_motd"></textarea>
			</div>
		</form>
		<div class="clear"></div>

		<!-- message bar -->
		<div id="msg_bar">
			asdfasdfasdf
		</div>

        <!-- Framework (jQ/UI) includes -->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="components/jquery/jquery.min.js"><\/script>')</script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="vendor/kraksoft/jquery-ui/jquery-ui.custom.min.js"><\/script>')</script>
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

        <!-- Custom scripts -->
        <script type="text/javascript">//<![CDATA[
        $("form#bcastm").on('click', '#create_output', function(){
        	console.log("BCast maker button presses.")

        	var bcast_string = "";
			var form_data = $(this);

        	//for the value of each input or dropdown field. concat to gether followed by a ||
        	
        	form_data.each(':input :select', function () {
                    console.log($(this).val());
            });
			
			return true;
        });
		//]]></script>
	</body>
</html>
<!--//
CARACAL FLEET
OP3 || Fleet Name: Caracalfleet 0100 || FC: Vee || Reimbursable: Stratop || Formup: B-D
1x tengu/5x loki boosters > caracals > scythes > lachesis/huginn > celestis/bellicose > hictor/dictor



REGION COMMANDER
DASHBOARD 



MUMBLE OP 2 <-- Mumble channel. Make sure it's right.

BALTECFLEET <-- Doctrine name.

BONUS LOKIS/LEGION > ONEIROS/GUARDIAN/EXEQUROR/AUGOROR > WEB LOKIS/PROTEUSES > MEGATHRONS > HICTORS/ARMAGEDDONS > CELESTIS > TACKLE
https://goonfleet.co...ost__p__7236133
MEGATHRONS: RAILS - STD FITS <-- This denotes any variations of your fittings.
BOOSTING LOKIS: If you are not in a Wing Command spot, spam "WC WC WC WC" in fleet until you get moved.

FORMUP 4-EP 12-1 (pw 420) <-- This is the formup location. 
GET UNDOCKED GET TO THE POS < -- You can change this to STAY DOCKED if you want.

LOGI CHANNEL: BIGAUGSWARM <-- The logi channel of the fleet. FREEDOMLOGI, EG.LOGI and LITTLEAUGSWARM also exist.
DPS ANCHOR: SANREIKO MEI <-- Main DPS anchor for the fleet, if an anchor is a thing.
BACKUP ANCHORS: SCHADENFREUD <-- Backup anchors are FUCKING IMPORTANT put your backup FC here.

CFC FLEET PAP LINK: https://adashboard.i...ation/fuckGoons <-- Paste the paplink here so people don't ask for it.

DEPARTING AT 19:50 <-- Other random shit can go here too.

-->