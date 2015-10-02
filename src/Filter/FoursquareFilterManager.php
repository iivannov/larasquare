<?php


namespace Iivannov\Larasquare\Filter;


class FoursquareFilterManager
{

    protected $filter;

    public function __construct(FilterContract $filter = null)
    {
        if($filter)
            $this->setFilter($filter);
    }

    public function setFilter(FilterContract $filter)
    {
        $this->filter = $filter;
    }


    public function parse($query)
    {
        if(!$this->filter)
            return $query;

        return $this->filter->parse($query);
    }
}