<?php

// 半角数字を全角数字に
function getNumberAttribute($value)
{
    return mb_convert_kana($value, 'N');
}

// 画像パス指定
function imagePath($value)
{
    $filename = basename($value); // ファイル名だけ取り出す

    $newPath = '/storage/' . $filename;

    return $newPath;
}