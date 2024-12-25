<?php

class ALBUMDOWNLOAD_CTRL_Index extends OW_ActionController
{
    public function index()
    {
        $this->setPageHeading('Album Download');
        $this->setPageTitle('Album Download');
        
        $albumId = !empty($_GET['albumId']) ? (int)$_GET['albumId'] : null;
        
        if ($albumId) {
            $photoService = PHOTO_BOL_PhotoService::getInstance();
            $photos = $photoService->findPhotoListByAlbumId($albumId, 1, 1000);
            
            if (!empty($_GET['download'])) {
                $zipName = 'album_' . $albumId . '_photos.zip';
                $zipPath = OW_DIR_USERFILES . $zipName;
                
                $zip = new ZipArchive();
                if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
                    foreach ($photos as $photo) {
                        // Using original_ prefix to get full-size images
                        $photoPath = OW_DIR_USERFILES . 'plugins/photo/photo_original_' . $photo['id'] . '_' . $photo['hash'] . '.jpg';
                        if (file_exists($photoPath)) {
                            $zip->addFile($photoPath, 'photo_' . $photo['id'] . '.jpg');
                        }
                    }
                    $zip->close();
                    
                    header('Content-Type: application/zip');
                    header('Content-Disposition: attachment; filename="' . $zipName . '"');
                    header('Content-Length: ' . filesize($zipPath));
                    readfile($zipPath);
                    unlink($zipPath);
                    exit;
                }
            }
            
            $this->assign('albumId', $albumId);
            $this->assign('photoCount', count($photos));
            $this->assign('showPhotos', true);
        } else {
            $photoAlbumDao = PHOTO_BOL_PhotoAlbumDao::getInstance();
            $albums = $photoAlbumDao->findAll();
            $this->assign('albums', $albums);
            $this->assign('showPhotos', false);
        }
    }
}
