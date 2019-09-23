<?php

namespace JohnDoe\BlogPackage\Listeners;

use JohnDoe\BlogPackage\Events\PostWasCreated;

class UpdatePostTitle
{
    /**
     * Handle the event.
     *
     * @param PostWasCreated $event
     * @return void
     */
    public function handle(PostWasCreated $event)
    {
        $event->post->update([
            'title' => 'New: ' . $event->post->title
        ]);
    }
}