
# 切換分支要修改(在ubuntu權限下指令)
- .env設定
- composer install vendor
- php artisan key:generate
- npm install

# 靜態資源設定(讓外部可以存取到storage下的文件,例如上傳的圖片)
- php artisan vendor:publish --tag=ckeditor
- php artisan storage:link

# tinker產生圖片(no_image.jpg)
- 算了,他需要先有一張圖片,在這個圖片的基礎上才能在產生圖片
- wget https://vignette.wikia.nocookie.net/theflophouse/images/0/0a/No-image-available.png/revision/latest?cb=20140219035154 && mv latest?cb=20140219035154 no_image.jpg

```
// include composer autoload
require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

// create an image manager instance with favored driver
$manager = new Intervention\Image\ImageManager(array('driver' => 'imagick'));

// to finally create image instances
$image = $manager->make('storage/post_img/foo.jpg')->resize(300, 200);

Image::make($file->getRealPath())->resize('200','200')->save($filename);
```