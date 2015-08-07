# base-model-codeigniter
Remove repetition for query and increase productivity for application in codeigniter

# Installation

Download Base_Model.php and paste it into application/core folder. Then extend your model with Base_Model class and now you can use Base_Model class methods from anywhere in your application.

# Requirement 

You have to define one public variable in your model which contain table name. Variable name should $table. Follow the example below

```php
class Example_model extends Base_Model {
    public $table = 'tbl_examples';
}

````

# Methods Description

* Insert single Data

    Call the insert method by following way
```php
    $this->attribute_model->insert(array('name'=>'Size','attr_values'=>'S,L,XL','is_required'=>1));
`````


* Insert Multiple Data
* Update Data
* Delete Data
* Find Data


# Upcoming features

* Advance Search
* Join 
* Count Data 

