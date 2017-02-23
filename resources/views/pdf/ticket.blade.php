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
                        @if ($ticket['slogan'] == 1)
                        <img src="{{ URL::asset('images/tagline1.png') }}" style="width: 40%;float: right;margin: 25px 30px;"/>
                        @elseif ($ticket['slogan'] == 2)
                        <img src="{{ URL::asset('images/tagline2.png') }}" style="width: 40%;float: right;margin: 25px 30px;"/>
                        @elseif ($ticket['slogan'] == 3)
                        <img src="{{ URL::asset('images/tagline3.png') }}" style="width: 40%;float: right;margin: 25px 30px;"/>
                        @else
                        <img src="{{ URL::asset('images/tagline4.png') }}" style="width: 40%;float: right;margin: 25px 30px;"/>
                        @endif

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
                    <td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;"><span style="font-size: 17px;"><b>Gate - 13, 14, 15</b></span></td>
                    <td style="width: 50%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;"><span>VENUE : ARMY STADIUM,</span><br> <span style="display: block;margin-left: 67px;font-size: 14px;">Dhaka, Bangladesh</span></td>
                    <td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;">Reg ID : {{ $ticket['reg_id'] }}</td>
                </tr>
                <tr>
                    <td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;font-size: 13px;">Helpline : 01763953323 <br><span style="display: block;margin-left: 67px;">01777701337</span><span style="font-size: 12px;display: block;margin-left: 35px;">(10am - 8pm)</span></td>
                    <td style="width: 50%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;"><span>DATE : 7 March 2017</span><br> TIME : <span style="font-size: 14px;">Gates will open at 1:30 PM</span></td>
                    <td style="width: 25%;border: 2px solid #e6e6e6;border-spacing: 0px;padding: 12px;line-height: 18px;"><span style="font-size: 25px;text-align: center;display: block;"><b>Free Ticket</b></span></td>
                </tr>
            </table>
        </div>
        <div>
            <h3 style="text-align: center;margin: 5px 0px 5px;">Artist</h3>
            <p style="margin: 0;text-align: center;">SHUNNO - CHIRKUT - LALON - WARFAZE - ARBOVIRUS - SHIRONAMHIN - NEMESIS - CRYPTIC FATE</p>
            <p style="margin-bottom: 3px;"><b>**The Performance schedule is subject to change without prior notification.</b></p>
            <h3 style="text-align: center;margin: 0;">Terms and conditions</h3>
            <div style="position: relative;">
                <div>
                    <img style="width: 42%;position: absolute;left: 28%;top: 18px;opacity: 0.7;" src="{{ URL::asset('images/bg_logo.png') }}" alt=""/>
                </div>
                <div style="font-size: 10px;width: 86%;">
                    <ol type="1">
                        <li>For the sake of scanner reading, please print and bring the ticket to the venue.</li>
                        <li>This event is free for all. Registration is a prerequisite and this pass must be presented every time when entering the venue during the event.</li>
                        <li>Gates will open at 1:30 pm</li>
                        <li>Children below the age of 12 will not be allowed entry at the event.</li>
                        <li>No food or drink may be brought from outside. Food will be available inside the venue at reasonable prices. Water will also be available.</li>
                        <li>No food or drink (except bottled water brought at the venue) will be allowed anywhere else other than the food court.</li>
                        <li>Entry is limited and will be on a &quot;first come, first serve&quot; basis. Organizers reserve the right to shift the pass-holder to alternative locations.</li>
                        <li>Organizers reserve the right to refuse entry to or remove from the premises, person or people deemed as security threats, or elements of disturbance, or for any other reasons deemed inappropriate, at their discretion.</li>
                        <li>Organizers reserve the right to conduct security search from time to time and confiscate any item that may cause danger to other members of the audience or disrupt the event.</li>
                        <li>CCTV and film cameras will be operated at the venue. Attending the event signifies that the pass-holder has given consent to the filming and sound recording of themselves as a member of the audience with no obligations of any kind on the part of the organizers.</li>
                        <li>Organizers will take no responsibilities for loss or theft of any personal belongings or any other losses, injuries and damages to the holder of this pass.</li>
                        <li>Smoking, drinking alcohol or taking drugs will NOT be allowed at the event.</li>
                        <li>Any kind of video or sound recording is prohibited. Organizers reserve the right to confiscate such devices or items.</li>
                        <li>Audience should refrain from using mobile phones during sessions and all phones must be kept silent.</li>
                        <li>There will be no car parking facilities at the venue.</li>
                    </ol>
                </div>
                <div>
                    <img style="width: 14%;position: absolute;right: 0px;top: 22%;" src="{{ URL::asset('images/yb_qr.png') }}" alt=""/>
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
                font-family: serif;
            }
        </style>
    </body>
</html>
