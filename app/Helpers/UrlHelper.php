<?php


namespace App\Helpers;


class UrlHelper
{
    public static function getPostsDetailPageUrl($categoryCode, $postCode): string
    {
        return "/posts/$categoryCode/$postCode/";
    }

    public static function getPostsSectionPageUrl($categoryCode): string
    {
        return "/posts/$categoryCode/";
    }
}
