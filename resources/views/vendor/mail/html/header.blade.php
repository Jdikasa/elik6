@props(['url'])
<tr em="block">
    <td style="background: {{ $color }}; padding-bottom: 30px;" valign="top" bgcolor="{{ $color }}" align="center">
        <table style="width: 75%; min-width: 330px;" width="75%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td align="left">
                    <div style="height: 30px; line-height: 30px; font-size: 8px;">&nbsp;</div>
                    <a href="{{ $url }}" target="_blank" style="display: block; max-width: 178px;">
                        @if (trim($slot) === 'Laravel')
                            <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"
                            style="display: block; width: 100%; max-width: 130px;"
                            width="130" border="0">
                        @else
                            {{ $slot }}
                        @endif
                    </a>
                </td>
            </tr>
        </table>
    </td>
</tr>

{{-- <tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr> --}}
