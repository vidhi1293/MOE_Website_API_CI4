<?php
if (!function_exists('getFormattedBody')) {

    function getFormattedBody($res=null,$body=null)
    {
        $CI = & get_instance();
        try{
            $CurrentYear = date("Y");
            $data = json_decode(json_encode($res), True);

            $FirstName = (isset($data['FirstName'])?$data['FirstName']:'Not assigned');
            $LastName = (isset($data['LastName'])?$data['LastName']:'Not assigned');
            $EmailAddress = (isset($data['EmailAddress'])?$data['EmailAddress']:'Not assigned');
            $loginUrl = (isset($data['loginUrl'])?$data['loginUrl']:'Not assigned');
            $Password = (isset($data['Password'])?$data['Password']:'Not assigned');
            $UserName = (isset($data['UserName'])?$data['UserName']:'');
            $ContactEmail = (isset($data['ContactEmail'])?$data['ContactEmail']:'');
            $ContactPhoneNo = (isset($data['ContactPhoneNo'])?$data['ContactPhoneNo']:'');
            $Message = (isset($data['Message'])?$data['Message']:'');
            $AcceptURL = (isset($data['AcceptURL'])?$data['AcceptURL']:'');
            $DeclineURL = (isset($data['DeclineURL'])?$data['DeclineURL']:'');
            $toolUrl = (isset($data['toolUrl'])?$data['toolUrl']:'');
            $WorkspaceURL = (isset($data['toolUrl'])?$data['WorkspaceURL']:'');

            $ModuleName = (isset($data['ModuleName'])?$data['ModuleName']:'');
            $CategoryName = (isset($data['CategoryName'])?$data['CategoryName']:'');
            $UserName = (isset($data['UserName'])?$data['UserName']:'');
            $Message = (isset($data['Message'])?$data['Message']:'');

            $ForgotUrl = (isset($data['forgotUrl'])?$data['forgotUrl']:'');
            $QuestionnaireName = (isset($data['QuestionnaireName'])?$data['QuestionnaireName']:'');

            $LineManager = (isset($data['LineManager'])?$data['LineManager']:'Not assigned');
            $Requester = (isset($data['Requester'])?$data['Requester']:'');
            $ForgotUrl = (isset($data['forgotUrl'])?$data['forgotUrl']:'');
            $HrName = (isset($data['HrName'])?$data['HrName']:'');
            $EvaluationName = (isset($data['EvaluationName'])?$data['EvaluationName']:'');
            $EvaluationTypeName = (isset($data['EvaluationTypeName'])?$data['EvaluationTypeName']:'');
            $EvaluationOf = (isset($data['EvaluationOf'])?$data['EvaluationOf']:'');
            $EvaluationDate = (isset($data['EvaluationDate'])?$data['EvaluationDate']:'');
            $MeetingDate = (isset($data['MeetingDate'])?$data['MeetingDate']:'');
            $RequesterComments = (isset($data['RequesterComments'])?$data['RequesterComments']:'');
            $HrComments = (isset($data['HrComments'])?$data['HrComments']:'');
            $CurrentExpiryDate = (isset($data['CurrentExpiryDate'])?$data['CurrentExpiryDate']:'');
            $ExtendedExpiryDate = (isset($data['NewEndDate'])?$data['NewEndDate']:'');
            $ExtendedDays = (isset($data['ExtendedDays'])?$data['ExtendedDays']:'');
            $EvaluationStartDate = (isset($data['EvaluationStartDate'])?$data['EvaluationStartDate']:'');
            $EvaluationEndDate = (isset($data['EvaluationEndDate'])?$data['EvaluationEndDate']:'');
            $JoiningDate = (isset($data['JoiningDate'])?$data['JoiningDate']:'');

            $body = str_replace("{ FirstName }",$FirstName,$body);
            $body = str_replace("{ LastName }",$LastName,$body);
            $body = str_replace("{ Email }",$EmailAddress,$body);
            $body = str_replace("{login_url}",$loginUrl,$body);
            $body = str_replace("{ Password }",$Password,$body);
            $body = str_replace("{ Name }",$UserName,$body);
            $body = str_replace("{ ContactEmail }",$ContactEmail,$body);
            $body = str_replace("{ Phone }",$ContactPhoneNo,$body);
            $body = str_replace("{tool_url}",$toolUrl,$body);
            $body = str_replace("{WorkspaceURL}",$WorkspaceURL,$body);

            $body = str_replace("{ModuleName}",$ModuleName,$body);
            $body = str_replace("{CategoryName}",$CategoryName,$body);
            $body = str_replace("{UserName}",$UserName,$body);
            $body = str_replace("{Message}",$Message,$body);

            $body = str_replace("{current_year}",$CurrentYear,$body);
            $body = str_replace("{website_url}",WEBSITE_URL,$body);
            $body = str_replace("{accept_url}",$AcceptURL,$body);
            $body = str_replace("{decline_url}",$DeclineURL,$body);

            $body = str_replace("{Password}",$Password,$body);
            $body = str_replace("{key_url}",''.BASE_URL.'/assets/images/users_lock.jpg',$body);
            $body = str_replace("{forgot_url}",$ForgotUrl,$body);
            $body = str_replace("{userName}",$UserName,$body);
            $body = str_replace("{QuestionnaireName}",$QuestionnaireName,$body);

            $body = str_replace("{LineManager}",$LineManager,$body);
            $body = str_replace("{Password}",$Password,$body);

            if(WEBSITE_URL=='OpenEyes Technologies Inc.'){
                $body = str_replace("{logo_url}",''.BASE_URL.'/assets/images/oeti_e.png',$body);
            } else {
                $body = str_replace("{logo_url}",''.BASE_URL.'/assets/images/oess_e.png',$body);
            }

            $body = str_replace("{key_url}",''.BASE_URL.'/assets/images/users_lock.jpg',$body);
            $body = str_replace("{requester}",$Requester,$body);
            $body = str_replace("{hrName}",$HrName,$body);
            $body = str_replace("{userName}",$UserName,$body);
            $body = str_replace("{evaluationName}",$EvaluationName,$body);
            $body = str_replace("{evaluationType}",$EvaluationTypeName,$body);
            $body = str_replace("{evaluationOf}",$EvaluationOf,$body);
            $body = str_replace("{evaluationDate}",$EvaluationDate,$body);
            $body = str_replace("{meetingDate}",$MeetingDate,$body);
            $body = str_replace("{requesterComment}",$RequesterComments,$body);
            $body = str_replace("{hrComment}",$HrComments,$body);
            $body = str_replace("{currentExpiryDate}",$CurrentExpiryDate,$body);
            $body = str_replace("{extendedExpiryDate}",$ExtendedExpiryDate,$body);
            $body = str_replace("{extendedDays}",$ExtendedDays,$body);
            $body = str_replace("{startDate}",$EvaluationStartDate,$body);
            $body = str_replace("{expiryDate}",$EvaluationEndDate,$body);
            $body = str_replace("{joiningDate}",$JoiningDate,$body);
            return $body;
        }   
        catch(Exception $e){
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
    }

}

?>