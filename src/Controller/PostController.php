<?php

namespace App\Controller;

use App\Service\Serializer;

class PostController
{
    public function __construct(private readonly Serializer $serializer)
    {}

    public function index()
    {
        return $this->serializer->serialize([
            'Action' => 'Post',
            'Time' => time()
        ]);
    }
}