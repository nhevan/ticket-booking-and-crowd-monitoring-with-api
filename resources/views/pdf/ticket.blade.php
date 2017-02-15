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
					  	<img src="{{ URL::asset('images/logo.png') }}" style="width: 30%;float: left;"/>
					  	<img src="{{ URL::asset('images/tagline.png') }}" style="width: 30%;float: right;margin: 26px;"/>
				  	</td>
				  	<td style="border: 2px solid #e6e6e6;border-spacing: 0px;padding: 0px;line-height: 18px;">
					  	<table style="border-spacing: 0px;">
						  	<tr>
							  	<td style="border-bottom: 4px solid #e6e6e6;border-spacing: 0px;padding: 12px;"><img src="data:image/png;base64,{{ $data['barcode'] }}" style="width: 100%; height: 90px;"/></td>
						  	</tr>
						  	<tr>
							  	<td style="padding: 12px;">
								  	<span><b>{{ $data['name'] }}</b></span><br>
								  	<span>{{ $data['phone'] }}</span><br>
								  	<span>{{ $data['email'] }}</span>
							  	</td>
						  	</tr>
					  	</table>
				  	</td>
			  	</tr>
			  	<tr>
				  	<td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;"><span style="font-size: 20px;"><b>Gate - {{ $data['gate'] }}</b></span></td>
				  	<td style="width: 50%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;"><span>VENUE : ARMY STADIUM,</span><br> <span style="display: block;margin-left: 67px;font-size: 14px;">Dhaka, Bangladesh</span></td>
				  	<td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;">Reg ID : {{ $data['reg_id'] }}</td>
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
					<img style="width: 35%;position: absolute;left: 31%;top: 18px;" src="{{ URL::asset('images/bg_logo.png') }}" alt=""/>
				</div>
				<div>
					<ol type="1">
						<li>For the sake of scanner reading, Please print in laser.</li>
						<li>This event is free for all. Registration is a prerequisite and this ticker must be presented every time when entering the venue during the event.</li>
						<li>Gates open at 1:30pm</li>
						<li>Children below the age of 12 (twelve) will not be allowed entry at the event.</li>
						<li>No food or drink maybe brought in from outside. Food will be available at a reasonable price. Water will also be available.</li>
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
