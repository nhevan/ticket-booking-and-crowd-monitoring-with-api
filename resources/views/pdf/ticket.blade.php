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
				  	<td colspan="2" style="border: 2px solid #e6e6e6;border-spacing: 0px;padding: 14px;line-height: 20px;">
					  	<img src="{{ URL::asset('images/logo.png') }}" style="width: 30%;float: left;"/>
					  	<img src="{{ URL::asset('images/tagline.png') }}" style="width: 30%;float: right;margin: 26px;"/>
				  	</td>
				  	<td style="border: 2px solid #e6e6e6;border-spacing: 0px;padding: 0px;line-height: 20px;">
					  	<table style="border-spacing: 0px;">
						  	<tr>
							  	<td style="border-bottom: 4px solid #e6e6e6;border-spacing: 0px;padding: 14px;"><img src="{{ URL::asset('images/barcode.jpg') }}" style="width: 100%;"/></td>
						  	</tr>
						  	<tr>
							  	<td style="padding: 14px;">
								  	<span><b>{{ $data['name'] }}</b></span><br>
								  	<span>{{ $data['phone'] }}</span><br>
								  	<span>{{ $data['email'] }}</span>
							  	</td>
						  	</tr>
					  	</table>
				  	</td>
			  	</tr>
			  	<tr>
				  	<td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 14px;line-height: 20px;"><span style="font-size: 20px;"><b>Gate - {{ $data['gate'] }}</b></span></td>
				  	<td style="width: 50%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 14px;line-height: 20px;"><span>VENUE : ARMY STADIUM,</span><br> <span style="display: block;margin-left: 67px;font-size: 14px;">Dhaka, Bangladesh</span></td>
				  	<td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 14px;line-height: 20px;">Reg ID : {{ $data['reg_id'] }}</td>
			  	</tr>
			  	<tr>
				  	<td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 14px;line-height: 20px;">Helpline : 01556888777 <br><span style="font-size: 14px;display: block;margin-left: 35px;">(10am - 8pm)</span></td>
				  	<td style="width: 50%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 14px;line-height: 20px;"><span>DATE : 7 March 2017</span><br> TIME : <span style="font-size: 14px;">Gates will open at 1:30 PM</span></td>
				  	<td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 14px;line-height: 20px;"><span style="font-size: 25px;text-align: center;display: block;"><b>Free Ticket</b></span></td>
			  	</tr>
		  	</table>
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
