{{-- <!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<body>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    {{ $header ?? '' }}

                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0"
                            style="border: hidden !important;">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                                role="presentation">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        {{ Illuminate\Mail\Markdown::parse($slot) }}

                                        {{ $subcopy ?? '' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{ $footer ?? '' }}
                </table>
            </td>
        </tr>
    </table>
</body>

</html> --}}
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }}</title>
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <style type="text/css">
        html {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
        }

        @media only screen and (max-device-width: 660px),
        only screen and (max-width: 660px) {
            .table800 {
                width: 100% !important;
            }

            .mob_100 {
                width: 100% !important;
                max-width: 100% !important;
            }
        }

        .table800 {
            width: 800px;
        }

        @media screen {
            .Roboto400 {
                font-family: 'Roboto', Arial, sans-serif !important;
                font-weight: 400 !important;
            }

            .Roboto500 {
                font-family: 'Roboto', Arial, sans-serif !important;
                font-weight: 500 !important;
            }

            .Roboto700 {
                font-family: 'Roboto', Arial, sans-serif !important;
                font-weight: 700 !important;
            }
        }
    </style>
</head>

<body style="margin: 0; padding: 0;">
    {{-- <span style="display: none !important; visibility: hidden; opacity: 0; color: #FFFFFF; height: 0; width: 0; font-size: 1px;">
        прехедер&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;
    </span> --}}
    <table style="background: #FFFFFF; min-width: 360px; font-size: 1px; line-height: normal;" width="100%"
        cellspacing="0" cellpadding="0" border="0">
        <tr em="group">
            <td valign="top" align="center">
                <!--[if (gte mso 9)|(IE)]>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr><td align="center" valign="top" width="800"><![endif]-->
                <table class="table800" style="width: 100%; max-width: 800px; min-width: 360px; background: #F4F4F4;"
                    width="800" cellspacing="0" cellpadding="0" border="0">
                    {{ $header ?? '' }}

                    <tr em="block">
                        <td style="background: #F4F4F4;" valign="top" align="center">
                            <table style="width: 75%; min-width: 330px;" width="75%" cellspacing="0" cellpadding="0"
                                border="0">
                                <tr>
                                    <td align="left">
                                        <div style="height: 30px; line-height: 30px; font-size: 8px;">&nbsp;</div>

                                        {{-- <div class="Roboto400"
                                            style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                            Dear [Client's Name],<br><br>Attached is the invoice for the
                                            [product/service] provided on [date]. We kindly request your prompt
                                            attention to settle the following details:<br>
                                        </div> --}}
                                        <div class="Roboto400" style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                            {{ Illuminate\Mail\Markdown::parse($slot) }}
                                        </div>

                                        <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                                        {{ $subcopy ?? '' }}
                                        <div style="height: 10px; line-height: 10px; font-size: 8px;">&nbsp;</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- <tr em="block">
                        <td style="background: #F4F4F4;" valign="top" align="center">
                            <table
                                style="width: 75%; min-width: 330px; background: #ffffff; border-width: 1px; border-style: solid; border-color: #eaeaea; box-shadow: 0px 0px 0px; border-radius: 10px;"
                                width="75%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td align="center">
                                        <table
                                            style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;"
                                            width="93%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                                                    </div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Invoice Number:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                                                    </div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;" width="50%"
                                                    align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                                                    </div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        [Invoice Number]</div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table
                                            style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;"
                                            width="93%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Invoice Date:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        [Invoice Date]</div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table
                                            style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;"
                                            width="93%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Due Date:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <a href="tel:+14843559888" target="_blank" class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px; text-decoration: none; white-space: nowrap;">[Due
                                                        Date]<br></a><br>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table style="width: 93%; min-width: 300px;" width="93%" cellspacing="0"
                                            cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Total Amount Due:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <a href="mailto:mail@gmail.com" target="_blank" class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px; text-decoration: none;">[Total
                                                        Amount]<br></a><br>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <div style="height: 10px; line-height: 10px; font-size: 8px;">&nbsp;</div>
                        </td>
                    </tr>
                    <tr em="block">
                        <td style="background: #F4F4F4;" valign="top" align="center">
                            <table style="width: 75%; min-width: 330px;" width="75%" cellspacing="0"
                                cellpadding="0" border="0">
                                <tr>
                                    <td align="left">
                                        <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                                        <div class="Roboto700"
                                            style="font-family: Arial, sans-serif; color: #000000; font-size: 22px; line-height: 28px; font-weight: bold;">
                                            Payment Details:<br></div>
                                        <div style="height: 10px; line-height: 10px; font-size: 8px;">&nbsp;</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr em="block">
                        <td style="background: #F4F4F4;" valign="top" align="center">
                            <table
                                style="width: 75%; min-width: 330px; background: #ffffff; border-width: 1px; border-style: solid; border-color: #eaeaea; box-shadow: 0px 0px; border-radius: 10px;"
                                width="75%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td align="center">
                                        <table
                                            style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;"
                                            width="93%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Payment Due By:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        [Due Date]</div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table
                                            style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;"
                                            width="93%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Payment Method:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        [Accepted Payment Method]</div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <div style="height: 10px; line-height: 10px; font-size: 8px;">&nbsp;</div>
                        </td>
                    </tr>
                    <tr em="block">
                        <td style="background: #F4F4F4;" valign="top" align="center">
                            <table style="width: 75%; min-width: 330px;" width="75%" cellspacing="0"
                                cellpadding="0" border="0">
                                <tr>
                                    <td align="left">
                                        <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                                        <div class="Roboto700"
                                            style="font-family: Arial, sans-serif; color: #000000; font-size: 22px; line-height: 28px; font-weight: bold;">
                                            Bank Transfer:</div>
                                        <div style="height: 10px; line-height: 10px; font-size: 8px;">&nbsp;</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr em="block">
                        <td style="background: #F4F4F4;" valign="top" align="center">
                            <table
                                style="width: 75%; min-width: 330px; background: #ffffff; border-width: 1px; border-style: solid; border-color: #eaeaea; box-shadow: 0px 0px 0px; border-radius: 10px;"
                                width="75%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td align="center">
                                        <table
                                            style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;"
                                            width="93%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Account Name:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        [Account Name]</div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table
                                            style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;"
                                            width="93%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Account Number:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        [Account Number]</div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table
                                            style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;"
                                            width="93%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Bank Name:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <a href="tel:+14843559888" target="_blank" class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px; text-decoration: none; white-space: nowrap;">[Bank
                                                        Name]<br></a>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table style="width: 93%; min-width: 300px;" width="93%" cellspacing="0"
                                            cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Swift Code:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <a href="mailto:mail@gmail.com" target="_blank" class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px; text-decoration: none;">[Swift
                                                        Code]<br></a>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <div style="height: 10px; line-height: 10px; font-size: 8px;">&nbsp;</div>
                        </td>
                    </tr>
                    <tr em="block">
                        <td style="background: #F4F4F4;" valign="top" align="center">
                            <table style="width: 75%; min-width: 330px;" width="75%" cellspacing="0"
                                cellpadding="0" border="0">
                                <tr>
                                    <td align="left">
                                        <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                                        <div class="Roboto700"
                                            style="font-family: Arial, sans-serif; color: #000000; font-size: 22px; line-height: 28px; font-weight: bold;">
                                            Credit Card:</div>
                                        <div style="height: 10px; line-height: 10px; font-size: 8px;">&nbsp;</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr em="block">
                        <td style="background: #F4F4F4;" valign="top" align="center">
                            <table
                                style="width: 75%; min-width: 330px; background: #ffffff; border-width: 1px; border-style: solid; border-color: #eaeaea; box-shadow: 0px 0px 0px; border-radius: 10px;"
                                width="75%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td align="center">
                                        <table
                                            style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;"
                                            width="93%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Cardholder Name:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        [Cardholder Name]</div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table
                                            style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;"
                                            width="93%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Card Number:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        [Card Number]</div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table
                                            style="width: 93%; min-width: 300px; border-width: 2px; border-style: solid; border-color: #F4F4F4; border-top: none; border-left: none; border-right: none;"
                                            width="93%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">Expiration Date:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <a href="tel:+14843559888" target="_blank" class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px; text-decoration: none; white-space: nowrap;">[Expiration
                                                        Date]<br></a>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table style="width: 93%; min-width: 300px;" width="93%" cellspacing="0"
                                            cellpadding="0" border="0">
                                            <tr>
                                                <td align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <div class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                                        <span style="color: #000000;">CVV:</span>
                                                    </div>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                                <td style="width: 10px;" width="10">&nbsp;</td>
                                                <td style="width: 50%; max-width: 50%; min-width: 190px;"
                                                    width="50%" align="left">
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                    <a href="mailto:mail@gmail.com" target="_blank" class="Roboto400"
                                                        style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px; text-decoration: none;">[CVV]<br></a>
                                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">
                                                        &nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <div style="height: 30px; line-height: 30px; font-size: 28px;">&nbsp;</div>
                        </td>
                    </tr>
                    <tr em="block">
                        <td style="background: #F4F4F4;" valign="top" align="center">
                            <table style="width: 75%; min-width: 330px;" width="75%" cellspacing="0"
                                cellpadding="0" border="0">
                                <tr>
                                    <td align="left">
                                        <div class="Roboto400"
                                            style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                                            Please ensure to include the invoice number [Invoice Number] in the payment
                                            reference.<br><br>Should you have any questions or need assistance, feel
                                            free to contact our support team at [Support Email/Phone].<br><br>Thank
                                            you.<br><br>Best regards,<br><br>[Your Name]<br><br>[Your
                                            Title/Position]<br><br>[Company Name]<br></div>
                                        <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                                        <div style="height: 30px; line-height: 30px; font-size: 8px;">&nbsp;</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> --}}


                    {{ $footer ?? '' }}
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td></tr>
                </table><![endif]-->
            </td>
        </tr>
    </table>

</body>

</html>
