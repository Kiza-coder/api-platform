<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load($manager)
    {
        $blogPost = new BlogPost;
        $blogPost->setTitle("First Post Fixture");
        $blogPost->setPublished(new DateTime('1990-12-12 12:22:22'));
        $blogPost->setContent("Lorem Ipsmum et Companie");
        $blogPost->setSlug("fixture-post-first");
        $blogPost->setAuthor("Kiza Fixture");

        $manager->persist($blogPost);

        $blogPost = new BlogPost;
        $blogPost->setTitle("Second Post Fixture");
        $blogPost->setPublished(new DateTime('1905-12-12 12:22:22'));
        $blogPost->setContent("Lorem Ipsmum et Companie second");
        $blogPost->setSlug("fixture-post-second");
        $blogPost->setAuthor("Dav Fixture");

        $manager->persist($blogPost);

        $manager->flush();
    }
}
