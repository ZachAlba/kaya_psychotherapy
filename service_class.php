<?php
    class Service {
        
        public string $service_name;
        public string $service_description;
        protected float $service_price;
        public int $service_duration;
        protected int $services_available;
        
        // Constructor
        public function __construct($service_name, $service_description, $service_price, $service_duration, $services_available) {
            
            $this->service_name = $service_name;
            $this->service_description = $service_description;
            $this->service_price = $service_price;
            $this->service_duration = $service_duration;
            $this->services_available = $services_available;
            
        }
        // Getters
        public function getServicePrice() {
            return $this->service_price;
        }
        public function getServiceAvailability() {
            return $this->services_available;
        }
        // Setters
        public function setServicePrice($service_price) {
            $this->service_price = $service_price;
        }
        public function changeServiceAvailability($services_available) {
            $this->services_available = $services_available;
        }

        public function bookService() {
            if ($this->getServiceAvailability()>0){
                $this->changeServiceAvailability($this->getServiceAvailability()-1);
                echo "Service booked successfully";
            }
            else {
                echo "Service is not available";
            }
        }
    }
?>