<?php

/***** Insert data into Activity log table *****/
if (!function_exists('InsertActivityLog')) {

    function InsertActivityLog($ModuleId=null, $UserId=null, $Module=null, $Activity=null)
    {
        $CI = & get_instance();
        try{
            $activity_log = array(
                'ModuleId' => trim($ModuleId),
                'UserId' => trim($UserId),
                'Module' => trim($Module),
                'Activity' => trim($Activity),
            );  
            $res = $CI->db->insert('tblactivitylog',$activity_log);   
            if (!empty($db_error) && !empty($db_error['code'])) { 
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return false; // unreachable return statement !!!
            }
            if($res){
                return true; 
            } else {
                return false; 
            }
        }   
        catch(Exception $e){
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
    }

}

/***** Insert data into Notification table *****/
if (!function_exists('InsertNotification')) {

    function InsertNotification($RoleId=null, $NotificationFor=null, $NotificationText=null, $ActionURL=null, $CreatedBy=null)
    {
        $CI = & get_instance();
        try{
            $notification = array(
                'RoleId' => trim($RoleId),
                'NotificationFor' => trim($NotificationFor),
                'NotificationText' => trim($NotificationText),
                'ActionURL' => trim($ActionURL),
                'CreatedBy' => trim($CreatedBy),
            );  
            $res = $CI->db->insert('tblnotifications',$notification);   
            if (!empty($db_error) && !empty($db_error['code'])) { 
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return false; // unreachable return statement !!!
            }
            if($res){
                return true; 
            } else {
                return false; 
            }
        }   
        catch(Exception $e){
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
    }

    /***** Insert data into Error log table *****/
if (!function_exists('InsertErrorLog')) {

    function InsertErrorLog($Message=null, $File=null, $Line=null)
    {
        echo 'test1';
        //$CI = & get_instance();
        try{
            $error_log = array(
                'errno' => null,
                'errtype' => null,
                'errstr' => trim($Message),
                'errfile' => trim($File),
                'errline' => trim($Line),
                'user_agent' => null,
                'ip_address' => null,
            );  
            $res = $this->db->insert('tblerrorlog',$error_log);   
            if($res){
                return true; 
            } else {
                return false; 
            }
        }   
        catch(Exception $e){
            die($e->getMessage());
            // trigger_error($e->getMessage(), E_USER_ERROR);
            // return false;
        }
    }

}

}

