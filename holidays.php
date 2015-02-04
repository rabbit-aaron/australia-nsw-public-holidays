<?php
require_once dirname(__FILE__).'/easter.php';

$FIXED_HOLIDAYS = array(
    '01-01' => true, // New Years Day
    '01-26' => true, // Australia Day
    '04-25' => true, // Anzac Day
    '12-25' => true, // Christmas Day
    '12-26' => true, // Boxing Day
);

function isDate($dateTimeA,$dateTimeB){
    return $dateTimeA->format('Y-m-d') == $dateTimeB->format('Y-m-d');
}

function isWeekend($date){
    $dayString = date_format($date, 'N');
    return $dayString == '6' || $dayString == '7';
}

function getEasterSunday($date){
    $yearInt = (int)date_format($date, 'Y');
    return easter_datetime($yearInt);
}

function isGoodFriday($date){
    return isDate($date,getEasterSunday($date)->modify('-2 day'));
}

function isEasterMonday($date){
    return isDate($date,getEasterSunday($date)->modify('+1 day'));
}

function isQueensBirthday($date){
    // Second Monday of June
    $expression = 'second Monday of June '. $date->format('Y');
    $queensBirthday = new DateTime($expression);
    return isDate($date,$queensBirthday);
}

function isLabourDay($date){ 
    // First Monday of October
    $expression = 'first Monday of October '. $date->format('Y');
    $labourDay = new DateTime($expression);
    return isDate($date,$labourDay);
}

function getChristmasDay($date){
    $yearString = $date->format('Y');
    return new DateTime(sprintf('%s-12-25',$yearString));
}

function isAdditionalDay($date){
    $christmasDay = getChristmasDay($date);
    $christmasDayIndex = $christmasDay->format('N');
    $addtionalDays = array();
    switch($christmasDayIndex){
        case '5':
            // Boxing Day on Saturday
            // one additional day, next Monday
            $addtionalDay = clone $christmasDay;
            $addtionalDay->modify('+3 days');
            array_push($addtionalDays, $addtionalDay);
            break;
        case '6':
            // both Christmas Day and Boxing Day on weekends,
            // Two additional days, next Monday, Tuesday
            $addtionalDay1 = clone $christmasDay;
            $addtionalDay1->modify('+2 days');
            $addtionalDay2 = clone $christmasDay;
            $addtionalDay2->modify('+3 days');
            array_push($addtionalDays, $addtionalDay1, $addtionalDay2);
            break;
        case '7':
            // Christmas on a weekend
            // One additional day, next Tuesday
            $addtionalDay = clone $christmasDay;
            $addtionalDay->modify('+2 days');
            array_push($addtionalDays, $addtionalDay);
            break;
        default:
            // don't need to do anything
            break;
    }
    foreach($addtionalDays as $addtionalDay){
        if(isDate($date,$addtionalDay)){
            return true;
        }
    }
    return false;
}

function isNonFixedPublicHoliday($date){
    return 
        isGoodFriday($date) ||
        isEasterMonday($date) ||
        isQueensBirthday($date) ||
        isLabourDay($date) ||
        isAdditionalDay($date);
}

function isFixedPublicHoliday($date){
    global $FIXED_HOLIDAYS;
    $dateString = date_format($date, 'm-d');
    return array_key_exists($dateString,$FIXED_HOLIDAYS);
}

function isWorkingDay($date){
    return !isWeekend($date) && !isNonFixedPublicHoliday($date) && !isFixedPublicHoliday($date);
}

function getNextWorkingDay($start,$nth=1){
    if($nth < 0){
        return null;
    }
    for($count = 0, $current_date = new DateTime($start->format('Y-m-d')); $count < $nth;){
        $current_date->modify('+1 days');
        if(isWorkingDay($current_date)){
            ++$count;
        }
    }
    return $current_date;
}