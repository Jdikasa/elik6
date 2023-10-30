{{-- <table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td>
            {{ Illuminate\Mail\Markdown::parse($slot) }}
        </td>
    </tr>
</table> --}}

<table style="width: 75%; min-width: 330px;" width="75%" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td align="left">
            <div class="Roboto400" style="font-family: Arial, sans-serif; color: #000000; font-size: 15px; line-height: 21px;">
                {{ Illuminate\Mail\Markdown::parse($slot) }}
            </div>
            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
            <div style="height: 30px; line-height: 30px; font-size: 8px;">&nbsp;</div>
        </td>
    </tr>
</table>
