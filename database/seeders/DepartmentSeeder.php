<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        if(Department::where("id", 1)->count() == 0){

            $department = new Department;
            $department->id = 1;
            $department->name = "Antioquia";
            $department->save();

        }

        if(Department::where("id", 2)->count() == 0){

            $department = new Department;
            $department->id = 2;
            $department->name = "Atlantico";
            $department->save();

        }

        if(Department::where("id", 3)->count() == 0){

            $department = new Department;
            $department->id = 3;
            $department->name = "D. C. Santa Fe de Bogotá";
            $department->save();

        }

        if(Department::where("id", 4)->count() == 0){

            $department = new Department;
            $department->id = 4;
            $department->name = "Bolivar";
            $department->save();

        }

        if(Department::where("id", 5)->count() == 0){

            $department = new Department;
            $department->id = 5;
            $department->name = "Boyaca";
            $department->save();

        }

        if(Department::where("id", 6)->count() == 0){

            $department = new Department;
            $department->id = 6;
            $department->name = "Caldas";
            $department->save();

        }

        if(Department::where("id", 7)->count() == 0){

            $department = new Department;
            $department->id = 7;
            $department->name = "Caqueta";
            $department->save();

        }

        if(Department::where("id", 8)->count() == 0){

            $department = new Department;
            $department->id = 8;
            $department->name = "Cauca";
            $department->save();

        }


        if(Department::where("id", 9)->count() == 0){

            $department = new Department;
            $department->id = 9;
            $department->name = "Cesar";
            $department->save();

        }

        if(Department::where("id", 10)->count() == 0){

            $department = new Department;
            $department->id = 10;
            $department->name = "Cordova";
            $department->save();

        }

        if(Department::where("id", 11)->count() == 0){

            $department = new Department;
            $department->id = 11;
            $department->name = "Cundinamarca";
            $department->save();

        }

        if(Department::where("id", 12)->count() == 0){

            $department = new Department;
            $department->id = 12;
            $department->name = "Choco";
            $department->save();

        }

        if(Department::where("id", 13)->count() == 0){

            $department = new Department;
            $department->id = 13;
            $department->name = "Huila";
            $department->save();

        }

        if(Department::where("id", 14)->count() == 0){

            $department = new Department;
            $department->id = 14;
            $department->name = "La Guajira";
            $department->save();

        }

        if(Department::where("id", 15)->count() == 0){

            $department = new Department;
            $department->id = 15;
            $department->name = "Magdalena";
            $department->save();

        }

        if(Department::where("id", 16)->count() == 0){

            $department = new Department;
            $department->id = 16;
            $department->name = "Meta";
            $department->save();

        }


        if(Department::where("id", 17)->count() == 0){

            $department = new Department;
            $department->id = 17;
            $department->name = "Nariño";
            $department->save();

        }

        if(Department::where("id", 18)->count() == 0){

            $department = new Department;
            $department->id = 18;
            $department->name = "Norte de Santander";
            $department->save();

        }

        if(Department::where("id", 19)->count() == 0){

            $department = new Department;
            $department->id = 19;
            $department->name = "Quindio";
            $department->save();

        }

        if(Department::where("id", 20)->count() == 0){

            $department = new Department;
            $department->id = 20;
            $department->name = "Risaralda";
            $department->save();

        }

        if(Department::where("id", 21)->count() == 0){

            $department = new Department;
            $department->id = 21;
            $department->name = "Santander";
            $department->save();

        }

        if(Department::where("id", 22)->count() == 0){

            $department = new Department;
            $department->id = 22;
            $department->name = "Sucre";
            $department->save();

        }

        if(Department::where("id", 23)->count() == 0){

            $department = new Department;
            $department->id = 23;
            $department->name = "Tolima";
            $department->save();

        }

        if(Department::where("id", 24)->count() == 0){

            $department = new Department;
            $department->id = 24;
            $department->name = "Valle";
            $department->save();

        }

        if(Department::where("id", 25)->count() == 0){

            $department = new Department;
            $department->id = 25;
            $department->name = "Arauca";
            $department->save();

        }

        if(Department::where("id", 26)->count() == 0){

            $department = new Department;
            $department->id = 26;
            $department->name = "Casanare";
            $department->save();

        }


        if(Department::where("id", 27)->count() == 0){

            $department = new Department;
            $department->id = 27;
            $department->name = "Putumayo";
            $department->save();

        }

        if(Department::where("id", 28)->count() == 0){

            $department = new Department;
            $department->id = 28;
            $department->name = "San Andres";
            $department->save();

        }

        if(Department::where("id", 29)->count() == 0){

            $department = new Department;
            $department->id = 29;
            $department->name = "Amazonas";
            $department->save();

        }

        if(Department::where("id", 30)->count() == 0){

            $department = new Department;
            $department->id = 30;
            $department->name = "Guainia";
            $department->save();

        }

        if(Department::where("id", 31)->count() == 0){

            $department = new Department;
            $department->id = 31;
            $department->name = "Guaviare";
            $department->save();

        }

        if(Department::where("id", 32)->count() == 0){

            $department = new Department;
            $department->id = 32;
            $department->name = "Vaupes";
            $department->save();

        }

        if(Department::where("id", 33)->count() == 0){

            $department = new Department;
            $department->id = 33;
            $department->name = "Vichada";
            $department->save();

        }

    }
}
