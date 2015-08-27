<?php namespace Abnmt\TheaterPartners\Models;

use Model;
use Str;

/**
 * Partner Model
 */
class Partner extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'abnmt_theaterpartners_partners';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'category' => [
            'Abnmt\TheaterPartners\Models\Category',
        ],
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'cover' => ['System\Models\File'],
        'logo_color' => ['System\Models\File'],
        'logo_bw' => ['System\Models\File'],
    ];
    public $attachMany = [];



    public function scopeIsPublished($query)
    {
        return $query
            ->whereNotNull('published')
            ->where('published', true)
        ;
    }

    /**
     * Lists articles for the front end
     * @param  array $options Display options
     * @return self
     */
    public function scopeGetCategory($query, $category)
    {
        if (is_null($category))
            return;
        $query
            ->isPublished()
            ->with(['logo_bw', 'logo_color'])
            ->whereHas('category', function($q) use ($category) {
                $q->where('slug', '=', $category);
            })
        ;

        return $query->get();
    }

    // public function beforeValidate()
    // {
    //     // Generate a URL slug for this model
    //     if (!$this->exists && !$this->slug)
    //         $this->slug = Str::slug($this->title);
    // }

    // public function beforeCreate()
    // {
    //     // Generate a URL slug for this model
    //     if (!$this->exists && !$this->slug)
    //         $this->slug = Str::slug($this->title);
    // }

    /**
     * Sets the "url" attribute with a URL to this object
     * @param string $pageName
     * @param Cms\Classes\Controller $controller
     */
    public function setUrl($pageName, $controller)
    {
        $params = [
            'id' => $this->id,
            'slug' => $this->slug,
        ];

        if (array_key_exists('category', $this->getRelations())) {
            $params['category'] = $this->category->count() ? $this->category->first()->slug : null;
        }

        return $this->url = $controller->pageUrl($pageName, $params);
    }
}