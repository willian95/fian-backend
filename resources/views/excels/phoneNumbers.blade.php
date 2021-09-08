


<table class="table">
    <thead>
        <tr>
            <th style="width: 50px; text-align:center;">Número</th>
            <th style="width: 50px;">Status</th>
            <th style="width: 50px;">Fecha de registro</th>
            <th style="width: 50px;">Fecha de validación</th>

        </tr>
    </thead>
    <tbody style="font-size: 12px;">
        @foreach($phoneNumbers as $phone)
        
            <tr>
                <td style="text-align: center;">
                    {{ $phone->phone_number }}
                </td>
                <td>
                    {{ $phone->validated_at ? 'Validado' : 'No validado' }}
                </td>
                <td>
                    {{ Carbon\Carbon::createFromFormat('Y-m-d', substr($phone->created_at, 0, 10))->format('d-m-Y') }}
                </td>
                <td>
                    @if($phone->validated_at)
                        {{ Carbon\Carbon::createFromFormat('Y-m-d', substr($phone->validated_at, 0, 10))->format('d-m-Y') }}
                    @endif
                </td>
            
                    
            </tr>
        @endforeach
    </tbody>
</table>