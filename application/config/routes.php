<?php

defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'user/User';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['perfume/search'] = 'user/Perfume/search';
$route['perfume'] = 'user/Perfume/index';
$route['perfume/details/(:num)'] = 'user/Perfume/details/$1';

$route['perfume/submit_rating'] = 'user/Perfume/submit_rating';
$route['perfume/submit_comment'] = 'user/Perfume/submit_comment';
$route['perfume/get_comments/(:num)'] = 'user/Perfume/get_comments/$1';
$route['perfume/get_average_rating/(:num)'] = 'user/Perfume/get_average_rating/$1';


$route['post-ad'] = 'user/Ad/loadPostAdView';

$route['post-service'] = 'user/Ad/loadPostServiceView';

$route['Ad/:any'] = 'user/Ad/loadAdDetailView';

$route['signup'] = 'user/User/loadSignUpView';

$route['option'] = 'user/User/loadOptionView';

$route['login'] = 'user/User/loadLoginView';

$route['profile'] = 'user/User/loadProfileView';

$route['home'] = 'user/User/loadHomeView';

$route['privacy-policy'] = 'user/Common/loadPrivacyPolicyView';

$route['terms-conditions'] = 'user/Common/loadTermsConditionsView';

$route['contact-us'] = 'user/Common/loadContactusView';

$route['about-us'] = 'user/Common/loadAboutusView';

$route['cat-search/:any'] = 'user/Ad/getSearchResultsBySubCat';

$route['main-search'] = 'user/Ad/getMainSearchResults';

$route['filter-search'] = 'user/Ad/getSearchResults';

$route['HealthCareCenter'] = 'user/Ad/loadHealthCareCenterView';

$route['ResetPassword/:any'] = 'user/User/loadResetPassView';



$route['edit/:num'] = 'user/Ad/loadEditPostView';

$route['edit-service/:num'] = 'user/Ad/loadEditServiceView';

$route['search/all-results'] = 'user/Ad/getSearchResults';

$route[':any/results'] = 'user/Ad/getSearchResultsByCat';

$route['user-ads/:any'] = 'user/Ad/getUserAllAds';

$route['logout'] = 'user/User/logout';
