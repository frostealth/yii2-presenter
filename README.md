Yii2 View Presenters
=============

So you have those scenarios where a bit of logic needs to be performed before some data (likely from your entity) 
is displayed from the view.

* Should that logic be hard-coded into the view? **No.**
* Should we instead store the logic in the model? **No again!**

Instead, leverage view presenters. That's what they're for! This package provides one such implementation.

## Installation

Run the [Composer](http://getcomposer.org/download/) command to install the latest stable version:

```bash
composer require frostealth/yii2-presenter @stable
```

## Usage

The first step is to store your presenters somewhere - anywhere. 
These will be simple objects that do nothing more than format data, as required.

Here's an example of a presenter.

```php
namespace app\presenters;

use app\models\User;
use frostealth\presenter\Presenter;

/**
 * Class ConcreteEntityPresenter
 *
 * @property User   $entity
 *
 * @property-read string $firstName
 * @property-read string $lastName
 * @property-read string $fullName
 * @property-read string $birthDate
 */
class UserPresenter extends Presenter
{
    /**
     * @return string
     */
    public function getFullName()
    {
        return implode(' ', [$this->firstName, $this->lastName]);
    }
    
    /**
     * @return string
     */
    public function getBirthDate()
    {
        return date('y.M.d', $this->entity->birthDate);
    }
    
    /**
     * @inheritdoc
     * @see \yii\base\Arrayable::fields()
     * @link http://www.yiiframework.com/doc-2.0/guide-rest-resources.html#fields
     */
    public function fields()
    {
        $fields = parent::fields();
        $fields[] = 'fullName';
        
        return $fields;
    }
}
```

Next, on your entity, pull in the `frostealth\yii2\presenter\traits\PresentableTrait` trait, 
which will automatically instantiate your presenter class.

Here's an example of an presentable model.

```php
namespace app\models;

use app\presenters\UserPresenter;
use frostealth\presenter\interfaces\PresentableInterface;
use frostealth\yii2\presenter\traits\PresentableTrait;

/**
 * Class User
 *
 * @property string $firstName
 * @property string $lastName
 * @property string $birthDate
 * @property string $passwordHash
 * @property string $passwordResetToken
 *
 * @method UserPresenter presenter()
 */
class User extends ActiveRecord implements PresentableInterface
{
    use PresentableTrait;
    
    /** @var string|array */
    protected $presenter = 'app\presenters\UserPresenter';
    
    /**
     * @inheritdoc
     * @see \yii\base\Arrayable::fields()
     * @link http://www.yiiframework.com/doc-2.0/guide-rest-resources.html#fields
     */
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['passwordHash'], $fields['passwordResetToken']);
        
        return $fields;
    }
}
```

Now, within your view, you can do:

```php
<dl>
    <dt>Name</dt>
    <dd><?= $model->presenter()->fullName ?></dd>
    
    <dt>Birth Date</dt>
    <dd><?= $model->presenter()->birthDate ?></dd>
</dl>
```

### Yii2 REST

Here's an example of an controller.

```php
namespace app\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    /** @inheritdoc */
    public $serializer = 'frostealth\yii2\presenter\rest\Serializer';
    
    /** @inheritdoc */
    public $className = 'app\models\User';
}
```

## License

The MIT License (MIT).
See [LICENSE.md](https://github.com/frostealth/yii2-presenter/blob/master/LICENSE.md) for more information.
