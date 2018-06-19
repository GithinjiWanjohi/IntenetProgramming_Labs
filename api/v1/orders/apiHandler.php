<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/13/2018
 * Time: 6:44 PM
 */
    include_once "../../../PDOConnector.php";
    class ApiHandler{
        private $meal_name;
        private $meal_units;
        private $unit_price;
        private $status;
        private $user_api_key;

        public function setMealName($meal_name){
            $this->meal_name = $meal_name;
        }

        public function getMealName(){
            return $this->meal_name;
        }

        public function setUnitPrice($unit_price){
            $this->unit_price = $unit_price;
        }

        public function getMealUnits(){
            return $this->meal_units;
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function getStatus(){
            return $this->status;
        }

        public function setUserApiKey($key){
            $this->user_api_key = $key;
        }

        public function getUserApiKey(){
            return $this->user_api_key;
        }

        public function createOrder(){

        }
    }