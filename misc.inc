<?php
require_once 'site-private.inc.php';

function setDateTime($datetime) {
    if (empty($datetime) || $datetime == "") {
        $result = "";
    }
    else {
        # Split datetime by space
        $dt_ary = explode(" ", $datetime);

        $date = $dt_ary[0];
        $d_ary = explode("-", $date);
        $d = $d_ary[2] . " " . getMonth($d_ary[1]) . " " . $d_ary[0];

        $t = $dt_ary[1];

        $result = $d . " " . $t;
    }
    return $result;
}


function getNumDaysOfMonth($month, $year) {

    if ($month == "") {
        $numdays = false;
    }
    else {
      if (ereg("[0-9]{1,2}", $month)) {
        switch ($month) {
          case "01" :
            $numdays = 31;
            break;
          case "02" :
            $leaf = is_leaf_year($year);
            if ($leaf == true) {
                $numdays = 29;
            }
            else { 
                $numdays = 28;
            }
            break;
          case "03" :
            $numdays = 31;
            break;
          case "04" :
            $numdays = 30;
            break;
          case "05" :
            $numdays = 31;
            break;
          case "06" :
            $numdays = 30;
            break;
          case "07" :
            $numdays = 31;
            break;
          case "08" :
            $numdays = 31;
            break;
          case "09" :
            $numdays = 30;
            break;
          case "10" :
            $numdays = 31;
            break;
          case "11" :
            $numdays = 30;
            break;
          case "12" :
            $numdays = 31;
            break;
          default :
            break;
        }
      }
      else {
        switch (ucwords(substr($month, 0, 3))) {
          case "Jan" :
            $numdays = 31;
            break;
          case "Feb" :
            $leaf = is_leaf_year($year);
            if ($leaf == true) {
                $numdays = 29;
            }
            else {
                $numdays = 28;
            }
            break;
          case "Mar" :
            $numdays = 31;
            break;
          case "Apr" :
            $numdays = 30;
            break;
          case "May" :
            $numdays = 31;
            break;
          case "Jun" :
            $numdays = 30;
            break;
          case "Jul" :
            $numdays = 31;
            break;
          case "Aug" :
            $numdays = 31;
            break;
          case "Sep" :
            $numdays = 30;
            break;
          case "Oct" :
            $numdays = 31;
            break;
          case "Nov" :
            $numdays = 30;
            break;
          case "Dec" :
            $numdays = 31;
            break;
          default : break;
        }
      }
    }

    return $numdays;
}

function getFullMonth($month) {
    if ($month == "") {
        $mon = "";
    }
    else {
      switch ($month) {
        case "01" :
            $mon = "January";
            break;
        case "02" :
            $mon = "February";
            break;
        case "03" :
            $mon = "March";
            break;
        case "04" :
            $mon = "April";
            break;
        case "05" :
            $mon = "May";
            break;
        case "06" :
            $mon = "June";
            break;
        case "07" :
            $mon = "July";
            break;
        case "08" :
            $mon = "August";
            break;
        case "09" :
            $mon = "September";
            break;
        case "10" :
            $mon = "October";
            break;
        case "11" :
            $mon = "November";
            break;
        case "12" :
            $mon = "December";
            break;
        default :
            break;
      }
    }

    return $mon;
}


function displayDate($date, $mon_type) {
    $result;
    $mon;

    if (empty($date)) {
      $result = "";
    }
    else {
      $pos = strpos($date, "/");
      if (! $pos) {
          $pos = strpos($date, "-");
          $temp = split("-", $date);
      }
      else {
          $temp = split("/", $date);
      }

      # Format mm/dd/yyyy
      if ($pos < 2) {
          if ($mon_type == "") {
              $mon = &getMonth($temp[0]);
          }
          else {
              $mon = &getFullMonth($temp[0]);
          }
          #$result = $mon . ' ' . $temp[1] . ', ' . $temp[2];
          $result = $temp[1] . ' ' . $mon . ' ' . $temp[2];
      }
      else {
          if ($mon_type == "") {
              $mon = &getMonth($temp[1]);
          }
          else {
              $mon = &getFullMonth($temp[1]);
          }
          #$result = $mon . ' ' . $temp[2] . ', ' . $temp[0];
          $result = $temp[0]. ' ' . $mon . ' ' .  $temp[2];
      }
    }

    return $result;
}

function displayShortDate($date, $mon_type) {
    $result;
    $mon;

    if (empty($date)) {
      $result = "";
    }
    else {
      $pos = strpos($date, "/");
      if (! $pos) {
          $pos = strpos($date, "-");
          $temp = split("-", $date);
      }
      else {
          $temp = split("/", $date);
      }

      if ($pos < 4) {
          if ($mon_type == "") {
              $mon = &getMonth($temp[0]);
          }
          else {
              $mon = &getFullMonth($temp[0]);
          }
          #$result = $mon . ' ' . $temp[1] . ', ' . $temp[2];
          $result = $temp[1] . ' ' . $mon . ' ' . substr($temp[2],2,2);
      }
      else {
          if ($mon_type == "") {
              $mon = &getMonth($temp[1]);
          }
          else {
              $mon = &getFullMonth($temp[1]);
          }
          #$result = $mon . ' ' . $temp[2] . ', ' . $temp[0];
          $result =  $temp[0]. ' ' . $mon . ' ' . $temp[2];
      }
    }

    return $result;
}

function getMonth($month) {
    if ($month == "") {
        $mon = "";
    }
    else {
      switch (intval($month)) {
        case 1 :
            $mon = "Jan";
            break;
        case 2 :
            $mon = "Feb";
            break;
        case 3 :
            $mon = "Mar";
            break;
        case 4 :
            $mon = "Apr";
            break;
        case 5 :
            $mon = "May";
            break;
        case 6 :
            $mon = "Jun";
            break;
        case 7 :
            $mon = "Jul";
            break;
        case 8 :
            $mon = "Aug";
            break;
        case 9 :
            $mon = "Sep";
            break;
        case 10 :
            $mon = "Oct";
            break;
        case 11 :
            $mon = "Nov";
            break;
        case 12 :
            $mon = "Dec";
            break;
        default;
            break;
      }
    }

    return $mon;
}

?>
