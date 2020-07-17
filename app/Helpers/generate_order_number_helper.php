<?php
if (!function_exists('generateOrderNumber')) {

    function generateOrderNumber($alpha = true, $nums = true, $usetime = false, $string = '', $length = 120) {
        $alpha = ($alpha == true) ? 'abcdefghijklmnopqrstuvwxyz' : '';
        $nums = ($nums == true) ? '1234567890' : '';
    
        if ($alpha == true || $nums == true || !empty($string)) {
            if ($alpha == true) {
                $alpha = $alpha;
                $alpha .= strtoupper($alpha);
            }
        }
        $randomstring = '';
        $totallength = $length;
        for ($na = 0; $na < $totallength; $na++) {
            $var = (bool) rand(0, 1);
            if ($var == 1 && $alpha == true) {
                $randomstring .= $alpha[(rand() % mb_strlen($alpha))];
            } else {
                $randomstring .= $nums[(rand() % mb_strlen($nums))];
            }
        }
        if ($usetime == true) {
            $randomstring = $randomstring . time();
        }
        if ($randomstring) {
            $CI = & get_instance();
            $CI->db->select('OrderId');
            $CI->db->where('OrderNumber', $randomstring);
            $query = $CI->db->get('tblorders');
            if ($query->num_rows() > 0) {
                generateOrderNumber(false, true, false, '', 8);
            } else {
                return $randomstring;
            }
        }
    }

}

?>