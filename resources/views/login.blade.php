@extends('layouts.login')

@section('content')
    <div class="login_admin " id="dev-login">

        <div class="row">
            <div class="login100-more mask col-md-6"
                style="background-image: url('https://images.pexels.com/photos/4194612/pexels-photo-4194612.jpeg?cs=srgb&dl=pexels-ponyo-sakana-4194612.jpg&fm=jpg');">


               <!---- <p>Bienvenido a Aidacaceres CMS</p>--->
            </div>
            <div class="login100-form validate-form col-md-6">

                <p class="text-center">
                    <img src="{{ url('fian.png') }}" style="width: 150px;">
                </p>

                <p> Content Management System </p>


                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" v-model="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>


                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" v-model="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>




                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" @click="login()" style="background-color: rgb(20, 78, 65);">
                        Entrar
                    </button>
                </div>

            </div>


        </div>

    </div>
@endsection


@push("scripts")

<script type="text/javascript">
const app = new Vue({
    el: '#dev-login',
    data() {
        return {
            email: "",
            password: ""
        }
    },
    methods: {

        login() {

            axios.post("{{ url('/login') }}", {
                    email: this.email,
                    password: this.password
                })
                .then(res => {

                    if (res.data.success == true) {

                        swal({
                            title: "Excelente!",
                            text: res.data.msg,
                            icon: "success"
                        });
                        this.email = ""
                        this.password = ""

                        window.location.href = res.data.url


                        

                    } else {
                        alert(res.data.msg)
                    }

                })
                .catch(err => {

                    $.each(err.response.data.errors, function(key, value) {
                        alert(value)
                    })

                })

        }

    },
    created() {


    }
});
</script>

@endpush