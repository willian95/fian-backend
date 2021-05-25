


<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th style="width: 50px;">Nombre</th>
            <th style="width: 50px;">Departamento</th>
            <th style="width: 50px;">Distrito</th>
            <th style="width: 50px;">Dirección</th>
            <th style="width: 50px;">Horario</th>

        </tr>
    </thead>
    <tbody style="font-size: 12px;">
        @foreach($markets as $market)
        
            <tr>
                <td>
                    {{ $loop->index + 1 }}
                </td>
                <td>
                    {{ $market->name }}
                </td>
                <td>
                    {{ $market->department->name }}
                </td>
                <td>
                    {{ $market->district }}
                </td>
                <td>
                    {{ $market->address }}
                </td>
                <td>
                    {{ $market->schedule }}
                </td>
            
                    
            </tr>
        @endforeach
    </tbody>
</table>