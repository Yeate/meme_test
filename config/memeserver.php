<?php
return [
    'sougou_url' => env('SOUGOU_MEME_URL','http://config.pinyin.sogou.com/picface/interface/query_zb.php?cands={KEYWORD}&tp=0&page={PAGE}'),
    'doutula_url' => env('DOUTULA_MEME_URL','https://www.doutula.com/api/search?keyword={KEYWORD}&mime={MIME}&page={PAGE}'),
    'channel'=>[
    	'1'=>'Sougou', 
    	'2'=>'DouTuLa'
    ],
    'route'=>[
    	'prefix'=>'memes',
    	'as'=>'memes',
    ]

];