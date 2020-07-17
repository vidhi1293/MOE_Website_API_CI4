<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CountryModel;

class Country extends ResourceController
{
    protected $modelName = 'App\Models\CountryModel';
    use ResponseTrait;
    
    /***** Add/Update Country *****/
	public function addUpdate_post()
	{
		$this->auth();
		$post_Country = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_Country) {
			$result = $this->Country_model->addEditCountry($post_Country);
			if($result=='Successful') {	
				$this->cache->delete(COUNTRY_AC);
				$this->cache->delete(COUNTRY_ALL);
				return $this->respond($result, ResourceController::HTTP_OK); 
			} elseif($result=='Duplicate CountryName') {
				return $this->respond([
					'message' => 'Dublicate Country Name'
				], ResourceController::HTTP_BAD_REQUEST); 
			} elseif($result=='Duplicate PhonePrefix') {
				return $this->respond([
					'message' => 'Dublicate PhonePrefix'
				], ResourceController::HTTP_BAD_REQUEST); 
			} elseif($result=='Duplicate CountryAbbreviation') {
				return $this->respond([
					'message' => 'Dublicate Country Abbreviation'
				], ResourceController::HTTP_BAD_REQUEST); 
			} else {
				return $this->respond([
					'message' => 'Something is wrong!'
				], ResourceController::HTTP_NOT_FOUND); 
			}
		} else {
			return $this->respond([
				'message' => 'Something is wrong!'
			], ResourceController::HTTP_NOT_FOUND);  
		}				
	}

    /***** Get Country by country_id *****/
    public function getById($countryId=null)
    {	
        if(!empty($countryId)) {
			$data=[];
			$data=$this->model->getById($countryId);
			if($data){
				return $this->respond($data, ResourceController::HTTP_OK);
			} else {
				return $this->respond([
					'message' => 'Something is wrong!'
				], ResourceController::HTTP_NOT_FOUND); 
			}		
		} else {
			return $this->respond([
				'message' => 'Something is wrong!'
			], ResourceController::HTTP_BAD_REQUEST); 
		}	
    }

    /***** Get All Countries *****/
	public function getAll($IsActive=null)
	{	
		if(!empty($IsActive)) {	
            $data=$this->model->getAllCountry($IsActive);
			return $this->respond($data, ResourceController::HTTP_OK);
		} else {
			return $this->respond([
				'message' => 'Something is wrong!'
			], ResourceController::HTTP_BAD_REQUEST); 
		}	
	}

}
