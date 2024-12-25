<?php

$navigation = OW::getNavigation();
$navigation->addMenuItem(
    OW_Navigation::MAIN,
    'albumdownload.index',
    'albumdownload',
    OW::getLanguage()->text('albumdownload', 'menu_item'),
    OW_Navigation::VISIBLE_FOR_ALL
);
