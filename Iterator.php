<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/3/6
 * Time: 下午5:36
 * @遍历模式-迭代器模式
 */

/*class MyClass
{
    public $var1 = 'value 1';
    public $var2 = 'value 2';
    public $var3 = 'value 3';
    protected $protected = 'protected var';
    private   $private   = 'private var';
    function iterateAll() {
        foreach($this as $key => $value) {
            print "$key => $value\n";
        }
    }
}
$class = new MyClass();
foreach($class as $key => $value) {
    print "$key => $value\n";
}
echo "\n";
$class->iterateAll();*/



class Book
{
    private $author;
    private $title;
    public function __construct(string $title, string $author)
    {
        $this->author = $author;
        $this->title = $title;
    }
    public function getAuthor(): string
    {
        return $this->author;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
}


class Collection implements \Countable, \Iterator
{
    private $books = [];
    private $currentIndex = 0;

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }
    public function count(): int
    {
        return count($this->books);
    }
    public function current(): Book
    {
        return $this->books[$this->currentIndex];
    }
    public function key(): int
    {
        return $this->currentIndex;
    }
    public function next()
    {
        $this->currentIndex++;
    }
    public function rewind()
    {
        $this->currentIndex = 0;
    }
    public function valid(): bool
    {
        return isset($this->books[$this->currentIndex]);
    }
}



$bookList = new Collection();
$bookList->addBook(new Book('Learning PHP Design Patterns', 'William Sanders'));
$bookList->addBook(new Book('Professional Php Design Patterns', 'Aaron Saray'));
$bookList->addBook(new Book('Clean Code', 'Robert C. Martin'));
foreach ($bookList as $book) {
    echo $book->getAuthor().'-'.$book->getTitle(),PHP_EOL;
}