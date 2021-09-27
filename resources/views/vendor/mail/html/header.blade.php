<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Diário Oficial Eletrônico')
<img src="https://raw.githubusercontent.com/prefeiturariobranco/novo-diario-eletronico/main/public/img/logo.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
