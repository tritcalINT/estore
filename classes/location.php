<?php
/*
* Author: Rohit Kumar
* Website: iamrohit.in
* Version: 0.0.1
* Date: 25-04-2015
* App Name: Php+ajax country state city dropdown
* Description: A simple oops based php and ajax country state city dropdown list
*/
include('../include/database.php');

class location {
  
   public static $data;

   function __construct() {
     parent::__construct();
   }
 
 // Fetch all countries list
   public static function getCountries() {
//     try {
       $query = "SELECT id, name FROM countries";
       $result = $database->query($query);
//       echo 'aaaa';
//       if(!$result) {
//         throw new exception("Country not found.");
//       }
       $res = array();
       while($resultSet =$database->fetch_row($result)) {
        $res[$resultSet['id']] = $resultSet['name'];
       }
       $data = array('status'=>'success', 'tp'=>1, 'msg'=>"Countries fetched successfully.", 'result'=>$res);
       
//     } catch (Exception $e) {
//       $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
//     } finally {
        return $data;
//     }
   }

  // Fetch all states list by country id
  public static function getStates($countryId) {
//     try {
       $query = "SELECT id, name FROM states WHERE country_id=".$countryId;
       $result = $database->query($query);
//       if(!$result) {
//         throw new exception("State not found.");
//       }
       $res = array();
       while($resultSet = $database->fetch_row($result)) {
        $res[$resultSet['id']] = $resultSet['name'];
       }
       $data = array('status'=>'success', 'tp'=>1, 'msg'=>"States fetched successfully.", 'result'=>$res);
//     } catch (Exception $e) {
//       $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
//     } finally {
        return $data;
//     }
   }

 // Fetch all cities list by state id
  public static function getCities($stateId) {
//     try {
       $query = "SELECT id, name FROM cities WHERE state_id=".$stateId;
       $result = $database->query($query);
//       if(!$result) {
//         throw new exception("City not found.");
//       }
       $res = array();
       while($resultSet =  $database->fetch_row($result)) {
        $res[$resultSet['id']] = $resultSet['name'];
       }
       $data = array('status'=>'success', 'tp'=>1, 'msg'=>"Cities fetched successfully.", 'result'=>$res);
//     } catch (Exception $e) {
//       $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
//     } finally {
        return $data;
//     }
   }   


}
