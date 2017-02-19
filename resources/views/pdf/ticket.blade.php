<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="chrome=1">
		<title>Ticket</title>
		<meta name="viewport" content="width=device-width">
		<!--[if lt IE 9]>
		<![endif]-->
	</head>
  	<body style="">
	  	<div>
		  	<table style="border: 2px solid #e6e6e6;border-spacing: 0px;width: 100%;">
			  	<tr>
				  	<td colspan="2" style="border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;">
					  	<img src="{{ URL::asset('images/logo.png') }}" style="width: 36%;float: left;"/>
					  	<img src="{{ URL::asset('images/tagline.png') }}" style="width: 30%;float: right;margin: 30px 50px;"/>
				  	</td>
				  	<td style="border: 2px solid #e6e6e6;border-spacing: 0px;padding: 0px;line-height: 18px;">
					  	<table style="border-spacing: 0px;">
						  	<tr>
							  	<td style="border-bottom: 4px solid #e6e6e6;border-spacing: 0px;padding: 12px;"><img src="data:image/png;base64,{{$ticket['barcode']}}" style="width: 100%; height: 90px;"/></td>
						  	</tr>
						  	<tr>
							  	<td style="padding: 12px;">
								  	<span><b>{{ $ticket['name'] }}</b></span><br>
								  	<span>{{ $ticket['phone'] }}</span><br>
								  	<span>{{ $ticket['email'] }}</span>
							  	</td>
						  	</tr>
					  	</table>
				  	</td>
			  	</tr>
			  	<tr>
				  	<td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;"><span style="font-size: 20px;"><b>Gate - 13, 14, 15</b></span></td>
				  	<td style="width: 50%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;"><span>VENUE : ARMY STADIUM,</span><br> <span style="display: block;margin-left: 67px;font-size: 14px;">Dhaka, Bangladesh</span></td>
				  	<td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;">Reg ID : {{ $ticket['reg_id'] }}</td>
			  	</tr>
			  	<tr>
				  	<td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;">Helpline : 01556888777 <br><span style="font-size: 14px;display: block;margin-left: 35px;">(10am - 8pm)</span></td>
				  	<td style="width: 50%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;"><span>DATE : 7 March 2017</span><br> TIME : <span style="font-size: 14px;">Gates will open at 1:30 PM</span></td>
				  	<td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;"><span style="font-size: 25px;text-align: center;display: block;"><b>Free Ticket</b></span></td>
			  	</tr>
		  	</table>
	  	</div>
	  	<div>
			<h3 style="text-align: center;margin: 5px 0px 5px;">Artist</h3>
			<p style="margin: 0;text-align: center;">SHUNNO - LALON - WARFAZE - ARBOVIRUS - SHIRONAMHIN - NEMESIS - CRYPTIC FATE</p>
			<p style="margin-bottom: 3px;"><b>**The Performance schedule is subject to change without prior notification.</b></p>
			<h3 style="text-align: center;margin: 0;">Terms and conditions</h3>
			<div style="position: relative;">
				<div>
					<img style="width: 42%;position: absolute;left: 28%;top: 18px;" src="{{ URL::asset('images/bg_logo.png') }}" alt=""/>
				</div>
				<div style="font-size: 13px;">
					<ol type="1">
						<li>For the sake of scanner reading, please print and bring the ticket to the event.</li>
						<li>This event is free for all. Registration is a prerequisite and this pass must be presented every time when entering the venue during the event</li>
						<li>Gates will open at 1:30 pm</li>
						<li>Children below the age of 12 will not be allowed entry at the event.</li>
						<li>No food or drink may be brought in from outside. Food will be available at a reasonable price. Water will also be available.</li>
						<li>No food or any drink (other than bottled water bought at the venue) will be allowed inside the stadium.</li>
						<li>Entry is limited and are on first come, first served basis. The organizers reserve the right to move and provide an alternative location for the pass holder.</li>
						<li>The organizers reserve the right to refuse entry or to remove the premises, people or persons deemed as a security threat and an element of disturbance, or for any other reasons deemed appropriate, at their discretion.</li>
						<li>The organizers reserve the right to conduct security searches from time to time and reserve the right to confiscate any item which may cause danger or disruption to other members of the audience.</li>
						<li>CCTV and film cameras will be present at the venue. Attending the event signifies the pass holders consent to the filming and sound recording of themselves as members of the audiences with no obligations of any kind of the organizers part.</li>
						<li>The organizers will take no responsibilities for loss or theft of any person’s belongings or any loss, injury and damage to the holder of this pass.</li>
						<li>No smoking, alcohol or drugs of any type is allowed inside the event.</li>
						<li>The use of any video and sound recording is prohibited. The organizers reserve the right to confiscate such items.</li>
						<li>Audience should refrain from using mobile phones during sessions and phones must be kept on silent mode.</li>
						<li>No car parking is available.</li>
					</ol>
				</div>
			</div>
		</div>
	  	<div style="width: 100%;">
		  	<img style="max-width: 210mm;position: absolute;bottom: 0;" src="{{ URL::asset('images/footer_banner.png') }}" alt=""/>
	  	</div>
  		
	    <style>
		    body {
		        height: 297mm;
		        width: 210mm;
		        /* to centre page on screen*/
		        margin-left: auto;
		        margin-right: auto;
		        position: relative;
		    }
	    </style>
	</body>
</html>
