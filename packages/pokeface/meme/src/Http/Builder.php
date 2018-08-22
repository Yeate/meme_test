<?php
namespace Pokeface\Meme\Http;


class Builder
{
    protected $getOptions = array(
        'LIMIT'       => 10,
        'PAGE'        => 1,
        'KEYWORD'	  => ''
    );

    public function search($keyword){dd(123);
    	return $this->withGetOption('KEYWORD',$keyword);
    }

    public function get(){
    	if(request()->has('meme_page')){
    		$this->withGetOption('PAGE',request()->input('meme_page'));
    	}

    	$data = $this->_fromCurl();
    	return $data;

    }

    public function _fromCurl(){
    	$url = config('meme.url');

    }


    protected function withGetOption($key, $value)
    {
        $this->getOptions[ $key ] = $value;

        return $this;
    }
}