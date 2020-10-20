<?php

//Include location
include '../../Modals/Location.php';



class DashboardController
{

   private $db;
   private $Location;

   public function __construct()
   {

     $this->db = new Database();
     $this->Location = new Location();
   }





   //Get each car profit
   public function profitByCar()
   {
     //Query
     $query = "SELECT SUM(prix_ht) as profit,marque_vehicule as marque FROM location GROUP BY marque_vehicule ORDER BY SUM(prix_ht) LIMIT 4";

     //Fetch
     $fetch = $this->db->query($query);

     if($fetch){
       $profitBycar = $fetch->fetchAll();
       return $profitBycar;
     }
   }


   //Clients growth percentage
   public function clientsGrowthPercentage()
   {
     //Query
     $thisMonthQuery = "SELECT COUNT(id) FROM clients  WHERE MONTH(CURRENT_DATE) = MONTH(CURRENT_DATE)";
     $previousMonthQuery = "SELECT COUNT(id) FROM clients WHERE MONTH(CURRENT_DATE) = MONTH(CURRENT_DATE)-1";

     $fetch1= $this->db->query($thisMonthQuery);
     $fetch2 = $this->db->query($previousMonthQuery);

     $thisMonthClients = $fetch1->fetchColumn();
     $previousMonthClients = $fetch2->fetchColumn();


     $stat;
     if($thisMonthClients > $previousMonthClients)
     {
       $stat = "up";
     }else{
       $stat = "down";
     }

     if($previousMonthClients > 0){
       $growthPercentage  = ($thisMonthClients * 100) / $previousMonthClients;



       $growth = [
         "percentage" => $growthPercentage,
         "stat" =>$stat
       ];
       return $growth;
     }else{

       $growth = [
         "percentage" => "100",
         "stat" =>$stat
       ];
       return $growth;

     }

   }



   //reparation expenses growth percentage
   public function reparationGrowthPercentage()
   {
     //Query
     $thisMonthQuery = "SELECT COUNT(id) FROM reparation  WHERE MONTH(CURRENT_DATE) = MONTH(CURRENT_DATE)";
     $previousMonthQuery = "SELECT COUNT(id) FROM reparation WHERE MONTH(CURRENT_DATE) = MONTH(CURRENT_DATE)-1";

     $fetch1= $this->db->query($thisMonthQuery);
     $fetch2 = $this->db->query($previousMonthQuery);

     $thisMonthreparation = $fetch1->fetchColumn();
     $previousMonthreparation = $fetch2->fetchColumn();


     $stat;
     if($thisMonthreparation > $previousMonthreparation)
     {
       $stat = "up";
     }else{
       $stat = "down";
     }

     if($previousMonthLocation > 0){
       $growthPercentage  = ($thisMonthreparation * 100) / $previousMonthreparation;

       $growth = [
         "percentage" => $growthPercentage,
         "stat" =>$stat
       ];
       return $growth;
     }else{

       $growth = [
         "percentage" => "100",
         "stat" =>$stat
       ];
       return $growth;

     }

   }


   //profit growth
   public function profitGrowthPercentage()
   {
     //Query
     $thisMonthQuery = "SELECT SUM(prix_ht) FROM location  WHERE MONTH(CURRENT_DATE) = MONTH(CURRENT_DATE)";
     $previousMonthQuery = "SELECT SUM(prix_ht) FROM location WHERE MONTH(CURRENT_DATE) = MONTH(CURRENT_DATE)-1";

     $fetch1= $this->db->query($thisMonthQuery);
     $fetch2 = $this->db->query($previousMonthQuery);

     $thisMonthprofit = $fetch1->fetchColumn();
     $previousMonthprofit = $fetch2->fetchColumn();


     $stat;
     if($thisMonthprofit > $previousMonthprofit)
     {
       $stat = "up";
     }else{
       $stat = "down";
     }

     if($previousMonthprofit > 0){
       $growthPercentage  = ($thisMonthprofit * 100) / $previousMonthprofit;

       $growth = [
         "percentage" => $growthPercentage,
         "stat" =>$stat
       ];
       return $growth;
     }else{

       $growth = [
         "percentage" => "100",
         "stat" =>$stat
       ];
       return $growth;

     }

   }


   //Get revenu from location
   public function getRevenuFromLocation()
   {
        //Query
        $query = "SELECT SUM(prix_ht) FROM location";

        //Execute
        $Profit = $this->db->query($query);

        if($Profit){
          return $Profit->fetchColumn();
        }else{
          return 0;
        }
   }

   //Get reparation expenses
   public function getExpenseFromReparation()
   {
     //Query
     $query = "SELECT SUM(montant) FROM reparation";

     //expenses
     $Expenses = $this->db->query($query);

     if($Expenses){
       return $Expenses->fetchColumn();
     }else{
       return  0;
     }
   }


   //Get number of clients
   public function getTotalClients()
   {
     //Query
     $query ="SELECT COUNT(id) FROM clients";

     //Total clients
     $TotalClients = $this->db->query($query);

     if($TotalClients){
       return $TotalClients->fetchColumn();
     }else{
       return 0;
     }
   }


   //Get number of cars dispo
   public function getTotalCarsDispo()
   {
       $query = "SELECT COUNT(id) FROM cars WHERE cars.n_serie
                                  NOT IN(SELECT reparation.n_serie FROM reparation WHERE reparation.date_sortie_garage > CURRENT_DATE())
                                  AND cars.n_serie NOT IN(SELECT n_serie FROM location WHERE location.date_retour > CURRENT_DATE())
                                   AND cars.n_serie NOT IN(SELECT n_serie FROM reservation WHERE reservation.date_retour > CURRENT_DATE())
                                 ";
        $dispoCar = $this->db->query($query);

        if($dispoCar){
          return $dispoCar->fetchColumn();
        }else{
          return 0;
        }
    }

   //Get  recent location
   public function getRecentLocation()
   {

     //Query
     $query ="SELECT * FROM location ORDER BY id DESC LIMIT 5";

     //Fetch
     $recentLocation = $this->db->query($query);

     if($recentLocation){
       return $recentLocation->fetchAll();
     }else{
       return 0;
     }
   }

     //Get recent reservation
     public function getRecentReservation()
     {
       //Query
       $query = "SELECT * FROM reseravtion ORDER BY id DESC LIMIT 5";

       //Fetch
       $recentReservation = $this->db->query($query);

       if($recentReservation){
         return $recentReservation->fetchAll();
       }else{
         return 0;
       }
     }


    /** GET PROFIT BY MONTH **/
    public function getProfitByMonth()
    {

        $profitByMonth = [];
        for($month=1;$month<13;$month++)
        {
          //QUERY
          $query = "SELECT SUM(prix_ht) FROM location WHERE MONTH(paye_le) = $month";

          //Execute
          $fetch = $this->db->query($query);

          $profit = $fetch->fetchColumn();
          if($profit>0){
            array_push($profitByMonth,$profit);
            }
            else{
            $profit = 0;
            array_push($profitByMonth,$profit);
          }

        }


        return $profitByMonth;

    }

     //Profit this month and last month
     public function profitThisPervMonth()
     {
       //Query
       $thisMonthQuery = "SELECT SUM(prix_ht) FROM location WHERE MONTH(CURRENT_DATE) = MONTH(CURRENT_DATE)";
       $prevMonthQuery = "SELECT SUM(prix_ht) FROM location WHERE MONTH(CURRENT_DATE) = MONTH(CURRENT_DATE) - 1";


       //Fetch
       $thisMonthFetch = $this->db->query($thisMonthQuery);
       $prevMonthFetch = $this->db->query($prevMonthQuery);

       //Profit
       $thisMonthProfit = $thisMonthFetch->fetchColumn();
       $prevMonthProfit = $prevMonthFetch->fetchColumn();

       $data = [
         'thisMonth' => $thisMonthProfit,
         'prevMonth' => $prevMonthProfit
       ];

       return $data;
     }


    //Get  Number of reservation
    public function getTotalReservationBymonth()
    {

      $reservationByMonth = [];
      for($month=1;$month<13;$month++)
      {
        //Query
        $query = "SELECT COUNT(id) FROM devis WHERE MONTH(date_devis) = $month";

        //Fetch
        $fetch = $this->db->query($query);

        $TotalReservation = $fetch->fetchColumn();

        if($TotalReservation>0)
        {
          array_push($reservationByMonth,$TotalReservation);
        }
        else{
        $TotalReservation  =0;
        array_push($reservationByMonth,$TotalReservation);
      }
      }
      return $reservationByMonth;

    }



        //Get  Number of location
        public function getTotalLocationBymonth()
        {

          $locationByMonth = [];
          for($month=1;$month<13;$month++)
          {
            //Query
            $query = "SELECT COUNT(id) FROM location WHERE MONTH(paye_le) = $month";

            //Fetch
            $fetch = $this->db->query($query);

            $TotalLocation = $fetch->fetchColumn();

            if($TotalLocation>0)
            {
              array_push($locationByMonth,$TotalLocation);

            }else{
              $TotalLocation = 0;
              array_push($locationByMonth,$TotalLocation);
            }
          }
          return $locationByMonth;

        }



    //Get top 3 rented cars
    public function topRentCars()
    {
      //QUERY
      $query = "SELECT marque_vehicule, COUNT(id) as totalRent
                FROM location
                GROUP BY marque_vehicule
                ORDER BY COUNT(id) DESC LIMIT 3

                ";

      //Fetch
      $fetch = $this->db->query($query);

      if($fetch)
      {
          $top3Cars = $fetch->fetchAll();
          return $top3Cars;
      }
    }

    //Get top 3 reserved cars
    public function topReservedCars()
    {
      //Query
      $query = "SELECT marque_vehicule,COUNT(id) as totalReservation
                FROM reservation
                GROUP BY marque_vehicule
                ORDER BY COUNT(id) DESC LIMIT 3
      ";

      //Fetch
      $fetch = $this->db->query($query);

      if($fetch)
      {
          $top3Cars = $fetch->fetchAll();
          return $top3Cars;
      }
    }


    //Get top 3 repaired cars
    public function topRepairedCars()
    {
      //Query
      $query = "SELECT marque,COUNT(id) as totalRepaired
                FROM reparation
                GROUP BY marque
                ORDER BY COUNT(id) DESC LIMIT 3
      ";

      //Fetch
      $fetch = $this->db->query($query);

      if($fetch){
        return $top3Cars = $fetch->fetchAll();

      }
    }


    //Get recent Renting
    public function recentRenting()
    {
      //Query
      $query = "SELECT  * FROM location ORDER BY id DESC LIMIT 5";

      //Fetch
      $fetch = $this->db->query($query);


      if($fetch){
        $recentRent = $fetch->fetchAll();
        return $recentRent;
      }else{
        return false;
      }
    }



    //Most citys of clients
    public function mostClientCitys()
    {
      //Query
      $query ="SELECT ville,COUNT(id) as totalRent  FROM location  GROUP BY ville ORDER BY COUNT(ville) DESC LIMIT 6";

      //Fetch
      $fetch = $this->db->query($query);
      if($fetch){
        return $fetch->fetchAll();
      }else{

      }
    }

}





?>
