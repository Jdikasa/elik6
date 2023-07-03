{{-- <tr>
    <td>
        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td class="content-cell" align="center">
                    {{ Illuminate\Mail\Markdown::parse($slot) }}
                </td>
            </tr>
        </table>
    </td>
</tr> --}}

<tr em="block">
    <td style="background: {{ $color }};" valign="top" bgcolor="{{ $color }}" align="center">
        <div style="height: 60px; line-height: 60px; font-size: 8px;">&nbsp;</div>
        <table style="width: 75%; min-width: 330px; border-width: 2px; border-style: solid; border-color: #E4E4E4; border-left: none; border-right: none; border-bottom: none;"
            width="75%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td align="left">
                    <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>

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

                    <div dir="ltr" style="display: inline-block; vertical-align: top; width: 100%; max-width: 358px;">
                        <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td valign="top" align="left">
                                    <div class="Roboto400"
                                        style="font-family: Arial, sans-serif; color: #ffffff; font-size: 12px; line-height: 17px;">
                                        <span style="color: #ffffff;">
                                            {{ Illuminate\Mail\Markdown::parse($slot) }}
                                        </span>
                                        <br>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div style="height: 60px; line-height: 60px; font-size: 8px;">&nbsp;</div>
                </td>
            </tr>
        </table>
    </td>
</tr>
