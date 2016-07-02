<?php

namespace Application\Controllers;

use Core\Web\BaseController;
use Core\Web\Request;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of indexController
 *
 * @author developer2
 */
class indexController extends BaseController {

    public function indexAction() {

//      $book = R::dispense( 'book' );
//      $book->title = "Nodejs";
//      $book->description = "Server side javascript";
//      $book->author = "John Doe";
//      $book->rating = 4;
//      $book->price = 30.50;
//      $bookId = R::store($book); // save booko
//
//      $this->view->book = $book;
//      $this->view->bookId = $bookId;

        $this->render('index');
    }

    public function getBookAction() {
        $id = Request::getGet('id');

        if (!is_numeric($id)) {
            exit('Invalid Book Id');
        }

        $this->view->book = R::load('book', $id); // load book by id

        $this->render('get');
    }

    public function getAllBooksAction() {

        $ids = [1, 2, 3, 4, 5, 6, 7, 8];

        //$this->view->books = R::loadAll('book',$ids); //load by ids
        //$this->view->books = R::find('book'); // find all
        //$this->view->books  = R::find( 'book', ' rating > 4 ');
        //$this->view->books  = R::find( 'book', ' rating < :rating ', [ ':rating' => 2 ] );
        //$this->view->books = R::find( 'book', ' title LIKE ? ', [ 'Learn to%' ] );
        //$this->view->books = R::findAll('book'); // find all
        //$this->view->books = R::findAll('book', ' ORDER BY title DESC LIMIT 10 '); // find all
        //$this->view->books  = R::findOne( 'book', ' title = ? ', [ 'SQL Dreams' ] );
        //$this->view->books = R::find( 'book',' id IN ('.R::genSlots( $ids ).')', $ids );

        $this->render('list');
    }

    public function listAction() {
        //$this->view->books = R::getAll( 'SELECT * FROM book' );
        $this->view->books = R::getAll('SELECT * FROM book WHERE title = :title', [':title' => 'Nodejs']);

        $this->render('list');
    }

}
