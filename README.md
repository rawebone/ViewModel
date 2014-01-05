# ViewModel

[![Build Status](https://travis-ci.org/rawebone/ViewModel.png?branch=master)](https://travis-ci.org/rawebone/ViewModel)

View Models provide an abstraction between Models, structures holding data
in your Domain Layer, and Views, the interpolation of data into a User Interface.
This abstraction exists to reduce the amount of logic required to markup the UI
and to enable testing of the core presentation logic without having to compare
the entire output markup. In addition, should your template system change the
logic should be very simplistic to migrate.

This library provides:

* A basic implementation of the MVVM pattern
* Adapters for a number of Templating Engines
* A system for documenting View Models so that the information can be passed on to designers/product managers

## Usage

### View Models

A View Model consists of a class, defining the logic, and a template defining
the markup of the output:

```php
<?php
namespace My\App\Views;

// src/My/App/Views/Model.php

use Rawebone\ViewModel\AbstractViewModel;

class Model extends AbstractViewModel
{
    // Define your logic/constructors here

    public function name()
    {
        return "John";
    }
}


```

```php
<?php

// src/My/App/Views/Model.view.php

echo $model->name() . "\n";

```


### Engines

The library supports a number of Templating Systems by default:

* `Rawebone\ViewModels\Engines\BasicPhpEngine`
* `Rawebone\ViewModels\Engines\MustacheEngine`
* `Rawebone\ViewModels\Engines\PhlyMustacheEngine`
* `Rawebone\ViewModels\Engines\TwigEngine`

Usage of the engines is quite straight forward:

```php

$engine = new \Rawebone\ViewModel\Engine\BasicPhpEngine();
echo $engine->render(new \My\Project\Views\Model()); // John

```

By convention, all of the Engine adapters will expose a single variable in their
contexts called "model". In addition, each engine appends on their specific file
extension to the file name provided by the `ViewModel` (i.e. ".twig", ".php").

The `TwigEngine`, `MustacheEngine` and `PhlyMustacheEngine` all accept two
constructor parameters with the first being the encapsulated engine and the
second being a boolean specifying whether the file should be passed through
or whether the contents of the file should be passed through.


### Documentation

You may find yourself working with design teams who do not know the internals
of the application or wondering what data can be consumed by a template. This
library provides a tool to document the View Models in your system easily so
that you can output the information in whatever format you require.

```php

$meta = new \Rawebone\ViewModel\MetaData\Providers\ZeptechMetaDataProvider():

$model = $meta->collateFor(new \My\Project\Views\Model());

foreach ($model as $exposed) {
    echo "Type: " . ($exposed->isProperty() ? "Property" : "Method") . "\n" .
         "Name: " . $exposed->name() . "\n" . 
         "Returns:" . $exposed->returnType() . "\n" .
         "Example: " . $exposed->example() . "\n";
}

```

The model can then be annotated as:

```php
namespace My\Project\Views;

use Rawebone\ViewModel\AbstractViewModel;

class Model extends AbstractViewModel
{
    /**
     * @vmExpose
     * @vmReturn string
     * @vmExample JOHN
     */
    public $upper;

    /**
     * @vmExpose
     * @vmReturn string
     * @vmExample John
     */
    public function name()
    {
        return "John";
    }
}

```

