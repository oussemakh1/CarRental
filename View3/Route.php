<?php


  $curentFolder = getcwd();

if(strpos($curentFolder,'Vehicules')){


  //Insert car
  $carInsertPage = 'Vehicule_insert.php';

  //Edit car
  $carEditPage = 'Vehicule_edit.php';

  //Update car
  $carUpdatePage = 'Vehicule_update.php';

  //Car data
  $carDataPage = 'Vehicule_data.php';

  //Cars management
  $carManagementPage = 'Vehicules.php';

  //All cars Lis
  $carsListPage = 'Vehicules_all.php';


}elseif(strpos($curentFolder,'Dashboard')){

    //Insert car
    $carInsertPage = '../Vehicules/Vehicule_insert.php';

    //Edit car
    $carEditPage = '../Vehicules/Vehicule_edit.php';

    //Update car
    $carUpdatePage = '../Vehicules/Vehicule_update.php';

    //Car data
    $carDataPage = '../Vehicules/Vehicule_data.php';

    //Cars management
    $carManagementPage = '../Vehicules/Vehicules.php';

    //All cars Lis
    $carsListPage = '../Vehicules/Vehicules_all.php';
}elseif(strpos($curentFolder,'Locations')){


  //Insert car
  $carInsertPage = '../Vehicules/Vehicule_insert.php';

  //Edit car
  $carEditPage = '../Vehicules/Vehicule_edit.php';

  //Update car
  $carUpdatePage = '../Vehicules/Vehicule_update.php';

  //Car data
  $carDataPage = '../Vehicules/Vehicule_data.php';

  //Cars management
  $carManagementPage = '../Vehicules/Vehicules.php';

  //All cars Lis
  $carsListPage = '../Vehicules/Vehicules_all.php';



}
