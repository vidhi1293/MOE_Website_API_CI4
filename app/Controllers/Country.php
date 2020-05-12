<?php namespace App\Controllers;

use App\Models\CountryModel;

class Country extends BaseController
{
	
    /***** Get Country by country_id *****/
    public function getById($countryId=null)
    {	
        $model = new CountryModel();
        if(!empty($countryId)) {
            $data=[];
            $data=$model->getById($countryId);
            if($data){
                return $data;
            } else {
                $this->response([
                    'message' => 'Something is wrong!'
                ], REST_Controller::HTTP_NOT_FOUND); 
            }		
        } else {
            $this->response([
                'message' => 'Something is wrong!'
            ], REST_Controller::HTTP_BAD_REQUEST); 
        }	
    }

    /***** Get All Countries *****/
    public function getAll($IsActive=null)
    {	
        $model = new CountryModel();
        if(!empty($IsActive)) {	
            $country = $IsActive == 1 ? COUNTRY_AC : COUNTRY_ALL;			
            if ( ! $getCacheData = $this->cache->get($country)){ 
                $data=$model->getAllCountry($IsActive);
                $this->cache->save($country, $data, CACHE_EXPIRE_TIME);
            } else {
                $data = $getCacheData;
            }
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'message' => 'Something is wrong!'
            ], REST_Controller::HTTP_BAD_REQUEST); 
        }	
    }

}
