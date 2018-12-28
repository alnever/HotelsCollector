<?php

namespace App\Library\Services;

use \GuzzleHttp\Client;
use \Symfony\Component\DomCrawler\Crawler;


/**
* Abstract class for all extruders
*/

class AbstractExtruder implements DataExtruderInterface {
  // Base url to get data from
  protected $url = '';
  // GuzzleHttp client to make http request
  protected $client;
  // Crawler
  protected $crawler;

  /**
  * Method to create a new extruder
  * @param $client - \GuzzleHttp\Client injected object
  */
  public function __construct(Client $client, Crawler $crawler) {
    $this->client = $client;
    $this->crawler = $crawler;
  }

  /**
  * Function to get a html-body by $url
  * @param $params - array of the request parameters
  */
  public function extrude(array $params){
    $request = $this->client->request('GET', $this->url, $params);
    return $this->parse($request->getBody());
  }

  /**
  * Function to parse html body of the response and convert it into
  * json-structute
  * The basic method provides a dummy answer
  *
  * @param $html - the html text of the response
  */
  protected function parse($html) {
    return ['status' => 'none'];
  }
}

 ?>
