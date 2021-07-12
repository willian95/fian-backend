@extends("layouts.main")

@section("content")

    <div class="d-flex flex-column-fluid" id="dev-market">

        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Frases del día</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button style="cursor: pointer;" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target=".textUpload" @click="create()">
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
                        </span>Importar frases</button>
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
                                        <span>Fecha</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Frase</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="text in texts">
                                    <td>
                                        @{{ text.date }}
                                    </td>
                                    <td>
                                        @{{ text.text }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="kt_datatable_info" role="status" aria-live="polite">Mostrando página @{{ currentPage }} de @{{ totalPages }}</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_full_numbers" id="kt_datatable_paginate">
                                    <ul class="pagination">
                                        
                                        <li class="paginate_button page-item active" v-for="(link, index) in links">
                                            <a style="cursor: pointer" aria-controls="kt_datatable" tabindex="0" :class="link.active == false ? linkClass : activeLinkClass":key="index" @click="fetch(link)" v-html="link.label"></a>
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
        <div class="modal fade textUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Importar frases</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="">Archivo de frases</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupFileAddon01">Subir archivo</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" @change="onFileChange"  accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                                    <label class="custom-file-label" for="inputGroupFile01">Elegir archivo</label>
                                                </div>
                                            </div>
                                 
                                        </div>

                                    </div>

                                    <div v-if="fileStatus == 'subiendo'" class="progress-bar progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" :style="{'width': `${fileProgress}%`}">
                                        @{{ fileProgress }}%
                                    </div>
                                    
                                    <p v-if="fileStatus == 'subiendo' && fileProgress < 100 && onLoadingStore == true">Subiendo</p>
                                    <p v-if="fileStatus == 'subiendo' && fileProgress == 100 && onLoadingStore == true">Espere un momento</p>
                                    <p v-if="fileStatus == 'listo' && fileProgress == 100 && onLoadingStore == true">Archivo siendo procesado</p>
                                    <p v-if="fileStatus == 'listo' && fileProgress == 100 && onLoadingStore == false">Archivo procesado</p>
                                </div>


                        
                            </div>
                        </div>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary font-weight-bold" @click="uploadFile()">Actualizar</button>
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
            currentPage:"",
            totalPages:"",
            linkClass:"page-link",
            activeLinkClass:"page-link active-link",
            links:[],
            errors:[],
            onLoadingStore:false,
            texts:[],
            fileProgress:0,
            fileStatus:"",
            filePreview:"",
            finalFileName:"",
            
        }
    },
    methods: {
        async fetch(link = ""){

            let res = await axios.get(link == "" ? "{{ url('daily-text/fetch') }}" : link.url)
            this.texts = res.data.texts.data
            this.links = res.data.texts.links
            this.currentPage = res.data.texts.current_page
            this.totalPages = res.data.texts.last_page

        },
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
        onFileChange(e){
            let file = e.target.files[0];

            this.filePreview = URL.createObjectURL(file);

            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;

            if(files[0]['type'].split('/')[1].indexOf("spreadsheet") > -1 || files[0]['type'].split('/')[1] == "vnd.ms-excel"){

                this.file = files[0]

            }else{

                this.$swal({
                    text:"Debe seleccionar un archivo de hoja de calculo",
                    icon:"error"
                })
                this.filePreview = ""

            }

        },
        async uploadFile(){

            if(this.file != null){
                this.fileProgress = 0;
            
                let formData = new FormData()
                formData.append("file", this.file)

                var _this = this
                this.fileStatus = "subiendo";
                
                var config = {
                    headers: { "X-Requested-With": "XMLHttpRequest" },
                    onUploadProgress: function(progressEvent) {
                        
                        var progressPercent = Math.round((progressEvent.loaded * 100.0) / progressEvent.total);
                    
                        _this.fileProgress = progressPercent
                    
                        
                    }
                }

                let res = await axios.post("daily-text/upload-file", formData, config)
                this.fileStatus = "listo";
                this.finalFileName = res.data.fileRoute

                this.onLoadingStore = false

                $('.textUpload').modal('hide')
                $('.modal-backdrop').remove()   

                this.fetch()

            }

        }
        

    },
    created() {

        this.fetch()

    }
});
</script>

@endpush

@push("styles")

    <style>

        .active-link{
            background-color:red !important;
        }

    </style>

@endpush