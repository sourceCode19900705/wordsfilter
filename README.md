# simpleillegalwordsfilter
A simple illegal words filter
## Usage

```php
<?php
$wordsAdapter = new \SIWF\Words\ArrayWordsAdapter(['simple','illegal']);
$builder = new \SIWF\Tree\Builder($wordsAdapter);
$storage = new \SIWF\Storage\NativeStorageAdapter($builder);
$filter = new \SIWF\Filter\Filter($storage);

$txt = 'A very simple illegal words filter';
$hint = $filter->hint($txt);
echo $hint;
//this will output 'simple';
```
## Cached

### File words Adapter

You can store the words in a blacklist.php(or other file name with .php).
This file must return an php array like: array('word1','word2'...);
```php
<?php
//blacklist.php example:
return array(
    'cat',
    'dog'
);
```

### Words tree storage adapter

You can store the words tree in the storage adapter.This package have Memcached adapter (for php extension Memcached and Memcache).

```php
<?php
//Memcached PHP Extension example:
//$memcached is the \Memcached class instance that has already configurated and could connect to the memcached server
$memcached = new \Memcached();
$memcached->addServer('localhost',11211);

$wordsAdapter = new \SIWF\Words\FileWordsAdapter('path/to/blacklist.php');
$builder = new \SIWF\Tree\Builder($wordsAdapter);
$storage = new \SIWF\Storage\MemcachedStorageAdapter($builder,$memcached);

```

### Hit result storage adapter

Like **Words tree storage adapter** There you can store the hit result in the result storage adapter.

```php
<?php
//Memcached PHP Extension example:
//$memcached is the \Memcached class instance that has already configurated and could connect to the memcached server
$memcached = new \Memcached();
$memcached->addServer('localhost',11211);
$resStorage = new \SIWF\Filter\Result\MemcachedAdapter($memcached);

```

### Cached Excample

Use **File words Adapter** **Words tree storage adapter** **Hit result storage adapter** :

```php
<?php
//$memcached is the \Memcached class instance that has already configurated and could connect to the memcached server
$memcached = new \Memcached();
$memcached->addServer('localhost',11211);
$wordsAdapter = new \SIWF\Words\FileWordsAdapter('path/to/blacklist.php');
$builder = new \SIWF\Tree\Builder($wordsAdapter);
$storage = new \SIWF\Storage\MemcachedStorageAdapter($builder,$memcached);
$resStorage = new \SIWF\Filter\Result\MemcachedAdapter($memcached);

//use cached filter with: Words Tree Storage and Hit Result Storage
$filter = new \SIWF\Filter\CachedFilter($storage,$resStorage);
$txt = 'A very simple illegal words filter';
$hint = $filter->hint($txt);

```

### Update words list and clear cache

If you use **File words Adapter**,then you can modify the words list file and save it.
Add these codes to make your filter update automaticlly:

```php
<?php
//$memcached is the \Memcached class instance that has already configurated and could connect to the memcached server
$memcached = new \Memcached();
$memcached->addServer('localhost',11211);
if(file_exists('path/to/blacklist.php'))
            {
                $mtime = filemtime('path/to/blacklist.php');

//This memcached key can be any strings you want: siwf_blacklist_create_time.It just store the blacklist.php modify time.
                if($mtime - $memcached->get('siwf_blacklist_create_time') >0)
                {
                    $memcached->set('siwf_blacklist_create_time',time());
                    //\SIWF\Storage\MemcachedStorageAdapter $storage
                    $storage->clear();
                    //\SIWF\Filter\Result\MemcachedAdapter $storage
                    $resStorage->clear();
                }
            }
```

After the cache clear method called,it will regenerate the cache when the filter build next time.


## Use it with Laravel

Go to: [laravel-swif](https://github.com/vaxilicaihouxian/laravel-swif)
