<?php

$navigation = OW::getNavigation();
$navigation->addMenuItem(
    OW_Navigation::MAIN,
    'simpletest.index',
    'simpletest',
    'SIMPLETEST',
    OW_Navigation::VISIBLE_FOR_ALL
);
