<?php

declare(strict_types=1);
namespace MageMastery\Blog\ViewModel;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use MageMastery\Blog\Service\PostRepository;


/**
* Class Blog
*/
class Blog implements ArgumentInterface
{
    /**
    * @var SerializerInterface
    */

    private $serializer;
    private $postRepository;
    public function __construct(
        SerializerInterface $serializer,
        PostRepository $postRepository)
    {
        $this->serializer = $serializer;
        $this->postRepository = $postRepository;
    }

    public function getPostsJson(): string
    {
     /*   $posts = $this->postRepository->get();*/

        /** @var @var PageInterface $post*/
        $result = [];
        foreach ($posts as $post) {
            $resultp[] = [
                "id" => $post->getId(),
                "title" => $post->getTitle(),
                "published_date" => getCreationTime(),
                "content" => "Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.",
                "author" => "Samir Gakhramanov",
                "url" => $post->getIdentifire();
            ];

            $post
        }

        return $this->serializer->serialize([
            [
                "id" => "1",
                "title" => "First Post",
                "published_date" => "2020-02-08",
                "content" => "Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.",
                "author" => "Samir Gakhramanov",
                "url" => "http://murena.loc/blog/second"
            ],
            [
                "id" => "2",
                "title" => "Second Post",
                "published_date" => "2020-02-09",
                "content" => "Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",
                "author" => "Samir Gakhramanov",
                "url" => "http://murena.loc/blog/second"
            ],
            [
                "id" => "3",
                "title" => "Third Post",
                "published_date" => "2020-02-10",
                "content" => "Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.",
                "author" => "Samir Gakhramanov",
                "url" => "http://murena.loc/blog/second"
            ]
        ]);
    }
}
