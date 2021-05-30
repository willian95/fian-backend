@extends("layouts.main")

@push("styles")
    <link href="{{ asset('fullcalendar/lib/main.css') }}" rel='stylesheet' />
@endpush

@section("content")

    <div class="container" id="dev-login">
        <div class="row">
            <div class="col-md-12">
            <button type="button" class="btn btn-light-primary font-weight-bolder ml-2" data-toggle="modal" data-target=".exportCalendarModal">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Exportar</button>
            </div>
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
                                        <option value="llena_equinoccio_otono">Luna llena equinoccio otoño</option>
                                        <option value="llena_equinoccio_primavera">Luna llena equinoccio primavera</option>
                                        <option value="llena_solsticio_invierno">Luna llena solsticio invierno</option>
                                        <option value="llena_solsticio_verano">Luna llena solsticio verano</option>
                                        <option value="nueva_equinoccio_otono">Luna nueva equinoccio otoño</option>
                                        <option value="nueva_equinoccio_primavera">Luna nueva equinoccio primavera</option>
                                        <option value="nueva_solsticio_invierno">Luna nueva solsticio invierno</option>
                                        <option value="nueva_solsticio_verano">Luna nueva solsticio verano</option>
                                        <option value="creciente_equinoccio_otono">Luna creciente equinoccio otoño</option>
                                        <option value="creciente_equinoccio_primavera">Luna creciente equinoccio primavera</option>
                                        <option value="creciente_solsticio_invierno">Luna creciente solsticio invierno</option>
                                        <option value="creciente_solsticio_verano">Luna creciente solsticio verano</option>
                                        <option value="menguante_equinoccio_otono">Luna menguante equinoccio otoño</option>
                                        <option value="menguante_equinoccio_primavera">Luna menguante equinoccio primavera</option>
                                        <option value="menguante_solsticio_invierno">Luna menguante solsticio invierno</option>
                                        <option value="menguante_solsticio_verano">Luna menguante solsticio verano</option>
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

        <div class="modal fade exportCalendarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Exportar CSV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha de inicio</label>
                                    <input type="date" class="form-control" v-model="startDate">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha fin</label>
                                    <input type="date" class="form-control" v-model="endDate">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" @click="exportCsv()">Exportar</button>
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
                    edit:false,
                    startDate:"",
                    endDate:""
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

                },
                exportCsv(){

                    if(this.startDate != "" && this.endDate != ""){

                        window.location.href="{{ url('/event/download/csv/') }}"+"/"+this.startDate+"/"+this.endDate

                    }else{

                        swal({
                            text:"Debes elegir una fecha de inicio y una fecha fin",
                            icon:"error"
                        })

                    }

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