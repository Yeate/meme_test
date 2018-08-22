<?php
namespace Pokeface\Meme\Http;


class Meme
{
    public function get($keyword)
    {
        $builder = new Builder();
        return $builder->search($keyword);
    }
}