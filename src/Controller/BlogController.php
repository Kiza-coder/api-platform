<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/blog")
 */
class BlogController extends AbstractController
{

    private const POSTS = [
        [
            "id" => 1,
            "slug" => "hello-world",
            "title" => "Hello world!"
        ],
        [
            "id" => 3,
            "slug" => "hello-start",
            "title" => "Hello start"
        ],
        [
            "id" => 2,
            "slug" => "hello-another",
            "title" => "Hello Zepelei!"
        ]
    ];
    /**
     * @Route("/{page}", name="blog_list", defaults={"page":5})
     */
    public function list($page, Request $request)
    {

        $limit = $request->get('limit',10);
        return $this->json(
            [
                'page' => $page,
                'limit' => $limit,
                'data' => array_map(function($item) {
                    return $this->generateUrl('blog_by_slug',['slug' => $item['slug']]);
                },self::POSTS)
            ]);
    }

    /**
     * @Route("/{id}", name="blog_by_id")
     */
    public function post($id)
    {
        return $this->json(
            self::POSTS[array_search($id, array_column(self::POSTS,'id'))]
        );
    }

    /**
     * @Route("/{slug}" , name="blog_by_slug")
     */
    public function postBySlug($slug)
    {
        return $this->json(
            self::POSTS[array_search($slug, array_column(self::POSTS,'slug'))]
        );
    }
}
