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

    Call the insert method by following way. Instead of attribute model you can call any model
```php
    $this->load->model("attribute_model");
    $this->attribute_model->insert(array('name'=>'Size','attr_values'=>'S,L,XL','is_required'=>1));
`````

* Insert Multiple Data

    insert multiple records in single query 
```php
    $this->load->model("product_model");
    $data = array(
        0=>array(
            'product_name' =>'Moto G',
            'category_id' => 2,
            'brand_name'=>'motorola'
        ),
        1=>array(
            'product_name' =>'Nexus 5',
            'category_id' => 4,
            'brand_name'=>'google'
        )        
    );
    $this->product_model->insert_multiple($data);
`````    

* Update Data

    update data by specific conditions. here $set parameter is require and $where is optional
    
````php    
    $set = array(
        'price' => 200,
        'brand_id'=>4
    );
    $where = array(
        'brand_id=>5,
        'category_id'=>6
    );
    $this->load->model("product_model");
    $this->product_model->update($set,$where);
````
  
  
* Delete Data

    remove multiple rows on single condition
```php     
   $data = array(4,5,6);
   $this->load->model("log_model");
   $field = 'log_id'
   $this->log_model->remove_all($field,$data);
````
* Find Data
    
  find data on by specific columns,mutiple AND condition in where and specific order. $columns,$where and $order are optional.
```php
   $columns = array('product_name','price','product_id','brand_name');
   $where = array('brand_id'=>3,'price'=>100);
   $order = array('product_id'=>'DESC | ASC');
   $this->product_model->find($columns,$where,$order);
```


# Upcoming features

* Advance Search
* Join 
* Count Data 
* Advance Remove conditions

