<?php

namespace  App\Traits;
use Illuminate\Support\Str;
use Storage;


trait StorageImageTrait{
    public function storageFileUpload($request,$fieldName, $dir){
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
        $fileNameOriginal = $file->getClientOriginalName();
        $fileNameHash = Str::random(40). '.'.$file->getClientOriginalExtension();
        $filePath = $request->file($fieldName)->storeAs('public/'.$dir.'/'.'1',$fileNameHash);
        $data = [
            'filename' => $fileNameOriginal,
            'filepath' => Storage::url($filePath)
        ];
        return $data;
        } else 
        return null;
        
    }
    public function storageFileUploadMulti($file, $dir){
        $fileNameOriginal = $file->getClientOriginalName();
        $fileNameHash = Str::random(40). '.'.$file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/'.$dir.'/'.'1',$fileNameHash);
        $data = [
            'filename' => $fileNameOriginal,
            'filepath' => Storage::url($filePath)
        ];
        return $data;
        
        
        
    }
}