<?php namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{

    /***** Add/Update Country *****/
    public function addEditCountry($post_Country)
	{
		try{
			if ($post_Country) {
				/***** Start Check same abbreviation *****/
				if(trim($post_Country['CountryId'])==0)
				{
					$this->db->select('CountryAbbreviation,CountryName,PhonePrefix');
					$this->db->from('tblmstcountry');
					$this->db->where('CountryAbbreviation', strtoupper(trim($post_Country['CountryAbbreviation'])));
					$this->db->or_where('CountryName', trim($post_Country['CountryName']));
					$this->db->or_where('PhonePrefix', trim($post_Country['PhonePrefix']));
					$this->db->limit(1);
					$query = $this->db->get();
					$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) {
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
					if ($query->num_rows() == 1) {
						$result = $query->getResult();
						if($result[0]->CountryName==trim($post_Country['CountryName'])){
							return 'Duplicate CountryName';
						} elseif($result[0]->CountryAbbreviation==trim($post_Country['CountryAbbreviation'])){
							return 'Duplicate CountryAbbreviation';
						} else {
							return 'Duplicate PhonePrefix';
						}						
					} 
				} else {
					$this->db->select('CountryAbbreviation,CountryName,PhonePrefix');
					$this->db->from('tblmstcountry');
					$this->db->where('CountryId!='.$post_Country["CountryId"].' AND (CountryAbbreviation="'.strtoupper(trim($post_Country["CountryAbbreviation"])).'" OR  CountryName="'.trim($post_Country["CountryName"]).'" OR PhonePrefix='.trim($post_Country["PhonePrefix"]).')', NULL);
					// $this->db->where('CountryId!=',$post_Country["CountryId"]);
					// $this->db->or_where('CountryAbbreviation', strtoupper(trim($post_Country['CountryAbbreviation'])));
					// $this->db->or_where('CountryName', trim($post_Country['CountryName']));
					// $this->db->or_where('PhonePrefix', trim($post_Country['PhonePrefix']));
					$this->db->limit(1);
					$query = $this->db->get();
					$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) {
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
					if ($query->num_rows() == 1) {
						$result = $query->getResult();
						if($result[0]->CountryName==trim($post_Country['CountryName'])){
							return 'Duplicate CountryName';
						} elseif($result[0]->CountryAbbreviation==trim($post_Country['CountryAbbreviation'])){
							return 'Duplicate CountryAbbreviation';
						} else {
							return 'Duplicate PhonePrefix';
						}	
					}	
				}
				/***** End Check same abbreviation *****/
				$IsActive = $post_Country['IsActive'] == 1 ? true : false;			
				$country_data = array(
					'CountryId' => trim($post_Country['CountryId']),
					'CountryName' => trim($post_Country['CountryName']),
					'CountryAbbreviation' => strtoupper(trim($post_Country['CountryAbbreviation'])),
					'PhonePrefix' => trim($post_Country['PhonePrefix']),
					'UserId' => trim($post_Country['UserId']),
					'IsActive' => $IsActive
				);
				$res = $this->db->query('call AddUpdateCountry(?,?,?,?,?,?)',$country_data);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) {
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				if ($res) {
					return 'Successful';
				} else {
					return false;
				}
			}
			else {
				return false;
			}
		}
		catch (Exception $e) {
			trigger_error($e->getMessage(), E_USER_ERROR);
			return false;
		}	
	}

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
		catch (\Exception $e) {
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
				$result = $this->db->query('call GetCountries(?)',$Active);
				$res = array();
				if ($result->getResult()) {
					$res = $result->getResult();
				}
				return $res;
			} else {
				return false;
			}
		} catch (\Exception $e) {
			//InsertErrorLog($e->getMessage(),$e->getFile(),$e->getLine());
			die($e->getMessage());
			//  return false;
		}
	}

}