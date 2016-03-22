<?php namespace Sagenda\Helpers;

class PickadateHelper{

  public static function getPickadateDateFormat()
  {
    return self::convertWPtoJSDate(get_option('date_format'));
  }

  /*
  @var $dateFormat - input WordPress date format such as : https://codex.wordpress.org/Formatting_Date_and_Time
  return a converted date format for JS DateTime picker  : http://amsul.ca/pickadate.js/date/
  */
  public static function convertWPtoJSDate($dateFormat)
  {
    $dateFormat = str_replace("d", "dd", $dateFormat);
    $dateFormat = str_replace("j", "d", $dateFormat);
    $dateFormat = str_replace("S", "d", $dateFormat);
    $dateFormat = str_replace("D", "ddd", $dateFormat);
    $dateFormat = str_replace("l", "dddd", $dateFormat);
    $dateFormat = str_replace("m", "mm", $dateFormat);
    $dateFormat = str_replace("n", "m", $dateFormat);
    $dateFormat = str_replace("M", "mmm", $dateFormat);
    $dateFormat = str_replace("F", "mmmm", $dateFormat);
    $dateFormat = str_replace("y", "yy", $dateFormat);
    $dateFormat = str_replace("Y", "yyyy", $dateFormat);
    return $dateFormat;
  }



  public static function getPickadateCultureCode(){
    return file_get_contents(SAGENDA_PLUGIN_DIR."assets/vendor/pickadate/lib/translations/".self::convertWPtoPickadateCultureCode(get_bloginfo('language')).".js");
  }

  /*
  @var $wpCultureCode - input from WordPress as culture short format (WP Locale) : https://make.wordpress.org/polyglots/teams/
  return a converted culture format to get the appropriate JS DateTime picker translations  : http://amsul.ca/pickadate.js/date/
  return -1 if should use the default EN text.
  no support for : az, azb, bn_BD, ceb, cy, eo, gd, haz, hy, ka_GE, ka_GE, my_MM, oci, sq, sr_RS, ug-CN
  */
  public static function convertWPtoPickadateCultureCode($wpCultureCode)
  {
    $tempCode = $wpCultureCode;

    if(strlen($wpCultureCode)>2)
    {
      $tempCode = substr($wpCultureCode, 0, 2);
    }

    switch ($tempCode) {
      case 'ar': $wpCultureCode = "ar"; break;
      case 'ca': $wpCultureCode = "ca_ES"; break;
      case 'de': $wpCultureCode = "de_DE"; break;
      case 'el': $wpCultureCode = "el_GR"; break;
      case 'es': $wpCultureCode = "es_ES"; break;
      case 'et': $wpCultureCode = "et_EE"; break;
      case 'eu': $wpCultureCode = "eu_ES"; break;
      case 'fr': $wpCultureCode = "fr_FR"; break;
      case 'fi': $wpCultureCode = "fi_FI"; break;
      case 'gd': $wpCultureCode = "gl_ES"; break; // use Gaelic for Scottish Gaelic better than English
      case 'hr': $wpCultureCode = "hr_HR"; break;
      case 'ja': $wpCultureCode = "ja_JP"; break;
      case 'nl': $wpCultureCode = "nl_NL"; break;
      case 'nn': $wpCultureCode = "nb_NO"; break;
      case 'th': $wpCultureCode = "th_TH"; break;
      case 'uk': $wpCultureCode = "uk_UA"; break;
      case 'vi': $wpCultureCode = "vi_VN"; break;
    }

    return str_replace("-", "_", $wpCultureCode);
  }

}
