<?php namespace Components\Memorials\Presenters;

use Robbo\Presenter\Presenter;
use Components\Memorials\Models\Memorial;

class GuestbookPresenter extends Presenter {
    
    /**
     * Get the creation date of the page
     * @return string
     */
    public function date()
    {
        return $this->created_at->format('d') . '<br>' . $this->created_at->format('M') . '<br>' . $this->created_at->format('Y');
    }
    
    /**
     * Get the memorials name
     * @return string
     */
    public function memorial_name() {
        $memorial = Memorial::find($this->memorial_id);
        return $memorial->name;
    }
    /**
     * Get the category's author
     * @return string
     */
    public function author()
    {
        try {
            $user = \Sentry::findUserById($this->created_by);
            return $user->username;
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return '';
        }
    }
    
}