<?php

namespace Database\Seeders;

use App\Models\FarmActivity;
use Illuminate\Database\Seeder;

class FarmActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$url = 'https://app.fiancolombia.org';
        $url = 'http://localhost:8000';
        if (FarmActivity::where('id', 1)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 1;
            //$farmActivity->icon = strpos(url('/'), "localhost") > 0 ? url('/').":8000/icons/icon1.png" : url('/')."/icons/icon1.png";
            $farmActivity->icon = $url.'/icon1.png';
            $farmActivity->name = 'Preparación de suelos';
            $farmActivity->description = 'Tiempo para eliminar arvenses, airear y acondicionar el suelo. Es favorable hacer estas actividades en periodos aguas abajo, cuando la actividad biológica del suelo está en su mejor momento. Cuatro días antes y tres días luego de luna nueva.';
            $farmActivity->save();
        }

        if (FarmActivity::where('id', 2)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 2;
            $farmActivity->icon = $url.'/icon2.png';
            $farmActivity->name = 'Aplicación de fertilizantes edáficos';
            $farmActivity->description = 'Actividad que se debe hacer en luna menguante para cultivos adultos que se encuentren en plena producción; en cultivos nuevos, con menos de dos años de estar establecidos, se debe realizar en el periodo extensivo aguas arriba, o sea, tres días después de la luna nueva hasta los tres últimos días de luna llena.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 3)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 3;
            $farmActivity->icon = $url.'/icon3.png';
            $farmActivity->name = 'Aplicación de Fertilizantes foliares';
            $farmActivity->description = 'Se recomienda hacer esta actividad en periodo de aguas arriva, en luna creciente, cuando las ramas, hojas, flores y frutos están en la máxima actividad de estimulación y absorción energética y a través de la savia.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 4)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 4;
            $farmActivity->icon = $url.'/icon4.png';
            $farmActivity->name = 'Manejo físico - mecánico arvenses';
            $farmActivity->description = 'Actividad que se recomienda realizar en periodo de aguas abajo, hacer un control físico-mecánico en luna menguante agota las reservas concentradas en las raíces de estas plantas y retarda su recuperación y crecimiento. En climas fríos y templados se recomienda la combinación seguida de dos controles físico-mecánicos, el primero en luna creciente y el segundo en luna menguante, para así acelerar el agotamiento de las reservas de las mismas.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 5)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 5;
            $farmActivity->icon = $url.'/icon5.png';
            $farmActivity->name = 'Corte de madera y guadua';
            $farmActivity->description = 'El corte de madera y de guadua para construcción se hace en periodos de aguas abajo, cuando la savia este concentrada en las raíces y los tallos tengan menor humedad, lo que les garantice mayor durabilidad y menor susceptibilidad al ataque por insectos. Tres últimos días luna menguante y tres primeros días luna nueva.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 6)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 6;
            $farmActivity->icon = $url.'/icon6.png';
            $farmActivity->name = 'Siembra de tubérculos y raíces';
            $farmActivity->description = 'Actividad que se realiza en luna menguante, en periodos de aguas abajo, ya que la savia tiene mayor actividad en las partes subterráneas de las plantas y se favorece en crecimiento de órganos como raíces y tubérculos. Lo que se siembra en menguante pasa los primeros quince días bajo una luminosidad lunar que tiende a cero, lo que estimula más el desarrollo de raíces, retardando la floración y fructificación.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 7)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 7;
            $farmActivity->icon = $url.'/icon7.png';
            $farmActivity->name = 'Fecundación para nacimiento de machos';
            $farmActivity->description = 'Cuando la fecundación se logra en luna creciente hacia plenilunio o luna llena, predomina el nacimiento del sexo masculino.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 8)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 8;
            $farmActivity->icon = $url.'/icon8.png';
            $farmActivity->name = 'Poda de limpieza';
            $farmActivity->description = 'Actividades que se centralizan entre los últimos tres días de luna menguante y primeros tres días de luna nueva, evitando pudriciones y obteniéndose una rápida y mejor cicatrización. La luna nueva es considerada como la fase donde todo se limpia, lo que equivale a la purga. No son ejecutadas entre luna creciente y la luna llena ya que la savia de las plantas está en los brotes o en las partes más nuevas de las mismas, las plantas pueden debilitarse y morir si no están bien nutridas.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 9)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 9;
            $farmActivity->icon = $url.'/icon9.png';
            $farmActivity->name = 'Engorde y crecimiento de lombrices';
            $farmActivity->description = 'Últimos tres días de luna menguante y primeros tres días de la luna nueva son las mejores fases para el engorde y el crecimiento de las lombrices, ya que la oscuridad de este periodo es la mejor aliada para estimular el apetito y la búsqueda del alimento que se encuentra ubicado en la superficie de la tierra en los criaderos.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 10)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 10;
            $farmActivity->icon = $url.'/icon10.png';
            $farmActivity->name = 'Cosecha de tuberculos y raíces';
            $farmActivity->description = 'Se recomienda realizar esta práctica en periodos de aguas abajo, cuatro días antes de luna nueva y tres días después, pues la savia se encuentra concentrada en las partes subterráneas de las plantas como raíces y tubérculos.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 11)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 11;
            $farmActivity->icon = $url.'/icon11.png';
            $farmActivity->name = 'Cosecha de miel';
            $farmActivity->description = 'Puesto que el flujo de néctar intensivo ocurre desde la luna llena hasta finalizar la luna menguante, se recomienda realizar la cosecha de miel en los primeros días de luna nueva, en periodo de aguas abajo, cuando la miel está en un proceso de reposo en el cual es más alimenticia';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 12)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 12;
            $farmActivity->icon = $url.'/icon12.png';
            $farmActivity->name = 'Siembra o transplante para cosecha de frutos y flores';
            $farmActivity->description = 'Puesto que el flujo de néctar intensivo ocurre desde la luna llena hasta finalizar la luna menguante, se recomienda realizar la cosecha de miel en los primeros días de luna nueva, en periodo de aguas abajo, cuando la miel está en un proceso de reposo en el cual es más alimenticia';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 13)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 13;
            $farmActivity->icon = $url.'/icon13.png';
            $farmActivity->name = 'Cosecha de hojas aromáticas medicinales';
            $farmActivity->description = 'Cuando se quiere hacer la recolección de hojas, tallos, flores y frutos principalmente para la preparación de macerados, se recomienda en periodo de aguas arriba, en luna llena, ya que esta actúa más directamente sobre las plantas con el efecto purificador de sus rayos lunares, enriqueciendo la savia que circula con gran intensidad en ellas.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 14)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 14;
            $farmActivity->icon = $url.'/icon14.png';

            $farmActivity->name = 'Cosecha de frutos y follaje';
            $farmActivity->description = 'Actividad que se realiza en periodo de aguas arriba, tres días antes de luna llena y tres días después, cuando la savia de las plantas se encuentra en la parte aérea y estos órganos están más jugosos y en óptimas condiciones para su consumo en fresco. Sin embargo, cuando la producción está destinada a largos períodos de transporte y de espera para ser consumidos, la cosecha se debe programar para después de la luna llena. ';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 15)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 15;
            $farmActivity->icon = $url.'/icon15.png';

            $farmActivity->name = 'Acodo e injertos';
            $farmActivity->description = 'Se recomienda realizar estas actividades en periodos aguas arriba, últimos tres días de la luna creciente y tres primeros días de la luna llena, cuando el índice de pega de los injertos es mayor y cuando la savia de las plantas se encuentra en la parte aérea, en hojas y tallos estimulándose la actividad y crecimiento en estas partes.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 16)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 16;
            $farmActivity->icon = $url.'/icon16.png';

            $farmActivity->name = 'Manejo de parásitos';
            $farmActivity->description = 'En los animales, la mejor fase lunar asociada con el tratamiento de los parásitos es el plenilunio o luna llena, ya que los movimientos de estos parásitos son más activos en el cuerpo durante esta fase de aguas arriba. Se recomienda hacer purgas y exámenes coprológicos.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 17)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 17;
            $farmActivity->icon = $url.'/icon17.png';

            $farmActivity->name = 'Poda de producción';
            $farmActivity->description = 'Cuando los árboles son muy vigorosos y queremos frenar su vigor para estimularlo a la fructificación, se recomienda podarlo en periodo de aguas arriba, plenilunio o luna llena.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 18)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 18;
            $farmActivity->icon = $url.'/icon18.png';

            $farmActivity->name = 'Siembra para cosecha de hojas';
            $farmActivity->description = 'Todas las plantas que nacen al ras de la tierra, como lechugas, acelgas, espinacas, maíz, col, hojas, etc., cuyo producto para el consumo son las hojas frescas, se recomienda sembrar en periodo de aguas abajo, fase de luna menguante, porque cuando se plantan en luna creciente tienden a subir a flor prematuramente.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 19)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 19;
            $farmActivity->icon = $url.'/icon19.png';

            $farmActivity->name = 'Producción de semillas';
            $farmActivity->description = 'La mejor luna para cosechar y conservar granos y alimentos para que duren más tiempo en buen estado, sean menos susceptibles al deterioro, tengan mejor sazón, sean más resistentes contra el ataque de insectos y microorganismos cuando son almacenados, es la fase de luna menguante, en periodo de aguas abajo.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 20)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 20;
            $farmActivity->icon = $url.'/icon20.png';

            $farmActivity->name = 'Fecundación para nacimiento de hembras';
            $farmActivity->description = 'Cuando se logra la fecundación durante la luna menguante hacia el novilunio o luna nueva, predomina el nacimiento del sexo femenino';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 21)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 21;
            $farmActivity->icon = $url.'/icon21.png';
            $farmActivity->name = 'Poda de formación ';
            $farmActivity->description = 'Para la realización de podas en árboles nuevos, período de formación de copa y producción de estacas, se recomienda realizar esta actividad en plena luna nueva hasta tres primeros días de luna creciente, con la mismos.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 22)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 22;
            $farmActivity->icon = $url.'/icon22.png';
            $farmActivity->name = 'Meditación y ofrenda';
            $farmActivity->description = 'Días de luna llena y luna nueva son los ideales para estas actividades, ya que hay mucha energía disponible para todos y cuando meditamos esta cantidad de energía puede ser usada para el desarrollo consciente de nuestro mundo.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 23)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 23;
            $farmActivity->icon = $url.'/icon23.png';
            $farmActivity->name = 'Cosecha de raices aromáticas medicinales';
            $farmActivity->description = 'Cuando se quiere hacer la recolección de la parte subterránea de la planta como raíces, tubérculos o rizomas; periodo de aguas abajo, los últimos cuatro días de la luna menguante y los tres primeros días de luna nueva son los días más recomendados.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 24)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 24;
            $farmActivity->icon = $url.'/icon24.png';
            $farmActivity->name = 'Tiempo de pesca';
            $farmActivity->description = 'La oscuridad que ofrecen las noches durante los primeros días de luna nueva y últimos días de luna menguante son catalogadas como las mejores oportunidades para la captura de una buena cantidad de peces, pues aumenta la curiosidad de alimentación de los mismos. ';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 25)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 25;
            $farmActivity->icon = $url.'/icon25.png';
            $farmActivity->name = 'Manejo preventivo de insectos masticadores y cortadores de hoja';
            $farmActivity->description = 'Según estudios, se ha identificado que algunos órdenes de insectos masticadores, chupadores y cortadores de hoja tienen mayor actividad en luna menguante y creciente. Se recomienda hacer un manejo preventivo con aplicación de insecticidas orgánicos al inicio de estas fases. Insecticidas a base de ají, tabaco y ajo cumplen la función de repeler los insectos sin afectar los cultivos ni el ambiente.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 26)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 26;
            $farmActivity->icon = $url.'/icon26.png';
            $farmActivity->name = 'Manejo preventivo de insectos chupadores y perforadores';
            $farmActivity->description = 'Según estudios, se ha identificado que algunos órdenes de insectos masticadores, chupadores y cortadores de hoja tienen mayor actividad en luna menguante y creciente. Se recomienda hacer un manejo preventivo con aplicación de insecticidas orgánicos al inicio de estas fases. Insecticidas a base de ají, tabaco y ajo cumplen la función de repeler los insectos sin afectar los cultivos ni el ambiente.';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 27)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 27;
            $farmActivity->icon = $url.'/icon27.png';
            $farmActivity->name = 'Manejo preventivo de insectos edáficos y rastreros';
            $farmActivity->description = 'Se identifica a la planta más propensa al ataque de estos insectos en la fase de luna nueva, aguas abajo, por tanto se recomienda un manejo preventivo con el uso de controladores biológicos y prácticas culturales como: bacterias y hongos que sean enemigos naturales de las plagas, rotación de cultivos, asociación de cultivos con plantas repelentes y uso de extractos de plantas biocidas y/o biopreparados. ';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 28)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 28;
            $farmActivity->icon = $url.'/icon28.png';
            $farmActivity->name = 'Manejo preventivo de insectos edáficos y rastreros';
            $farmActivity->description = 'Se identifica a la planta más propensa al ataque de estos insectos en la fase de luna nueva, aguas abajo, por tanto se recomienda un manejo preventivo con el uso de controladores biológicos y prácticas culturales como: bacterias y hongos que sean enemigos naturales de las plagas, rotación de cultivos, asociación de cultivos con plantas repelentes y uso de extractos de plantas biocidas y/o biopreparados. ';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 29)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 29;
            $farmActivity->icon = $url.'/icon29.png';
            $farmActivity->name = 'Manejo preventivo de insectos edáficos y rastreros';
            $farmActivity->description = 'Se identifica a la planta más propensa al ataque de estos insectos en la fase de luna nueva, aguas abajo, por tanto se recomienda un manejo preventivo con el uso de controladores biológicos y prácticas culturales como: bacterias y hongos que sean enemigos naturales de las plagas, rotación de cultivos, asociación de cultivos con plantas repelentes y uso de extractos de plantas biocidas y/o biopreparados. ';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 30)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 30;
            $farmActivity->icon = $url.'/icon30.png';
            $farmActivity->name = 'Manejo preventivo de insectos edáficos y rastreros';
            $farmActivity->description = 'Se identifica a la planta más propensa al ataque de estos insectos en la fase de luna nueva, aguas abajo, por tanto se recomienda un manejo preventivo con el uso de controladores biológicos y prácticas culturales como: bacterias y hongos que sean enemigos naturales de las plagas, rotación de cultivos, asociación de cultivos con plantas repelentes y uso de extractos de plantas biocidas y/o biopreparados. ';

            $farmActivity->save();
        }

        if (FarmActivity::where('id', 31)->count() == 0) {
            $farmActivity = new FarmActivity();
            $farmActivity->id = 31;
            $farmActivity->icon = $url.'/icon31.png';
            $farmActivity->name = 'Manejo preventivo de insectos edáficos y rastreros';
            $farmActivity->description = 'Se identifica a la planta más propensa al ataque de estos insectos en la fase de luna nueva, aguas abajo, por tanto se recomienda un manejo preventivo con el uso de controladores biológicos y prácticas culturales como: bacterias y hongos que sean enemigos naturales de las plagas, rotación de cultivos, asociación de cultivos con plantas repelentes y uso de extractos de plantas biocidas y/o biopreparados. ';

            $farmActivity->save();
        }
    }
}
