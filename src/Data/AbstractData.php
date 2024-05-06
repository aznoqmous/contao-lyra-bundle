<?php

namespace Aznoqmous\ContaoLyraBundle\Data;

class AbstractData implements \JsonSerializable
{
    protected $arrData = [];

    public function __set($key, $value)
    {
        if(property_exists($this, $key)) {
            $this->arrData[$key] = $value;
            $this->{$key} = $value;
        }
    }

    public function __get($key){
        return $this->arrData[$key];
    }

    public function getData(){
        return $this->arrData;
    }

    public function setData($arrData=[]){
        foreach($arrData as $key => $value){
            $this->setByKey($key, $value);
        }
    }

    protected function setByKey($key, $value){
        $this->arrData[$key] = $value;
        $this->{$key} = $value;
    }

    public function jsonSerialize()
    {
        return $this->arrData;
    }
}