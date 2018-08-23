<?php
namespace Pokeface\Meme\Http;

use Ixudra\Curl\Facades\Curl;


class Builder
{
    protected $getOptions = array(
        'LIMIT'       => 0,
        'PAGE'        => 1,
        'KEYWORD'	  => ''
    );

    public function search($keyword){
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
    	$this->getOptions['KEYWORD'] = $this->strToLowerHight(base64_encode($this->getOptions['KEYWORD']));
    	foreach($this->getOptions as $option_k => $option_v){
    		$url = str_replace('{'.$option_k.'}',$option_v,$url);
    	}
    	$data = Curl::to($url)
    	->withHeader('Pragma: no-cache')
    	->withHeader('User-Agent: SogouComponentAgent')
    	->asJson()
    	->get();
    	$memes = $this->memes_filter($data->imglist,['keywords','url']);
    	return $memes;

    }


    protected function withGetOption($key, $value)
    {
        $this->getOptions[ $key ] = $value;

        return $this;
    }

    protected function memes_filter($memes,$conditions){
    	$data=[];
    	if(count($memes)){
    		array_walk_recursive($memes,function($value,$key)use(&$data,$conditions){
    			foreach($conditions as $v){
    				$data[$key][$v]=$value->$v;
    			}	
    		});
		}
		return $data;
    }

    protected function strToLowerHight($str){
    	$arr = str_split($str);
    	foreach($arr as $k=>$v){
    		if(preg_match('/^[a-z]+$/', $v)){
    			$arr[$k]=strtoupper($v);
    		}elseif(preg_match('/^[A-Z]+$/', $v)){
    			$arr[$k]=strtolower($v);
    		}
    	}
    	return implode('',$arr);
    }
}