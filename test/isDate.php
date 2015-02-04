<?php

error_reporting(E_ALL);
require_once dirname(__FILE__).'/../holidays.php';

function testNotDate0(){
    assert(!isDate(new DateTime('2014-02-03 05:00:00'),new DateTime('2014-02-02 10:00:00')));
}

testNotDate0();

function testIsDate0(){
    assert(isDate(new DateTime('2014-02-02 05:00:00'),new DateTime('2014-02-02 10:00:00')));
}

testIsDate0();