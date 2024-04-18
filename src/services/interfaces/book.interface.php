<?php

interface BookInterface
{
    public function addBook($endpoint);
    public function editBook($book_title, $endpoint);
    public function deleteBook($book_title, $endpoint);
    public function searchBook($book_title, $endpoint);
}
