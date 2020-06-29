<?php

if(!class_exists("Techie_NepaliCalendar")){
    Class Techie_NepaliCalendar{
        private $calendar;
        private static $instance;

        public static function getInstance(){
            return is_null(static::$instance)?new Techie_NepaliCalendar():static::$instance;
        }

        public function convertPostDate($the_date,$format,$post){
            $time=$this->is24HourDate($post->post_date);
            return $time?$this->translateTime($time):$this->techieConvertNepaliDate($the_date,$format);
        }

        public function techieConvertNepaliTime($the_time,$format,$post){
            return !$this->is24HourDate($post->post_date)?convertNumbertoNepali($the_time):"";
        }

        function techieConvertNepaliDate($date, $format=''){
            if($format===""){
                $format=get_option( 'date_format' );
            }
            if(get_locale()==='en_US'){
                try{
                    $date=date_create_from_format($format,$date);
                }
                catch(Exception $e){
                    var_dump($date);
                    var_dump($e->getMessage());
                }
            }

            if(isset($date)){
                return $this->techie24HourFormat($date)?$this->techie24HourFormat($date):$this->techieFormatDate($date,$format);
            }
            else{
                return $date;
            }

        }
        
        function is24HourDate($date){
            $date_str=human_time_diff(current_time('timestamp'),strtotime($date));
            if(strpos($date_str,"seconds")>-1||strpos($date_str,"hours")>-1||strpos($date_str,"mins")>-1){
                return $date_str;
            }
            else{
                return false;
            }
        }

        function translateTime($time){
            $nepali_time=convertNumbertoNepali($time);
            $nepali_time=str_replace("mins","मिनेट",$nepali_time);
            $nepali_time=str_replace("hours","घण्टा",$nepali_time);
            $nepali_time=str_replace("seconds","सेकेन्ड",$nepali_time);
            return $nepali_time." अगाडी";
        }

        function techieFormatDate($date,$format){

            $calendar=NepaliCalendar::getInstance();
            $calendar_values=$calendar->engToNep( $date->format("Y"),$date->format("m"),$date->format("d"));
            $calendar_values=array_map(function($val){
                $val=is_int($val)?convertNumbertoNepali($val):$val;
                return $val;
            },$calendar_values);

            if(strpos($calendar_values["day"],"बार")>-1&&strpos($format,"D")>-1){
                $calendar_values["day"]=str_replace("बार", "", $calendar_values["day"]);
            }
            $nepaliDate=str_replace(array("Y","y"),$calendar_values["year"],$format);
            $nepaliDate=str_replace(array("F","M"),$calendar_values["nmonth"],$nepaliDate);
            $nepaliDate=str_replace(array("m","n"),$calendar_values["month"],$nepaliDate);
            $nepaliDate=str_replace(array("d","j"),$calendar_values["date"],$nepaliDate);
            $nepaliDate=str_replace(array("D","l"),$calendar_values["day"],$nepaliDate);
            $nepaliDate=apply_filters("techie_nepali_date_format",$nepaliDate,$calendar_values);
            return $nepaliDate;
        }

        function techie24HourFormat($date){
            $now=new DateTime("now");
            return false;
        }
    }
}

function getNepaliDate(){
    return Techie_NepaliCalendar::getInstance();
}

add_filter('get_the_date',array(getNepaliDate(),'convertPostDate'),10,3);
add_filter("get_the_time",array(getNepaliDate(),"techieConvertNepaliTime"),10,3);

