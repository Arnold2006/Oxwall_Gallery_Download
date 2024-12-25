<?php

class ALBUMDOWNLOAD_CLASS_EventHandler
{
    public function init()
    {
        OW::getLanguage()->addKeyForJs('albumdownload', 'menu_item');
        OW::getLanguage()->importPluginLangs(OW::getPluginManager()->getPlugin('albumdownload')->getRootDir() . 'langs.zip');
    }
}
