<?php

try {
    $navigation = OW::getNavigation();
    $navigation->deleteMenuItem('albumdownload.index');
    
    $languageService = BOL_LanguageService::getInstance();
    $languageService->deletePrefix('albumdownload');
} catch (Exception $e) {
    OW::getLogger()->addEntry(json_encode($e));
}
