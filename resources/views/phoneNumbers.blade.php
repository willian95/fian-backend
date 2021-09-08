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
                        <h3 class="card-label">Números telefónicos</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ url('phone-number/export/csv') }}" target="_blank" style="cursor: pointer;" class="btn btn-primary font-weight-bolder">
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
                        </span>Exportar csv</a>
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
                                        <span>Número</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Status</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Fecha de registro</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Fecha de validación</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="phone in phones">
                                    <td>
                                        @{{ phone.phone_number }}
                                    </td>
                                    <td>
                                        @{{ phone.validated_at ? 'Validado' : 'No validado' }}
                                    </td>
                                    <td>
                                        @{{ dateFormatter(phone.created_at)}}
                                    </td>
                                    <td>
                                        @{{ dateFormatter(phone.validated_at)}}
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
                                            <a style="cursor: pointer" aria-controls="kt_datatable" tabindex="0" :class="link.active == false ? linkClass : activeLinkClass":key="index" @click="fetch(link)" v-html="link.label.replace('Previous', 'Anterior').replace('Next', 'Siguiente')"></a>
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
            phones:[],
            
        }
    },
    methods: {
        async fetch(link = ""){

            let res = await axios.get(link == "" ? "{{ url('phone-number/fetch') }}" : link.url)
            this.phones = res.data.phoneNumbers.data
            this.links = res.data.phoneNumbers.links
            this.currentPage = res.data.phoneNumbers.current_page
            this.totalPages = res.data.phoneNumbers.last_page

        },
        dateFormatter(date){
                    
            if(date){

                let year = date.substring(0, 4)
                let month = date.substring(5, 7)
                let day = date.substring(8, 10)
                return day+"-"+month+"-"+year

            }
        },
        

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
            background-color:#27ae60 !important;
        }

    </style>

@endpush