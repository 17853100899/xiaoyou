<?php
$app = new Slim();

// The following routes are accessed directly via browser
$app->get('/', function () {
  UserHelper::requireProfile();
  $controller = new HomeController();
  $controller->index();
});

$app->get('/passwd', function () {
  UserHelper::requireProfile();
  $controller = new LoginController();
  $controller->passwd();
});

$app->get('/login2', function () {
  //UserHelper::requireProfile();
  $controller = new LoginController();
  $controller->login();
});

$app->get('/inbox', function () {
  UserHelper::requireProfile();
  $controller = new MailController();
  $controller->inbox();
});
$app->get('/inbox/:id', function ($id) {
  UserHelper::requireProfile();
  $controller = new MailController();
  $controller->inbox($id);
});


$app->get('/help', function () {
  //UserHelper::requireProfile();
  $controller = new HelpController();
  $controller->show();
});

$app->get('/search', function () {
  UserHelper::requireProfile();
  $controller = new SearchController();
  $controller->index();
});


$app->post('/inbox', function () {
  fAuthorization::requireLoggedIn();
  $controller = new MailController();
  $controller->create();
});

$app->delete('/inbox/:id', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new MailController();
  $controller->delete($id);
});


$app->post('/msgs', function () {
  fAuthorization::requireLoggedIn();
  $controller = new MsgController();
  $controller->create();
});

$app->post('/search', function () {
  fAuthorization::requireLoggedIn();
  $controller = new SearchController();
  $controller->show();
});


$app->delete('/msgs/:id', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new MsgController();
  $controller->delete($id);
});

$app->get('/tweets', function () {
  UserHelper::requireProfile();
  $controller = new TweetController();
  $controller->index();
});

$app->post('/tweets', function () {
  fAuthorization::requireLoggedIn();
  $controller = new TweetController();
  $controller->create();
});

$app->delete('/tweet/:id', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new TweetController();
  $controller->delete($id);
});

$app->post('/tweet/:id/reply', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new TweetController();
  $controller->reply($id);
});

$app->post('/article/preview', function () {
  fAuthorization::requireLoggedIn();
  $controller = new PreviewController();
  $controller->show();
});

$app->post('/article/:id/reply', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new ArticleController();
  $controller->reply($id);
});
/*
$app->get('/intro', function () {
  UserHelper::requireProfile();
  $controller = new VideoController();
  $controller->show();
});
 */

$app->get('/register', function () {
  $controller = new RegisterController();
  $controller->show();
});
$app->post('/avatar/upload', function () {
  fAuthorization::requireLoggedIn();
  $controller = new AvatarController();
  $controller->upload();
});

$app->get('/avatar/edit', function () {
  fAuthorization::requireLoggedIn();
  $controller = new AvatarController();
  $controller->edit();
});

$app->get('/export/csv', function () {
  fAuthorization::requireLoggedIn();
  $controller = new AdminController();
  $controller->exportCSV();
});

$app->get('/export/xls', function () {
  fAuthorization::requireLoggedIn();
  $controller = new AdminController();
  $controller->exportXLS();
});

$app->get('/manage', function () {
  fAuthorization::requireLoggedIn();
  $controller = new AdminController();
  $controller->index();
});
$app->post('/manage/upload', function () {
  fAuthorization::requireLoggedIn();
  $controller = new AdminController();
  $controller->upload();
});
$app->post('/manage/getmail', function () {
  fAuthorization::requireLoggedIn();
  $controller = new AdminController();
  $controller->getmail();
});
$app->post('/manage/sendmail1', function () {
  fAuthorization::requireLoggedIn();
  $controller = new AdminController();
  $controller->sendmail1();
});




$app->get('/manage_known_users', function () {
  fAuthorization::requireLoggedIn();
  $controller = new NameController();
  $controller->showKnown();
});
$app->get('/manage_users/:id/edit', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new NameController();
  $controller->edit($id);
});


// article list page contains popup window
// for creating new articles
$app->get('/articles', function () {
  UserHelper::requireProfile();
  $controller = new ArticleController();
  $controller->index();
});

$app->get('/article/:id', function ($id) {
  UserHelper::requireProfile();
  $controller = new ArticleController();
  $controller->show($id);
});

$app->get('/article/:id/edit', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new ArticleController();
  $controller->edit($id);
});
$app->get('/cultures', function () {
  UserHelper::requireProfile();
  $controller = new ArticleController();
  $controller->cultures();
});
$app->get('/infrastructures', function () {
  UserHelper::requireProfile();
  $controller = new ArticleController();
  $controller->infrastructures();
});
$app->get('/halloffames', function () {
  UserHelper::requireProfile();
  $controller = new ArticleController();
  $controller->halloffames();
});
$app->get('/posts', function () {
  UserHelper::requireProfile();
  $controller = new ArticleController();
  $controller->showPosts();
});

$app->get('/profiles/new', function () {
  fAuthorization::requireLoggedIn();
  $controller = new ProfileController();
  $controller->newProfile();
});

$app->get('/profile/:id', function ($id) {
  fAuthorization::requireLoggedIn();
  UserHelper::requireProfile();
  $controller = new ProfileController();
  $controller->show($id,0);
});


$app->get('/profile/:id/tweet', function ($id) {
  fAuthorization::requireLoggedIn();
  UserHelper::requireProfile();
  $controller = new ProfileController();
  $controller->show($id,0);
});


$app->get('/profile/:id/msgs', function ($id) {
  fAuthorization::requireLoggedIn();
  UserHelper::requireProfile();
  $controller = new ProfileController();
  $controller->show($id,2);
});
// The following routes are accessed via AJAX

$app->post('/avatar/update', function () {
  fAuthorization::requireLoggedIn();
  $controller = new AvatarController();
  $controller->update();
});

$app->post('/register', function () {
  $controller = new RegisterController();
  $controller->submit();
});

$app->post('/articles', function () {
  fAuthorization::requireLoggedIn();
  $controller = new ArticleController();
  $controller->create();
});

$app->post('/import/users', function () {
  fAuthorization::requireLoggedIn();
  $controller = new AdminController();
  $controller->importUsers();
});

$app->post('/manage_users', function () {
  fAuthorization::requireLoggedIn();
  $controller = new NameController();
  $controller->create();
});


// fuck slim reads php://input before flourish
$app->post('/manage_users/:id', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new NameController();
  $controller->update($id);
});

$app->delete('/manage_users/:id', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new NameController();
  $controller->delete($id);
});


$app->post('/article/:id', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new ArticleController();
  $controller->update($id);
});

$app->delete('/article/:id', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new ArticleController();
  $controller->delete($id);
});

$app->post('/profiles', function () {
  fAuthorization::requireLoggedIn();
  $controller = new ProfileController();
  $controller->create();
});

$app->post('/profile/:id', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new ProfileController();
  $controller->update($id);
});

$app->post('/manage/sendmail', function () {
  fAuthorization::requireLoggedIn();
  $controller = new AdminController();
  $controller->sendmail();
});


$app->run();
