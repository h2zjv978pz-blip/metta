<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class Utils
{
    public static function extractMapEmbedLink($link)
    {
        $p = 'https://www.google.com/maps';
        $p_start = strpos($link, $p);
        $str = null;

        if ($p_start !== false) {
            $str = substr($link, $p_start);
        }

        $p_end = strpos($str, '"');

        if ($p_end !== false) {
            $str = substr($str, 0, $p_end);
        }

        return $str;
    }

    public static function getWordCount($text)
    {
        $text = self::getPlainText($text);

        return str_word_count($text);
    }

    public static function getReadingTime($text)
    {
        return ceil(self::getWordCount($text) / 150);
    }

    public static function getPlainText($text)
    {
        return strip_tags($text);
    }

    public static function getUserLevel($role)
    {

    }

    public static function getBookUrl($book)
    {
        if ($book->prop('book_url')) {
            return $book->prop('book_url');
        }
        elseif ($book->prop('book_pdf')) {
            return asset('storage/doc/' . $book->prop('book_pdf'));
        }

        return '';
    }

    public static function getBookReaderUrl($book)
    {
        $book_url = self::getBookUrl($book);

        if (Str::contains($book_url, '.pdf')) {
            return self::getGDriveReadUrl($book_url);
        }

        return $book_url;
    }

    public static function getGDriveReadUrl($pdf_url): string
    {
        return "https://docs.google.com/viewerng/viewer?url={$pdf_url}";
    }

    public static function getContentLang()
    {
        if (!Route::is('backend*') && (request()->has('lang') || session()->has('content_lang'))) {
            return request('lang', null) ?? session()->get('content_lang');
        }

        return 'en';
    }

    public static function lingual($values)
    {
        $content_lang = self::getContentLang();

        return $content_lang == 'bn' ? ($values[1] ?? $values[0] ?? '') : $values[0];
    }

    public static function isYouTubeVideo($video)
    {
        return !Str::endsWith($video, '.mp4');
    }
}
