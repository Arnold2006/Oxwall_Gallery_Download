<?php

class SIMPLETEST_CLASS_EventHandler
{
    public function init()
    {
        OW::getLanguage()->addKeyForJs('simpletest', 'menu_item');
        OW::getLanguage()->importPluginLangs(OW::getPluginManager()->getPlugin('simpletest')->getRootDir() . 'langs.zip');
    }
}
