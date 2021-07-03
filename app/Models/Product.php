<?php

namespace App\Models;


use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $table = "products";
    protected $guarded = [];
    protected $appends = ['quantity_check', 'sale_check', 'price_check', 'random_product'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }

    public function getRandomProductAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->orderBy('updated_at')->first() ?? false;
    }

    public function getQuantityCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->first() ?? 0;
    }

    public function getSaleCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->where('sale_price', '!=', null)
                ->where('date_on_sale_from', '<', Carbon::now())->where('date_on_sale_to', '>', Carbon::now())
                ->orderBy('sale_price')->first() ?? false;
    }

    public function getPriceCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->orderBy('price')->first() ?? false;
    }


    public function getIsActiveAttribute($is_active)
    {
        return $is_active ? 'فعال' : 'غیر فعال';
    }

    public function scopeFilter($query)
    {
        if (request()->has('attribute')) {
            foreach (request()->attribute as $attribute) {
                $query->whereHas('attributes', function ($query) use ($attribute) {
                    foreach (explode('-', $attribute) as $index => $item) {
                        if ($index == 0) {
                            $query->where('value', $item);
                        } else {
                            $query->orWhere('value', $item);
                        }
                    }
                });
            }
        }


        if (request()->has('variation')) {
            $query->whereHas('variations', function ($query) {
                foreach (explode('-', request()->variation) as $index => $variation) {
                    if ($index == 0) {
                        $query->where('value', $variation);
                    } else {
                        $query->orWhere('value', $variation);
                    }
                }
            });
        }

        if (request()->has('sortBy')) {
            $sortBy = request()->sortBy;
            switch ($sortBy) {
                case 2 :
                    break;
                case 3 :
                    $query->latest();
                    break;
                case 4 :
                    break;
                case 5 :
                    $query->orderBy(ProductVariation::select('price')->whereColumn('product_variations.product_id','products.id')->orderBy('sale_price','desc')->take(1));
                    break;
                case 6 :
                    $query->orderByDesc(ProductVariation::select('price')->whereColumn('product_variations.product_id', 'products.id')->orderBy('sale_price','desc')->take(1));
                    break;
                default:
                    $query;
                    break;
            }
        }
        return $query;
    }

    public function scopeSearch($query)
    {
        $keyword=request()->search;
        if (request()->has('search') && trim($keyword)!=''){
            $query->where('name','LIKE','%'.trim($keyword).'%');
        }
        return $query;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
