<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FarmActivity;

class FarmActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        if(FarmActivity::where("id", 1)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon1.png" : url('/')."/icons/icon1.png";
            $farmActivity->icon = url("/")."/icons/icon1.png";
            $farmActivity->name = "Preparación de suelos";
            $farmActivity->description = "En este proceso se debe eliminar malezas, airear y acondicionarlo según su necesidad. Es favorable hacer esta labor en el periodo extensivo aguas abajo ya que la savia se encuentra en la raíz y actividad biológica del suelo está en su mejor momento.";
            $farmActivity->best_season = "4 días antes de menguante y 3 días luego de la luna nueva.";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 2)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon2.png" : url('/')."/icons/icon2.png";
            $farmActivity->icon = url("/")."/icons/icon2.png";
            $farmActivity->name = "Aplicación de abonos sólidos para perennes";
            $farmActivity->description = "Las raíces de las plantas de los cultivos de ciclo corto son poco desarrolladas, por lo tanto para la aplicación de abono en ellas se aplican en el  periodo aguas arriba y se obtienen mejores resultados.";
            $farmActivity->best_season = "Creciente a luna Llena.";
            $farmActivity->save(); 

        }

        /*if(FarmActivity::where("id", 3)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon3.png" : url('/')."/icons/icon3.png";
            
            $farmActivity->name = "Aplicación de abonos sólidos para semestrales";
            $farmActivity->description = "Las raíces de las plantas de los cultivos de ciclo corto son poco desarrolladas, por lo tanto para la aplicación de abono en ellas se aplican en el periodo aguas arriba y se obtienen mejores resultados.";
            $farmActivity->best_season = "Creciente a luna Llena.";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 4)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon4.png" : url('/')."/icons/icon4.png";
            $farmActivity->name = "Aplicación de biofertilizantes";
            $farmActivity->description = "Estas aplicaciones foliares se realizan en el periodo  aguas arriba porque la savia se encuentra en las hojas y en la zona aérea de la planta en alta movilidad, por lo tanto el producto es más absorbible y eficiente.";
            $farmActivity->best_season = "Todo creciente.";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 5)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon5.png" : url('/')."/icons/icon5.png";
            $farmActivity->name = "Manejo de arvenses";
            $farmActivity->description = "Las mal llamadas “malezas” se recomiendan controlarlas en época aguas abajo, preferiblemente en menguante ya que la savia se encuentra más concentrada en la raíz y la zona aérea queda debilitada y se ralentiza su crecimiento.";
            $farmActivity->best_season = "Menguante y los 3 días siguientes.";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 6)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon6.png" : url('/')."/icons/icon6.png";
            $farmActivity->name = "Poda de formación";
            $farmActivity->description = "Los arboles necesitan que se les realice estas podas de manera regular y se deben realizar cuando inicie el periodo aguas arriba para que la savia que inicia su movilidad en la parte aérea pueda mitigar alguna tensión a la planta.";
            $farmActivity->best_season = "3 días antes de creciente.";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 7)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon7.png" : url('/')."/icons/icon7.png";
            $farmActivity->name = "Poda de formación";
            $farmActivity->description = "Los arboles necesitan que se les realice estas podas de manera regular y se deben realizar cuando inicie el periodo aguas arriba para que la savia que inicia su movilidad en la parte aérea pueda mitigar alguna tensión a la planta.";
            $farmActivity->best_season = "3 días antes de creciente.";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 8)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon8.png" : url('/')."/icons/icon8.png";
            $farmActivity->name = "Poda de producción";
            $farmActivity->description = "La savia empieza a bajar a la raíz hacia el final del periodo de aguas arriba, en ese momento se puede iniciar la poda de producción ya que al estar generándose ese movimiento genera un corto estrés a la planta que activa la floración.";
            $farmActivity->best_season = "3 días antes de menguante";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 9)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon9.png" : url('/')."/icons/icon9.png";
            $farmActivity->name = "Corte de guadua";
            $farmActivity->description = "Un buen corte de madera y de guadua es fundamental para el éxito del trabajo que se vaya a realizar con estos. Por consiguiente, se deben cortar en el periodo intensivo aguas abajo, al estar la savia concentrada en la zona radicular, el tallo esta menos húmedo y tendrá mayor durabilidad. En el caso de la guadua adicional a lo anterior, se recomienda hacer el corte en horas de la madrugada en el que está prácticamente toda la savia en la raíz.";
            $farmActivity->best_season = "3 días antes de luna nueva y 3 días después";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 10)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon10.png" : url('/')."/icons/icon10.png";
            $farmActivity->name = "Siembra de tubérculos y raíces";
            $farmActivity->description = "La siembra de estas plantas para la futura cosecha de estos órganos se ve muy favorecida si se realiza en el periodo extensivo aguas abajo, ya que la savia favorece la raíz y estimula el crecimiento y desarrollo de la planta.";
            $farmActivity->best_season = "Menguante a luna nueva";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 11)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon11.png" : url('/')."/icons/icon11.png";
            $farmActivity->name = "Siembra directa para cosecha de hojas";
            $farmActivity->description = "La siembra de estas plantas para la futura cosechade estos órganos se ve muy favorecida si se realiza en el periodo extensivo aguas abajo, ya que la savia favorece la raíz y estimula el crecimiento y desarrollo de la planta.";
            $farmActivity->best_season = "Menguante a luna nueva";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 12)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon12.png" : url('/')."/icons/icon12.png";
            $farmActivity->name = "Siembra directa para cosecha de frutos y flores";
            $farmActivity->description = "El periodo aguas arriba es el momento idóneo para esta siembra, debido a que la savia se encuentra en la zona aérea favoreciendo estos órganos en su crecimiento, otorgando mejores flores y frutos.";
            $farmActivity->best_season = "Creciente a Menguante";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 13)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon13.png" : url('/')."/icons/icon13.png";
            $farmActivity->name = "Siembra o transplantes de forestales y frutales";
            $farmActivity->description = "El periodo aguas arriba es el momento idóneo para esta siembra, debido a que la savia se encuentra en la zona aérea favoreciendo estos órganos en su crecimiento, otorgando mejores flores y frutos.";
            $farmActivity->best_season = "Creciente a Menguante";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 14)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon14.png" : url('/')."/icons/icon14.png";
            $farmActivity->name = "Recolección de frutos";
            $farmActivity->description = "Para la cosecha de estos productos debe hacer en el periodo intensivo de aguas arriba ya que la savia se encuentra en la parte aérea y las hojas y frutos serán más carnosos y nutritivos.";
            $farmActivity->best_season = "3 días antes de luna llena y 3 días después.";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 15)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon15.png" : url('/')."/icons/icon15.png";
            $farmActivity->name = "Recolección de follaje";
            $farmActivity->description = "Para la cosecha de estos productos debe hacer en el periodo intensivo de aguas arriba ya que la savia se encuentra en la parte aérea y las hojas y frutos serán más carnosos y nutritivos.";
            $farmActivity->best_season = "3 días antes de luna llena y 3 días después.";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 16)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon16.png" : url('/')."/icons/icon16.png";
            $farmActivity->name = "Recolección de tubérculos y raíces";
            $farmActivity->description = "El periodo intensivo aguas abajo, cuando la savia se encuentra concentrada en la zona radicular, es el momento óptimo para la cosecha, preferiblemente se debe realizar en las horas de la tarde y se obtendrán una cosecha jugosa.";
            $farmActivity->best_season = "4 días antes de luna nueva y 3 días después";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 17)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon17.png" : url('/')."/icons/icon17.png";
            $farmActivity->name = "Cosecha de miel";
            $farmActivity->description = "El pSe recomienda en el inicio del periodo extensivo aguas abajo en el cual la miel está en un proceso de reposo en el cual es más alimenticia.";
            $farmActivity->best_season = "3 días después de luna llena.";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 18)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon18.png" : url('/')."/icons/icon18.png";
            $farmActivity->name = "Producción de semillas";
            $farmActivity->description = "Para disponer de un buen material de semillas para posteriores siembras, se deben cosechar en el periodo de aguas abajo ya que pueden resistir más a algún tipo de deterioro. No debemos olvidar que al momento de conservarlas, realizarlas de la manera adecuada.";
            $farmActivity->best_season = "3 días antes de menguante.";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 19)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon19.png" : url('/')."/icons/icon19.png";
            $farmActivity->name = "Transplante de plantulas";
            $farmActivity->description = "Las plantas del huerto primero crecen en almácigos pero llega un momento, cuando están fuertes y maduras, que deben ser trasplantadas a su lugar definitivo para así tener más espacio y desarrollarse mejor.";
            $farmActivity->best_season = "3 dias después de luna nueva durante 3 dias";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 20)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon20.png" : url('/')."/icons/icon20.png";
            $farmActivity->name = "Aleopatía aérea";
            $farmActivity->description = "La aleopatía o interaación de las plantas generan una acción repelente o atrayente dependiendo del metabolismo de la planta, en el periodo aguas arriba hay mayor movimiento en la parteaérea y en el periodo aguas abajo la actividad aleopatica se desplaza a la raíz. ";
            $farmActivity->best_season = "de creciente a luna llena";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 21)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon21.png" : url('/')."/icons/icon21.png";
            $farmActivity->name = "Aleopatía redicular";
            $farmActivity->description = "La aleopatía o interaación de las plantas generan una acción repelente o atrayente dependiendo del metabolismo de la planta, en el periodo aguas arriba hay mayor movimiento en la parteaérea y en el periodo aguas abajo la actividad aleopatica se desplaza a la raíz. ";
            $farmActivity->best_season = "de menguante a luna nueva.";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 22)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon21.png" : url('/')."/icons/icon21.png";
            $farmActivity->name = "Manejo de parásitos internos y externos de animales";
            $farmActivity->description = "El momento ideal para este tipo de tratamiento es en la luna llena ya que los movimientos corporales son más activos en ese día y puede moverse por todo el cuerpo del hospedero.";
            $farmActivity->best_season = "Luna llena.";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 23)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon23.png" : url('/')."/icons/icon23.png";
            $farmActivity->name = "Fecundación para nacimiento de hembras";
            $farmActivity->description = "Cuando se fecunda en el periodo intensivo aguas abajo antes del novilunio predomina un nacimiento de sexo femenino. Cuando la fecundación se realiza en el periodo intensivo aguas arriba predomina el nacimiento de sexo masculino.";
            $farmActivity->best_season = "Luna nueva y 3 días antes";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 24)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon24.png" : url('/')."/icons/icon24.png";
            $farmActivity->name = "Fecundación para nacimiento de machos";
            $farmActivity->description = "Cuando se fecunda en el periodo intensivo aguas abajo antes del novilunio predomina un nacimiento de sexo femenino. Cuando la fecundación se realiza en el periodo intensivo aguas arriba predomina el nacimiento de sexo masculino.";
            $farmActivity->best_season = "3 días después de creciente";
            $farmActivity->save(); 

        }

        if(FarmActivity::where("id", 25)->count() == 0){

            $farmActivity = new FarmActivity;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon25.png" : url('/')."/icons/icon25.png";
            $farmActivity->name = "Meditación y compartir";
            $farmActivity->description = "Durante estos días hay muchisíma más energia disponible para todos y cuando meditamos esta cantidad de energia puede ser usada para el desarroyo consciente de nuestro mundo.";
            $farmActivity->best_season = "Los días de Luna llena y luna nueva";
            $farmActivity->save(); 

        }*/


    }
}
