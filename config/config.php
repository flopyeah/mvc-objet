<?php

/**
 * Config files
 */

ini_set('allow_url_include', 1);

const DB_HOST = 'localhost';
const DB_PORT = '3306';
const DB_NAME = 'mvc_blog';
const DB_USER = 'root';
const DB_PWD  = '';

const WEBSITE_TITLE = "My website";
const BASE_URL = "/mvc-o-base";

const CLASSES_SOURCES = [
    'src/controller',
    'config',
    'src/model',
];
