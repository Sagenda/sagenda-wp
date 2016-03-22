<?php namespace Sagenda\Controllers;
//defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

use Sagenda\Helpers;
use Sagenda\Helpers\PickadateHelper;
include_once( SAGENDA_PLUGIN_DIR . 'Helpers/PickadateHelper.php' );

/**
 * This controller will be responsible for displaying the free events in frontend in order to be searched and booked by the visitor.
 */
class SearchController {

  /**
  * @var $view - string name of the view to be displayed
  */
  private $view = "search.twig" ;

  /**
  * @var $twig - instance of TWIG template renderer
  */
  public function showSearch($twig)
  {
    if(true)
    {
      $view = "searchResult.twig";
    }

    $lang = get_bloginfo( 'language' );
    $langCorrected = PickadateHelper::convertWPtoPickadateCultureCode($lang);
    $pickerTranslated = file_get_contents(SAGENDA_PLUGIN_DIR."assets/vendor/pickadate/lib/translations/".$langCorrected.".js");

    echo $twig->render($view, array(
      'searchForEventsBetween'        => __( 'Search for all the events between', 'sagenda-wp' ),
      'from'                          => __( 'From', 'sagenda-wp' ),
      'to'                            => __( 'To', 'sagenda-wp' ),
      'bookableItems'                 => __( 'Please choose a bookable item', 'sagenda-wp' ),
      'location'                      => __( 'Location', 'sagenda-wp' ),
      'description'                   => __( 'Description', 'sagenda-wp' ),
      'createAFreeBookingAccount'     => __( 'Create a free Booking Account on Sagenda!', 'sagenda-wp' ),
      'search'                        => __( 'Search', 'sagenda-wp' ),
      'clickAnEventToBookIt'          => __( 'Click an event to book It:', 'sagenda-wp' ),
      'dateFormat'                    =>  PickadateHelper::convertWPtoJSDate(get_option( 'date_format' )),
      'pickerTranslated'              => $pickerTranslated,
      'lang'                          => $lang,
      'langCorrected'                 => $langCorrected,

    ));
  }
}
