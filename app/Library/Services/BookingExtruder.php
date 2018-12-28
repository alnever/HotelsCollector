<?php

namespace App\Library\Services;

use \GuzzleHttp\Client;
use \Symfony\Component\DomCrawler\Crawler;


/**
 * Class to get data from the Booking.com
 *
 */
class BookingExtruder extends AbstractExtruder implements DataExtruderInterface {

  protected $url = 'https://www.booking.com/searchresults.ru.html';

  /*
  * Method for html-parsing and creating json-structure
  */
  protected function parse($html) {
    $this->crawler->addHtmlContent($html, 'UTF-8');
    return $this->crawler->filterXPath("//div[contains(@class,'sr_item')]")
      ->each(function(Crawler $node, $i){
        return [
          'hotelid' => $node->attr('data-hotelid'),
          'score' => $node->attr('data-score'),
          'name' => $node->filterXPath("//span[contains(@class,'sr-hotel__name')]")->text(),
          'location' => $node->filterXPath("//div[contains(@class,'address')]/a[contains(@class,'district_link')]")->text(),
          // 'price' => $node->filterXPath("//table/tr/td[contains(@class,'roomPrice')]/div[contains(@class,'smart_price_style')]")->text(),
        ];
      });
  }

}


 ?>
