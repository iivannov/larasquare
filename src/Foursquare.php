<?php

namespace Iivannov\Larasquare;


use Iivannov\Larasquare\Filter\FilterContract;
use Iivannov\Larasquare\Filter\FoursquareFilterManager;

class Foursquare
{

    /**
     * HTTP Client for API requests
     *
     * @var FoursquareClient
     */
    protected $client;


    protected $filter;


    public function __construct($config)
    {

        if (!isset($config['clientId']) || !isset($config['clientSecret']))
            throw new \InvalidArgumentException('Expected values for clientId && clientSecret');

        $this->client = new FoursquareClient($config['clientId'], $config['clientSecret']);
    }


    public function setFilter(FilterContract $customFilter)
    {
        if(!$this->filter)
            $this->filter = new FoursquareFilterManager();

        $this->filter->setFilter($customFilter);

        return $this;
    }


    /**
     * General method to call Foursquare endpoints
     * Use it for endpoints not covered by this class
     *
     * @param string $endpoint
     * @param array $query
     * @return array
     */
    public function request($endpoint, $query = [])
    {
        return $this->client->consume($endpoint, $query);
    }


    /* Venues
     * ------------------------------------------------------------------------------ */

    /**
     * Get a single venue
     *
     * @param string $venueId
     * @return array
     */
    public function venue($venueId)
    {

        $result = $this->client->consume("venues/$venueId");

        return $result->response->venue;
    }


    /**
     * Make a search for a list of venues
     * @see https://developer.foursquare.com/docs/venues/search
     *
     * @param array $query
     * @return array
     */
    public function venues(array $query = [])
    {
        if($this->filter)
            $query = $this->filter->parse($query);

        if (!isset($query['ll']) && !isset($query['near']))
            throw new \InvalidArgumentException('Expected at least "near" or "ll" parameter');

        $result = $this->client->consume('venues/search', $query);

        return $result->response->venues;
    }


    /**
     * List of minivenues corresponding to a search term
     * @see https://developer.foursquare.com/docs/venues/suggestcompletion
     *
     * @param array $query
     * @return array
     */
    public function suggest(array $query = [])
    {

        if($this->filter)
            $query = $this->filter->parse($query);

        if (!isset($query['query']) || strlen($query['query']) < 3)
            throw new \InvalidArgumentException('Expected "query" parameter at least 3 characters');

        if (!isset($query['ll']) && !isset($query['near']))
            throw new \InvalidArgumentException('Expected at least "near" or "ll" parameter');

        $result = $this->client->consume('venues/suggestcompletion', $query);

        return $result->response->minivenues;
    }


    /**
     * Get a list of trending venues
     * @see https://developer.foursquare.com/docs/venues/trending
     *
     * @param array $query
     * @return array
     */
    public function trending(array $query = [])
    {

        if($this->filter)
            $query = $this->filter->parse($query);

        if (!isset($query['ll']))
            throw new \InvalidArgumentException('Expected "ll" parameter');

        $result = $this->client->consume('venues/trending', $query);

        return $result->response->venues;
    }

}