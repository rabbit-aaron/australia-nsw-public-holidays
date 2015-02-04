<?php

error_reporting(E_ALL);
require_once dirname(__FILE__).'/../holidays.php';

function testNotLabourDay0(){
    assert(!isLabourDay(new DateTime('2013-10-05')));
}

testNotLabourDay0();

function testNotLabourDay1(){
    assert(!isLabourDay(new DateTime('2020-09-05')));
}

testNotLabourDay1();

function testIsLabourDay0(){
    assert(isLabourDay(new DateTime('2015-10-05')));
}

testIsLabourDay0();

function testIsLabourDay1(){
    assert(isLabourDay(new DateTime('2000-10-02')));
}

testIsLabourDay1();

function testIsLabourDay2(){
    assert(isLabourDay(new DateTime('2007-10-01')));
}

testIsLabourDay2();

function testIsLabourDay3(){
    assert(isLabourDay(new DateTime('2017-10-02')));
}

testIsLabourDay3();


function testIsLabourDay4(){
    assert(isLabourDay(new DateTime('2040-10-01')));
}

testIsLabourDay4();
