<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute باید پذیرفته شده باشد.',
    'active_url'           => 'آدرس :attribute معتبر نیست',
    'after'                => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal'       => ':attribute باید تاریخی بعد از :date، یا مطابق با آن باشد.',
    'alpha'                => ':attribute باید فقط حروف الفبا باشد.',
    'alpha_dash'           => ':attribute باید فقط حروف الفبا، عدد و خط تیره(-) باشد.',
    'alpha_num'            => ':attribute باید فقط حروف الفبا و عدد باشد.',
    'array'                => ':attribute باید آرایه باشد.',
    'before'               => ':attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal'      => ':attribute باید تاریخی قبل از :date، یا مطابق با آن باشد.',
    'between'              => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file'    => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string'  => ':attribute باید بین :min و :max کاراکتر باشد.',
        'array'   => ':attribute باید بین :min و :max آیتم باشد.',
    ],
    'boolean'              => 'فیلد :attribute فقط می‌تواند صفر و یا یک باشد',
    'confirmed'            => ':attribute با فیلد تکرار مطابقت ندارد.',
    'date'                 => ':attribute یک تاریخ معتبر نیست.',
    'date_format'          => ':attribute با الگوی :format مطاقبت ندارد.',
    'different'            => ':attribute و :other باید متفاوت باشند.',
    'digits'               => ':attribute باید :digits رقم باشد.',
    'digits_between'       => ':attribute باید بین :min و :max رقم باشد.',
    'dimensions'           => 'ابعاد تصویر :attribute قابل قبول نیست.',
    'distinct'             => 'فیلد :attribute تکراری است.',
    'email'                => ':attribute باید یک ایمیل معتبر باشد',
    'exists'               => ':attribute انتخاب شده، معتبر نیست.',
    'file'                 => ':attribute باید یک فایل باشد',
    'filled'               => 'فیلد :attribute الزامی است',
    'image'                => ':attribute باید تصویر باشد.',
    'in'                   => ':attribute انتخاب شده، معتبر نیست.',
    'in_array'             => 'فیلد :attribute در :other وجود ندارد.',
    'integer'              => ':attribute باید عدد صحیح باشد.',
    'ip'                   => ':attribute باید IP معتبر باشد.',
    'ipv4'                 => ':attribute باید یک آدرس معتبر از نوع IPv4 باشد.',
    'ipv6'                 => ':attribute باید یک آدرس معتبر از نوع IPv6 باشد.',
    'json'                 => 'فیلد :attribute باید یک رشته از نوع JSON باشد.',
    'max'                  => [
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file'    => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string'  => ':attribute نباید بیشتر از :max کاراکتر باشد.',
        'array'   => ':attribute نباید بیشتر از :max آیتم باشد.',
    ],
    'mimes'                => ':attribute باید یکی از فرمت های :values باشد.',
    'mimetypes'            => ':attribute باید یکی از فرمت های :values باشد.',
    'min'                  => [
        'numeric' => ':attribute نباید کوچکتر از :min باشد.',
        'file'    => ':attribute نباید کوچکتر از :min کیلوبایت باشد.',
        'string'  => ':attribute نباید کمتر از :min کاراکتر باشد.',
        'array'   => ':attribute نباید کمتر از :min آیتم باشد.',
    ],
    'not_in'               => ':attribute انتخاب شده، معتبر نیست.',
    'numeric'              => ':attribute باید عدد باشد.',
    'present'              => 'فیلد :attribute باید در پارامترهای ارسالی وجود داشته باشد.',
    'regex'                => 'فرمت :attribute معتبر نیست',
    'required'             => 'فیلد :attribute الزامی است',
    'required_if'          => 'هنگامی که :other برابر با :value است، فیلد :attribute الزامی است.',
    'required_unless'      => 'فیلد :attribute ضروری است، مگر آنکه :other در :values موجود باشد.',
    'required_with'        => 'در صورت وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_with_all'    => 'در صورت وجود فیلدهای :values، فیلد :attribute الزامی است.',
    'required_without'     => 'در صورت عدم وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_without_all' => 'در صورت عدم وجود هر یک از فیلدهای :values، فیلد :attribute الزامی است.',
    'same'                 => ':attribute و :other باید مانند هم باشند.',
    'size'                 => [
        'numeric' => ':attribute باید برابر با :size باشد.',
        'file'    => ':attribute باید برابر با :size کیلوبایت باشد.',
        'string'  => ':attribute باید برابر با :size کاراکتر باشد.',
        'array'   => ':attribute باسد شامل :size آیتم باشد.',
    ],
    'string'               => 'فیلد :attribute باید متن باشد.',
    'timezone'             => 'فیلد :attribute باید یک منطقه زمانی قابل قبول باشد.',
    'unique'               => ':attribute قبلا انتخاب شده است.',
    'uploaded'             => 'آپلود فایل :attribute موفقیت آمیز نبود.',
    'url'                  => 'فرمت آدرس :attribute اشتباه است.',



    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           => [
        'name'                  => 'نام',
        'username'              => 'نام کاربری',
        'email'                 => 'ایمیل',
        'first_name'            => 'نام',
        'last_name'             => 'نام خانوادگی',
        'password'              => 'رمز عبور',
        'password_confirmation' => 'تکرار رمز عبور',
        'city'                  => 'شهر',
        'country'               => 'کشور',
        'address'               => 'آدرس پستی',
        'phone'                 => 'شماره ثابت',
        'cellphone'             => 'شماره همراه',
        'age'                   => 'سن',
        'sex'                   => 'جنسیت',
        'gender'                => 'جنسیت',
        'day'                   => 'روز',
        'month'                 => 'ماه',
        'year'                  => 'سال',
        'hour'                  => 'ساعت',
        'minute'                => 'دقیقه',
        'second'                => 'ثانیه',
        'title'                 => 'عنوان',
        'text'                  => 'متن',
        'content'               => 'محتوا',
        'description'           => 'توضیحات',
        'excerpt'               => 'گزیده مطلب',
        'date'                  => 'تاریخ',
        'time'                  => 'زمان',
        'available'             => 'موجود',
        'size'                  => 'اندازه',
        'terms'                 => 'شرایط',
        'price'                 => 'قیمت',
        'code'                  => 'کد',
        'score'                 => 'تعداد امتیاز',
        'display_name'          => 'نام نمایشی',
        'resource'              => 'نام ریسورس',
        'old_password'          => 'رمز عبور فعلی',
        'newpassword'           => 'رمز عبور جدید',
        'newpassword_confirmation' => 'تکرار رمز عبور جدید',
        'longitude'             => 'طول جغرافیایی',
        'latitude'              => 'عرض جغرافیایی',
        'slug'                  =>'نام انگلیسی',
        'attribute_ids'         =>'ویژگی ها',
        'brand_id'              =>'برند',
        'tag_ids'               =>'برندها',
        'primary_image'         =>'تصویر اصلی',
        'images'              =>'تصویر',
        'images.0'              =>'تصویر',
        'images.1'              =>'تصویر',
        'images.2'              =>'تصویر',
        'images.3'              =>'تصویر',
        'images.4'              =>'تصویر',
        'images.5'              =>'تصویر',
        'images.6'              =>'تصویر',
        'images.7'              =>'تصویر',
        'images.8'              =>'تصویر',
        'images.9'              =>'تصویر',
        'category_id'           =>'دسته بندی',
        'attribute_ids.0'        =>'ویژگی های دسته بندی',
        'attribute_ids.1'        =>'ویژگی های دسته بندی',
        'attribute_ids.2'        =>'ویژگی های دسته بندی',
        'attribute_ids.3'        =>'ویژگی های دسته بندی',
        'attribute_ids.4'        =>'ویژگی های دسته بندی',
        'attribute_ids.5'        =>'ویژگی های دسته بندی',
        'attribute_ids.6'        =>'ویژگی های دسته بندی',
        'attribute_ids.7'        =>'ویژگی های دسته بندی',
        'attribute_ids.8'        =>'ویژگی های دسته بندی',
        'attribute_ids.9'        =>'ویژگی های دسته بندی',
        'attribute_values.0'        =>'ویژگی های محصول',
        'attribute_values.1'        =>'ویژگی های محصول',
        'attribute_values.2'        =>'ویژگی های محصول',
        'attribute_values.3'        =>'ویژگی های محصول',
        'attribute_values.4'        =>'ویژگی های محصول',
        'attribute_values.5'        =>'ویژگی های محصول',
        'attribute_values.6'        =>'ویژگی های محصول',
        'attribute_values.7'        =>'ویژگی های محصول',
        'attribute_values.8'        =>'ویژگی های محصول',
        'attribute_values.9'        =>'ویژگی های محصول',
        'image'                     =>'انتخاب تصویر ',
        'priority'                  =>'الویت',
        'type'                      =>'نوع',
        'variation_values.price.0'        =>'ویژگی قیمت  محصول',
        'variation_values.price.1'        =>'ویژگی قیمت محصول',
        'variation_values.price.2'        =>'ویژگی قیمت محصول',
        'variation_values.price.3'        =>'ویژگی قیمت محصول',
        'variation_values.price.4'        =>'ویژگی قیمت محصول',
        'variation_values.price.5'        =>'ویژگی قیمت محصول',
        'variation_values.price.6'        =>'ویژگی قیمت محصول',
        'variation_values.price.7'        =>'ویژگی قیمت محصول',
        'variation_values.price.8'        =>'ویژگی قیمت محصول',
        'variation_values.price.9'        =>'ویژگی قیمت محصول',
        'variation_values.quantity.0'        =>'ویژگی تعداد محصول',
        'variation_values.quantity.1'        =>'ویژگی تعداد محصول',
        'variation_values.quantity.2'        =>'ویژگی تعداد محصول',
        'variation_values.quantity.3'        =>'ویژگی تعداد محصول',
        'variation_values.quantity.4'        =>'ویژگی تعداد محصول',
        'variation_values.quantity.5'        =>'ویژگی تعداد محصول',
        'variation_values.quantity.6'        =>'ویژگی تعداد محصول',
        'variation_values.quantity.7'        =>'ویژگی تعداد محصول',
        'variation_values.quantity.8'        =>'ویژگی تعداد محصول',
        'variation_values.quantity.9'        =>'ویژگی تعداد محصول',
        'variation_values.value.0'        =>'ویژگی نام محصول',
        'variation_values.value.1'        =>'ویژگی نام محصول',
        'variation_values.value.2'        =>'ویژگی نام محصول',
        'variation_values.value.3'        =>'ویژگی نام محصول',
        'variation_values.value.4'        =>'ویژگی نام محصول',
        'variation_values.value.5'        =>'ویژگی نام محصول',
        'variation_values.value.6'        =>'ویژگی نام محصول',
        'variation_values.value.7' => 'ویژگی نام محصول',
        'variation_values.value.8' => 'ویژگی نام محصول',
        'variation_values.value.9' => 'ویژگی نام محصول',
        'variation_values.sku.0' => 'ویژگی شناسه انبار محصول',
        'variation_values.sku.1' => 'ویژگی شناسه انبار محصول',
        'variation_values.sku.2' => 'ویژگی شناسه انبار محصول',
        'variation_values.sku.3' => 'ویژگی شناسه انبار محصول',
        'variation_values.sku.4' => 'ویژگی شناسه انبار محصول',
        'variation_values.sku.5' => 'ویژگی شناسه انبار محصول',
        'variation_values.sku.6' => 'ویژگی شناسه انبار محصول',
        'variation_values.sku.7' => 'ویژگی شناسه انبار محصول',
        'variation_values.sku.8' => 'ویژگی شناسه انبار محصول',
        'variation_values.sku.9' => 'ویژگی شناسه انبار محصول',
        'otp' => 'رمز یکبار مصرف',
        'amount' => 'مبلغ',
        'percentage' => 'درصد',
        'expired_at' => 'تاریخ انقضاء',
        'max_percentage_amount' => 'حداکثر مبلغ برای نوع درصد',
        'postal_code' => 'کد پستی',
        'city_id' => 'شهر',
        'PLEASE WAIT BEFORE RETRYING.' => 'لطفاً قبل از تلاش مجدد منتظر بمانید.',
        'product_id' => 'انتخاب محصول',
        'attribute' => 'ویژگی ها'
    ],

];
