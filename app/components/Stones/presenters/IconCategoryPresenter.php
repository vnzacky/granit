<?php namespace Components\Stones\Presenters;

use Robbo\Presenter\Presenter;
use Components\Stones\Models\IconCategory;

class IconCategoryPresenter extends Presenter
{
    /**
     * Get the creation date of the page
     * @return string
     */
    public function date()
    {
        return $this->created_at->format('d') . '<br>' . $this->created_at->format('M') . '<br>' . $this->created_at->format('Y');
    }

    /**
     * Get the page's status
     * @return string
     */
    public function status()
    {
        return \Str::title($this->status);
    }
    
    /**
     * Get the parent category
     * @return string
     */
    public function parent_category()
    {
        $category = IconCategory::find($this->parent_id);
        if(isset($category))
            return $category->name;
        else
            return '';
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
