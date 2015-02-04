<?php

error_reporting(E_ALL);
require_once dirname(__FILE__).'/../holidays.php';

function testNotAdditionalDay0(){
    // Christmas Day falls on Thursday, no Additional Days
    assert(!isAdditionalDay(new DateTime('2014-12-27')));
}

testNotAdditionalDay0();

function testIsAdditionalDay0(){
    // Boxing Day falls on Saturday
    // One Additional Day on the next Monday
    assert(isAdditionalDay(new DateTime('2015-12-28')));
    assert(!isAdditionalDay(new DateTime('2015-12-29')));
}

testIsAdditionalDay0();

function testIsAdditionalDay1(){
    // Christmas Day falls on Saturday and Boxing Day falls on Sunday
    // Two Additional Days on the next Monday and Tuesday
    assert(isAdditionalDay(new DateTime('2004-12-27')));
    assert(isAdditionalDay(new DateTime('2004-12-28')));
}

testIsAdditionalDay1();

function testIsAdditionalDay2(){
    // Christmas Day on Sunday, Boxing Day falls on Monday
    // One Additional Day on the next Tuesday
    assert(isAdditionalDay(new DateTime('2011-12-27')));
}

testIsAdditionalDay2();
