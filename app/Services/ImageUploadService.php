<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadService
{
    /**
     * 画像を保存し、保存パスを返す
     *
     * @param UploadedFile $file アップロードされたファイル
     * @param string $directory 保存先ディレクトリ (storage/app/public/ 以下)
     * @return string 保存されたファイルのパス
     */
    public function upload(UploadedFile $file, string $directory = 'uploads'): string
    {
        // ランダムなファイル名を生成
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

        // 保存（public ディスク）
        $path = $file->storeAs($directory, $filename, 'public');

        return $path;
    }
}
