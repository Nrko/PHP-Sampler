<?php
namespace SamplerChallenge;

class RandomStringGenerator implements RandomGenerator
{
    public function generate($length = 100) {
        return base64_encode(openssl_random_pseudo_bytes($length));
    }
}

