<?php namespace Sagenda\Helpers;

/**
* This helper class will give ease the usage of Date (and Time).
* THING TO REMEMBER :
* "DateTime::createFromFormat"   can't display litteral version of month in very languages.
* "strftime"   can't escape char with \ in format
*/
class DateHelper{

    /**
    * Check input value before setting correct date format, time format or datetime format
    * @param  string  $date   date to be setup
    */
    public static function setDateTimeFormat($date)
    {
      if(strpos($date, 'AM') !== false || strpos($date, 'PM') !== false)
      {
        if(strlen($date) > 8)
        {
          return self::setDateTime($date, "d M Y h:i A");
        }
        return self::setTime($date, "h:i A");
      }
      else
      {
        return self::setDate($date, "d M Y");
      }
    }

    /**
    * Set the date and time format according to WP values
    * @param  string  $datetime   datetime to be setup
    * @param  string $format        format used for DateTime creation (d M Y h:i A)
    */
    private static function setDateTime($datetime, $format)
    {
      return self::setDate($datetime, $format) ." ". self::setTime($datetime, $format) ;
    }

    /**
    * Set the date format according to WP values
    * @param  string  $date   date to be setup
    * @param  string $format        format used for DateTime creation (d M Y)
    */
    private static function setDate($date, $format)
    {
      if($date===null)
      {
        return;
      }

      setlocale(LC_TIME, get_locale());
      return strftime(self::convertDateTimeFormatLetterToStrftimeFormatLetter(get_option( 'date_format' )), \DateTime::createFromFormat($format, $date)->getTimestamp());
    }

    /**
    * Set the time format according to WP values
    * @param  string  $time   time to be setup
    * @param  string $format        format used for DateTime creation (h:i A)
    */
    private static function setTime($time, $format)
    {
      return \DateTime::createFromFormat($format, $time)->format(get_option( 'time_format' ));
    }

    /**
    * In php object DateTime and strftime are not using the same abreviation for formatting char, this method helps to convert.
    * For example :
    * F => %B
    * @param  string  $value   the
    */
    private static function convertDateTimeFormatLetterToStrftimeFormatLetter($value)
    {
      $value = str_replace("F", "%B", $value);
      $value = str_replace("M", "%b", $value);
      $value = str_replace("j", "%e", $value);
      $value = str_replace("d", "%d", $value);
      $value = str_replace("Y", "%Y", $value);
      $value = str_replace("y", "%y", $value);
      $value = str_replace("m", "%m", $value);
      $value = str_replace("n", "%m", $value);

      $value = str_replace("G", "%k", $value);
      $value = str_replace("H", "%H", $value);
      $value = str_replace("g", "%l", $value);
      $value = str_replace("h", "%I", $value);
      $value = str_replace("i", "%M", $value);
      $value = str_replace("s", "%S", $value);

      return $value;
    }
}
