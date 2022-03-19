<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\NoReturn;

class BlogPostObserver
{


    public function creating(BlogPost $blogPost){
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);

    }

    /**
     * @param BlogPost $blogpost
     * @return void
     */
    protected function setHtml(BlogPost $blogpost){
        if($blogpost->isDirty('content_raw')){
           $blogpost->content_html = $blogpost->content_raw;
        }
    }

    protected function setUser(BlogPost $blogpost){
        $blogpost->user_id = auth()->id ?? BlogPost::UNKNOWN_USER;
    }

    /**
     * Handle the BlogPost "created" event.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "updated" event.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return void
     */
    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
    }

    /**
     * @param BlogPost $blogPost
     * @return void
     */
    protected function setPublishedAt(BlogPost $blogPost)
    {
        $needSetPublished = empty($blogPost->is_published) && $blogPost->is_published;

        if ($needSetPublished) {
            $blogPost->is_published = Carbon::now();
        }

    }

    /**
     * @param BlogPost $blogPost
     * @return void
     */
    protected function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }


    public function updated(BlogPost $blogPost)
    {
    }

    /**
     * Handle the BlogPost "deleted" event.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "restored" event.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "force deleted" event.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}
