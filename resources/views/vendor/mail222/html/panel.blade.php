{{-- <table class="panel" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td class="panel-content">
            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td class="panel-item">
                        {{ Illuminate\Mail\Markdown::parse($slot) }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table> --}}
<table style="width: 100%; max-width: 800px; min-width: 360px; background: #F4F4F4;" width="800" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td style="background: #F4F4F4;" valign="top" align="center">
            <table style="width: 75%; min-width: 330px;" width="75%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td align="left">
                        {{ Illuminate\Mail\Markdown::parse($slot) }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

