##holiday

![travis](https://travis-ci.org/xuqingfeng/holiday.svg)

###Motivation

ugly hard coded holiday date in our site.

###Install
>via composer

```
{
    "require": {
        "xuqingfeng/holiday": "0.1.*"
    }
}
```

###How

```php
    /**
     * @param array $params
     * @return mixed
     *
     * month-required
     * year-required
     * country-required
     * region-optional
     */
    public function getPublicHolidays4Month(array $params)

    /**
     * @param array $params
     * @return mixed
     *
     * year-required
     * country-required
     */
    public function getPublicHolidays4Year(array $params)

    /**
     * @param array $params
     * @return mixed
     *
     * fromDate-required
     * toDate-required
     * country-required
     * region-optional
     */
    public function getPublicHolidays4DateRange(array $params)

    /**
     * @param array $params
     * @return mixed
     *
     * date-required
     * country-required
     */
    public function isPublicHoliday(array $params)

    /**
     * @return mixed
     */
    public function getSupportedCountries()
```

###Test

`phpunit .`

###Thanks

[enrico](http://kayaposoft.com/enrico/)  (api)

###License

GPLv3


