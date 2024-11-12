<?php

namespace App\Enums;

/**
 * @enum SocialLinkPlatform
 * @type string
 * @description - Diferentes redes sociales y plataformas
 */
enum SocialLinkPlatform: string
{
    case Facebook = 'facebook';
    case Twitter = 'twitter';
    case Instagram = 'instagram';
    case LinkedIn = 'linkedin';
    case GitHub = 'github';
    case Youtube = 'youtube';
    case Reddit = 'reddit';
    case Discord = 'discord';
    case TikTok = 'tiktok';
    case Pinterest = 'pinterest';
    case WhatsApp = 'whatsapp';
    case Snapchat = 'snapchat';
    case Telegram = 'telegram';
    case Medium = 'medium';
    case Dribbble = 'dribbble';
    case Behance = 'behance';
    case StackOverflow = 'stackoverflow';
    case Vimeo = 'vimeo';
    case SoundCloud = 'soundcloud';
}
