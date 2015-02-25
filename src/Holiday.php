<?php
/**
 * Author: xuqingfeng <js-xqf@hotmail.com>
 * Date: 15/2/25
 *
 * date format: day-month-year
 */
namespace xuqingfeng;


class Holiday {

    private static $apiUrl;
    private static $ret;

    public function __construct() {

        self::$apiUrl = "http://kayaposoft.com/enrico/json/v1.0/";
        self::$ret = "";
    }

    /**
     * @param array $params
     * @return mixed
     *
     * ?action=getPublicHolidaysForMonth&month=1&year=2013&country=ger&region=Baden-W%C3%BCrttemberg
     * month-required
     * year-required
     * country-required
     * region-optional
     */
    public function getPublicHolidays4Month(array $params) {

        $url = self::$apiUrl . "?action=getPublicHolidaysForMonth";
        foreach ($params as $key => $value) {
            $url .= "&$key=$value";
        }
        $this->getData($url);

        return self::$ret;
    }

    /**
     * @param array $params
     * @return mixed
     *
     * ?action=getPublicHolidaysForYear&year=2013&country=est&region=
     * year-required
     * country-required
     */
    public function getPublicHolidays4Year(array $params) {

        $url = self::$apiUrl . "?action=getPublicHolidaysForYear";
        foreach ($params as $key => $value) {
            $url .= "&$key=$value";
        }
        $this->getData($url);

        return self::$ret;
    }

    /**
     * @param array $params
     * @return mixed
     *
     * ?action=getPublicHolidaysForDateRange&fromDate=04-07-2012&toDate=04-07-2014&country=usa&region=District+Of+Columbia
     * fromDate-required
     * toDate-required
     * country-required
     * region-optional
     */
    public function getPublicHolidays4DateRange(array $params) {

        $url = self::$apiUrl . "?action=getPublicHolidaysForDateRange";
        foreach ($params as $key => $value) {
            $url .= "&$key=$value";
        }
        $this->getData($url);

        return self::$ret;
    }

    /**
     * @param array $params
     * @return mixed
     *
     * ?action=isPublicHoliday&date=05-07-2012&country=svk
     * date-required
     * country-required
     */
    public function isPublicHoliday(array $params) {

        $url = self::$apiUrl . "?action=isPublicHoliday";
        foreach ($params as $key => $value) {
            $url .= "&$key=$value";
        }
        $this->getData($url);

        return self::$ret;
    }

    /**
     * @return mixed
     */
    public function getSupportedCountries() {

        $url = self::$apiUrl . "?action=getSupportedCountries";
        $this->getData($url);

        return self::$ret;
    }

    /**
     * @param $url
     * curl stuff
     */
    private function getData($url) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        self::$ret = curl_exec($ch);
        curl_close($ch);
    }


} 