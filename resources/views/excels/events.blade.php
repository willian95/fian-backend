


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

            @foreach($event->farmActivityEvents as $activity)

                @if($loop->index == 0)
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
                        <td>
                            {{ $activity->farmActivity->name }}
                        </td>
                            
                    </tr>
                @else
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            {{ $activity->farmActivity->name }}
                        </td>
                    </tr>
                @endif
                
      


            @endforeach
            <tr></tr>
            <tr></tr>

        @endforeach
        
    </tbody>
</table>