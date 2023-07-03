@component('mail::message')
    @component('mail:header', ['color' => '#000000', 'url' => '#'])

    @endcomponent
    
    {!! $textmessage !!}

    {{-- @component('mail::button', ['url' => $url])
    View Order
    @endcomponent --}}

    <br><br>
    {{ config('app.name') }}
    @component('mail::footer', ['color' => '#000000'])
        <!--[if (gte mso 9)|(IE)]>
            <table border="0" cellspacing="0" cellpadding="0">
            <tr><td dir="ltr" align="center" valign="top" width="240"><![endif]-->
        <div dir="ltr" style="display: inline-block; vertical-align: top; width: 240px;">
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td width="77" valign="middle" align="center">
                        <a href="" target="_blank" style="display: block; max-width: 47px;">
                            <img src="https://cdn.useblocks.io/1865/230609_431_9ONrv8b.png" alt=""
                                style="display: block; width: 100%; max-width: 100px;" width="100" border="0">
                        </a>
                    </td>
                    <td width="35" valign="bottom" align="left">
                        <a href="" target="_blank" style="display: block; max-width: 27px;">
                            <img src="https://cdn.useblocks.io/1865/230621_431_izI2oyk.png" alt=""
                                style="display: block; width: 100%; max-width: 27px;" width="27" border="0">
                        </a>
                    </td>
                    <td width="35" valign="bottom" align="left">
                        <a href="" target="_blank" style="display: block; max-width: 27px;">
                            <img src="https://cdn.useblocks.io/1865/230621_431_jVC1IUC.png" alt=""
                                style="display: block; width: 100%; max-width: 27px;" width="27" border="0">
                        </a>
                    </td>
                    <td width="35" valign="bottom" align="left">
                        <a href="" target="_blank" style="display: block; max-width: 27px;">
                            <img src="https://cdn.useblocks.io/1865/230621_431_s54cegB.png" alt=""
                                style="display: block; width: 100%; max-width: 27px;" width="27" border="0">
                        </a>
                    </td>
                    <td valign="bottom" align="left">
                        <a href="" target="_blank" style="display: block; max-width: 27px;">
                            <img src="https://cdn.useblocks.io/1865/230621_431_jNSOxOc.png" alt=""
                                style="display: block; width: 100%; max-width: 27px;" width="27" border="0">
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <!--[if (gte mso 9)|(IE)]></td><td dir="ltr" align="center" valign="top" width="360"><![endif]-->
        <div dir="ltr" style="display: inline-block; vertical-align: top; width: 100%; max-width: 358px;">
            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td valign="top" align="left">
                        <div class="Roboto400"
                            style="font-family: Arial, sans-serif; color: #ffffff; font-size: 12px; line-height: 17px;">
                            <span style="color: #ffffff;">You’ve received this email
                                because you subscribed to&nbsp;get our updates. <a href="" target="_blank"
                                    class="Roboto400"
                                    style="font-family: Arial, sans-serif; color: #ffffff; font-size: 12px; line-height: 17px; text-decoration: underline;">Unsubscribe</a></span><br>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <!--[if (gte mso 9)|(IE)]>
            </td></tr>
            </table><![endif]-->
    @endcomponent
@endcomponent

