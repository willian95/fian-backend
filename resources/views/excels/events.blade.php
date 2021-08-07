


<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th style="width: 30px;">Fecha</th>
            <th style="width: 30px;">Fase lunar</th>
            <th style="width: 30px;">Actividades</th>

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

                <td colspan="3">
                    @foreach($event->farmActivityEvents as $activity)

                        {{ $activity->farmActivity->name }}
                    
                    @endforeach
                </td>
                    
            </tr>
            
        @endforeach
        
    </tbody>
</table>