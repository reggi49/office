<?php

namespace App;

use Carbon\Carbon;
use DB;
// use Illuminate\Database\Eloquent\SoftDeletes;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['region', 'provinsi', 'kota', 'klasifikasi', 'subklasifikasi', 'kriteria', 'toko', 'alamat', 'alamat2', 'phone', 'faxs', 'email', 'hp', 'contact', 'b_day', 'alamat_rumah', 'religion', 'celebration', 'status', 'gambar', 'gambar2', 'id', 'id_prov', 'id_kota', 'keterangan'];

    protected $dates=['created_at'];
    
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute($value)
    {
        $imageUrl = '';
        if (!is_null($this->image)) {
            $directory = config('cms.image.directory');
            $imagePath = public_path() . "/{$directory}/" . $this->image;
            if (file_exists($imagePath)) {
                $imageUrl = asset("/{$directory}/" . $this->image);
            }
        }

        return $imageUrl;
    }
    
    public function getImageThumbUrlAttribute($value)
    {
        $imageUrl = '';
        if (!is_null($this->image)) {
            $directory = config('cms.image.directory');
            $ext = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace('.{{ext}}', '_thumb.{ext}', $this->image);
            $imagePath = public_path() . "/{$directory}/" . $thumbnail;
            if (file_exists($imagePath)) {
                $imageUrl = asset("/{$directory}/" . $thumbnail);
            }
        }

        return $imageUrl;
    }

    public function getBodyHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : null;
    }
    
    public function getExcerptHtmlAttribute($value)
    {
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : null;
    }

    public function getTagsHtmlAttribute()
    {
        $anchors = [];
        foreach ($this->tags as $tag) {
            $anchors[] = '<a href=" ' . route('tag', $tag->slug) . '">' . $tag->name . '</a>';
        }
        return implode(',', $anchors);
    }
                                            
    public function dateFormated($showTimes = false)
    {
        \Carbon\Carbon::setLocale('id');
        $format = 'l, d F Y H:i';
        if ($showTimes) $format = 'l, d F Y';
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format($format);
        //return \Carbon\Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    public function publicationLabel()
    {
        if (!$this->published_at) {
            return '<span class="label label-warning">Draft</span>';
        } elseif ($this->published_at && $this->published_at->isFuture()) {
            return '<span class="label label-info">Schedue</span>';
        } else {
            return '<span class="label label-success">Published</span>';
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    } 
   
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNotNull('updated_at');
    }

    public function commentsNumber($label = 'Comment')
    {
        $commentsNumber = $this->comments->count();
        return $commentsNumber . ' ' . Str::plural('Comment', $commentsNumber);
    }

    public function createComment(array $data)
    {
        $this->comments()->create($data);
    }

    public function setPublishedAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: null;
    }

    public function getDateAttribute($value)
    {
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
    
    public function scopeCategory($query, $value)
    {
        return $query->where('category_id', '=', $value);
    }
    
    public function scopePopular($query)
    {
        return $query->orderBy('view_count', 'desc');
    }
    
    public function scopeVideos($query)
    {
        return $query->where('post_type', '=', '3');
    }

    public function scopeHeadline($query, $value)
    {
        return $query->where('set_headline', '=', '1')->orderBy('created_at', 'desc')->limit($value);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeScheduled($query)
    {
        return $query->where('published_at', '>', Carbon::now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull('published_at');
    }

    public function scopeFilter($query, $filter)
    {
        if (isset($filter['month']) && $month = $filter['month']) {
            $query->whereRaw('month(published_at) = ?', [Carbon::parse($month)->month]);
        }
        if (isset($filter['year']) && $year = $filter['year']) {
            $query->whereRaw('year(published_at) = ?', $year);
        }
        //check if any term entered
        if (isset($filter['term']) && $term = $filter['term']) {
            $query->where(function ($q) use ($term) {
                $q->whereHas('author', function ($qr) use ($term) {
                    $qr->where('name', 'LIKE', "%{$term}%");
                });
                // $q->orWhereHas('category', function($qr) use ($term){
                //     $qr->where('title','LIKE', "%{$term}%");
                // });
                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('body', 'LIKE', "%{$term}%");
            });
        }
    }

    public static function archives()
    {
        return static::selectRaw('count(id) as post_count, year(published_at) year, monthname(published_at) month')
                        ->published()
                        ->groupBy('year', 'month')
                        ->orderByRaw('min(published_at) desc')
                        ->get();
    }

    public function createTags($tagString)
    {
        $tags = explode(',', $tagString);
        $tagIds = [];
        foreach ($tags as $tag) {
            $newTag = Tag::firstOrCreate([
                'slug' => Str::slug($tag),
                'name' => ucwords(trim($tag)),
            ]);
            $tagIds[] = $newTag->id;
        }
        $this->tags()->sync($tagIds);
    }

    public function getTagsListAttribute()
    {
        return $this->tags->pluck('name');
    }

    public function getTagsAllAttribute()
    {
        return Tag::get()->pluck('name');
    }

    public function relatedPostsByTag()
    {
        // get the related categories id of the $post
        $related_category_ids = Category::pluck('categories.id');

        return Post::whereHas('category', function ($query) use ($related_category_ids) {
            $query->whereIn('category_id', $related_category_ids);
        })->where('id', '<>', $this->id)->take(5)->get();
    }
    
    public function getPopularTag()
    {
        // $commentsNumber = $this->tag->count();
        //return $commentsNumber;
        $popular_tags = DB::table('post_tag')
        ->join('tags', 'post_tag.tag_id', '=', 'tags.id')
        ->select(DB::raw('count(tag_id) as repetition, tag_id, tags.name, tags.slug'))
        ->groupBy('tag_id', 'tags.name', 'tags.slug')
        ->orderBy('repetition', 'desc')
        ->limit(5)
            ->get();

        return $popular_tags;
    }
}
