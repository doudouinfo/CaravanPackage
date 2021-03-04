<?php
namespace Caravan\Package\Traits;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

Trait ManageFilesTrait {

    /**
     * Upload File To Disk
     *
     * @param UploadedFile $uploadedFile
     * @param null $folder
     * @param string $disk
     * @param null $fileNamePrefix
     * @return string
     */
    public static function uploadFile(UploadedFile $uploadedFile, $folder = null, $disk = 'public',$fileNamePrefix = null) {
        $prefix = $fileNamePrefix != null ? $fileNamePrefix . '_' : '';
        $fileName = $prefix . Carbon::today()->format('m_Y') . '_' . time() . '.' . $uploadedFile->clientExtension();
        Storage::disk($disk)->putFileAs('/' . $folder,$uploadedFile,$fileName);
        return $fileName;

    }

    /**
     * Move Specific resource to another Storage Location
     *
     * @param $oldpath
     * @param $fileName
     * @param null $folder
     * @param string $disk
     * @return mixed
     */
    public static function moveFile($oldpath,$fileName,$folder = null,$disk = 'public'){

        Storage::disk($disk)->move($oldpath,'/' . $folder . '/' . $fileName );
        return $fileName;

    }
}
