<?php namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{
    //protected $table = 'tblusers';

    /***** Get Country by country_id *****/
	public function getById($countryId = Null)
	{
		try{
			if ($countryId) {
                $result = $this->db->query('call GetCountryById(?)',$countryId);
				$country_data = array();
				foreach ($result->getResult() as $row) {
					$country_data = $row;
				}
				return $country_data;
			} else {
				return false;
			}
		}
		catch (Exception $e) {
			trigger_error($e->getMessage(), E_USER_ERROR);
			return false;
		}	
	}

	/***** Get All Countries *****/
	public function getAllCountry($IsActive = Null)
	{
		try {
			if ($IsActive) {
				$Active = $IsActive == 1 ? 1 : 0;	
				$result = $db->query('call GetCountries(?)',$Active);
				$db_error = $db->error();
				if (!empty($db_error) && !empty($db_error['code'])) {
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				$res = array();
				if ($result->result()) {
					$res = $result->result();
				}
				return $res;
			} else {
				return false;
			}
		} catch (Exception $e) {
			trigger_error($e->getMessage(), E_USER_ERROR);
			return false;
		}
	}

}