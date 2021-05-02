@extends("layouts.main")

@push("styles")
    <link href="{{ asset('fullcalendar/lib/main.css') }}" rel='stylesheet' />
@endpush

@section("content")

    <div class="container" id="dev-login">
        <div class="row">
            <div class="col-md-12">
                <div id='calendar'></div>
            </div>
        </div>

        <div class="modal fade eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 offset-md-8">
                                @{{ actualDate }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="">Fase lunar</label>
                                    <select class="form-control" v-model="moonPhase">
                                        <option value="llena">Luna llena</option>
                                        <option value="creciente">Luna Creciente</option>
                                        <option value="menguante">Luna Menguante</option>
                                        <option value="nueva">Luna Nueva</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3" v-for="activity in farmActivities">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" :id="'activity'+activity.id" @click="toggleActivity(activity.id)">
                                    <img :src="activity.icon" alt="" style="width: 40px;">
                                    <label class="form-check-label" :for="'activity'+activity.id">@{{ activity.name }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" v-if="edit == false" @click="storeEvent()">Crear evento</button>
                    <button type="button" class="btn btn-primary" v-else @click="updateEvent()">Actualizar evento</button>
                </div>
                </div>
            </div>
        </div>
    
    </div>

@endsection

@push("scripts")
    <script src="{{ asset('fullcalendar/lib/main.js') }}"></script>

    

    <script type="text/javascript">

        var sync = false;
        var date = "";
    
        const app = new Vue({
            el: '#dev-login',
            data() {
                return {
                    moonPhase:"llena",
                    actualDate:"",
                    month:"",
                    year:"",
                    farmActivities:[],
                    selectedActivities:[],
                    events:[],
                    edit:false
                }
            },
            methods: {

                async getFarmActivities(){

                    let res = await axios.get("{{ url('get-farm-activities') }}")
                    this.farmActivities = res.data

                },
                toggleActivity(id){

                    let exists = this.selectedActivities.includes(id)
                    if(exists == false){
                        this.selectedActivities.push(id)
                    }else{


                        this.selectedActivities.forEach((data, index) => {

                            if(data == id){
                                this.selectedActivities.splice(index, 1)
                            }

                        })

                    }

                },
                async storeEvent(){

                    try{

                        let res = await axios.post("{{ url('/event-store') }}", {"activities": this.selectedActivities, "moonPhase": this.moonPhase, "date": this.actualDate})
                        if(res.data.success == true){

                            swal({
                                text:res.data.msg,
                                icon: "success"
                            }).then(ans => {

                                $('.eventModal').modal('hide')
                                $('.modal-backdrop').remove()
                                
                                calendar.addEvent({
                                    id: res.data.event.id,
                                    title: this.actualDate,
                                    start: this.actualDate,
                                    allDay: true,
                                    moon_phase:this.moonPhase,
                                    farmActivities:this.selectedActivities
                                })

                                this.events.push(res.data.event)
                                

                                this.selectedActivities = []

                                $(".form-check-input").prop("checked", false)

                            })

                        }else{

                            swal({
                                text:res.data.msg,
                                icon: "error"
                            })

                        }

                    }catch(err){

                        $.each(err.response.data.errors, function(key, value) {
                            alert(value)
                        })

                    }

                },
                async updateEvent(){

                    try{

                        let res = await axios.post("{{ url('/event-update') }}", {"activities": this.selectedActivities, "moonPhase": this.moonPhase, "date": this.actualDate})
                        if(res.data.success == true){

                            swal({
                                text:res.data.msg,
                                icon: "success"
                            }).then(ans => {

                                $('.eventModal').modal('hide')
                                $('.modal-backdrop').remove()

                                let event = calendar.getEventById(res.data.event.id)
                                event.remove()
                                
                                calendar.addEvent({
                                    id: res.data.event.id,
                                    title: this.actualDate,
                                    start: this.actualDate,
                                    allDay: true,
                                    moon_phase:this.moonPhase,
                                    farmActivities:this.selectedActivities
                                })
                                
                                this.events.forEach((data, index) => {

                                    if(data.id == res.data.event.id){
                            
                                        this.events.splice(index, 1)
                                    }

                                })

                                this.events.push(res.data.event)


                                this.selectedActivities = []

                                $(".form-check-input").prop("checked", false)

                            })

                        }else{

                            swal({
                                text:res.data.msg,
                                icon: "error"
                            })

                        }

                    }catch(err){

                        $.each(err.response.data.errors, function(key, value) {
                            alert(value)
                        })

                    }

                },
                async getEvents(){

                    let res = await axios.post("{{ url('/event-fetch') }}", {month: this.month, year: this.year})
                    this.events = res.data.events

                    this.events.forEach(data => {

                        calendar.addEvent({
                            id:data.id,
                            title: data.date,
                            start: data.date,
                            allDay: true,
                            moon_phase:data.moon_phase,
                            farmActivities:data.farm_activity_events
                        })

                    })

                },
                checkForEventsWhenDayClicked(){
                    $(".form-check-input").prop("checked", false)
                    this.events.forEach((data) => {
                        
                        if(this.actualDate == data.date){
                   
                            this.edit = true
                            this.moonPhase = data.moon_phase
                            this.selectedActivities = []
                           
                            data.farm_activity_events.forEach(farmActivity => {
                                
                                this.selectedActivities.push(farmActivity.farm_activity_id)
                                $("#activity"+farmActivity.farm_activity_id).prop("checked", true)

                            })

                        }

                    })

                },
                removeAllEvents(){

                    this.events.forEach(data => {

                        let event = calendar.getEventById(data.id)
                        event.remove()

                    })

                }

            },
            created() {

                this.getFarmActivities()
                
                window.setInterval(() => {
                    
                    if(sync == true){
                        this.edit = false
                        sync = false;
                        this.actualDate = date
                        this.selectedActivities = []
                        $(".form-check-input").prop("checked", false)
                        
                        this.checkForEventsWhenDayClicked()

                        if(updateEvents == true){

                            updatedEvents = false
                            this.month = month
                            this.year = year

                            this.removeAllEvents();

                            this.getEvents()

                        }

                        if(setEvents == true){
                            this.edit = true
                            setEvents = false
                            this.checkForEventsWhenDayClicked()

                        }
                        

                    }

                }, 500)

            }
        });
    </script>

    <script>

        var updateEvents = false
        var setEvents = false
        var moon_phase = "llena"
        var farmActivities = []
        var month = ""
        var year = ""


        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {

            dateClick: function(info) {
                sync = true
                date = info.dateStr;
                updateEvents = false
                $('.eventModal').modal('show')
            },
            eventClick: function(info) {
               
                sync = true
                setEvents = true
                date = info.event.title;
                moon_phase = info.event.extendedProps.moon_phase
                farmActivities  = info.event.extendedProps.farmActivities
                updateEvents = false

                $('.eventModal').modal('show')

               

            },
            datesSet(){
             
                let date = calendar.getDate()
                var month = date.getMonth() + 1
                var year = date.getFullYear()
                updateEvents = true
                sync = true
            }

            

        })
        calendar.render();
    </script>

    

@endpush