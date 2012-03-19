<?php
require_once(__DIR__ . '/vendor/flourish.php');
require_once(__DIR__ . '/vendor/slim.php');
require_once(__DIR__ . '/vendor/markdown.php');

require_once(__DIR__ . '/models/Article.php');
require_once(__DIR__ . '/models/Contact.php');
require_once(__DIR__ . '/models/Experience.php');
require_once(__DIR__ . '/models/Honor.php');
require_once(__DIR__ . '/models/Paper.php');
require_once(__DIR__ . '/models/Profile.php');
require_once(__DIR__ . '/models/Invitation.php');

require_once(__DIR__ . '/controllers/ApplicationController.php');
require_once(__DIR__ . '/controllers/ArticleController.php');
require_once(__DIR__ . '/controllers/ContactController.php');
require_once(__DIR__ . '/controllers/ExperienceController.php');
require_once(__DIR__ . '/controllers/HomeController.php');
require_once(__DIR__ . '/controllers/HonorController.php');
require_once(__DIR__ . '/controllers/PaperController.php');
require_once(__DIR__ . '/controllers/ProfileController.php');

require_once(__DIR__ . '/routes.php');
