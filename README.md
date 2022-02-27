# First PHP Liquid Template engine

First project to show you how use and handle **Liquid template engine** at your php applications.

### Installing

Running `composer require liquid/liquid`

```php
require_once "vendor/autoload.php";

use Liquid\Liquid;
use Liquid\Template;
use Liquid\Cache\Local;
```

### Using

```php
$template = new Template(__DIR__.'/templates/_include/');

$input = "YOUR TEMPLATE CODE";
$template->parse($input);
$template->setCache(new Local());
echo $template->render([
    'name' => 'Maxi',
    'plain-html' => '<b>Your comment was:</b>',
    'comment-with-xss' => '<script>alert();</script>',
]);
```
### Example

File **home.html:**

```
Hello, {% include 'test.html' %}

{{ plain-html | raw }}
{{ comment-with-xss }}
```

File **_include/test.html:**

```
Max and {{name}}!
```

**Output:**

```
Hello, Max and Maxi!


<b>Your comment was:</b>
&lt;script&gt;alert();&lt;/script&gt;
```
