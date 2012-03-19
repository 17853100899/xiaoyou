<?php
$app = new Slim();

// The following routes are accessed directly via browser

$app->get('/', function () {
  $controller = new HomeController();
  $controller->index();
});

$app->get('/register', function () {
  $controller = new RegisterController();
  $controller->show();
});

$app->get('/invite', function () {
  $controller = new InviteController();
  $controller->show();
});

// article list page contains popup window
// for creating new articles
$app->get('/articles', function () {
  $controller = new ArticleController();
  $controller->index();
});

$app->get('/schedule', function () {
  $controller = new ArticleController();
  $controller->showSchedule();
});

// profiles do not need creation because
// profiles are created while registering
$app->get('/profiles', function () {
  $controller = new ProfileController();
  $controller->index();
});

$app->get('/profile/:id', function ($id) {
  $controller = new ProfileController();
  $controller->show($id);
});

// The following routes are accessed via AJAX

$app->post('/register', function () {
  $controller = new RegisterController();
  $controller->submit();
});

$app->post('/invite', function () {
  $controller = new InviteController();
  $controller->submit();
});

$app->post('/articles', function () {
  $controller = new ArticleController();
  $controller->create();
});

$app->put('/article/:id', function ($id) {
  $controller = new ArticleController();
  $controller->update($id);
});

$app->delete('/article/:id', function ($id) {
  $controller = new ArticleController();
  $controller->delete($id);
});

$app->put('/profile/:id', function ($id) {
  $controller = new ProfileController();
  $controller->update($id);
});

$app->post('/contacts', function () {
  $controller = new ContactController();
  $controller->create();
});

$app->put('/contact/:id', function ($id) {
  $controller = new ContactController();
  $controller->update($id);
});

$app->delete('/contact/:id', function ($id) {
  $controller = new ContactController();
  $controller->delete($id);
});

$app->post('/experiences', function () {
  $controller = new ExperienceController();
  $controller->create();
});

$app->put('/experience/:id', function ($id) {
  $controller = new ExperienceController();
  $controller->update($id);
});

$app->delete('/experience/:id', function ($id) {
  $controller = new ExperienceController();
  $controller->delete($id);
});

$app->post('/honors', function () {
  $controller = new HonorController();
  $controller->create();
});

$app->put('/honor/:id', function ($id) {
  $controller = new HonorController();
  $controller->update($id);
});

$app->delete('/honor/:id', function ($id) {
  $controller = new HonorController();
  $controller->delete($id);
});

$app->post('/papers', function () {
  $controller = new PaperController();
  $controller->create();
});

$app->put('/paper/:id', function ($id) {
  $controller = new PaperController();
  $controller->update($id);
});

$app->delete('/paper/:id', function ($id) {
  $controller = new PaperController();
  $controller->delete($id);
});

// TODO add routes for uploading avatars

$app->run();
