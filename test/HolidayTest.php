<?php
/**
 * Author: xuqingfeng <js-xqf@hotmail.com>
 * Date: 15/2/25
 */

require_once __DIR__ . "/../src/Holiday.php";

class HolidayTest extends PHPUnit_Framework_TestCase {

    protected $hd;

    public function setUp() {

        $this->hd = new xuqingfeng\Holiday();
    }

    public function testGetPublicHolidays4Month() {

        $params = array(
            'month'   => 2,
            'year'    => 2015,
            'country' => 'chn'
        );
        $ret = $this->hd->getPublicHolidays4Month($params);
        $ret = json_decode($ret, true);
        $this->assertEquals('春节', $ret[0]['localName']);
    }

    public function testGetPublicHolidays4Year() {

        $params = array(
            'year'    => 2015,
            'country' => 'chn',
            'region'  => ''
        );
        $ret = $this->hd->getPublicHolidays4Year($params);
        $ret = json_decode($ret, true);
        $this->assertEquals('元旦', $ret[0]['localName']);
    }

    public function testGetPublicHolidays4DateRange() {

        $params = array(
            'fromDate' => '18-02-2015',
            'toDate'   => '19-02-2015',
            'country'  => 'chn'
        );
        $ret = $this->hd->getPublicHolidays4DateRange($params);
        $ret = json_decode($ret, true);
        $this->assertEquals('春节', $ret[0]['localName']);
    }

    public function testIsPublicHoliday() {

        $params = array(
            'date'    => '25-02-2015',
            'country' => 'chn'
        );
        $ret = $this->hd->isPublicHoliday($params);
        $ret = json_decode($ret, true);
        $this->assertFalse($ret['isPublicHoliday']);
    }

    public function testGetSupportedCountries() {

        $ret = $this->hd->getSupportedCountries();
        $ret = json_decode($ret, true);

        $this->assertTrue($this->in_array_r('China', $ret));
    }

    private function in_array_r($needle, $haystack, $strict = false) {

        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
                return true;
            }
        }

        return false;
    }

}
 