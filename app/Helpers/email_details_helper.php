<?php
if (!function_exists('SendEmail')) {

    function SendEmail($smtpEmail=null, $to=null, $cc=null, $bcc=null, $subject=null, $body=null)
    {
        $CI = & get_instance();
        try{
            $CI->email->from($smtpEmail, 'OpenEyes Technologies Inc.');
            $CI->email->to($to);        
            $CI->email->subject($subject);
            $CI->email->cc($cc);
            $CI->email->bcc($bcc);
            $CI->email->message($body);
            if($CI->email->send())
            {
                $email_log = array(
                    'From' => trim($smtpEmail),
                    'Cc' => trim($cc),
                    'Bcc' => trim($bcc),
                    'To' => trim($to),
                    'Subject' => trim($subject),
                    'EmailBody' => trim($body),
                );  
                $res = $CI->db->insert('tblemaillog',$email_log);   
                if (!empty($db_error) && !empty($db_error['code'])) { 
                    throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                    return false; // unreachable return statement !!!
                }
                if($res){
                    return true; 
                } else { 
                    return false; 
                }
            }else
            { 
                return false;
            }
        }   
        catch(Exception $e){
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
    }

}

if (!function_exists('getSmtpDetails')) {

    function getSmtpDetails()
    {
        $CI = & get_instance();
        try{
            $CI->db->select('Value');
			$CI->db->where('Key','EmailFrom');
			$smtp1 = $CI->db->get('tblmstconfiguration');	
			$row1 = $smtp1->result();
			$smtpEmail = $row1[0]->Value;
			
			$CI->db->select('Value');
			$CI->db->where('Key','EmailPassword');
			$smtp2 = $CI->db->get('tblmstconfiguration');	
			$row2 = $smtp2->result();
            $smtpPassword = $row2[0]->Value;

            $CI->db->select('Value');
			$CI->db->where('Key','SmtpHost');
			$smtp3 = $CI->db->get('tblmstconfiguration');	
			$row3 = $smtp3->result();
            $smtpHost = $row3[0]->Value;

            $CI->db->select('Value');
			$CI->db->where('Key','SmtpPort');
			$smtp4 = $CI->db->get('tblmstconfiguration');	
			$row4 = $smtp4->result();
            $smtpPort = $row4[0]->Value;
                
            $res['smtpEmail']=$smtpEmail;
            $res['smtpPassword']=$smtpPassword;
            $res['smtpHost']=$smtpHost;
            $res['smtpPort']=$smtpPort;
            if($res){
                return $res;
            }
            else{
                return false;
            }
        }   
        catch(Exception $e){
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
    }
    
}

if (!function_exists('getEmailDetails')) {

    function getEmailDetails($EmailToken= null,$UserId=null)
    {
        $CI = & get_instance();
        try{        
            $query = $CI->db->query("SELECT et.To,et.Subject,et.EmailBody,et.BccEmail,(SELECT GROUP_CONCAT(UserId SEPARATOR ',') FROM tblusers WHERE RoleId = et.To && ISActive = 1) AS totalTo,(SELECT GROUP_CONCAT(EmailAddress SEPARATOR ',') FROM tblusers WHERE RoleId = et.Cc && ISActive = 1) AS totalcc,(SELECT GROUP_CONCAT(EmailAddress SEPARATOR ',') FROM tblusers WHERE RoleId = et.Bcc && ISActive = 1) AS totalbcc FROM tblemailtemplate AS et LEFT JOIN tblmstemailtoken as token ON token.TokenId=et.TokenId WHERE token.TokenName = '".$EmailToken."' && et.IsActive = 1");
            $res=$query->result();
            if($res){            
                $row=$res[0];
                $queryTo = $CI->db->query('SELECT EmailAddress FROM tblusers where UserId = '.$UserId); 
                $rowTo = $queryTo->result();
                $query1 = $CI->db->query('SELECT p.PlaceholderId,p.PlaceholderName,t.TableName,c.ColumnName FROM tblmstemailplaceholder AS p LEFT JOIN tblmsttablecolumn AS c ON c.ColumnId = p.ColumnId LEFT JOIN tblmsttable AS t ON t.TableId = c.TableId WHERE p.IsActive = 1');
                $body = $row->EmailBody;  
                foreach($query1->result() as $row1){			
                    $query2 = $CI->db->query('SELECT '.$row1->ColumnName.' AS ColumnName FROM '.$row1->TableName.' AS tn LEFT JOIN tblmstroles AS role ON tn.RoleId = role.RoleId WHERE tn.UserId = '.$UserId);
                    $result2 = $query2->result();
                    $body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
                } 
                if($row->BccEmail!=''){
                    $bcc = $row->BccEmail.','.$row->totalbcc;
                } else {
                    $bcc = $row->totalbcc;
                }           
                $res['EmailBody']=$body;
                $res['Subject']=$row->Subject; 
                $res['Bcc']=$bcc;
                $res['To']=$rowTo[0]->EmailAddress;
                $res['Cc']=$row->totalcc; 
                return $res;
            } else {
                $res['EmailBody']='';
                $res['Subject']=''; 
                $res['Bcc']='';
                $res['To']='';
                $res['Cc']=''; 
                return $res;
            }
        }   
        catch(Exception $e){
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
    }
    
}

if (!function_exists('getEmailDetailsTool')) {

    function getEmailDetailsTool($EmailToken= null,$UserId=null,$DatabaseName=null)
    {
        $CI = & get_instance();
        $CI->tooldb = $CI->load->database('ToolDB', true);	
        $CI->tooldb->db_select($DatabaseName);
        try{        
            $query = $CI->tooldb->query("SELECT et.To,et.Subject,et.EmailBody,et.BccEmail,(SELECT GROUP_CONCAT(UserId SEPARATOR ',') FROM tblusers WHERE RoleId = et.To && ISActive = 1) AS totalTo,(SELECT GROUP_CONCAT(EmailAddress SEPARATOR ',') FROM tblusers WHERE RoleId = et.Cc && ISActive = 1) AS totalcc,(SELECT GROUP_CONCAT(EmailAddress SEPARATOR ',') FROM tblusers WHERE RoleId = et.Bcc && ISActive = 1) AS totalbcc FROM tblemailtemplate AS et LEFT JOIN tblmstemailtoken as token ON token.TokenId=et.TokenId WHERE token.TokenName = '".$EmailToken."' && et.IsActive = 1");
            $res=$query->result();
            if($res){            
                $row=$res[0];
                $queryTo = $CI->tooldb->query('SELECT EmailAddress FROM tblusers where UserId = '.$UserId); 
                $rowTo = $queryTo->result();
                $query1 = $CI->tooldb->query('SELECT p.PlaceholderId,p.PlaceholderName,t.TableName,c.ColumnName FROM tblmstemailplaceholder AS p LEFT JOIN tblmsttablecolumn AS c ON c.ColumnId = p.ColumnId LEFT JOIN tblmsttable AS t ON t.TableId = c.TableId WHERE p.IsActive = 1');
                $body = $row->EmailBody;  
                foreach($query1->result() as $row1){			
                    $query2 = $CI->tooldb->query('SELECT '.$row1->ColumnName.' AS ColumnName FROM '.$row1->TableName.' AS tn LEFT JOIN tblmstroles AS role ON tn.RoleId = role.RoleId WHERE tn.UserId = '.$UserId);
                    $result2 = $query2->result();
                    $body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
                } 
                if($row->BccEmail!=''){
                    $bcc = $row->BccEmail.','.$row->totalbcc;
                } else {
                    $bcc = $row->totalbcc;
                }           
                $res['EmailBody']=$body;
                $res['Subject']=$row->Subject; 
                $res['Bcc']=$bcc;
                $res['To']=$rowTo[0]->EmailAddress;
                $res['Cc']=$row->totalcc; 
                return $res;
            } else {
                $res['EmailBody']='';
                $res['Subject']=''; 
                $res['Bcc']='';
                $res['To']='';
                $res['Cc']=''; 
                return $res;
            }
        }   
        catch(Exception $e){
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
    }
    
}

?>