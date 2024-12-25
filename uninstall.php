<?php

try {
    $navigation = OW::getNavigation();
    $result = $navigation->deleteMenuItem('albumdownload.index');
    OW::getLogger()->addEntry("Menu item 'albumdownload.index' delete result: " . json_encode($result));
    
    $languageService = BOL_LanguageService::getInstance();
    $languageService->deletePrefix('albumdownload');
} catch (Exception $e) {
    OW::getLogger()->addEntry("Uninstall error: " . json_encode($e));
}
