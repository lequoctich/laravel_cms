<?php
namespace App\Helpers;

use Yasumi\Yasumi;
use Carbon\Carbon;

class Helpers
{

    /**
     * Custom URl function
     *
     * @param string $routeName            
     * @param array $params            
     * @return string
     */
    public static function customUrl($routeName, $params)
    {
        $str = "";
        if (sizeof($params) > 0) {
            $str = "?";
            foreach ($params as $k => $v) {
                if ($v != "") {
                    $str .= $k . "=" . $v . "&";
                }
            }
        }
        $str = rtrim($str, "&");
        return $path = (route($routeName) . $str);
    }

    /**
     * Split string into array string
     *
     * @param
     *            $str
     * @param string $delimiter            
     * @return array
     */
    public static function splitStr($str, $delimiter = " ")
    {
        $result = [];
        if (trim($str) != null) {
            $str = Helpers::mb_trim($str);
            $result = array_filter(explode($delimiter, $str), 'strlen');
        }
        return $result;
    }

    /**
     * Replace space fullsize to halfsize
     *
     * @param string $str
     *            string before replace
     * @param
     *            character replace
     * @return string after replace
     */
    public static function mb_trim($str, $chars = '　')
    {
        return str_replace($chars, ' ', $str);
    }

    /**
     * Calculate 1 week start the start date
     *
     * @param
     *            startDate
     * @return endDate
     */
    public static function getEndDateOfWeek($startDate)
    {
        $endDate = date('Y-m-d', strtotime($startDate . ' +6 day'));
        return $endDate;
    }

    /**
     * Get list of date in a week based on start date and end date
     *
     * @param
     *            startDate
     * @return list of date
     */
    public static function getListDateInAWeek($start, $end)
    {
        $formatDate = config('constants.DATE_FORMAT');
        $start = date($formatDate, strtotime($start));
        $end = date($formatDate, strtotime($end));
        
        $dates = [
            $start
        ];
        $days = [
            $start => date('w', strtotime($start))
        ];
        
        while (end($dates) < $end) {
            $date = date($formatDate, strtotime(end($dates) . ' +1 day'));
            $dates[] = $date;
            $days[$date] = date('w', strtotime($date));
        }
        return $days;
    }

    /**
     * Get day of date
     */
    public static function getDay($date)
    {
        return date('j', strtotime($date));
    }

    /**
     * handle string escape
     */
    public static function handleStringEscape($string)
    {
        $search = array(
            '%',
            '_',
            '[[:space:]]*(.*)[[:space:]]*'
        );
        $replace = array(
            '\%',
            '\_',
            '\\\\1'
        );
        return str_replace($search, $replace, $string);
    }

    /**
     * format to Japan date
     */
    public static function formatJpDate($date = "")
    {
        if ($date == "") {
            $date = date('Y-m-d');
        }
        return str_replace(" ", "", date('Y', strtotime($date)) . trans("app.year") . date('m', strtotime($date)) . trans("app.month") . date('d', strtotime($date)) . trans("app.day"));
    }

    /**
     * get Country Holidays In Range
     *
     * @param
     *            $startDate
     * @param
     *            $endDate
     */
    public static function getCountryHolidaysInRange($startDate, $endDate)
    {
        $results = [];
        
        $startDate = Carbon::createFromFormat('Y-m-d', $startDate);
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate);
        
        for ($year = $startDate->year; $year <= $endDate->year; $year ++) {
            $holidays = Yasumi::create(config('constants.COUNTRY'), $year, 'ja_JP');
            $holidays = $holidays->between(new \DateTime($startDate->toDateString()), new \DateTime($endDate->toDateString()));
            foreach ($holidays as $day) {
                $results[$day->__toString()] = $day->getName();
            }
        }
        
        return $results;
    }

    /**
     * Returns the amount of weeks into the month a date is
     *
     * @param $date a
     *            YYYY-MM-DD formatted date
     *            Note : To get weeks that starts with sunday, simply replace both date("W", ...) with strftime("%U",...)
     */
    public static function weekOfMonth($date)
    {
        $date = Carbon::createFromFormat('Y-m-d', $date);
        
        $weekOfYear = $date->weekOfYear;
        
        $firstOfMonth = $date->startOfMonth();
        
        $weekOfYear1 = $firstOfMonth->weekOfYear;
        
        // Apply above formula.
        $weekOfMonth = $weekOfYear - $weekOfYear1 + 1;
        
        if ($weekOfMonth < 1 || $weekOfMonth > 5) {
            $weekOfMonth = 6;
        }
        
        return $weekOfMonth;
    }

    /**
     * format to Japan hours
     */
    public static function formatJpHours($hours = "")
    {
        if ($hours == "")
            $hours = date('H:i:s');
        return str_replace(" ", "", date('H', strtotime($hours)) . '時 ' . date('i', strtotime($hours)) . '分 ');
    }
}
