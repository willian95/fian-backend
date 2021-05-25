


<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th style="width: 30px;">Fecha</th>
            <th style="width: 30px;">Fase lunar</th>

        </tr>
    </thead>
    <tbody style="font-size: 12px;">
        @foreach($events as $event)
        
            <tr>
                <td>
                    {{ $loop->index + 1 }}
                </td>
                <td>
                    {{ $event->date }}
                </td>
                <td>
                    {{ $event->moon_phase }}
                </td>
                    
            </tr>
            <tr>
                <td colspan="3">Actividades</td>
            <tr>
            @foreach($event->farmActivityEvents as $activity)

                <tr>
                    <td colspan="3">
                        {{ $activity->farmActivity->name }}
                    </td>
                </tr>

            @endforeach
            <tr></tr>
            <tr></tr>

        @endforeach
        
    </tbody>
</table>