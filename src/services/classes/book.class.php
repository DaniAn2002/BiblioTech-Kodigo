<?php

class Book implements BookInterface
{
    public $book_id;
    public $title;
    public $author;
    public $release_year;
    public $category;

    public function __constructor($book_id, $title, $author, $release_year, $category)
    {
        $this->book_id = $book_id;
        $this->title = $title;
        $this->author = $author;
        $this->release_year = $release_year;
        $this->category = $category;
    }

    public function addBook($endpoint)
    {
        $data = array(
            'book_id' => $this->book_id,
            'title' => $this->title,
            'author' => $this->author,
            'release_year' => $this->release_year,
            'category' => $this->category
        );

        $ch = curl_init($endpoint);

        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }
    public function editBook($book_title, $endpoint)
    {
        $ch = curl_init($endpoint);

        $putData = array(
            'book_id' => $this->book_id,
            'title' => $book_title,
            'author' => $this->author,
            'release_year' => $this->release_year,
            'category' => $this->category
        );

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($putData));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }
    public function deleteBook($book_title, $endpoint)
    {
        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }
    public function searchBook($book_title, $endpoint)
    {
    }
}

class getBooksAPI
{
    public function getBooks($endpoint)
    {
        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }
}
