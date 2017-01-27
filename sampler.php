<?php

require_once "vendor/autoload.php";

if(count($argv) > 1) {
    if ($argv[1] == '--external' or $argv[1] == '-e') {
        $url = 'https://www.random.org/strings/';
        $query = '?num=1&len=20&digits=on&upperalpha=on&loweralpha=on&unique=on&format=plain&rnd=new';
        $fullUrl = $url . $query;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $fullUrl);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $input = curl_exec($ch);

        curl_close($ch);
    }
} else {
    $input = (ftell(STDIN) === 0) ? fgets(STDIN) : (new \SamplerChallenge\RandomStringGenerator())->generate();
}

$sample = (new \SamplerChallenge\StreamSampler($input))->sample(5);

echo $sample;
echo "\n";



