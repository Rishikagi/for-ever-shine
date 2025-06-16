
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="images/favicon.png" type="image/x-icon">

        <title>Registration Successful</title>

        <link
            href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <style type="text/css">


            h5 {
                margin: 10px;
                color: #777;
            }

            .how-work li:after {
                content: '';
                position: absolute;
                top: 50%;
                left: -21px;
                width: 2px;
                height: 70%;
                background-color: #7e7e7e;
                transform: translateY(-50%);
            }

            .how-work li:first-child::after {
                content: none;
            }

            .main-bg-light {
                background-color: #fafafa;
            }
        </style>

    </head>

    <body style="margin: 20px auto; text-align: center;width: 650px;font-family: 'Rubik', sans-serif;background-color: #e2e2e2;display: block;">
        <table align="center" border="0" cellpadding="0" cellspacing="0"
            style="background-color:  #143C5E; color: #fff; width: 100%; box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);-webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);">
            <tbody>
                <tr>
                    <td style="padding: 10px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr class="header">
                                <td align="center" valign="top">
                                    <div style="display: inline-block; width: 100%; text-align: center; margin: 0 auto;">
                                        <a href="{{ url('/') }}" target="_blank" style="text-decoration: none;">
                                        <img src="{{ asset('assets/images/Logo.png')}}" style="padding: 4px 15px; text-align:center;">
                                        </a>
                                    </div>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        <table align="center" border="0" cellpadding="0" cellspacing="0"
            style="background-color: white; width: 100%; padding: 0 30px; box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);">
            <tbody>
                <tr>
                    <td class="welcome-image" style="margin-bottom:30px;display: block;">
                        <img src="{{ asset('email_templates/welcome.jpg') }}" style="width: 100%; margin-top: 20px;" alt="">
                    </td>

                    <td class="welcome-name" style="margin-bottom:10px 0 30px;text-align: left; display: block;font-weight: normal;color: #232323;line-height: 1.6;letter-spacing: 0.05em;">
                        <h4 style="text-transform: capitalize; margin: 0; font-weight: 500; color: #232323"><b>Hi {{ ucfirst($name) }}</b></h4>
                        <h4>Thank you for registration</h4>
                    </td>
 
                    <td class="welcome-details" style="margin-bottom:30px;display: block;">
                        <p style=" font-weight: normal;font-size: 14px;color: #232323; line-height: 1.6;letter-spacing: 0.05em;margin: 0;text-align: justify;">If you have any question, please email us at  transformation@villageartisan.com.</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="main-bg-light text-center"
            style="margin-top: 0; text-align: right;background-color: #143C5E; color: #fff;" align="center" border="0"
            cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td style="text-align: start;">
                    <table  cellpadding="0" cellspacing="0" class="footer-social-icon " align="right"
                        style="width:100%; margin: -5px 0 0 0; text-align: center;">
                        <tr>
                            <div style="display: inline-block; width: 50%; text-align: center;">
                                <h2>Follow Us :</h2>
                            </div>
                            <div style="display:inline-block;width:48%;margin-left:8px;text-align:left;float: right;margin-top: 16px;">
                                
                                    <a href="#" style="text-decoration: none;padding-right:10px" target="_blank">
                                        <img src="{{ asset('email_templates/fb.png') }}" alt="Facebook"
                                            style="margin: 0 10px -8px 0; width: 19px;background: #fff; padding: 6px;border-radius: 50%;">
                                    </a> 
                                
                                    <a href="#" style="text-decoration: none;padding-right:10px" target="_blank">
                                        <img src="{{ asset('email_templates/insta.png') }}"
                                            alt="Instagram"
                                            style="margin: 0 10px -8px 0; width: 19px;background: #fff; padding: 6px;border-radius: 50%;">
                                    </a> 
                                
                                    <a href="#" style="text-decoration: none;padding-right:10px" target="_blank">
                                        <img src="{{ asset('email_templates/youtube.png') }}"
                                            alt="Linkedin"
                                            style="margin: 0 10px -8px 0; width: 19px;background: #fff; padding: 6px;border-radius: 50%;">
                                    </a>
                                
                            </div>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>

</html>