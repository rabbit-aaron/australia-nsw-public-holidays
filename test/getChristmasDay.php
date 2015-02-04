<?php

error_reporting(E_ALL);
require_once dirname(__FILE__).'/../holidays.php';

function testGetChristmasDay0(){
    assert(isDate(getChristmasDay(new DateTime('2015-12-30')),new DateTime('2015-12-25')));
}

testGetChristmasDay0();

function testGetChristmasDay1(){
    assert(isDate(getChristmasDay(new DateTime('2014-12-25')),new DateTime('2014-12-25')));
}

testGetChristmasDay1();

function testGetChristmasDay2(){
    assert(isDate(getChristmasDay(new DateTime('2016-12-25')),new DateTime('2016-12-25')));
}

testGetChristmasDay2();
