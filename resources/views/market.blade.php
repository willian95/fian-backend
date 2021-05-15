@extends("layouts.main")

@section("content")

    <div class="d-flex flex-column-fluid" id="dev-market">

        <div class="loader-cover-custom" v-if="loading == true">
            <div class="loader-custom"></div>
        </div>

        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Mercados</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button style="cursor: pointer;" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target=".marketModal" @click="create()">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Nuevo Mercado</button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded" id="kt_datatable" style="">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Departamento</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Municipio</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Nombre</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Dirección</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Horario</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="market in markets">
                                    <td>@{{ market.department.name }}</td>
                                    <td>@{{ market.district }}</td>
                                    <td>@{{ market.name }}</td>
                                    <td>@{{ market.address }}</td>
                                    <td>@{{ market.schedule }}</td>
                                    <td>
                                        <button class="btn btn-success" data-toggle="modal" data-target=".marketModal" @click="edit(market)">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <button class="btn btn-secondary" @click="remove(market.id)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="kt_datatable_info" role="status" aria-live="polite">Mostrando página @{{ page }} de @{{ pages }}</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_full_numbers" id="kt_datatable_paginate">
                                    <ul class="pagination">
                                        
                                        <li class="paginate_button page-item active" v-for="index in pages">
                                            <a href="#" aria-controls="kt_datatable" tabindex="0" class="page-link":key="index" @click="fetch(index)" >@{{ index }}</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end: Datatable-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->

        <!-- Modal-->
        <div class="modal fade marketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@{{ modalTitle }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="department">Departamento</label>
                                        <select class="form-control" v-model="selectedDepartment" id="department">
                                            <option value="">Seleccione</option>
                                            <option :value="department.id" v-for="department in departments">@{{ department.name }}</option>
                                        </select>
                                        <small v-if="errors.hasOwnProperty('department')">@{{ errors['department'][0] }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district">Municipio</label>
                                        <input type="text" class="form-control" id="district" v-model="district">
                                        <small v-if="errors.hasOwnProperty('district')">@{{ errors['district'][0] }}</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" v-model="name">
                                        <small v-if="errors.hasOwnProperty('name')">@{{ errors['name'][0] }}</small>
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Dirección</label>
                                        <input type="text" class="form-control" id="address" v-model="address">
                                        <small v-if="errors.hasOwnProperty('englishDescription')">@{{ errors['englishDescription'][0] }}</small>
                                    </div>     
                                </div>  
                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="schedule">Horario</label>
                                        <input type="text" class="form-control" id="schedule" v-model="schedule">
                                        <small v-if="errors.hasOwnProperty('schedule')">@{{ errors['schedule'][0] }}</small>
                                    </div>
                                </div>
                        
                            </div>
                        </div>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary font-weight-bold"  @click="store()" v-if="action == 'create'">Crear</button>
                        <button type="button" class="btn btn-primary font-weight-bold"  @click="update()" v-if="action == 'edit'">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push("scripts")

<script type="text/javascript">

var sync = false;
var date = "";

const app = new Vue({
    el: '#dev-market',
    data() {
        return {
            page:1,
            pages:1,
            selectedId:"",
            action:"create",
            errors:[],
            loading:false,
            departments:[],
            markets:[],
            selectedDepartment:"",
            district:"",
            name:"",
            address:"",
            schedule:"",
            modalTitle:"Crear mercado"
        }
    },
    methods: {

        create(){
            this.selectedId = ""
            this.action = "create"
            this.modalTitle = "Crear mercado",
            this.district = ""
            this.name = ""
            this.selectedDepartment = ""
            this.schedule = ""
            this.address = ""
        },
        edit(market){
            this.selectedId = market.id
            this.action = "edit"
            this.modalTitle = "Editar mercado",
            this.district = market.district
            this.name = market.name
            this.selectedDepartment = market.department_id
            this.schedule = market.schedule
            this.address = market.address
        },
        async fetch(page = 1){

            this.page = page

            let res = await axios.get("{{ url('/market/fetch/') }}"+"/"+this.page)
            this.markets = res.data.markets


        },
        async store(){

            try{

                let res = await axios.post("{{ url('/market/store') }}", {"district": this.district, "name": this.name, "address": this.address, "selectedDepartment": this.selectedDepartment, "schedule": this.schedule})
                if(res.data.success == true){

                    swal({
                        text:res.data.msg,
                        icon: "success"
                    }).then(ans => {

                        $('.marketModal').modal('hide')
                        $('.modal-backdrop').remove()
                      

                    })

                    this.fetch(this.page)

                }else{

                    swal({
                        text:res.data.msg,
                        icon: "error"
                    })

                }

            }catch(err){

                swal({
                    text:"Hay algunos campos que debes revisar",
                    icon: "error"
                })

                this.errors = err.response.data.errors

            }

        },
        async remove(id){

            if(confirm("¿Estás seguro? Eliminarás este mercado")){

                let res = await axios.post("{{ url('/market/delete') }}", {id: id})
            
                if(res.data.success == true){

                    swal({
                        text:res.data.msg,
                        icon: "success"
                    })

                    this.fetch()

                }else{

                    swal({
                        text:res.data.msg,
                        icon: "success"
                    })

                }

            }


        },
        async update(){

            try{

                let res = await axios.post("{{ url('/market/update') }}", {selectedId: this.selectedId, "district": this.district, "name": this.name, "address": this.address, "selectedDepartment": this.selectedDepartment, "schedule": this.schedule})
                if(res.data.success == true){

                    swal({
                        text:res.data.msg,
                        icon: "success"
                    }).then(ans => {

                        $('.marketModal').modal('hide')
                        $('.modal-backdrop').remove()

                    })

                    this.fetch(this.page)

                }else{

                    swal({
                        text:res.data.msg,
                        icon: "error"
                    })

                }

            }catch(err){

                swal({
                    text:"Hay algunos campos que debes revisar",
                    icon: "error"
                })

                this.errors = err.response.data.errors

            }

        },
        async getDepartments(){

            let res = await axios.get("{{ url('/departments/fetch') }}")
            this.departments = res.data.departments

        },
        

    },
    created() {

        this.getDepartments()
        this.fetch()

    }
});
</script>

@endpush